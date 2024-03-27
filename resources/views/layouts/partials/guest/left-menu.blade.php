<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-purple-100 bg-white px-6 pb-4">
        <div class="flex h-16 shrink-0 items-center">
            <a href="{{ route('home.page') }}" wire:navigate class="flex items-center">
                <h1 class="ml-2 font-logo text-xl font-extrabold text-violet-900">{{ config('app.name') }}</h1>
            </a>

        </div>
        <nav class="flex flex-1 flex-col">
             <livewire:layout.brand-left-menu></livewire:layout.brand-left-menu>
             <livewire:layout.categories-left-menu></livewire:layout.categories-left-menu>
             <livewire:layout.budget-left-menu></livewire:layout.budget-left-menu>
        </nav>
    </div>
</div>
