@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-light">Foros</h1>
    
    @auth
    <div class="mb-4 bg-secondary p-4 rounded">
        <h2 class="text-light">Crear nuevo foro</h2>
        <form action="{{ route('forums.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title" class="text-light">Título</label>
                <input type="text" class="form-control bg-light" id="title" name="title" required>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="text-light">Descripción</label>
                <textarea class="form-control bg-light" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="game_id" class="text-light">Juego</label>
                <select class="form-control bg-light" id="game_id" name="game_id" required>
                    @foreach(\App\Models\Game::all() as $game)
                        <option value="{{ $game->id }}">{{ $game->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear foro</button>
        </form>
    </div>
    @endauth

    <ul class="list-group">
        @foreach($forums as $forum)
        <li class="list-group-item bg-secondary text-light">
            <a href="{{ route('forums.show', $forum->id) }}" class="text-light">{{ $forum->title }}</a>
            <p class="mb-0 mt-2">{{ $forum->description }}</p>
        </li>
        @endforeach
    </ul>
</div>
@endsection
