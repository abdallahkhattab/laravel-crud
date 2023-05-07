<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display products
    }

    public function create()
    {
        return view('products.create');
    }

}
