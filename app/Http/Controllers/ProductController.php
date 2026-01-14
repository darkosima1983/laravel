<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Repositories\ProductRepository;
class ProductController extends Controller
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();

    }

     public function index(){
        return view("admin/add-product");
    }

    public function getAllProducts(){
       
         $products = Product::all(); 
        return view('admin.allProducts', compact('products'));
    }
    public function delete ($product){
        $product = $this->productRepository->getProductById($product);
        
        if($product== null){
            die("Dieses Produkt existiert nicht.");
        }
        $product->delete();
        return redirect()->back();
    }
    public function sendProduct(Request $request){
        $request->validate([
            
            "name" => "required|string|min:3|unique:products,name", 
            "amount"=> "required|integer|min:1",
            "price" => ["required", "numeric", "min:0", "decimal:0,2"],
            "image" => "nullable|string",
         ]);
     
       $this->productRepository->createNew($request);

       return redirect ()->route("AlleProdukte"); 
    }
    public function edit(Product $product)
    {
         

        return view('admin.edit-product', compact('product'));
    }
   public function update(Request $request, Product $product)
{
    $request->validate([
        "name" => "required|string|min:3|unique:products,name," . $product->id,
        "description" => "required|string|min:5",
        "amount" => "required|integer|min:1",
        "price" => ["required", "numeric", "min:0", "decimal:0,2"],
        "image" => "nullable|string",
    ]);

    $product->update([
        "name" => $request->get("name"),
        "description" => $request->get("description"),
        "amount" => $request->get("amount"),
        "price" => $request->get("price"),
        "image" => $request->get("image"),
    ]);

    return redirect()->route('AlleProdukte')->with('success', 'Produkt wurde erfolgreich aktualisiert.');
}


}
