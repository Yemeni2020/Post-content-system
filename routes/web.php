<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [PostsController::class,'show'])->name('post');
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/posts', [PostsController::class,'index'])->name('admin.posts');
    Route::get('/admin/posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::delete('/admin/posts/{post}/destroy', [PostsController::class, 'destroy'])->name('admin.posts.destroy');
    Route::patch('/admin/posts/{post}/update', [PostsController::class,'update'])->name('admin.posts.update');
    Route::get('/admin/posts/{post}/edit', [PostsController::class,'edit'])->name('admin.posts.edit');
});
