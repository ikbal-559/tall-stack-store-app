<?php

namespace App\Facades;

use App\Services\StoreCartService;
use Illuminate\Support\Facades\Facade;

class Cart extends Facade {
    protected static function getFacadeAccessor(): string
    {
        return StoreCartService::class;
    }
}
