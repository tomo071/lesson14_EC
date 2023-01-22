@extends('layouts.app')

@section('content')
    <body>
        <div class="container text-center">
            @auth
                <div class="row mt-3">
                    <div class="col-4">
                    <h1>sample_ec</h1>
                    </div>
                </div>
            @else
                <h1>ようこそsample_ecへ!!</h1>
                <div class="row mt-5">
                    <div class="col-12">
                        <button class="btn btn-outline-secondary">products</button>
                        <button class="btn btn-outline-secondary">shops</button>
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
