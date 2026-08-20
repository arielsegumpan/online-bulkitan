<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/','pages::home.index')->name('home');
Route::livewire('/shops', 'pages::shop.index')->name('shop');