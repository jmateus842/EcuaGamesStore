<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['createReview']);
    }

    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
        ]);

        Game::create($validated);
        return redirect()->route('games.index');
    }

    public function createReview(Request $request, $gameId)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $game = Game::findOrFail($gameId);

        $review = new Review([
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'user_id' => Auth::id(),
        ]);

        $game->reviews()->save($review);

        return redirect()->route('games.reviews', $game->id);
    }

    public function showReviews($id)
    {
        $game = Game::findOrFail($id);
        $reviews = $game->reviews()->with('user')->latest()->get();
        return view('games.reviews', compact('game', 'reviews'));
    }
}
