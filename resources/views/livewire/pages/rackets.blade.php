<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    use \Livewire\WithPagination;

    public array $selectedCategories = [];

    #[Computed]
    public function products()
    {
        return \App\Models\Product::when(request()->has('brand'), function ($q){
            return $q->where('brand_id', request()->get('brand'));
        } )
        ->when( !empty($this->selectedCategories), function ($q){
            return $q->whereIn('category_id', $this->selectedCategories);
        } )
        ->paginate(20);
    }

    public function with(): array
    {
        return [
            'categories' => \App\Models\Category::withCount('products')->where('brand_id', request()->get('brand_id'))->get()
        ];
    }
}; ?>

<div class="px-4 sm:px-6 lg:px-8">
    <div class="gap-x-6 p-3 sticky top-80 z-50 bg-white block" style="top: 50px">
        @foreach($categories as $category)
            <div class="inline-block mr-3 w-48">
                <input type="checkbox" wire:model.live="selectedCategories"   value="{{$category->id}}" class="shrink-0  mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="checkBoxCategory{{ $category->id }}">
                <label for="checkBoxCategory{{ $category->id }}" class="text-sm cursor-pointer text-black font-bold ms-1 dark:text-gray-400"> {{ $category->name }} ({{ $category->products_count }})</label>
            </div>
         @endforeach
    </div>
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
                                <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-[16px]  text-purple-700 ring-1 ring-inset ring-purple-700/10">TK 18,500 </span>
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
