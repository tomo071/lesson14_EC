@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
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

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection