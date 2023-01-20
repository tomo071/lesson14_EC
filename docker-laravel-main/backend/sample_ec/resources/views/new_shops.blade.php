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
        <form action= "{{ route('shops.store') }}" method="POST" id="new">
        @csrf

            <div class="form-group">
                <label for="subject">
                    ショップ名
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
                    ショップ説明
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

            <button type="submit" class="btn btn-primary">
                ショップ開設
            </button>

        </form>
    </body>
</html>
