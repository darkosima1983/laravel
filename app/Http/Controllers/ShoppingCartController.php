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

   public function finishCart()
{
    $cart = Session::get('product', []);

    if (empty($cart)) {
        return redirect()->route('cart.view');
    }

    $totalPrice = 0;
    $products = [];

    // 1️⃣ Provera lagera + total price
    foreach ($cart as $item) {
        $product = Product::find($item['id']);

        if (!$product) {
            return redirect()
                ->route('cart.view')
                ->withErrors(['cart' => 'Produkt nicht gefunden.']);
        }

        if ($product->amount < $item['amount']) {
            return redirect()
                ->route('cart.view')
                ->withErrors([
                    'amount' => "Nicht genügend Bestand für Produkt {$product->name}."
                ]);
        }

        $products[] = $product;
        $totalPrice += $product->price * $item['amount'];
    }

    // 2️⃣ Kreiranje ORDER-a (JEDNOM)
    $order = Orders::create([
        'user_id' => auth()->id(),
        'status'  => 'completed',
        'price'   => $totalPrice,
    ]);

    // 3️⃣ Order items + update lager
    foreach ($cart as $index => $item) {
        $product = $products[$index];

        OrderItems::create([
            'order_id'   => $order->id,
            'product_id' => $product->id,
            'amount'     => $item['amount'],
            'price'      => $product->price,
        ]);

        $product->amount -= $item['amount'];
        $product->save();
    }

    // 4️⃣ Očisti cart
    Session::forget('product');

    return redirect()
        ->route('shop.index')
        ->with('success', 'Bestellung erfolgreich abgeschlossen 🎉');
}

}
