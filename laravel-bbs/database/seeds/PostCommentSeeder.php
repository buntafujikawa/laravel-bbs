<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // コピペしてきたけど改善できそう
        // https://github.com/phanan/koel/tree/master/database/seeds
        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

        $commentDammy = 'コメントダミーです。ダミーコメントだよ。';

        for( $i = 1 ; $i <= 10 ; $i++) {
            $post = new Post;
            $post->title = "$i 番目の投稿";
            $post->content = $content;
            $post->category_id = 1;
            $post->save();

            $maxComments = mt_rand(3, 15);
            for ($j=0; $j <= $maxComments; $j++) {
                $comment = new Comment;
                $comment->commenter = '名無しさん';
                $comment->comment = $commentDammy;

                // モデル(Post.php)のCommentsメソッドを読み込み、post_idにデータを保存する
                $post->comments()->save($comment);
            }
        }

        // カテゴリーを追加する
        $cat1 = new Category;
        $cat1->name = "電化製品";
        $cat1->save();

        $cat2 = new Category;
        $cat2->name = "食品";
        $cat2->save();
    }
}
