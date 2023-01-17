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
</body>
</html>
