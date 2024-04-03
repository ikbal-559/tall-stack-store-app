<?php

use App\Livewire\Forms\PlaceOrderForm;
use Livewire\Volt\Component;

new class extends Component {

    public PlaceOrderForm $form;

    public function saveOrder()
    {
       $this->form->save();
    }

}; ?>
<div class="flex justify-end">
    <form class="w-full mx-auto" wire:submit="saveOrder">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Your email') }}</label>
            <input wire:model="form.email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Enter Email') }}"  />
            <div>
                @error('form.email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-5">
            <label for="userName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Your Name') }}</label>
            <input wire:model="form.name" placeholder="{{ __('Enter name') }}" type="text" id="userName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
            <div>
                @error('form.name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="inline-flex   px-6  py-3 mt-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Place Order') }} <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg></button>
    </form>
</div>
