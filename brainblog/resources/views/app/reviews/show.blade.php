@extends('layouts.app', ['app_title' => $review->title])

@section('content')
    <div class="d-flex align-items-center">
        <h1>{{ $review->title }}</h1>

    </div>

    @if ($review->description)
        <p class="lead">{{ $review->description }}</p>
    @endif

    {!! $review->body !!}



    @if (auth()->check() && $review->user_id === auth()->user()->id)
        <form action="{{ route('app.reviews.destroy', $review) }}" class="mt-5" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Удалить</button>
        </form>
    @endif

    <p class="mt-4">
        Автор:
        <img src="{{ $review->user->user_avatar }}" class="rounded-circle" width="30" alt="">
        <a href="{{ route('app.reviews.index', ['author' => $review->user]) }}">
            {{ $review->user->name }}
        </a>
    </p>

    <h2 class="mt-5">Комментарии -- {{ $review->comments->count() }}</h2>

    @forelse($review->comments as $comment)
        <div class="row">
            <div class="col-auto">
                <p><img src="{{ asset($comment->user->user_avatar) }}" class="rounded-circle" alt="{{ $comment->user->name }}" width="100"></p>
                {{ $comment->user->name }}
            </div>

            <div class="col">
                <p>{!! nl2br($comment->message) !!}</p>
                <p class="text-muted text-right mb-0">
                    {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
        </div>

        <hr>
    @empty
        <p><em>Комментарии пока не добавлены...</em></p>
    @endforelse

    @auth
        <form action="{{ route('app.reviews.add-comment', $review) }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="form-group{{ $errors->has('message') ? ' is-invalid' : '' }}">
                <label for="message">Ваше сообщение</label>
                <textarea class="form-control" id="message" name="message" required>{{ old('message') }}</textarea>
                @if($errors->has('message'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('message') }}
                    </div>
                @endif
            </div>

            <div class="mt-3">
                <button class="btn btn-primary">
                    Оставить комментарий
                </button>
            </div>
        </form>
    @endauth
@endsection
