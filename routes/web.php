<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Volt::route('/brand/{brandSlug}', 'pages.store')->name('brand.store.page');

Volt::route('/', 'pages.store')->name('home.page');

Volt::route('/store', 'pages.store')->name('store.page');

Volt::route('/racket/{slug}', 'pages.details')->name('details.page');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
