<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartAddRequest;
use Illuminate\Support\Facades\Session;
class ShoppingCartController extends Controller
{
     public function viewCart(){
        return view('cart', ['cart' => Session::get('product')]);
    }
public function addToCart(CartAddRequest $request){
    Session::put('product', [
        'id' => $request->id, 
        'amount' => $request->amount
    ]);

    return redirect()->route('cart.view')->with('success', 'Produkt wurde zum Warenkorb hinzugefügt.');
}

   
}
