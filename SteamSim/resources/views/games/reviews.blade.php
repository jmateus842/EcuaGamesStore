@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reseñas para {{ $game->title }}</h1>

    @foreach($reviews as $review)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $review->user->name }} - Calificación: {{ $review->rating }}/5</h5>
            <p class="card-text">{{ $review->content }}</p>
            <p class="card-text"><small class="text-muted">Publicado el {{ $review->created_at->format('d/m/Y H:i') }}</small></p>
        </div>
    </div>
    @endforeach

    <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary">Volver al juego</a>
</div>
@endsection
