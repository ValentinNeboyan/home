@extends('layouts.app')

@section('content')
<h1>Админпанель</h1>
    <div class="form-control" >
        @forelse($newslist as $news)
            <div class="form-group">
                <h2>
                    <a href="{{ route('app.news.show', $news->getKey()) }}">
                        {{ $news->title }}
                    </a>
                </h2>
            </div>
        @empty
            <div class="col">
                <p>Новости пока не добавлены.</p>
            </div>
        @endforelse
            {{ $newslist->appends(request()->except('page'))->links() }}
            <div class="form-control">
                <a href="{{ route('app.news.create') }}"
                   class="btn btn-primary">
                    Добавить новость
                </a>

            </div>
    </div>

@endsection