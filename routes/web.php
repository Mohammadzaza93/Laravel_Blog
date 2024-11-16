<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class,'index']);

Route::resource('/blog',PostsController::class);

Route::post('/blog/{post}/comments', [CommentController::class, 'store'])->name('comments.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
