<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Repositories\ProductRepository;
use App\Http\Requests\SaveProductRequest;
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
    public function delete ($product)
        {
        $product = $this->productRepository->getProductById($product);
        
        if($product== null){
            die("Dieses Produkt existiert nicht.");
        }
        $product->delete();
        return redirect()->back();
    }
    public function sendProduct(SaveProductRequest $request)
    {
       $this->productRepository->createNew($request);

       return redirect ()->route("AlleProdukte"); 
    }
    public function edit(Product $product)
    {
        return view('admin.edit-product', compact('product'));
    }
   
    public function update(Request $request, Product $product)
    {
        $this->productRepository->updateProduct($product, $request);
    return redirect()->route('AlleProdukte')->with('success', 'Produkt wurde erfolgreich aktualisiert.');
    }


}
