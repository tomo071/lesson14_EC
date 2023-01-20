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
        <div class="container m-5">
            <div class="row">
                <div class="text-center m-5">
                    <h2>{{ $message }}</h2>
                </div>
            </div>
            <div class="row m-5">
                <div class="col-6 p-5">
                    <div class="text-center">
                        <a href="{{ route('/top') }}">
                            <button type="button" class="btn btn-primary">
                                トップに戻る
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-6 p-5">
                    <div class="text-center">
                        <a href="{{ route('shop.my_page') }}">
                            <button type="button" class="btn btn-secondary">
                                マイページへ
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>