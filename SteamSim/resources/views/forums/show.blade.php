@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $forum->title }}</h1>
    <p>{{ $forum->description }}</p>
    <h2>Posts</h2>
    @foreach($forum->posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><small class="text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at }}</small></p>
        </div>
    </div>
    @endforeach
    <a href="{{ route('forums.index') }}" class="btn btn-primary">Volver a los foros</a>
</div>
@endsection

