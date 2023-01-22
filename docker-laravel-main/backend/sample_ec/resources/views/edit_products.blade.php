@extends('layouts.app')

@section('content')
    <body>
        <form action= "{{ route('products.update',$Product->id) }}" method="POST" id="new">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="subject">
                    商品名
                </label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{old('name')?: $Product->name}}"
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
                    value="{{old('description')?: $Product->description}}"
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
                    value="{{old('price')?: $Product->price}}"
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
                    value="{{old('stock')?: $Product->stock}}"
                    class="form-control"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                編集する
            </button>

        </form>
    </body>
@endsection
