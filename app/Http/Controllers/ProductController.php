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
    public function delete ($product){
        $singleProduct = Product::where(['id'=>$product])->first();//SELECT * FROM products WHERE id = $product LIMIT 1
        
        if($singleProduct== null){
            die("Ovaj proizvod ne postoji");
        }
        $singleProduct->delete();
        return redirect()->back();
    }
    public function sendProduct(Request $request){
        $request->validate([
            
            "name"=> "required|string|min:3", 
            "description"=> "required|string|min:5",
            "amount"=> "required|integer|min:1",
            "price" => ["required", "numeric", "min:0", "decimal:0,2"],
            "image" => "nullable|string"
         ]);
     
       Product::create([
           "name"=> $request->get("name"),
           "description"=> $request->get("description"),
           "amount"=> $request->get("amount"),
           "price"=> $request->get("price"),
           "image"=> $request->get("image")

       ]);

       return redirect ("/admin/all-products");
    }
}
