<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = request()->user()->id;

        // $posts = Post::query()->where('UserID', request()->user()->id)
        //     ->orderBy('created_at', 'desc')
        //     ->paginate();

        $posts = Post::query()->orderBy('created_at', 'desc')
            ->paginate();

        // Fetch the IDs of liked posts for the authenticated user
        $likedPosts = Like::where('UserID', $userId)->pluck('PostID')->toArray();

        // Pass the posts and liked posts to the view
        return view('post.index', [
            'posts' => $posts,
            'likedPosts' => $likedPosts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'string'],
            'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('post_images'), $imageName);
            $data['ImageURL'] = $imageName;
        }

        $data['UserID'] = $request->user()->id;

        $post = Post::create($data);

        return to_route('dashboard');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Return JSON data for AJAX request
        if (request()->ajax()) {

            $post['user_name'] = $post->user['name'];

            // Unset the user relationship to avoid including it in the JSON response
            unset($post['user']);

            return response()->json($post);
        }

        // return view('post.post_show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
