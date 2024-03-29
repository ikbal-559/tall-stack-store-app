<?php

use Livewire\Attributes\Computed;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {


    #[Computed]
    public function brands()
    {
        return \App\Models\Brand::withCount('products')->get();
    }


}; ?>
<ul class="mb-5">
    <li  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Brands') }}</li>
    @foreach($this->brands as $brand)
        <li>
            <a class="text-sm cursor-pointer text-black font-bold ms-1 dark:text-gray-400" href="{{ route('brand.store.page', $brand->slug) }}">{{ $brand->name }} ({{ $brand->products_count }})</a>
        </li>
    @endforeach
</ul>
