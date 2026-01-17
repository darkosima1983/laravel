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
        Route::get('/all', 'getAllProducts')->name('products.all');
        Route::get('/add', 'index')->name('product.add');
        Route::get('/edit/{product}', 'edit')->name('product.edit');
        Route::post('/update/{product}', 'update')->name('product.update');
        Route::get('/delete/{product}', 'delete')->name('product.delete');
    });

    

    Route::controller(ContactController::class)
    ->prefix('contacts')
    ->group(function () {
        Route::get('/all', 'getAllContacts')->name('contacts.all');
        Route::post('/send', 'sendContact')->name('contact.send');
        Route::get('/edit/{contact}', 'edit')->name('contact.edit');
        Route::post('/update/{contact}', 'update')->name('contact.update');
        Route::get('/delete/{contact}', 'delete')->name('contact.delete');
    });


    
});


Route::get('/dashboard', function () {
    return redirect('/admin/add-product');
})->middleware('auth')->name('dashboard');


require __DIR__.'/auth.php';

