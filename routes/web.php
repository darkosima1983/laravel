<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;

Route::get('/about', function () {
    return view('about');
});

// kada se dodje na 127.0.0.1:8000/contact
//ucitaj ContactController
//iz tog controllera pozovi funkciju index
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/', [HomepageController::class, 'index']);

Route::get('/shop', [ShopController::class, 'index']);