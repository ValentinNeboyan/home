@extends('layouts.app')

@section('content')
<h1>Админпанель</h1>
    <div class="form-control" >
        @forelse($postslist as $post)
            <div class="form-group">
                <h2>
                    <a href="{{ route('app.posts.show', $post->getKey()) }}">
                        {{ $post->title }}
                    </a>
                </h2>
            </div>
        @empty
            <div class="col">
                <p>Посты пока не добавлены.</p>
            </div>
        @endforelse
            {{ $postslist->appends(request()->except('page'))->links() }}
            <div class="form-control">
                <a href="{{ route('app.posts.create') }}"
                   class="btn btn-primary">
                    Добавить пост
                </a>

            </div>
    </div>

@endsection