@extends('layouts.app')

@section('content')

    <div class="row">
        @forelse($newslist as $news)
            <div class="jumbotron">
                <h2>
                    <a href="{{ route('app.news.show', $news->getKey()) }}">
                        {{ $news->title }}
                    </a>
                </h2>

                @if ($news->description)
                    <p>{{ $news->description }}</p>
                @else
                    <p>{{ str_limit(strip_tags($news->body), 50) }}</p>
                @endif

                <p class="mb-0">{{ $news->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <div class="col">
                <p>Новости пока не добавлены.</p>
            </div>
        @endforelse
    </div>

    {{ $newslist->appends(request()->except('page'))->links() }}



@endsection
