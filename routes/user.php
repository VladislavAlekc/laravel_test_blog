<?php

use App\Http\Controllers\User\DonateController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;


Route::middleware('log', 'active')->group(function () {

    Route::redirect('/', '/user/posts')->name('posts.index');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');

    Route::get('donates', DonateController::class)->name('donates');
});
