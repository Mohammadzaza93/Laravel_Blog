@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Display Session Message -->
    @if(session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif

    <!-- Header Section -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold">All Posts</h1>
    </div>

    <!-- Create New Post Button -->
    @if(Auth::check())
        <div class="text-right mb-4">
            <a href="/blog/create" class="btn btn-lg btn-primary">{{ __('Create New Title') }}</a>
        </div>
    @endif

    <!-- Posts Section -->
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Post Image -->
                    <img src="/images/{{$post->image_path}}" class="card-img-top" alt="{{$post->title}}">

                    <!-- Post Details -->
                    <div class="card-body">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <p class="text-muted">BY: <span class="font-weight-bold">{{$post->user->name}}</span></p>
                        <p class="text-muted">On: <span>{{ $post->updated_at->format('m-d-Y') }}</span></p>
                        <p class="card-text">{{ Str::limit($post->description, 100, '...') }}</p>
                        <a href="/blog/{{$post->slug}}" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
