<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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

        $id = $request->input('id') ?? Auth::id();

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->save();
        
        return redirect()->back()->with('success', 'Name updated successfully.');
    }
}
