@extends('layouts.default')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">

        <h2>タイトル：{{ $post->title }}
            <small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
        </h2>
        <p>カテゴリー：{{ $post->category->name }}</p>
        <p>{{ $post->content }}</p>

        <hr/>

        <h3>コメント一覧</h3>
        @foreach($post->comments as $single_comment)
            <h4>{{ $single_comment->commenter }}</h4>
            <p>{{ $single_comment->comment }}</p><br/>
        @endforeach

        <h3>コメントを投稿する</h3>
        {{-- 投稿完了時にフラッシュメッセージを表示 --}}
        @if(Session::has('message'))
            <div class="bg-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        {{-- エラーメッセージの表示 --}}
        @foreach($errors->all() as $message)
            <p class="bg-danger">{{ $message }}</p>
        @endforeach

        <form action="{{ url( "comment/" ) }}" method="post" class="form">
            @csrf
            <div class="form-group">
                <label for="commenter" class="">名前</label>
                <div class="">
                    <input type="text" name="commenter" class="form-control" value="{{ old("commenter") }}">
                </div>
            </div>

            <div class="form-group">
                <label for="comment" class="">コメント</label>
                <div class="">
                    <input type="textarea" name="comment" class="form-control" value="{{ old("comment") }}">
                </div>
            </div>

            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>

@stop