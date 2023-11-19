<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments.user')->latest()->get();
        
        return view('home', compact('posts'));
    }
}
