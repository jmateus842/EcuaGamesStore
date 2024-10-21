@extends('layouts.app')

@section('content')
<div class="container">
    @guest
    <div class="row justify-content-end mb-4">
        <div class="col-md-4 text-right">
            <a href="{{ route('login') }}" class="btn btn-primary mr-2">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-secondary">{{ __('Register') }}</a>
            @endif
        </div>
    </div>
    @endguest

    <h1 class="mb-4">Bienvenido a nuestra plataforma de juegos</h1>

    <h2>Juegos destacados</h2>
    <div class="row">
        @foreach($featuredGames as $game)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="card-text">{{ Str::limit($game->description, 100) }}</p>
                        <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2>Foros populares</h2>
    <ul class="list-group">
        @foreach($popularForums as $forum)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('forums.show', $forum->id) }}">{{ $forum->title }}</a>
                <span class="badge bg-primary rounded-pill">{{ $forum->posts_count }} posts</span>
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        <a href="{{ route('games.index') }}" class="btn btn-primary">Ver todos los juegos</a>
        <a href="{{ route('forums.index') }}" class="btn btn-secondary">Ver todos los foros</a>
    </div>
</div>
@endsection
