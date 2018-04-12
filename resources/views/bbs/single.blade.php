@extends('layouts.default')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">

        <h2>タイトル：{{ $post->title }}
            <small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
        </h2>
        <p>カテゴリー：{{ $post->category->name }}</p>
        <p>{{ $post->content }}</p>

        <hr />

        <h3>コメント一覧</h3>
        @foreach($post->comments as $single_comment)
            <h4>{{ $single_comment->commenter }}</h4>
            <p>{{ $single_comment->comment }}</p><br />
        @endforeach

    </div>

@stop