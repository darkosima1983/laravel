<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index']);
Route::get('/', [HomepageController::class, 'index']);
Route::get('/shop', [ShopController::class, 'getAllProducts']);

Route::get('/admin/add-product', [ProductController::class, 'index']);

Route::get('/admin/all-contacts', [ContactController::class, 'getAllContacts'])->name('AlleKontakte');
Route::get('/admin/all-products', [ProductController::class, 'getAllProducts'])->name('AlleProdukte');

Route::get("/admin/delete-product/{product}", [ProductController::class, "delete"])->name('löschenProduct');
Route::get("/admin/delete-contact/{contact}", [ContactController::class, "delete"])->name('löschenContact');

Route::post("/send-contact", [ContactController::class, "sendContact"]);
Route::post("/admin/save-product", [ProductController::class, "sendProduct"])->name("hinzufügenProdukt");

Route::get('/admin/edit-product/{product}', [ProductController::class, 'edit'])->name('bearbeitenProdukt');
Route::get('/admin/edit-contact/{contact}', [ContactController::class, 'edit'])->name('bearbeitenKontakt');

Route::post('/admin/update-product/{product}', [ProductController::class, 'update'])->name('aktualisierenProdukt');
Route::post('/admin/update-contact/{contact}', [ContactController::class, 'update'])->name('aktualisierenKontakt');





