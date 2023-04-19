<?php

// Postクラスを利用する
require_once __DIR__ . '/classes/post.php';
$post = new Post();
// すべての記事を抽出
$articles = $post->getArticles();

require_once __DIR__ . '/header.php';
?>


<!-- main-visual-div -->
<div class="main-visual">
  <div class="main-visual-content">
    <p class="main-visual-text">
      Welcome to<br />
      Kobe Electronics<br />
      Information Sharing Site
    </p>
    <p class="main-visual-name">なんかかっこいいこと</p>
  </div>
</div>

<!-- main部分 -->
<main>
  <div class="index-style">
    <article class="article-style">
      <h1>最近の投稿</h1>
      <?php
      foreach ($articles  as  $article) {
      ?>
        <a href="article/article_show.php?article_id=<?= $article['article_id'] ?>">
          <article class="article-one">
            <p><object><a href="user/user_show?user_id=<?= $article['user_id'] ?>"><?= $article['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href="article/article_show.php?article_id=<?= $article['article_id'] ?>"><?= $article['title'] ?></a></object></h2>
            <p class="article-date"><?= date('Y年m月d日', strtotime($article['creation_date'])) ?></p>
          </article>
        </a>
      <?php
      }
      ?>
    </article>

    <article class="article-style">
      <h1>最近の質問</h1>
      <a href="kiji">
        <article class="article-one">
          <p><object><a href="user">石井</a></object></p>
          <h2 class="article-title"><object><a href="kiji">ポートフォリオ作成例</a></object></h2>
          <p class="article-date">2022.04.12</p>
        </article>
      </a>
      <a href="kiji">
        <article class="article-one">
          <p><object><a href="user">石井</a></object></p>
          <h2 class="article-title"><object><a href="kiji">ポートフォリオ作成例</a></object></h2>
          <p class="article-date">2022.04.12</p>
        </article>
      </a>
      <a href="kiji">
        <article class="article-one">
          <p><object><a href="user">石井</a></object></p>
          <h2 class="article-title"><object><a href="kiji">ポートフォリオ作成例</a></object></h2>
          <p class="article-date">2022.04.12</p>
        </article>
      </a>
    </article>
  </div>
</main>
<?php
require_once __DIR__ . '/footer.php';
?>