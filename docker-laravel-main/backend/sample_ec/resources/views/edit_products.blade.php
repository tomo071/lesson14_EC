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
        <form action= "{{ route('products.store') }}" method="POST" id="new">
        @csrf

            <div class="form-group">
                <label for="subject">
                    商品名
                </label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{old('name')}}"
                    class="form-control"
                >
            </div>

            <div class="form-group">
                <label for="subject">
                    商品説明
                </label>
                <textarea
                    id="new"
                    name="description"
                    value="{{old('description')}}"
                    class="form-control"
                    rows="8"
                >
                </textarea>
            </div>

            <div class="form-group">
                <label for="subject">
                    価格（円）
                </label>
                <input
                    type="number"
                    name="price"
                    value="{{old('price')}}"
                    class="form-control"
                >
            </div>

            <div class="form-group">
                <label for="subject">
                    在庫
                </label>
                <input
                    type="number"
                    name="stock"
                    value="{{old('stock')}}"
                    class="form-control"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                投稿する
            </button>

        </form>
    </body>
</html>
