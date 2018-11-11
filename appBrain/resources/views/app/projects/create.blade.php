@extends('layouts.app')

@section('content')

    <form action="{{ route('app.projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @if($errors->has('title'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" >{{ old('description') }}</textarea>
            @if($errors->has('description'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('description') }}
                </div>
            @endif
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection
