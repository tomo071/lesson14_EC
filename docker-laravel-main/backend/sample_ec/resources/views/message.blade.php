@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5  text-center">
                <div class="mt-5">
                    <h1>{{ session('message') }}</h1>
                </div>
            </div> 
        </div>
        <div class="row m-5  text-center">
            <div class="col-6 mt-5">
                    <a href="{{ url('/top') }}">
                        <button type="button" class="btn btn-primary">
                            トップに戻る
                        </button>
                    </a>
            </div>
            <div class="col-6 mt-5">
                    <a href="{{ route('shop.my_page') }}">
                        <button type="button" class="btn btn-secondary">
                            マイページ
                        </button>
                    </a>
            </div>
        </div>
    </div>
@endsection