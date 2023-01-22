<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Shop;

use Illuminate\Support\Facades\Auth;

use Validator;

class ProductController extends Controller
{

    public function create(){
        return view('new_products');
    }

    public function store(Request $request){
        $input = $request->only('user_id','name','description','price','stock');
        $my_id = Auth::id();
        $my_shop_id = Shop::where('user_id', '=', $my_id)->pluck('id')->first();
        
        $Product = new Product();
        $Product->shop_id = $my_shop_id;
        $Product->name = $input["name"];
        $Product->description = $input["description"];
        $Product->price = $input["price"];
        $Product->stock = $input["stock"];
        $Product->save();
        
        return redirect()->route('products.show', $Product->id);
    }

    public function index(){
        $products = product::all();
        return view('index_products', compact('products'));
    }

    public function show($id){
        $product = product::find($id);
        return view('show_products', compact('product'));
    }

    public function edit($id){
        $my_id = Auth::id();
        $my_shop_id = Shop::where('user_id', '=', $my_id)->pluck('id')->first();

        $check_Product = Product::find($id)->shop_id;
        if( $my_shop_id == $check_Product ){
            $product = product::find($id);
            return view('edit_products', compact('product'));
        }else{
            return redirect()->route('shop.my_page');
        }
    }

    public function update($id){
        $my_id = Auth::id();
        $my_shop_id = Shop::where('user_id', '=', $my_id)->pluck('id')->first();

        $check_Product = Product::find($id)->shop_id;
        if($my_shop_id == $check_Product ){
            $Product->name = $input["name"];
            $Product->description = $input["description"];
            $Product->price = $input["price"];
            $Product->stock = $input["stock"];
            $Product->save();
            
            return redirect()->route('products.show', $Product->id);
        }else{
            return redirect()->route('shop.my_page');
        }

        
    }

}
