@extends('layouts.app')

@section('content')
    @php
        $route = route('app.tags.store');
        $method = 'post';


    @endphp

    <form action="{{ $route }}" method="post">
        @csrf
        @method($method)
        <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
            <label for="body">Добоватиь тег</label>
            <textarea class="form-control"  name="title" rows="4" required>{{ old('title') }}</textarea>
            @if($errors->has('title'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
