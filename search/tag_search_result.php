<?php
// 送られてきた検索ワードを受け取る
$search_tag = $_GET['tag'];

// Postオブジェクトを生成する
require_once __DIR__ . '/../classes/search.php';
$search = new Search();

// 検索された記事を全て取り出す
$search_tag_articles = $search->getSearch_tag_articles($search_tag);

require_once __DIR__ . '/../paging/tag_search_paging_controller.php';
require_once __DIR__ . '/../header.php';
?>

<!-- main部分 -->
<main class="bg">
  <div class="index-style">
    <article class="article-style">
      <h1>「<?= $search_tag ?>」で検索された記事</h1>
      <?php
      foreach ($article_data  as  $article) {
      ?>
        <a href=<?= $article_show_php ?>?article_id=<?= $article['article_id'] ?>>
          <article class="article-one">
            <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $article['user_id'] ?>><?= $article['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href=<?= $article_show_php ?>?article_id=<?= $article['article_id'] ?>><?= $article['title'] ?></a></object></h2>
            <p class="article-date"><?= date('Y年m月d日', strtotime($article['creation_date'])) ?></p>
          </article>
        </a>
      <?php
      }
      require_once __DIR__ . '/../paging/tag_search_paging.php';
      ?>
    </article>
  </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>