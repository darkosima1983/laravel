<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
class ShopController extends Controller
{
     public function getAllProducts(){
        
        $products = Product::all();
        return view("shop", compact("products"));
    }
}
