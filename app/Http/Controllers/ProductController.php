<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show() {
        $products = Product::with('brand')->where('id', '<=', 15)->paginate(5);
        return view('index', [
            'allproducts' => $products
        ]);
    }
    
    public function create() {
        $products = Product::with('brand')->get();
        return view('index', [
            'allproducts' => $products
        ]);
    }
    
    public function edit() {
        $products = Product::with('brand')->get();
        return view('index', [
            'allproducts' => $products
        ]);
    }
    
    public function delete() {
        $products = Product::with('brand')->get();
        return view('index', [
            'allproducts' => $products
        ]);
    }
}
