<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of tkhe resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'PostID' => ['required', 'integer'],
        ]);

        // Cast PostID to integer
        $data['PostID'] = (int) $data['PostID'];

        // Add the authenticated user's ID
        $data['UserID'] = $request->user()->id;

        // Check if the user has already liked this post
        $existingLike = Like::where('PostID', $data['PostID'])
            ->where('UserID', $data['UserID'])
            ->first();

        if (!$existingLike) {
            // If no existing like is found, create a new like record
            Like::create($data);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Post liked successfully!');
        } else {
            $existingLike->delete();
            
            return redirect()->back()->with('info', 'You have already liked this post.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Get the ID of the currently authenticated user
        $userId = $request->user()->id;

        // dd($userId);

        // Retrieve the IDs of posts liked by the user
        $likedPosts = Like::where('UserID', $userId)->pluck('PostID');

        // Return the liked post IDs as JSON
        return response()->json($likedPosts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
