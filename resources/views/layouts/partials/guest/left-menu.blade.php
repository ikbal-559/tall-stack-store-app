<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-purple-100 bg-white px-6 pb-4">
        <div class="flex h-16 shrink-0 items-center">
            <a href="{{ route('home.page') }}" wire:navigate class="flex items-center">
                <h1 class="ml-2 font-logo text-xl font-extrabold text-violet-900">{{ config('app.name') }}</h1>
            </a>

        </div>
        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li>
                            <a class="font-navlink {{ request()->is('/') ? 'bg-gray-50' : '' }}  text-violet-700 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                               href="{{ route('home.page') }}" wire:navigate>
                                {{ __('Home Page') }}
                            </a>
                        </li>


                    </ul>
                        <livewire:layout.brand-left-menu>
                </li>

            </ul>
        </nav>
    </div>
</div>
