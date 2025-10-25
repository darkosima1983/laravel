<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;

Route::get('/about', function () {
    return view('about');
});

// kada se dodje na 127.0.0.1:8000/contact
//ucitaj ContactController
//iz tog controllera pozovi funkciju index
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/', [HomepageController::class, 'index']);

Route::get('/shop', [ShopController::class, 'getAllProducts']);

Route::get('/admin/all-contacts', [ContactController::class, 'getAllContacts']);

Route::post("/send-contact", [ContactController::class, "sendContact"]);

Route::get('/admin/add-product', [ProductController::class, 'index']);

Route::get('/admin/all-products', [ProductController::class, 'getAllProducts']);
Route::get("/admin/delete-product/{product}", [ProductController::class, "delete"]);

Route::post("/admin/send-product", [ProductController::class, "sendProduct"]);

