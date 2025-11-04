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
       
         $products = Product::all(); 
        return view('admin.allProducts', compact('products'));
    }
    public function delete ($product){
        $singleProduct = Product::where(['id'=>$product])->first();
        
        if($singleProduct== null){
            die("Dieses Produkt existiert nicht.");
        }
        $singleProduct->delete();
        return redirect()->back();
    }
    public function sendProduct(Request $request){
        $request->validate([
            
            "name" => "required|string|min:3|unique:products,name", 
            "amount"=> "required|integer|min:1",
            "price" => ["required", "numeric", "min:0", "decimal:0,2"],
            "image" => "nullable|string",
         ]);
     
       Product::create([
           "name"=> $request->get("name"),
           "description"=> $request->get("description"),
           "amount"=> $request->get("amount"),
           "price"=> $request->get("price"),
           "image"=> $request->get("image")

       ]);

       return redirect ()->route("AlleProdukte"); 
    }
    public function edit(Product $singleProduct)
    {
         

        return view('admin.edit-product', compact('singleProduct'));
    }
   public function update(Request $request, Product $singleProduct)
{
    $request->validate([
        "name" => "required|string|min:3|unique:products,name," . $singleProduct->id,
        "description" => "required|string|min:5",
        "amount" => "required|integer|min:1",
        "price" => ["required", "numeric", "min:0", "decimal:0,2"],
        "image" => "nullable|string",
    ]);

    $singleProduct->update([
        "name" => $request->get("name"),
        "description" => $request->get("description"),
        "amount" => $request->get("amount"),
        "price" => $request->get("price"),
        "image" => $request->get("image"),
    ]);

    return redirect()->route('AlleProdukte')->with('success', 'Produkt wurde erfolgreich aktualisiert.');
}


}
