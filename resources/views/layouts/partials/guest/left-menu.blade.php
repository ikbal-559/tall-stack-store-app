<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-purple-100 bg-white px-6 pb-4">
        <x-logo></x-logo>
        @if(!empty($layout) && $layout == 'store')
            <nav class="flex flex-1 flex-col" >
                 <livewire:layout.brand-left-menu />
                 <livewire:layout.categories-left-menu />
                 <livewire:layout.budget-left-menu />
            </nav>
        @endif
        @if(!empty($layout) && $layout == 'guest')
            <nav class="flex flex-1 flex-col" >
                 <livewire:layout.guest-left-menu />
            </nav>
        @endif
    </div>
</div>
