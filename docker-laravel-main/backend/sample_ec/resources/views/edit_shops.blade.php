@extends('layouts.app')

@section('content')
    <body>
        <form action= "{{ route('shops.update'$shop->id) }}" method="POST" id="new">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="subject">
                    ショップ名
                </label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{old('name')?: $shop->name}}"
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
                    value="{{old('description')?: $shop->description}}"
                    class="form-control"
                    rows="8"
                >
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                変更する
            </button>

        </form>
    </body>
@endsection
