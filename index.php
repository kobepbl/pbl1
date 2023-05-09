<?php

// Postクラスを利用する
require_once __DIR__ . '/classes/post.php';
$post = new Post();
// すべての記事を抽出
$articles = $post->getArticles();

// すべての質問を抽出
$questions = $post->getQuestions();

require_once __DIR__ . '/paging/paging_controller.php';
require_once __DIR__ . '/paging/question_paging_controller.php';

require_once __DIR__ . '/header.php';
?>


<!-- main-visual-div -->
<div class="main-visual">
  <div class="main-visual-content">
    <p class="main-visual-text">
      HELLO WORLD!<br />
      Welcome to<br />
      Kobe Denshi Channel!
    </p>
  </div>
</div>

<!-- main部分 -->
<main>
  <div class="index-style">
    <article class="article-style">
      <h1>最近の記事</h1>
      <?php
      foreach ($article_data  as  $article) {
      ?>
        <a href="article/article_show.php?article_id=<?= $article['article_id'] ?>">
          <article class="article-one">
            <p class="article-user"><object><a href="user/user_show.php?user_id=<?=$article['user_id'] ?>"><?= $article['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href="article/article_show.php?article_id=<?= $article['article_id'] ?>"><?= $article['title'] ?></a></object></h2>
            <p class="article-date"><?= date('Y年m月d日', strtotime($article['creation_date'])) ?></p>
          </article>
        </a>
      <?php
      }
      require_once __DIR__ . '/paging/paging.php';
      ?>
    </article>

    <article class="article-style">
      <h1>最近の質問</h1>
      <?php
      foreach ($question_data  as  $question) {
      ?>
        <a href="question/question_show.php?question_id=<?= $question['question_id'] ?>">
          <article class="article-one">
            <p class="article-user"><object><a href="user/user_show?user_id=<?= $question['user_id'] ?>"><?= $question['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href="question/question_show.php?question_id=<?= $question['question_id'] ?>"><?= $question['title'] ?></a></object></h2>
            <p class="article-date"><?= date('Y年m月d日', strtotime($question['question_date'])) ?></p>
          </article>
        </a>
      <?php
      }
      require_once __DIR__ . '/paging/question_paging.php';
      ?>
    </article>
  </div>
</main>
<?php
require_once __DIR__ . '/footer.php';
?>