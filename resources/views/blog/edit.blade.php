@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold">{{ __('Edit Post') }}</h1>
    </div>

    <!-- Edit Post Form -->
    <form action="/blog/{{$post->slug}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title Input -->
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <!-- Description Input -->
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $post->description }}</textarea>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">{{ __('Select an image to upload') }}</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <small class="form-text text-muted">{{ __('Leave blank if you don’t want to change the image.') }}</small>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="btn btn-success">{{ __('Update Post') }}</button>
        </div>
    </form>
</div>
@endsection
