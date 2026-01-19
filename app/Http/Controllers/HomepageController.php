<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class HomepageController extends Controller
{
     public function index(){
        date_default_timezone_set("Europe/Berlin");

    
        $trenutnoVreme = date("H:i:s");
        $trenutniSat = date("H");


        $products = Product::orderBy('created_at', 'desc')->take(6)->get();


        
        return view("welcome", compact("trenutnoVreme", "trenutniSat", "products"));
        
        

       
    }
}
