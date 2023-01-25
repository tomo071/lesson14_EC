@extends('layouts.app')

@section('content')
    <body>
        <div class="container text-center">
            @auth
                <h1>sample_ec</h1>
                <div class="row mt-5">
                    <div class="col-12">
                        @if($create_shop)
                            <a href="{{ route('products.index') }}">
                                <button class="btn btn-outline-secondary">商品一覧</button>
                            </a>
                            <a href="{{ route('shops.create') }}">
                                <button class="btn btn-outline-secondary">ショップ登録</button>
                            </a>
                        @else
                            <a href="{{ route('products.index') }}">
                                <button class="btn btn-outline-secondary">商品一覧</button>
                            </a>
                            <a href="{{ route('shop.my_page') }}">
                                <button class="btn btn-outline-secondary">マイページ</button>
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <h1>ようこそsample_ecへ!!</h1>
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="{{ route('register') }}">
                            <button class="btn btn-outline-secondary">新規登録</button>
                        </a>
                        <a href="{{ route('login') }}">
                            <button class="btn btn-outline-secondary">ログイン</button>
                        </a>
                    </div>
                </div>
            @endauth
            <div class="row mt-4">
                <div class="col-12 mt-5">
                    <div class="mx-3">
                        <h3>shop一覧</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ショップ名</th>
                                <th scope="col">商品一覧</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shop as $shop)
                            <tr>
                                <td>{{ $shop->name }}</td>
                                <td>
                                    <a href="{{ route('shops.show', $shop->id) }}">
                                        <button class="btn btn-outline-primary">一覧へ</button>
                                    </a>
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
