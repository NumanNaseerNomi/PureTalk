<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', 1)->latest()->get();
        
        return view('profile', compact('posts'));
    }
}
