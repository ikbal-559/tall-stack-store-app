<?php
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Product;

new #[Layout('layouts.store')] class extends Component
{
    use \Livewire\WithPagination;

    const PAGE_NAME = 'store-product-index';

    public string $title = 'Badminton Rackets';

    public null|int $budget;

    public array $selectedBrands = [];

    public array $selectedCategories = [];

    public function mount($brandSlug = null){
        if(!empty($brandSlug)){
            $brand  = \App\Models\Brand::where('slug', $brandSlug)->first();
            if(!empty($brand)){
                $this->title = $brand->name. ' ' . $this->title;
                $this->selectedBrands = [$brand->id];
                $this->dispatch('select-brand', $brand->id);
            }
        }
    }

    #[On('filter-by-brand')]
    public function updateBrands($items):void
    {
        $this->selectedBrands = $items;
        $this->selectedCategories = [];
        $this->resetPage(pageName: self::PAGE_NAME);
    }

    #[On('filter-by-category')]
    public function updateCategory($items):void
    {
        $this->selectedCategories = $items;
        $this->resetPage(pageName: self::PAGE_NAME);
    }

    #[On('filter-by-budget')]
    public function updateBudget($budget):void
    {
        $this->budget = $budget;
        $this->resetPage(pageName: self::PAGE_NAME);
    }

    #[Computed]
    public function products()
    {
        return Product::when(!empty($this->selectedBrands), function ($q){
            return $q->whereIn('brand_id', $this->selectedBrands);
        })
        ->when( !empty($this->selectedCategories), function ($q){
            return $q->whereIn('category_id', $this->selectedCategories);
        })
        ->when( !empty($this->budget), function ($q){
            return $q->whereBetween('price', [$this->budget - 1000, $this->budget + 2000]);
        })
        ->orderBy('price')
        ->paginate(20, pageName: self::PAGE_NAME);
    }

    public function rendering(View $view): void
    {
        $view->title($this->title);
    }
}; ?>
<div class="px-4 sm:px-6 lg:px-8">
    <div class="grid  gap-4 text-gray-900 grid-cols-2 md:grid-cols-4">
        @foreach($this->products as $product)
           <livewire:product-card  :$product   wire:key="{{ $product->id }}"  />
        @endforeach
    </div>
    <div class="block w-full">
        {{ $this->products->links() }}
    </div>
</div>
