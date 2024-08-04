<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::query()->where('UserID', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.comment_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'PostID' => ['required', 'integer'],
            'commentContent' => ['required', 'string']
        ]);


        $data['UserID'] = $request->user()->id;

        // Create a new comment using the validated data
        $comment = Comment::create([
            'PostID' => $data['PostID'],
            'UserID' => $data['UserID'],
            'Content' => $data['commentContent']
        ]);

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
