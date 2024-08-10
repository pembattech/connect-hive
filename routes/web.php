<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/search', [HomeController::class, 'search'])->name('search');

    Route::get('/post/{post}/comments', [PostController::class, 'getComments']);

    Route::resource('post', PostController::class);

    Route::resource('like', LikeController::class);

    Route::resource('comment', CommentController::class);

    Route::post('/friendship/addfriend', [FriendshipController::class, 'addfriend'])->name('friendship.addfriend');


    Route::resource('message', MessageController::class);
});



Route::middleware('auth')->group(function () {
    Route::post('/profile/upload_pp', [ProfileController::class, 'upload_pp'])->name('profile.upload_pp');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
