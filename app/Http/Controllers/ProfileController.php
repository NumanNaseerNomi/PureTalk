<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\TextSanitizer;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->latest()->get();
        
        $textSanitizer = new TextSanitizer();
        $textSanitizer->sanitize($posts);
        
        return view('profile', compact('user', 'posts'));
    }

    public function update(Request $request)
    {
        $request->validate(['name' => 'required']);
        Auth::user()->update(['name' => $request->input('name')]);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
