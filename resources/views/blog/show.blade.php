@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Display Session Messages -->
    @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
    @endif

    <!-- Post Title -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold">{{ $post->title }}</h1>
    </div>

    <!-- Post Metadata -->
    <div class="text-muted mb-4">
        <p>By: <span class="font-weight-bold">{{ $post->user->name }}</span></p>
        <p>On: <span class="font-weight-bold">{{ $post->updated_at->format('m-d-Y') }}</span></p>
    </div>

    <!-- Post Image -->
    <div class="text-center mb-4">
        <img src="/images/{{ $post->image_path }}" alt="{{ $post->title }}" class="img-fluid rounded">
    </div>

    <!-- Post Description -->
    <div class="mb-4">
        <p>{{ $post->description }}</p>
    </div>

    <!-- Edit and Delete Post -->
    @auth
        @if(Auth::user()->id == $post->user_id)
            <div class="mb-4">
                <a href="/blog/{{ $post->slug }}/edit" class="btn btn-primary">Edit Post</a>

                <form action="/blog/{{ $post->slug }}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        @endif
    @endauth

    <!-- Comments Section -->
    <div class="mt-5">
        <h3 class="mb-3">Comments</h3>
        <div id="comments">
            @forelse ($post->comments as $comment)
                <div class="card mb-2 p-3">
                    <p>{{ $comment->content }}</p>
                    <p class="text-muted">Author: {{ $comment->user->name }}</p>
                </div>
            @empty
                <p>No comments yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Comment Form -->
    @auth
        <div id="commentForm" class="mt-4">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">Type your comment here</h5>
                <div class="card-body">
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="5" placeholder="Type your comment here" required></textarea>
                        </div>
                        <button class="btn btn-success" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="mt-4">
            <p>Please <a href="{{ route('login') }}">log in</a> to comment.</p>
        </div>
    @endauth

</div>
@endsection
