<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use League\Csv\CharsetConverter;
use League\Csv\Reader;
use SplTempFileObject;

class ShopController extends Controller
{

    public function top()
    {
        $shop = shop::all();

        $my_id = Auth::id();
        $check_shop = Shop::where('user_id', '=', $my_id)->count();
        if($check_shop > 0){
            $create_shop = false ;
        }else{
            $create_shop = true ;
        }

        return view('top', compact('shop', 'create_shop'));
    }

    public function create()
    {
        return view('new_shops');
    }

    public function store(Request $request)
    {
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

    public function export()
    {
        
        $my_id = Auth::id();
        $my_shop_id = Shop::where('user_id', '=', $my_id)->pluck('id')->first();
        $products = Product::where('shop_id','=',$my_shop_id)->get();

        $data = [['name','price','stock']];
        foreach ($products as $product) {
            $data[] = [$product->name, $product->price, $product->stock];
        }

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertAll($data);
        $csv->setOutputBOM(Reader::BOM_UTF8);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="products.csv"',
        ];

        return response()->streamDownload(function () use ($csv) {
            echo $csv->getContent();
        }, 'products.csv', $headers);
        
    }

    public function index()
    {
        $shops = shop::all();
        return view('index_shop', compact('shops'));
    }

    public function show($id)
    {
        $shop = shop::find($id);
        return view('show_shops', compact('shop'));
    }

    public function my_page()
    {
        $my_id = Auth::id();
        $shop = Shop::where('user_id', '=', $my_id)->first();
        $products = Shop::with('products')->where('user_id', '=', $my_id)->get();

        if ($shop == null){
            return redirect()->route('shops.create')->with('message', 'ショップを開設してください');
        }else{
            return view('my_page_shop', ['shop' => $shop,'products'=> $products]);
        }
    }

    public function edit($id)
    {
        $my_id = Auth::id();
        $check_shop = shop::find($id)->user_id;
        if($my_id == $check_shop){
            $shop = shop::find($id);
            return view('edit_shops', compact('shop'));
        }else{
            return redirect()->route('shop.my_page');
        }
    }

    public function destroy($id)
    {
        $my_id = Auth::id();
        $check_shop = shop::find($id)->user_id;
        if($my_id == $check_shop){
            $shop = shop::find($id);
            $shop->delete();

            return redirect()->route('top')->with('message', 'ショップを削除しました');
        }else{
            return redirect(route('shop.my_page'))->with('message', '自身のショップのみ編集可能です');;
        }
    }



    public function update(Request $request, $id){
        $my_id = Auth::id();
        $check_shop = shop::find($id)->user_id;
        if($my_id == $check_shop){
            $input = $request->only('name','description');
            $shop = shop::find($id);
            $shop->user_id = Auth::id();
            $shop->name = $input["name"];
            $shop->description = $input["description"];
            $shop->save();

            return redirect()->route('shop.my_page')->with('message', '更新しました！');
        }else{
            return redirect(route('shop.my_page'))->with('message', '自身のショップのみ編集可能です');;
        }
    }

    private function params(Request $request){
        return $input = $request->only('name','description');
    }
}
