<?php
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;
use App\Models\Product;

new #[Layout('layouts.guest')] class extends Component
{
    public Product $product;

    public int $quantity = 1;

    public bool $inCart = false;

    public function mount($slug){
        $this->product = Product::where('slug', $slug)->first();
    }

    #[Computed]
    public function relatedProducts()
    {
        return Product::whereBetween('price', [$this->product->price - 100, $this->product->price + 3000])
            ->orderBy('price')
            ->limit(8)
            ->get();
    }

    public function rendering(View $view): void
    {
        $view->title($this->product->name);
    }

    public function addToCart(): void
    {
        $this->inCart =true;
        \App\Facades\Cart::add($this->product->id, $this->product->name, $this->product->getRawOriginal('price'), $this->quantity);
        $this->dispatch('product-added-to-cart');
    }

}; ?>
<section class="text-gray-700 body-font overflow-hidden bg-white">

    <div class="container px-5 py-7 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ $product->featured_image }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                @if( !empty($product->brand) )
                    <a href="{{ route('brand.store.page', $product->brand->slug) }}" class="text-sm title-font text-gray-500 tracking-widest">{{ $product->brand->name }}</a>
                @endif
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1 mt-3">{{ $product->name }}</h1>

                <p class="leading-relaxed">{{ $product->details?->description }}</p>
                @if(!empty($product->metas))
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 py-5" >
                        @foreach($product->metas as $meta)
                            <li>{{ $meta->meta_key }}: {{ $meta->meta_value }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="flex">
                    <span class="title-font font-medium text-2xl text-gray-900">{{ $product->price }}</span>
                    <button  @click="drawerShoppingCart = true" @if($inCart) disabled @endif wire:click="addToCart" class="flex ml-auto text-white {{ ($inCart) ? 'bg-gray-100' : 'bg-red-500'  }}   border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">{{ __('Buy Now') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 sm:px-6 lg:px-8">
        <h2  class="text-gray-900 text-2xl title-font font-medium mb-1 mt-3">{{ __('You May Also like') }}</h2>
        <div class="grid  gap-4 text-gray-900 grid-cols-2 md:grid-cols-4">
            @foreach($this->relatedProducts as $product)
                <livewire:product-card  :$product   wire:key="{{ $product->id }}"  />
            @endforeach
        </div>
    </div>
</section>
