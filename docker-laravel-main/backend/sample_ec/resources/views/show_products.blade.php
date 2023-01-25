@extends('layouts.app')

@section('content')
        <div class="container">
            <h1 class="mt-5">{{ session('message') }}</h1>
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
                @if($buy)
                    @if($product->stock > 0)
                    <div class="col-5 m-5 text-center">
                    <form action= "{{ route('buy',$product->id) }}" method="POST" class="d-flex text-right">
                        @csrf
                        @method('PUT')
                        <h3>個数：</h3>
                            <div class="d-flex bd-highlight text-center">
                                <input
                                    type="number"
                                    name="stock"
                                    value="{{old('stock')}}"
                                    class="form-control"
                                >
                            </div>
                            <div class="bd-highlight">
                                <button type="submit" class="btn btn-primary">購入する</button>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="col-5 m-5 text-center">
                        <h3>売り切れ。。。</h3>
                    </div>
                    @endif
                    <div class="col-5 mt-5">
                        <a href="{{ route('products.index') }}">
                            <button type="button" class="btn btn-outline-primary">
                                商品一覧
                            </button>
                        </a>
                    </div>
                @else
                    <div class="col-6 mt-5">
                        <a href="{{ route('products.edit', $product->id) }}">
                            <button type="button" class="btn btn-outline-primary">
                                編集する
                            </button>
                        </a>
                    </div>
                    <div class="col-6 mt-5">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">削除する</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
@endsection