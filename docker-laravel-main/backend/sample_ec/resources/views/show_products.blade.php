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
        <table>
            <tr>
                <th>商品名</th>
                <th>価格</th>
            </tr>

                @if ($product->stock === 1)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>SOLD OUT</td>
                    </tr>
                @endif

        </table>
        <div class="container mx-5 text-center">
            <div class="row m-4">
                <div class="col-5 m-1">
                    <div class="m-3 text-center">
                        <h3 class="m-1">商品名:{{ $product->name }}</h3>
                        <h4 class="m-3">価格：{{ $product->price }}￥</h4>
                        <a href="{{ route('shops.show',$product->shop_id) }}">
                            {{ $product->use->id }}
                        </a>
                    </div>
                </div>
                <div class="col-5 m-1">
                    <div class="m-3 text-center">
                        <h4 class="m-1">商品説明</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">

            </div>
        </div>
    </body>
</html>
