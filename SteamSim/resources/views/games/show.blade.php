@extends('layouts.app')

@section('content')
<style>
    .game-image-container {
        max-width: 300px; /* Adjust this value to your preferred size */
        margin: 0 auto;
    }
    .game-image {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    .game-info-row {
        margin-bottom: 15px;
    }
    .game-info-label {
        font-weight: bold;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-white mb-4">{{ $game->title }}</h1>
            
            <div class="game-info-row row">
                <div class="col-md-3 game-info-label text-light">Description:</div>
                <div class="col-md-9 text-light">{{ $game->description }}</div>
            </div>
            
            <div class="game-info-row row">
                <div class="col-md-3 game-info-label text-light">Price:</div>
                <div class="col-md-9 text-light">${{ $game->price }}</div>
            </div>
            
            @if($game->discount)
            <div class="game-info-row row">
                <div class="col-md-3 game-info-label text-light">Discount:</div>
                <div class="col-md-9 text-danger">{{ $game->discount }}%</div>
            </div>
            @endif

            @auth
                @if(!Auth::user()->games->contains($game->id))
                    <form action="{{ route('library.add', $game->id) }}" method="POST" class="mb-3">
                        @csrf
                        <button type="submit" class="btn btn-success">Add to Library</button>
                    </form>
                @else
                    <p class="text-light mb-3">This game is in your library</p>
                @endif

                <div class="mb-4">
                    <h3 class="text-white">Write a review</h3>
                    <form action="{{ route('games.createReview', $game->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="content" class="text-light">Content</label>
                            <textarea class="form-control bg-dark text-light" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="rating" class="text-light">Rating</label>
                            <select class="form-control bg-dark text-light" id="rating" name="rating" required>
                                <option value="1">1 star</option>
                                <option value="2">2 stars</option>
                                <option value="3">3 stars</option>
                                <option value="4">4 stars</option>
                                <option value="5">5 stars</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            @endauth

            <div class="mb-3">
                <a href="{{ route('games.reviews', $game->id) }}" class="btn btn-secondary">View all reviews</a>
            </div>

            <a href="{{ route('games.index') }}" class="btn btn-primary">Back to list</a>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary game-image-container">
                <img src="{{ asset('storage/' . $game->getImageFilename()) }}" class="card-img-top game-image" alt="{{ $game->title }}">
            </div>
        </div>
    </div>
</div>
@endsection
