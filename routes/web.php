<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminCheckMiddleware;

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index']);
Route::get('/', [HomepageController::class, 'index']);
Route::get('/shop', [ShopController::class, 'getAllProducts']);




Route::middleware(['auth', AdminCheckMiddleware::class])
    ->prefix('admin')
    ->group(function () {

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/all', 'getAllProducts')->name('AlleProdukte');
        Route::get('/product/add', 'index')->name('ProduktHinzufügen');
        Route::get('/product/edit/{product}', 'edit')->name('bearbeitenProdukt');
        Route::post('/product/update/{product}', 'update')->name('aktualisierenProdukt');
        Route::get('/product/delete/{product}', 'delete')->name('löschenProduct');
    });

    

    Route::controller(ContactController::class)->group(function () {
        Route::get('/contacts/all', 'getAllContacts')->name('AlleKontakte');
        Route::post('/contacts/send', 'sendContact')->name('sendContact');
        Route::get('/contacts/edit/{contact}', 'edit')->name('bearbeitenKontakt');
        Route::post('/contacts/update/{contact}', 'update')->name('aktualisierenKontakt');
        Route::get('/contacts/delete/{contact}', 'delete')->name('löschenContact');
    });


    
});


Route::get('/dashboard', function () {
    return redirect('/admin/add-product');
})->middleware('auth')->name('dashboard');


require __DIR__.'/auth.php';

