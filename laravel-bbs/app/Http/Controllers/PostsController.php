<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return View('bbs.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        View('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 失敗したら元のページに戻される
        $validateData = $request->validate([
            'title' => 'required',
            'content'=>'required',
            'cat_id' => 'required',
        ]);

        $post = new Post();
        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->category_id = Input::get('category_id');
        $post->save();

        return redirect()->back()->with('message', '投稿が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Post::find($id);
        return View('bbs.single', ['post' => $post]);
    }
}
