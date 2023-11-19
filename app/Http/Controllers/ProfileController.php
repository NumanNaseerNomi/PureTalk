<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\TextSanitizer;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', 1)->latest()->get();
        
        $textSanitizer = new TextSanitizer();
        $textSanitizer->sanitize($posts);
        
        return view('profile', compact('posts'));
    }
}
