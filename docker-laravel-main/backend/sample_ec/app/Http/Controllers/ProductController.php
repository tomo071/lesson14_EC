<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{

    public function index(){
        $products = product::all();
        return view('index', compact('products'));
    }

    public function show($id){
        $product = product::find($id);
        return view('show', compact('product'));
    }

}
