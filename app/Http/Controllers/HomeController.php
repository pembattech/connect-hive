<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Like;
use App\Models\User;

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

    public function search(Request $request)
{
    // Validate the search input
    $request->validate([
        'query' => 'required|string|max:255',
    ]);

    $query = $request->input('query');

    // Search users
    $users = User::where('name', 'LIKE', "%{$query}%")
                 ->get();

    // // Search posts
    // $posts = Post::where('content', 'LIKE', "%{$query}%")
    //              ->orWhereHas('user', function($q) use ($query) {
    //                  $q->where('name', 'LIKE', "%{$query}%");
    //              })
    //              ->get();

    // // Search groups
    // $groups = Group::where('name', 'LIKE', "%{$query}%")
    //                ->orWhere('description', 'LIKE', "%{$query}%")
    //                ->get();

    $user = $request->user();

    // Combine results into an array
    $results = [
        'users' => $users,
        'posts' => [],
        'groups' => [],
    ];

    return view('home.search', ['results' => $results, 'user' => $user,]);
}

}
