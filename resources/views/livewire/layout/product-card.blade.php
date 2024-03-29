<a href="{{ route('details.page', $product->slug) }}" class="mb-6"  >
<div class="group p-3 bg-white bg-opacity-70 hover:bg-opacity-100 shadow-sm shadow-gray-100 hover:shadow-violet-300 transition rounded-xl border-1 border-purple-900/10">
    <div class="relative">
        <img class="w-full aspect-video rounded-md relative z-0 transition duration-300 ease-in-out hover:scale-110" src="{{ $product->featured_image }}" alt="product_image">
    </div>
    <h2 class="mt-2 font-title text-sm font-bold">{{ $product->name }}</h2>
    <div class="flex w-full items-start mt-6">
        <div class="flex justify-between w-full">
            <div class="inline-flex items-center">
                <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-[16px]  text-purple-700 ring-1 ring-inset ring-purple-700/10">{{ number_format($product->price) }} </span>
            </div>
            <div class="inline-flex">
                <span class="inline-flex items-center rounded-md  px-2 py-1 text-[16px]  text-orange-700 ">{{ __('View Detail') }}</span>
            </div>
        </div>
    </div>
</div>
</a>
