<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function new(){
        return view('create');
    }

    public function create(Request $request){
        $input = $request->only('user_id','name','description');
        
        $shop = new Shop();
        $shop->user_id = Auth::id();
        $shop->name = $input["name"];
        $shop->description = $input["description"];
        $shop->save();
    }

    public function index(){
        $shops = shop::all();
        return view('index', compact('shops'));
    }

    public function show($id){
        $shop = shop::find($id);
        return view('show', compact('shop'));
    }
}
