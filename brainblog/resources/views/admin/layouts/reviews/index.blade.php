@extends('layouts.app')

@section('content')
<h1>Админпанель</h1>
    <div class="form-control" >
        @forelse($reviewslist as $review)
            <div class="form-group">
                <h2>
                    <a href="{{ route('app.reviews.show', $review->getKey()) }}">
                        {{ $review->title }}
                    </a>
                </h2>
            </div>
        @empty
            <div class="col">
                <p>Обзоры пока не добавлены.</p>
            </div>
        @endforelse
            {{ $reviewslist->appends(request()->except('page'))->links() }}
            <div class="form-control">
                <a href="{{ route('app.reviews.create') }}"
                   class="btn btn-primary">
                    Добавить обзор
                </a>

            </div>
    </div>

@endsection