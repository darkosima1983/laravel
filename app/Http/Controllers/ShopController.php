<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
     public function index(){

        $products = [
                "Casio G-Shock Classic", "Citizen Automatik Herrenuhr", "Citizen Promaster Marine Eco Drive Herrenuhr", "Casio Vintage Edgy"
        ];
        return view("shop", compact("products"));
    }
}
