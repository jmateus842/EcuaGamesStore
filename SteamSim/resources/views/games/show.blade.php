@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $game->title }}</h1>
    <p>{{ $game->description }}</p>
    <p>Precio: ${{ $game->price }}</p>
    @if($game->discount)
        <p>Descuento: {{ $game->discount }}%</p>
    @endif
    <a href="{{ route('games.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@endsection

