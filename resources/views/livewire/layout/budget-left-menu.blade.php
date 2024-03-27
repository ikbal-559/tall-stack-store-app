<?php

use Livewire\Volt\Component;

new class extends Component {

    public null|int $budget;


    public function updatedBudget():void
    {
        $this->dispatch('filter-by-budget', $this->budget);
    }

}; ?>
<div class="py-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('My Budget') }}</label>
    <select wire:model.live="budget" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">{{ __('Select Budget') }}</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="7000">7000</option>
        <option value="9000">9000</option>
        <option value="10000">10,000</option>
        <option value="12000">12,000</option>
        <option value="15000">15,000</option>
        <option value="20000">20,000</option>
        <option value="">Any Price</option>
    </select>
</div>
