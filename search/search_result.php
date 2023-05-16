<?php
// 送られてきた検索ワードを受け取る
$search_word = $_GET['q'];

// Postオブジェクトを生成する
require_once __DIR__ . '/../classes/search.php';
$search = new Search();
require_once __DIR__ . '/../classes/post.php';
$post = new Post();

// 検索された記事を全て取り出す
$search_articles = $search->getSearcharticles($search_word);

// 検索された質問を全て取り出す
$search_questions = $search->getSearchquestions($search_word);


require_once __DIR__ . '/../paging/search_paging_controller.php';
require_once __DIR__ . '/../header.php';
?>

<!-- main部分 -->
<main class="bg">
  <div class="index-style">
    <article class="article-style">
      <h1>「<?= $search_word ?>」で検索された記事</h1>
      <?php
      foreach ($article_data  as  $article) {
      ?>
        <a href=<?= $article_show_php ?>?article_id=<?= $article['article_id'] ?>>
          <article class="article-one">
            <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $article['user_id'] ?>><?= $article['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href=<?= $article_show_php ?>?article_id=<?= $article['article_id'] ?>><?= $article['title'] ?></a></object></h2>
            <?php
            // 選択されたタグを取り出す
            $tags = $post->getTags($article['article_id']);
            foreach ($tags as $tag) {
            ?>
              <label>
                <p class="index-tag-button"><a href=<?= $tag_search_php ?>?tag=<?= $tag['tags']  ?>>#<?= $tag['tags'] ?></a></p>
              </label>
            <?php
            }
            ?>
            <br>
            <p class="article-date"><?= date('Y年m月d日', strtotime($article['creation_date'])) ?></p>
            <span class="heart">♥</span>
            <span class="article-like"><?= $article['like_count'] ?></span>
          </article>
        </a>
      <?php
      }
      require_once __DIR__ . '/../paging/search_paging.php';
      ?>
    </article>
    <article class="article-style">
      <h1>「<?= $word ?>」で検索された質問</h1>
      <?php
      foreach ($question_data  as  $question) {
      ?>
        <a href=<?= $question_show_php ?>?question_id=<?= $question['question_id'] ?>>
          <article class="question-one">
            <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $question['user_id'] ?>><?= $question['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href=<?= $question_show_php ?>?question_id=<?= $question['question_id'] ?>><?= $question['title'] ?></a></object></h2>
            <?php
            // 選択されたタグを取り出す
            $tags = $post->get_q_Tags($question['question_id']);
            foreach ($tags as $tag) {
            ?>
              <label>
                <p class="index-tag-button"><a href=<?= $tag_search_php ?>?tag=<?= $tag['tags']  ?>>#<?= $tag['tags'] ?></a></p>
              </label>
            <?php
            }
            ?>
            <br>
            <p class="article-date"><?= date('Y年m月d日', strtotime($question['question_date'])) ?></p>
            <span class="heart">♥</span>
            <span class="article-like"><?= $question['like_count'] ?></span>
          </article>
        </a>
      <?php
      }
      require_once __DIR__ . '/../paging/search_q_paging.php';
      ?>
    </article>
  </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>