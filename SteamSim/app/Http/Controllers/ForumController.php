<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'createPost']);
    }

    public function index()
    {
        $forums = Forum::all();
        return view('forums.index', compact('forums'));
    }

    public function show($id)
    {
        $forum = Forum::findOrFail($id);
        $posts = $forum->posts()->orderBy('created_at', 'desc')->get();
        return view('forums.show', compact('forum', 'posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Forum::create($validated);
        return redirect()->route('forums.index');
    }

    public function createPost(Request $request, $forumId)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $forum = Forum::findOrFail($forumId);

        $post = new Post([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        $forum->posts()->save($post);

        return redirect()->route('forums.show', $forum->id);
    }
}
