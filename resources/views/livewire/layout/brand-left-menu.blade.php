<?php

use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    #[Computed]
    public function brands()
    {
        return \App\Models\Brand::withCount('products')->get();
    }
}; ?>
<ul role="list" class="-mx-2 space-y-1">
 @foreach($this->brands as $brand)
        <li>
            <a class="font-navlink {{ request()->is('rackets') && request()->has('brand') && request()->get('brand') == $brand->id ? 'bg-gray-50' : '' }}  text-violet-700 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
               href="{{ route('rackets.page') }}?brand={{ $brand->id }}" wire:navigate>{{ __($brand->name) }}
                ({{ $brand->products_count }})
            </a>
        </li>
 @endforeach
</ul>
