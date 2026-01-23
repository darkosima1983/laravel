<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Controllers\ShoppingCartController;

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/', [HomepageController::class, 'index']);
Route::get('/shop', [ShopController::class, 'getAllProducts']);

Route::get('/product/{product}', [ProductController::class, 'permalink'])
    ->name('product.show');

Route::post('/cart/add', [ShoppingCartController::class, 'addToCart'])
    ->name('cart.add');

Route::get('/cart/view', [ShoppingCartController::class, 'viewCart'])
    ->name('cart.view');

Route::middleware(['auth', AdminCheckMiddleware::class])
    ->prefix('admin')
    ->group(function () {

   Route::controller(ProductController::class)
    ->prefix('product')
    ->name('product.')
    ->group(function () {
        Route::get('/all', 'getAllProducts')->name('all');          // prikaz svih proizvoda
        Route::get('/add', 'index')->name('add');                   // forma za dodavanje
        Route::post('/add', 'sendProduct')->name('store');                // POST ruta za čuvanje novog proizvoda
        Route::get('/edit/{product}', 'edit')->name('edit');        // forma za edit
        Route::post('/update/{product}', 'update')->name('update'); // update proizvoda
        Route::get('/delete/{product}', 'delete')->name('delete');  // brisanje
    });

    

    Route::controller(ContactController::class)
    ->prefix('contacts')
    ->name('contact.')
    ->group(function () {
        Route::get('/all', 'getAllContacts')->name('all');
        Route::post('/send', 'sendContact')->name('send');
        Route::get('/edit/{contact}', 'edit')->name('edit');
        Route::post('/update/{contact}', 'update')->name('update');
        Route::get('/delete/{contact}', 'delete')->name('delete');
    });


    
});


Route::get('/dashboard', function () {
    return redirect()->route('product.add');
})->middleware('auth')->name('dashboard');


require __DIR__.'/auth.php';

