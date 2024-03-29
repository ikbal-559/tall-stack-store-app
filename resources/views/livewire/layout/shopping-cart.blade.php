<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;
use App\Facades\Cart;

new class extends Component {

    protected $total;
    protected $content;

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->updateCart();
    }

    /**
     * Renders the component on the browser.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function with():array
    {
        return   [
            'total' => $this->total,
            'content' => $this->content,
        ];
    }

    /**
     * Removes a cart item by id.
     *
     * @param string $id
     * @return void
     */
    public function removeFromCart(string $id): void
    {
        Cart::remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        Cart::clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(string $id, string $action): void
    {
        Cart::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    #[On('product-added-to-cart')]
    public function updateCart()
    {
        $this->total = Cart::total();
        $this->content = Cart::content();
    }
}; ?>
<div id="drawer-shopping-cart"
     class="absolute transform transition duration-300 z-10 w-80 bg-white text-blue-900 h-screen p-4 right-0 border-l border-purple-100"
     :class="{'-translate-x-full opacity-0':drawerShoppingCart === false, 'translate-x-0 opacity-100': drawerShoppingCart === true}"
>
    <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>
    {{ __('Cart') }}</h5>
    <button type="button"   @click="drawerShoppingCart = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">{{ __('Close menu') }}</span>
    </button>
    <div class="py-2 mx-2 my-2 max-w-md ">
        @if ($content->count() > 0)
            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($content as $id => $item)
                <li class="pt-3 pb-0 sm:pt-4">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $item->get('name') }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $item->get('price') }} x {{ $item->get('quantity') }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            ${{ $item->get('price') * $item->get('quantity') }}
                        </div>
                    </div>
                    <div class="flex text-black justify-between mb-6">
                        <div>
                            <button class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300" wire:click="updateCartItem({{ $id }}, 'minus')"> - </button>
                            <button class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300" wire:click="updateCartItem({{ $id }}, 'plus')"> + </button>
                        </div>
                        <button class="text-sm p-2 border-2 rounded border-red-500 hover:border-red-600 bg-red-500 hover:bg-red-600" wire:click="removeFromCart({{ $id }})">X</button>
                    </div>
                </li>
                @endforeach
            </ul>
            <hr class="my-2">
            <p class="h-2 font-bold text-right mb-2">{{ __('Total') }}: ${{ $total }}</p>
            <div class="flex justify-end">
                <a href="#" class="inline-flex   px-6  py-3 mt-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Checkout') }} <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg></a>
            </div>
        @else
            <p class="text-3xl text-center mb-2">{{ __('cart is empty') }}!</p>
        @endif
    </div>
</div>
