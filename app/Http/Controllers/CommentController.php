<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\all;
use App\models\Post;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post)
{
    // Validate the request data
    $request->validate([
        'content' => 'required|string|max:255',
    ]);

    // Add the user_id and post_id to the request data
    $data = $request->all();
    $data['user_id'] = Auth::id();
    $data['post_id'] = $post->id;

    // Create the comment
    $post->comments()->create($data);

    // Redirect back to the previous page
    return redirect()->back()->with('success', 'Comment added successfully!');
}
}
