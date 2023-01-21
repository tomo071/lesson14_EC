<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Support\Facades\Auth;

use Validator;

class ProductController extends Controller
{

    public function create(){
        return view('new_products');
    }

    public function store(Request $request){
        $input = $request->only('user_id','name','description','price','stock');
        
        $Product = new Product();
        $Product->shop_id = Auth::id();
        $Product->name = $input["name"];
        $Product->description = $input["description"];
        $Product->price = $input["price"];
        $Product->stock = $input["stock"];
        $Product->save();


        $id = $Product->id;
        
        return route('products.show', ['id' => $id]);
    }

    public function index(){
        $products = product::all();
        return view('index_products', compact('products'));
    }

    public function show($id){
        $product = product::find($id);
        return view('show_products', compact('product'));
    }

}
