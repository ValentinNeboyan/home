@extends('layouts.app')

@section('content')

    <h1>Админпанель</h1>

<div class="form-control">
    <div>
        <a href="{{ route('app.admin.news') }}"
           class="btn btn-primary">
            Новости
        </a>

        <a href="{{ route('app.news.create') }}"
               class="btn btn-primary">
                Добавить новость
        </a>




    </div>
</div>
 <div class="form-control">
    <div>
        <a href="{{ route('app.admin.posts') }}"
           class="btn btn-primary">
            Посты
        </a>
        <a href="{{ route('app.posts.create') }}"
           class="btn btn-primary">
            Добавить пост
        </a>

    </div>
 </div>
 <div class="form-control">
    <div>
        <a href="{{ route('app.admin.reviews') }}"
           class="btn btn-primary">
            Обзоры
        </a>
        <a href="{{ route('app.reviews.create') }}"
           class="btn btn-primary">
            Добавить обзор
        </a>
    </div>

</div>

@endsection
