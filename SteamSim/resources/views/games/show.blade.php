@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $game->title }}</h1>
    <p>{{ $game->description }}</p>
    <p>Precio: ${{ $game->price }}</p>
    @if($game->discount)
        <p>Descuento: {{ $game->discount }}%</p>
    @endif

    @auth
        @if(!Auth::user()->games->contains($game->id))
            <form action="{{ route('library.add', $game->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Add to Library</button>
            </form>
        @else
            <p>This game is in your library</p>
        @endif

        <div class="mt-4">
            <h3>Escribir una reseña</h3>
            <form action="{{ route('games.createReview', $game->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Calificación</label>
                    <select class="form-control" id="rating" name="rating" required>
                        <option value="1">1 estrella</option>
                        <option value="2">2 estrellas</option>
                        <option value="3">3 estrellas</option>
                        <option value="4">4 estrellas</option>
                        <option value="5">5 estrellas</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Enviar reseña</button>
            </form>
        </div>
    @endauth

    <div class="mt-4">
        <a href="{{ route('games.reviews', $game->id) }}" class="btn btn-secondary">Ver todas las reseñas</a>
    </div>

    <a href="{{ route('games.index') }}" class="btn btn-primary mt-4">Volver a la lista</a>
</div>
@endsection
