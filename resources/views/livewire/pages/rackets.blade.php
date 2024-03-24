<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    use \Livewire\WithPagination;

    #[Computed]
    public function products()
    {
        return \App\Models\Product::paginate(20);
    }
}; ?>

<div class="px-4 sm:px-6 lg:px-8">
    <h1 class="text-blue-900 text-xl mb-6"> Racket Page</h1>
    <div class="grid  gap-4 text-gray-900 grid-cols-2 md:grid-cols-4">
        @foreach($this->products as $product)
            <a href="#" class="glide__slide mb-6">
                <div class="flex w-full items-start mb-1">
                    <div class="flex justify-between w-full">
                        <div class="inline-flex items-center">
                            <span class="inline-flex items-center rounded-md text-purple-800/60 px-1 py-1 text-[10px] font-medium">28 LBS</span>
                        </div>

                        <div class="inline-flex space-x-1">
                            <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-[10px] font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">G5</span>
                            <span class="inline-flex items-center rounded-md text-purple-50 px-2 py-1 text-[10px] font-medium bg-gradient-to-r to-purple-400/90 from-violet-700/60 ring-1 ring-inset ring-purple-700/10">Head Heavy</span>
                        </div>
                    </div>
                </div>


                <div class="group p-3 bg-white bg-opacity-70 hover:bg-opacity-100 shadow-lg shadow-violet-200 hover:shadow-violet-300 transition rounded-xl border-1 border-purple-900/10">
                    <div class="relative">

                        <!-- Illustration -->
                        <img class="w-full aspect-video rounded-md relative z-0" src="{{ $product->featured_image }}" alt="Event_image">


                        <!-- Fixed Heart -->
                        <div class="absolute text-xl top-2 right-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="rgba(0, 0, 0, 0)" stroke="white" stroke-width="1.5">
                                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"></path>
                            </svg>
                        </div>
                    </div>

                    <h2 class="mt-2 font-title text-sm font-bold">{{ $product->name }}</h2>
                    <div class="flex w-full items-start mt-6">
                        <div class="flex justify-between w-full">
                            <div class="inline-flex items-center">
                                <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-[16px]  text-purple-700 ring-1 ring-inset ring-purple-700/10">TK 18,500 </span>
                            </div>

                            <div class="inline-flex">
                                <span class="inline-flex items-center rounded-md  px-2 py-1 text-[16px]  text-orange-700 ">85 gms.</span>
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
