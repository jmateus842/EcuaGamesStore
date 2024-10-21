@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Juegos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <td>{{ $game->title }}</td>
                <td>${{ $game->price }}</td>
                <td><a href="{{ route('games.show', $game->id) }}" class="btn btn-info">Ver Detalles</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

