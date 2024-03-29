<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public Product $product;

    public function render()
    {
        return view('livewire.layout.product-card');
    }

    public function placeholder()
    {
        return view('livewire.layout.product-card-skeleton');
    }
}
