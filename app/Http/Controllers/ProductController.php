<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Repositories\ProductRepository;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\EditProductRequest;
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
        return view('admin.product.all', compact('products'));
    }
    public function delete (Product $product)
    {
        
        $product->delete();
        return redirect()->back();
    }
    public function sendProduct(SaveProductRequest $request)
    {
       $this->productRepository->createNew($request);

       return redirect ()->route("product.all")->with("success", "Produkt wurde erfolgreich hinzugefügt."); 
    }
    public function edit( Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $this->productRepository->updateProduct($product, $request);
    return redirect()->route('product.all')->with('success', 'Produkt wurde erfolgreich aktualisiert.');
    }
    public function show(Product $product)
{
    return view('details', compact('product'));
}


}
