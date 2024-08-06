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

        return view('post.post_show', ['post' => $post]);
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


    //     public function getComments(Post $post)
    // {
    //     $comments = $post->comments()->with(['user', 'childComments.user'])->get()->map(function ($comment) {
    //         $replies = [];

    //         // Check if there are any child comments
    //         if ($comment->childComments->isNotEmpty()) {
    //             $replies = $comment->childComments->map(function ($reply) {
    //                 return [
    //                     'CommentID' => $reply->CommentID,
    //                     'Content' => $reply->Content,
    //                     'user_name' => $reply->user->name,
    //                     'created_at' => $reply->created_at,
    //                     'updated_at' => $reply->updated_at,
    //                 ];
    //             });
    //         }

    //         return [
    //             'CommentID' => $comment->CommentID,
    //             'PostID' => $comment->PostID,
    //             'UserID' => $comment->UserID,
    //             'Content' => $comment->Content,
    //             'created_at' => $comment->created_at,
    //             'updated_at' => $comment->updated_at,
    //             'user_name' => $comment->user->name,
    //             'replies' => $replies,
    //         ];
    //     });

    //     return response()->json($comments);
    // }


    // public function getComments(Post $post)
    // {
    //     // Retrieve comments for the given post, including user and child comments' user relationships
    //     $comments = $post->comments()->with(['user', 'childComments.user'])
    //         // Filter to only get parent comments (those without a ParentCommentID)
    //         ->whereNull('ParentCommentID')
    //         // Fetch the filtered comments from the database
    //         ->get()
    //         // Map each comment to a transformed structure
    //         ->map(function ($comment) {
    //             // Transform the child comments (replies) to the desired structure
    //             $replies = $comment->childComments->map(function ($reply) {
    //                 return [
    //                     'CommentID' => $reply->CommentID,
    //                     'Content' => $reply->Content,
    //                     'user_name' => $reply->user->name,
    //                     'created_at' => $reply->created_at,
    //                     'updated_at' => $reply->updated_at,
    //                 ];
    //             });

    //             // Return the transformed structure for the parent comment including its replies
    //             return [
    //                 'CommentID' => $comment->CommentID,
    //                 'PostID' => $comment->PostID,
    //                 'UserID' => $comment->UserID,
    //                 'Content' => $comment->Content,
    //                 'created_at' => $comment->created_at,
    //                 'updated_at' => $comment->updated_at,
    //                 'user_name' => $comment->user->name,
    //                 'replies' => $replies, // Include the transformed child comments (replies)
    //             ];
    //         });

    //     // Return the transformed comments as a JSON response
    //     return response()->json($comments);
    // }

    public function getComments(Post $post)
    {
        $comments = $post->comments()->with(['user', 'childComments.user'])
            ->whereNull('ParentCommentID') // Only get parent comments
            ->get()
            ->map(function ($comment) {
                return $this->transformComment($comment);
            });

        return response()->json($comments);
    }

    private function transformComment($comment)
    {
        // Transform child comments recursively
        $replies = $comment->childComments->map(function ($reply) {
            return $this->transformComment($reply);
        });

        return [
            'CommentID' => $comment->CommentID,
            'PostID' => $comment->PostID,
            'UserID' => $comment->UserID,
            'Content' => $comment->Content,
            'created_at' => $comment->created_at,
            'updated_at' => $comment->updated_at,
            'user_name' => $comment->user->name,
            'replies' => $replies,
        ];
    }
}