<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ]
        );

        $postData = $request->all();
        $postData['user_id'] = 1;

        Post::create($postData);

        return redirect()->back()->with('success', 'Post created successfully.');
    }
}
