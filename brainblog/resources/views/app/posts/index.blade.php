@extends('layouts.app')

@section('content')

    <div class="row">
        @forelse($postslist as $post)
            <div class="jumbotron">
                <h2>
                    <a href="{{ route('app.posts.show', $post->getKey()) }}">
                        {{ $post->title }}
                    </a>
                </h2>

                @if ($post->description)
                    <p>{{ $post->description }}</p>
                @else
                    <p>{{ str_limit(strip_tags($post->body), 50) }}</p>
                @endif

                <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <div class="col">
                <p>Посты пока не добавлены.</p>
            </div>
        @endforelse
    </div>

    {{ $postslist->appends(request()->except('page'))->links() }}



@endsection
