@extends('layouts.app')

@section('content')

    <div class="row">
        @forelse($reviewslist as $review)
            <div class="jumbotron">
                <h2>
                    <a href="{{ route('app.reviews.show', $review->getKey()) }}">
                        {{ $review->title }}
                    </a>
                </h2>

                @if ($review->description)
                    <p>{{ $review->description }}</p>
                @else
                    <p>{{ str_limit(strip_tags($review->body), 50) }}</p>
                @endif

                <p class="mb-0">{{ $review->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <div class="col">
                <p>Обзоры пока не добавлены.</p>
            </div>
        @endforelse
    </div>

    {{ $reviewslist->appends(request()->except('page'))->links() }}


@endsection
