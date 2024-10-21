<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $games = $user->games;
        return view('library.index', compact('games'));
    }

    public function addToLibrary(Game $game)
    {
        $user = Auth::user();
        if (!$user->games->contains($game->id)) {
            $user->purchases()->create([
                'game_id' => $game->id,
                'price' => $game->price,
            ]);
        }
        return redirect()->back()->with('success', 'Game added to your library');
    }

    public function removeFromLibrary(Game $game)
    {
        $user = Auth::user();
        $user->purchases()->where('game_id', $game->id)->delete();
        return redirect()->back()->with('success', 'Game removed from your library');
    }
}
