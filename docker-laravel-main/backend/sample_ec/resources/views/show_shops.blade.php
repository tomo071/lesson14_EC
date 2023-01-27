@extends('layouts.app')

@section('content')
    <body>
        <div class="container text-center">
            <div class="row m-4">
                <div class="col-6">
                    <div class="m-3 text-center">
                        <h2 class="m-1">shop名:{{ $shop->name }}</h3>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">商品ID</th>
                                <th scope="col">商品名</th>
                                <th scope="col">価格（円）</th>
                                <th scope="col">在庫</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shop->products as $product)
                            <tr>
                                <td>{{ $product->id }}</th>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection