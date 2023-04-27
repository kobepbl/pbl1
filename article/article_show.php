<?php
// 送られてきたidを受け取る
$article_id = $_GET['article_id'];
$_SESSION['article_comment_id'] = $article_id;#セッションに入れる

// Postオブジェクトを生成する
require_once __DIR__ . '/../classes/post.php';
$post = new Post();

// 選択された記事を取り出す
$article = $post->getArticle($article_id);

// 選択された記事のコメントを抽出
$article_comments = $post->getArticlecomments($article_id);

require_once __DIR__ . '/../header.php'
?>

<main>
  <div class="article-show">
    <p class="article-show-user"><a href="user/user_show?user_id=<?= $article['user_id'] ?>"><?= $article['name'] ?></a></p>
    <p class="article-show-date">投稿日 <?= date('Y年m月d日', strtotime($article['creation_date'])) ?></p>
    <h1 class="article-show-title"><?= $article['title'] ?></h1>
    <p class="article-text"><?= nl2br($article['sentence']) ?></p>
  </div>
  
  <?php
    require_once __DIR__ . '/../article_comment/article_comment.php'
  ?>

  <div class="article-show">
  <h1>コメント</h1>
    <?php
    foreach ($article_comments  as  $article_comment) {
    ?>
      <p class="comment-user"><a href="user/user_show?user_id=<?= $article_comment['user_id'] ?>"><?= $article_comment['name'] ?></a></p>
      <p class="article-show-date">投稿日 <?= date('Y年m月d日 H時i分s秒', strtotime($article_comment['posted_date'])) ?></p>
      <p class="comment-border"><?= nl2br($article_comment['comment']) ?></p>
      
    <?php
    }
    ?>
  </div>
</main>
<?php
require_once __DIR__ . '/../footer.php'
?>