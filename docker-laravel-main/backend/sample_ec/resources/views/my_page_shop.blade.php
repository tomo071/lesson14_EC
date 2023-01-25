@extends('layouts.app')

@section('content')
    <body>
        <div class="container text-center">
        <h1 class="mt-5">{{ session('message') }}</h1>
            <div class="row m-4">
                <div class="col-6">
                    <div class="m-3 text-center">
                        <h3 class="m-1">shop名:{{ $shop->name }}</h3>
                        <h4 class="m-3"> I  D :{{ $shop->user_id }}</h4>
                        <p>開設者：＃{{ $shop->user->name }}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="m-3 text-center">
                        <h4 class="m-1">shop概要</h4>
                        <p>{{ $shop->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 mt-5">
                    <div class="m-1 text-right">
                        <a href="{{ route('shops.edit',$shop->id) }}">
                            <button class="btn btn-success">ショップ情報編集</button>
                        </a>
                        <a href="{{ route('export') }}">
                            <button class="btn btn-success">投稿商品CSV取得</button>
                        </a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">商品ID</th>
                                <th scope="col">商品名</th>
                                <th scope="col">価格（円）</th>
                                <th scope="col">在庫</th>
                                <th scope="col">
                                    <a href="{{ route('products.create') }}">
                                        <button class="btn btn-success">商品新規投稿</button>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shop->products as $product)
                            <tr>
                                <td>{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}">
                                        <button class="btn btn-outline-primary">編集</button>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">削除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection