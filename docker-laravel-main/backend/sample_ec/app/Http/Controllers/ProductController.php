<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Shop;

use Illuminate\Support\Facades\Auth;

use Validator;

class ProductController extends Controller
{

    public function create()
    {
        return view('new_products');
    }

    public function store(Request $request)
    {
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

    public function index()
    {
        $products = product::all();
        return view('index_products', compact('products'));
    }

    public function show($id)
    {
        $product = product::find($id);
        $my_id = Auth::id();
        $my_shop_id = Shop::where('user_id', '=', $my_id)->pluck('id')->first();
        $check_Product = Product::find($id)->shop_id;

        if( $my_shop_id == $check_Product ){
            $buy = false;
        }else{
            $buy = true;
        }
        
        return view('show_products', compact('product','buy'));
    }

    public function edit($id)
    {
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

    public function update(Request $request, $id)
    {
        $my_id = Auth::id();
        $my_shop_id = Shop::where('user_id', '=', $my_id)->pluck('id')->first();
        $check_Product = Product::find($id)->shop_id;

        if($my_shop_id == $check_Product ){
            $input = $request->only('name','description','price','stock');
            $product = product::find($id);
            $product->name = $input["name"];
            $product->description = $input["description"];
            $product->price = $input["price"];
            $product->stock = $input["stock"];
            $product->save();
            
            return redirect()->route('products.show', $product->id);
        }else{
            return redirect()->route('shop.my_page');
        }
    }

    public function buy(Request $request, $id)
    {
        $input = $request->only('stock');
        $stock = product::find($id)->stock;
        $check_stock = $stock-$input["stock"];
        $product = product::find($id);

        if($stock > 0){

            if($check_stock < 0 || !is_numeric($input["stock"]) || $input["stock"] < 1 ){
                return redirect()->route('products.show', $product->id)->with('message', '正しい値を入力してください');
            }else{
                $product->stock = $check_stock;
                $product->save();
                return redirect()->route('products.show', $product->id)->with('message', '購入しました');
            }
            
        }else{
            return redirect()->route('products.show', $product->id)->with('message', '在庫がありません');
        }
        
    }

    public function destroy($id)
    {
        $my_id = Auth::id();
        $my_shop_id = Shop::where('user_id', '=', $my_id)->pluck('id')->first();
        $check_Product = Product::find($id)->shop_id;

        if($my_shop_id == $check_Product ){

            $product = product::find($id);
            $product->delete();
            
            return redirect()->route('shop.my_page')->with('message', '商品を削除しました');
        }else{
            return redirect()->route('message')->with('message', '不正なアクセスです');
        }
    }


}
