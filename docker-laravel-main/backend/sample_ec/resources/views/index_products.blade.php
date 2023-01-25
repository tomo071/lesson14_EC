@extends('layouts.app')

@section('content')
    <body>
        <div class="container text-center">
            <div class="row m-5">
                <div class="col-12 mt-5">
                    <div class="mx-3">
                        <h3>商品一覧</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ショップ名</th>
                                <th scope="col">商品名</th>
                                <th scope="col">価格</th>
                                <th scope="col">在庫</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)

                                @if ($product->stock === 0)
                                    <tr>
                                        <td>{{ $product->shop->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>SOLD OUT</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $product->shop->name }}</td>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                    </tr>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection
