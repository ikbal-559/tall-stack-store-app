<div class="sticky top-0 right-0 z-20 bg-white shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">
    <nav x-data="{ open: false }" class="border-b border-purple-100 " >
        <div class="sm:px-6 md:px-8 py-2">
            <div class="flex ">
                <div class="md:hidden">
                    <a href="{{ route('home.page') }}" wire:navigate class="flex items-center">
                        <h1 class="ml-2 font-logo text-xl font-extrabold text-violet-900">{{ config('app.name') }}</h1>
                    </a>
                </div>
                <form class="w-96 hidden sm:block">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">{{ __('Search') }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="url(#grad1)" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd"></path>
                                <defs>
                                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#b794f4;stop-opacity:1"></stop>
                                        <stop offset="50%" style="stop-color:#ed64a6;stop-opacity:1"></stop>
                                        <stop offset="100%" style="stop-color:#f56565;stop-opacity:1"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-white rounded-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search your racket" required="">
                        <button type="submit" class="text-stone-400 absolute end-2.5 bottom-2.5 hover:bg-crayola bg-gray-100 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
                <div class="flex flex-1 items-end justify-end sm:items-stretch sm:justify-end ">
                    <div class=" hidden   sm:ml-6 sm:block">
                        <div class="flex space-x-4 items-end justify-end">
                            <a wire:navigate href="{{ route('login') }}" class="text-blue-900  px-3 py-2 text-sm font-medium">{{ __('Log in') }}</a>
                        </div>
                    </div>
                    <div class="flex md:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Menu
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden" id="mobile-menu">

            <div class="space-y-1 pb-3 pt-2">
                <div class="flex px-4">
                    <livewire:layout.brand-left-menu></livewire:layout.brand-left-menu>
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
