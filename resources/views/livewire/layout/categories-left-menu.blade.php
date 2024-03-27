<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {

    public array $selectedBrands = [];

    #[On('filter-by-brand')]
    public function updateBrands($items):void
    {
        $this->selectedBrands = $items;
    }

    #[Computed]
    public function categories()
    {
        return \App\Models\Category::withCount('products')
            ->when(!empty($this->selectedBrands), function ($q){
                return $q->whereIn('brand_id', $this->selectedBrands);
            })
            ->get();
    }


    public array $selectedCategory = [];

    public function updatedSelectedCategory():void
    {
        $this->dispatch('filter-by-category', $this->selectedCategory);
    }

}; ?>
<ul>
    <li  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Categories') }}</li>
    @foreach($this->categories as $category)
        <li>
            <input wire:model.live="selectedCategory" type="checkbox"
                   class="shrink-0  mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                   id="checkBoxCategory{{ $category->id }}" value="{{ $category->id }}">
            <label for="checkBoxCategory{{ $category->id }}"
                   class="text-sm cursor-pointer text-black font-bold ms-1 dark:text-gray-400"> {{ $category->name }}
                ({{ $category->products_count }})</label>
        </li>
    @endforeach
</ul>
