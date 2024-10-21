@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-white">All Games</h1>
    <div class="row">
        @foreach($games as $game)
            <div class="col-md-3 mb-4">
                <div class="card h-100 bg-dark">
                    <img src="{{ asset('storage/' . $game->getImageFilename()) }}" class="card-img-top" alt="{{ $game->title }}">
                    <div class="card-body text-center">
                        <h5 class="card-title text-white">{{ $game->title }}</h5>
                        <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary mt-2">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
