<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $content = ["This is home page!"];

        return view('home.home', ['content' => $content]);
    }
}
