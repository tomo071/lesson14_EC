<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;




class ShopController extends Controller
{

    public function top(){
        $shop = shop::all();
        return view('top', compact('shop'));
    }

    public function create(){
        return view('new_shops');
    }

    public function store(Request $request){
        $my_id = Auth::id();
        $check_shop = Shop::where('user_id', '=', $my_id)->count();

        if($check_shop > 0){
            return redirect()->route('message')->with('message', '複数の開設は許可されていません');
        }else{
            $input = $request->only('user_id','name','description');
            
            $shop = new Shop();
            $shop->user_id = Auth::id();
            $shop->name = $input["name"];
            $shop->description = $input["description"];
            $shop->save();

            return redirect(route('shop.my_page'));
        }
    }

    public function index(){
        $shops = shop::all();
        return view('index_shop', compact('shops'));
    }

    public function show($id){
        $shop = shop::find($id);
        return view('show_shops', compact('shop'));
    }

    public function my_page(){
        $my_id = Auth::id();
        $shop = Shop::where('user_id', '=', $my_id)->first();
        $products = Shop::with('products')->where('user_id', '=', $my_id)->get();

        if ($shop == null){
            return redirect()->route('shops.create')->with('message', 'ショップを開設してください');
        }else{
            return view('my_page_shop', ['shop' => $shop,'products'=> $products]);
        }
    }

    public function edit($id){
        $my_id = Auth::id();
        $check_shop = shop::find($id)->user_id;
        if($my_id == $check_shop){
            $shop = shop::find($id);
            return view('edit_shops', compact('shop'));
        }else{
            
        }
    }

    public function update($id){
        $my_id = Auth::id();
        $check_shop = shop::find($id)->user_id;
        if($my_id == $check_shop){
            $shop = shop::find($id);
            $shop->user_id = Auth::id();
            $shop->name = $input["name"];
            $shop->description = $input["description"];
            $shop->save();

            return redirect()->route('shops.show', $shop->id);
        }else{
            return redirect(route('shop.my_page'));
        }
    }
}
