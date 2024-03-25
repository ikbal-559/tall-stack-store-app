<div class="right-0 z-20 bg-white shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">
    <nav x-data="{ open: false }" class="border-b border-purple-100 " >
        <div class="sm:px-6 md:px-8 py-2">
            <div class="flex ">
                <div class="md:hidden">
                    <a href="{{ route('home.page') }}" wire:navigate class="flex items-center">
                        <h1 class="ml-2 font-logo text-xl font-extrabold text-violet-900">{{ config('app.name') }}</h1>
                    </a>
                </div>

                <div class="flex flex-1 items-end justify-end sm:items-stretch sm:justify-end ">
                    <div class="sm:ml-6">
                        <div class="flex space-x-4 items-end justify-end">
                            <a wire:navigate href="{{ route('home.page') }}" class="text-blue-900  px-3 py-2 text-sm font-medium">{{ __('Home') }}</a>
                        </div>
                    </div>
                    <div class="sm:ml-6">
                        <div class="flex space-x-4 items-end justify-end">
                            <a wire:navigate href="{{ route('store.page') }}" class="text-blue-900  px-3 py-2 text-sm font-medium">{{ __('Rackets') }}</a>
                        </div>
                    </div>

                    <div class="flex ">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Shop
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div :class="{ 'block': open, 'hidden': !open }" class="" id="mobile-menu">

            <div class="space-y-1 pb-3 pt-2">
                <div class="flex px-4 gap-2">
                    <livewire:layout.brand-left-menu></livewire:layout.brand-left-menu>
                    <livewire:layout.categories-left-menu></livewire:layout.categories-left-menu>
                </div>
            </div>


            <div class="border-t border-gray-200 pb-3 pt-4">

                <!-- Responsive Settings Options For Logged Users -->

                <!-- Log In & Register Links -->
                <div class="mt-3 space-y-1">
                    <ul class="flex list-none">
                        <li><a wire:navigate href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">{{ __('Log in') }}</a></li>
                    </ul>
                </div>


            </div>
        </div>

    </nav>
</div>
