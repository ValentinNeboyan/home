@extends('layouts.app')

@section('content')

    @forelse($projects as $project)
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ route('app.projects.show', $project) }}">
                        {{ $project->title }}
                    </a>
                </h4>
            </div>
            <div class="card-body">
                {!! str_limit($project->description) !!}
            </div>
        </div>
    @empty
        ...
    @endforelse

    <hr>

    <a href="{{ route('app.projects.create') }}" class="btn btn-primary">
        Создать новый проект
    </a>

@endsection
