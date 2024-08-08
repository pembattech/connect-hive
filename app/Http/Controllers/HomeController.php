<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Like;

class HomeController extends Controller
{
    public function index()
    {
        $userId = request()->user()->id;

        $posts = Post::query()
            ->orderBy('created_at', 'desc')
            ->paginate();

        // Fetch the IDs of liked posts for the authenticated user
        $likedPosts = Like::where('UserID', $userId)->pluck('PostID')->toArray();

        // Pass the posts and liked posts to the view
        return view('home.home', [
            'posts' => $posts,
            'likedPosts' => $likedPosts,
            'user' => $userId,
        ]);
    }
}
