<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TOOD 後で
        $validateData = $request->validate([
            'commenter' => 'required',
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->commenter = Input::get('commenter');
        $comment->comment = Input::get('comment');
        $comment->post_id = Input::get('post_id');
        $comment->save();

        return redirect()->back()->with('message', '投稿が完了しました。');
    }
}
