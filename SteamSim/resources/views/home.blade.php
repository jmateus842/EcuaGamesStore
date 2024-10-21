@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 display-4">Welcome to EcuaGames</h1>

    <h2 class="mb-3">Featured Games</h2>
    <div class="row">
        @foreach($featuredGames as $game)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($game->description, 100) }}</p>
                        <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary mt-auto">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mb-3">Popular Forums</h2>
    <div class="card mb-4">
        <ul class="list-group list-group-flush">
            @foreach($popularForums as $forum)
                <li class="list-group-item bg-dark text-light d-flex justify-content-between align-items-center">
                    <a href="{{ route('forums.show', $forum->id) }}" class="text-light text-decoration-none">
                        {{ $forum->title }}
                    </a>
                    <span class="badge bg-primary rounded-pill">{{ $forum->posts_count }} posts</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('games.index') }}" class="btn btn-secondary me-3">
            View All Games
        </a>
        <a href="{{ route('forums.index') }}" class="btn btn-secondary">
            View All Forums
        </a>
    </div>
</div>
@endsection
