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

    Route::controller(ProductController::class)
    ->prefix('product')
    ->group(function () {
        Route::get('/all', 'getAllProducts')->name('AlleProdukte');
        Route::get('/add', 'index')->name('ProduktHinzufügen');
        Route::get('/edit/{product}', 'edit')->name('bearbeitenProdukt');
        Route::post('/update/{product}', 'update')->name('aktualisierenProdukt');
        Route::get('/delete/{product}', 'delete')->name('löschenProduct');
    });

    

    Route::controller(ContactController::class)
    ->prefix('contacts')
    ->group(function () {
        Route::get('/all', 'getAllContacts')->name('AlleKontakte');
        Route::post('/send', 'sendContact')->name('sendContact');
        Route::get('/edit/{contact}', 'edit')->name('bearbeitenKontakt');
        Route::post('/update/{contact}', 'update')->name('aktualisierenKontakt');
        Route::get('/delete/{contact}', 'delete')->name('löschenContact');
    });


    
});


Route::get('/dashboard', function () {
    return redirect('/admin/add-product');
})->middleware('auth')->name('dashboard');


require __DIR__.'/auth.php';

