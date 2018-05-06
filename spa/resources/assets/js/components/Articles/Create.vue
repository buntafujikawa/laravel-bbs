<template>
  <div>
    <div>
      <h4>記事投稿</h4>
      <div>
        <!-- v-modelに名前をつけることで入力値をメソッドやテンプレートで使える -->
        <input v-model="title" type="text" name="title" placeholder="タイトル">
        <textarea v-model="content" class="form-control" rows="4" placeholder="コンテンツ"></textarea>

        <!-- 試しにinputタグに入力された値を表示してみます -->
        <p>{{ title }}</p>
        <p>{{ content }}</p>

        <!-- v-onでクリックイベントを定義。投稿ボタンをクリックするとpostArticleメソッドが実行されます -->
        <button v-on:click="postArticle">投稿</button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    // コンポーネント作成時に実行する処理を定義
    // created() {
    // 今回は特に処理はありません
    // },

    // テンプレート内で使う変数を定義
    data() {
      return {
        title:'',
        content:''
      }
    },
    // メソッドの定義。ここでv-on:click=''で記述したpostArticle()メソッドを定義します
    methods: {
      postArticle(){
        // テンプレートのv-modelのtitleとcontentの入力値を取得しarticleという配列に格納
        var article = {
          'title': this.title,
          'content': this.content
        };

        // 今回はuserのidを1とします。
        var id = 1;

        // axios.postの第１引数にルートを、第２引数にポストするデータの配列を渡します
        axios.post('/api/article/' + id,article).then(res => {

          // テストのため返り値をコンソールに表示
          console.log(res.data.title);
        console.log(res.data.content);
      });
      }

    }
  }
</script>
