<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(
            [
                'post_id' => 'required',
                'content' => 'required',
            ]
        );

        $commentData = $request->all();
        $commentData['user_id'] = 1;

        Comment::create($commentData);

        return redirect()->back()->with('success', 'Comment created successfully.');
    }
}
