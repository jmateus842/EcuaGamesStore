@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">My Game Library</h1>
    <div class="row">
        @foreach($games as $game)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($game->description, 100) }}</p>
                        <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary mb-2">View Details</a>
                        <form action="{{ route('library.remove', $game->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">Remove from Library</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
