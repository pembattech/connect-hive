<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()->where('UserID', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('home.home', ['posts' => $posts]);
    }
}
