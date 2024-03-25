<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    use \Livewire\WithPagination;

    public array $selectedBrands = [];

    public array $selectedCategories = [];

    #[On('filter-by-brand')]
    public function updateBrands($items):void
    {
        $this->selectedBrands = $items;
    }

    #[On('filter-by-category')]
    public function updateCategory($items):void
    {
        $this->selectedCategories = $items;
    }

    #[Computed]
    public function products()
    {
        return \App\Models\Product::when(!empty($this->selectedBrands), function ($q){
            return $q->whereIn('brand_id', $this->selectedBrands);
        })
        ->when( !empty($this->selectedCategories), function ($q){
            return $q->whereIn('category_id', $this->selectedCategories);
        })
        ->paginate(20);
    }

}; ?>

<div class="px-4 sm:px-6 lg:px-8">

    <div class="grid  gap-4 text-gray-900 grid-cols-2 md:grid-cols-4">
        @foreach($this->products as $product)
            <a href="#" class="mb-6">
                <div class="group p-3 bg-white bg-opacity-70 hover:bg-opacity-100 shadow-sm shadow-gray-100 hover:shadow-violet-300 transition rounded-xl border-1 border-purple-900/10">
                    <div class="relative">
                        <img class="w-full aspect-video rounded-md relative z-0" src="{{ $product->featured_image }}" alt="Event_image">
                    </div>
                    <h2 class="mt-2 font-title text-sm font-bold">{{ $product->name }}</h2>
                    <div class="flex w-full items-start mt-6">
                        <div class="flex justify-between w-full">
                            <div class="inline-flex items-center">
                                <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-[16px]  text-purple-700 ring-1 ring-inset ring-purple-700/10">{{ number_format($product->price) }} </span>
                            </div>

                            <div class="inline-flex">
                                <span class="inline-flex items-center rounded-md  px-2 py-1 text-[16px]  text-orange-700 ">View Detail</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="block w-full">
            {{ $this->products->links() }}
    </div>
</div>
