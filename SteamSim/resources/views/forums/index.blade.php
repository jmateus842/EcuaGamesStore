@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Foros</h1>
    
    @auth
    <div class="mb-4">
        <h2>Crear nuevo foro</h2>
        <form action="{{ route('forums.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="game_id">Juego</label>
                <select class="form-control" id="game_id" name="game_id" required>
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
        <li class="list-group-item">
            <a href="{{ route('forums.show', $forum->id) }}">{{ $forum->title }}</a>
            <p>{{ $forum->description }}</p>
        </li>
        @endforeach
    </ul>
</div>
@endsection
