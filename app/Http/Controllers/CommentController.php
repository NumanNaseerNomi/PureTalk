<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $commentData['user_id'] = Auth::id();

        Comment::create($commentData);

        return redirect()->back()->with('success', 'Comment created successfully.');
    }
}
