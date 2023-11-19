<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\TextSanitizer;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments.user'])->latest()->get();
        
        $textSanitizer = new TextSanitizer();
        $textSanitizer->sanitize($posts);
        
        return view('home', compact('posts'));
    }
}
