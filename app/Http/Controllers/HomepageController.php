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

        //dd($trenutniSat); dump & die -> var_dump($trenutniSat) die();

        $products = Product::orderBy('created_at', 'desc')->take(6)->get();//Eloquent model- uzmi poslednjih 6 proizvoda po datumu kreiranja take(6)->LIMIT 6, get()->izvrši upit i vrati rezultate kao kolekciju
        //$products = Product::orderByDesc("id")->take(6)->get(); po id iju

        return view("welcome", compact("trenutnoVreme", "trenutniSat", "products"));
        //return view("welcome", ['trenutnoVreme' => $trenutnoVreme]); drugi nacin

        

       
    }
}
