<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Blog\BlogIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', BlogIndex::class)->name('home');
