<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
     public function index(){
        date_default_timezone_set("Europe/Berlin");

    
        $trenutnoVreme = date("H:i:s");
        $trenutniSat = date("H");

        //dd($trenutniSat); dump & die -> var_dump($trenutniSat) die();

        return view("welcome", compact("trenutnoVreme", "trenutniSat"));
        //return view("welcome", ['trenutnoVreme' => $trenutnoVreme]); drugi nacin

        

       
    }
}
