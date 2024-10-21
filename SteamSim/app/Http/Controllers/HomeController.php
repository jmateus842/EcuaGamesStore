<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Forum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    public function index()
    {
        return $this->showLoginForm();
    }

    public function showLoginForm()
    {
        $featuredGames = Game::inRandomOrder()->take(4)->get();
        $popularForums = Forum::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();

        return view('home', compact('featuredGames', 'popularForums'));
    }
}
