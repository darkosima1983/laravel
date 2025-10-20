<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
class ProductController extends Controller
{
     public function index(){
        return view("admin/add-product");
    }

          public function getAllProducts(){
       
         $products = Product::all(); // povlači sve zapise iz baze
        return view('admin.allProducts', compact('products'));
    }
    public function sendProduct(Request $request){
        $request->validate([
            
            "name"=> "required|string|min:3", 
            "description"=> "required|string|min:5",
            "amount"=> "required|integer|min:1",
            "price" => ["required", "numeric", "min:0", "decimal:0,2"],
            //"image" => "nullable|image|mimes:jpg,jpeg,png|max:2048",Polje image je opciono, ali ako se pošalje, mora biti slika tipa JPG/JPEG/PNG, i ne sme biti veća od 2 MB.
         ]);
     
       Product::create([
           "name"=> $request->get("name"),
           "description"=> $request->get("description"),
           "amount"=> $request->get("amount"),
           "price"=> $request->get("price"),
           //"image"=> $request->get("image")

       ]);

       return redirect ("/admin/all-products");
    }
}
