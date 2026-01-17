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
        Route::get('/all', 'getAllProducts')->name('all.products');
        Route::get('/add', 'index')->name('add.product');
        Route::get('/edit/{product}', 'edit')->name('edit.product');
        Route::post('/update/{product}', 'update')->name('update.product');
        Route::get('/delete/{product}', 'delete')->name('delete.product');
    });

    

    Route::controller(ContactController::class)
    ->prefix('contacts')
    ->group(function () {
        Route::get('/all', 'getAllContacts')->name('all.contacts');
        Route::post('/send', 'sendContact')->name('send.contact');
        Route::get('/edit/{contact}', 'edit')->name('edit.contact');
        Route::post('/update/{contact}', 'update')->name('update.contact');
        Route::get('/delete/{contact}', 'delete')->name('delete.contact');
    });


    
});


Route::get('/dashboard', function () {
    return redirect('/admin/add-product');
})->middleware('auth')->name('dashboard');


require __DIR__.'/auth.php';

