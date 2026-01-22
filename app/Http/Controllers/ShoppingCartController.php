<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartAddRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
class ShoppingCartController extends Controller
{
     public function viewCart(){
       
        return view ("cart", [
            'cart' => Session::get('product', [])
        ]);
    }
   public function addToCart(CartAddRequest $request)
    {
        
        $product = Product::findOrFail($request->id);
        
            if ($request->amount > $product->amount) {
            return back()
                ->withErrors(['amount' => 'Nicht genügend Bestand verfügbar.'])
                ->withInput();
}
        Session::push('product', [
            'id'     => $product->id,
            'name'   => $product->name,
            'amount' => $request->amount,
            'price'  => $product->price,
        ]);

        return redirect()
            ->route('cart.view')
            ->with('success', 'Produkt wurde zum Warenkorb hinzugefügt.');
    }

   
}
