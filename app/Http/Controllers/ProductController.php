<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

    public function show(Product $product){

        return view ('products.show',compact('product'));
    }

    public function edit(Product $product){

        return view ('products.edit',compact('product'));
    }

    public function update(Request $request , Product $product){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        //create a new Product in the database
         $product->update($request->all());
        // redirect the user and send friendly message 
      return redirect()->route('products.index')->with('success','Product updated succesfully');

    }
    public function index()
    {
        // Logic to retrieve and display products
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))->with(request()->input('page'));
    }

    public function store(Request $request){
        // validate the input 
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        //create a new Product in the database
         Product::create($request->all());
        // redirect the user and send friendly message 
      return redirect()->route('products.index')->with('success','Product added succesfully');
    }
     
    // when i access /create it should go to create.blade.php
    public function create()
    {
        return view('products.create');
        
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted succesfully');

    }

   

}
