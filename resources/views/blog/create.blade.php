@extends('layouts.app')

@section('title', __('Create Article'))

@section('content')
<div class="container my-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold">{{ __('Create New Article') }}</h1>
    </div>
   
    <!-- Form to Create New Article -->
    <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title Input -->
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Enter the title') }}" required>
        </div>

        <!-- Description Input -->
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control" rows="5" placeholder="{{ __('Enter the description') }}" required></textarea>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">{{ __('Select an image to upload') }}</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="btn btn-success">{{ __('Submit the Post') }}</button>
        </div>
    </form>
</div>
@endsection
