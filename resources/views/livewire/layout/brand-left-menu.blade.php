<?php

use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component {


    #[Computed]
    public function brands()
    {
        return \App\Models\Brand::withCount('products')->get();
    }

    public array $selectedBrands = [];

    public function updatedSelectedBrands($value)
    {
        $this->dispatch('filter-by-brand', $this->selectedBrands);
    }

}; ?>
<ul class="mb-5">
    <li>{{ __('Brands') }}</li>
    @foreach($this->brands as $brand)
        <li>
            <input wire:model.live="selectedBrands" type="checkbox"
                   class="shrink-0  mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                   id="checkBoxBrand{{ $brand->id }}" value="{{ $brand->id }}">
            <label for="checkBoxBrand{{ $brand->id }}"
                   class="text-sm cursor-pointer text-black font-bold ms-1 dark:text-gray-400"> {{ $brand->name }}
                ({{ $brand->products_count }})</label>
        </li>
    @endforeach
</ul>
