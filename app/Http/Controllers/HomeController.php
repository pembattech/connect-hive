<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Like;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $userId = request()->user()->id;

        // Get the list of friend IDs
        $friendsIds = User::whereIn('id', function ($query) use ($userId) {
            $query->select('UserID2')
                ->from('friendships')
                ->where('UserID1', $userId)
                ->where('Status', 'accepted');
        })
            ->orWhereIn('id', function ($query) use ($userId) {
                $query->select('UserID1')
                    ->from('friendships')
                    ->where('UserID2', $userId)
                    ->where('Status', 'accepted');
            })
            ->pluck('id'); // Get a list of friend IDs

        // Add the current user's ID to the list of IDs
        $friendAndSelfIds = $friendsIds->merge([$userId]);

        // Retrieve posts from friends and the current user
        $posts = Post::whereIn('UserID', $friendAndSelfIds)
            ->withCount(['likes', 'comments']) // Eager load and count likes and comments
            ->orderBy('created_at', 'desc')
            ->paginate(); // Adjust pagination as needed

        // Fetch the IDs of liked posts for the authenticated user
        $likedPosts = Like::where('UserID', $userId)->pluck('PostID')->toArray();

        // Retrieve friends' details: name, ID, and profile picture
        $friendsDetails = User::whereIn('id', $friendsIds)
            ->get(['id', 'name', 'profile_picture']);

        // Pass the posts and liked posts to the view
        return view('home.home', [
            'posts' => $posts,
            'likedPosts' => $likedPosts,
            'user' => $userId,
            'friendsDetails' => $friendsDetails,
        ]);
    }

    public function search(Request $request)
    {
        // Validate the search input
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');
        $currentUserId = $request->user()->id;

        // Search users
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->get();

        // Check if there's an existing friendship record Attach friendship status to each user in the search results
        foreach ($users as $user) {
            $otherUserId = $user->id;

            $friendship = Friendship::where(function ($query) use ($currentUserId, $otherUserId) {
                $query->where('UserID1', $currentUserId)
                    ->where('UserID2', $otherUserId);
            })
                ->orWhere(function ($query) use ($currentUserId, $otherUserId) {
                    $query->where('UserID1', $otherUserId)
                        ->where('UserID2', $currentUserId);
                })
                ->first();

            if ($friendship) {
                if ($friendship['Status'] === 'accepted') {
                    $user->friendshipStatus = 'friend';
                } elseif ($friendship->UserID1 == $currentUserId) {
                    $user->friendshipStatus = 'pending'; // Current user is the sender
                } elseif ($friendship->UserID2 == $currentUserId) {
                    $user->friendshipStatus = 'response'; // Current user is the receiver
                }
            } else {
                $user->friendshipStatus = 'add friend'; // No existing friendship
            }
        }

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


        return view('home.search', [
            'users' => $users,
        ]);
    }
}
