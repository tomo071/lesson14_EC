@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ session('message') }}<h1>
        <div class="row">
            <div class="col-12 mt-5">
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
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            ショップ開設
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
