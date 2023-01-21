<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <table>
            <tr>
                <th>商品名</th>
                <th>価格</th>
            </tr>

            @foreach ($products as $product)

                @if ($product->stock === 0)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>SOLD OUT</td>
                    </tr>
                @else
                    <tr>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endif

            @endforeach

        </table>
    </body>
</html>