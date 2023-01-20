<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;




class ShopController extends Controller
{
    public function create(){
        return view('new_shops');
    }

    public function store(Request $request){
        $my_id = Auth::id();
        $check_shop = Shop::where('user_id', '=', $my_id)->count();

        if($check_shop > 0){
            return view('message')->with('message', '複数の開設は許可されていません');
        }else{
            $input = $request->only('user_id','name','description');
            
            $shop = new Shop();
            $shop->user_id = Auth::id();
            $shop->name = $input["name"];
            $shop->description = $input["description"];
            $shop->save();

            return route('shop.my_page');
        }
    }

    public function index(){
        $shops = shop::all();
        return view('index', compact('shops'));
    }

    public function show($id){
        $shop = shop::find($id);
        return view('show_shops', compact('shop'));
    }

    public function my_page($message){
            $my_id = Auth::id();
            $shop = Shop::where('user_id', '=', '$my_id')->first();
            return route('my_page_shop', ['shop' => $shop]);
    }
}
