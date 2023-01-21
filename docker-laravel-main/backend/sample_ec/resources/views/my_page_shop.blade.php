<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container mx-5 text-center">
            <div class="row m-4">
                <div class="col-5 m-1">
                    <div class="m-3 text-center">
                        <h3 class="m-1">shop名:{{ $shop->name }}</h3>
                        <h4 class="m-3"> I  D :{{ $shop->user_id }}</h4>
                    </div>
                </div>
                <div class="col-5 m-1">
                    <div class="m-3 text-center">
                        <h4 class="m-1">shop概要</h4>
                        <p>{{ $shop->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-11 mt-5">
                    <div class="m-1 text-right">
                        <a href="{{ route('products.create') }}">
                            <button class="btn btn-success">新規作成</button>
                        </a>
                    </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">商品ID</th>
                            <th scope="col">商品名</th>
                            <th scope="col">価格（円）</th>
                            <th scope="col">ざいこ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shop->products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <a href="{{ route('products.show', $product->id) }}">
                                <td>{{ $product->stock }}</td>
                            </a>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>