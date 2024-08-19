<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return to_route('dashboard');
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

            // Add like count and comment count to the post data
            $post['like_count'] = $post->likes()->count();
            $post['comment_count'] = $post->comments()->count();

            // Check if the loggedin user have liked the post.
            $post['islike'] = Like::where('UserID', request()->user()->id)
                ->where('PostID', $post->PostID)
                ->exists();

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

        // Determine the profile picture HTML
        if ($comment->user->profile_picture != null) {
            $img_html = '<img class="user-xsmall-pp-img object-cover rounded-full"
        src="' . asset('images/pp_images/' . $comment->user->profile_picture) . '" alt="pp">';
        } else {
            $img_html = '<svg class="user-xsmall-pp-img" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>';
        }

        return [
            'CommentID' => $comment->CommentID,
            'PostID' => $comment->PostID,
            'UserID' => $comment->UserID,
            'Content' => $comment->Content,
            'created_at' => $comment->created_at,
            'updated_at' => $comment->updated_at,
            'user_name' => $comment->user->name,
            'user_pp' => $img_html, // Use the HTML string here
            'replies' => $replies,
        ];
    }
}
