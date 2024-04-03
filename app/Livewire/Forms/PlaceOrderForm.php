<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlaceOrderForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $name = '';

    public function save()
    {
        $this->validate();

        dd($this->all());

    }

}
