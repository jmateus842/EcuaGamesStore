@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Games</h1>
    <div class="row">
        @foreach($games as $game)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($game->description, 100) }}</p>
                        <p class="card-text">Price: ${{ $game->price }}</p>
                        @if($game->discount)
                            <p class="card-text text-danger">Discount: {{ $game->discount }}%</p>
                        @endif
                        <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
