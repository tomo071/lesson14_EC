@extends('layouts.app')

@section('content')
        <div class="container">
            <h1 class="mt-5">商品の詳細</h1>
            <div class="row m-4 text-center">
                <div class="col-6 mt-5">
                    <div class="m-3">
                        <h3 class="m-1">商品名:{{ $product->name }}</h3>
                        <a href="{{ route('shops.show',$product->shop_id) }}">
                            ショップ名：{{ $product->shop->name }}
                        </a>
                        <h4 class="mt-2">価格：{{ $product->price }}￥</h4>
                        <h5 class="mt-2">在庫：{{ $product->stock }}個</h4>
                    </div>
                </div>
                <div class="col-6 mt-5">
                    <div class="m-3">
                        <h4 class="m-1">商品説明</h4>
                        <div class="mt-5">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="col-6 mt-5 text-right">
                    <a href="{{ url('/top') }}">
                        <button type="button" class="btn btn-primary">
                            トップに戻る
                        </button>
                    </a>
                </div>
                <div class="col-6 mt-5 text-left">
                    <a href="{{ route('shop.my_page') }}">
                        <button type="button" class="btn btn-secondary">
                            購入する
                        </button>
                    </a>
                </div>
            </div>
        </div>
@endsection