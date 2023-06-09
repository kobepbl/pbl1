<?php
require_once __DIR__ . '/../header.php';
// 送られてきたidを受け取る
$article_id = $_GET['article_id'];
$_SESSION['article_comment_id'] = $article_id; #セッションに入れる

// Postオブジェクトを生成する
require_once __DIR__ . '/../classes/post.php';
$post = new Post();

// 選択された記事を取り出す
$article = $post->getArticle($article_id);

// 選択されたタグを取り出す
$tags = $post->getTags($article_id);

// 選択された記事のコメントを抽出
$article_comments = $post->getArticlecomments($article_id);

$_SESSION['article_id'] = $article_id;
$_SESSION['details_user_id'] = $article['user_id'];
$_SESSION['like_count'] = $article['like_count'];
$user_id = $_SESSION['user_id'];

require_once __DIR__ . '/a_markdown.php';
?>
<main>
  <div class="article-show">
    <div class="article-show-cover">
      <p class="article-show-user"><a href=<?= $user_php ?>?user_id=<?= $article['user_id'] ?>><?= $article['name'] ?></a></p>
      <p class="article-show-date">投稿日 <?= date('Y年m月d日', strtotime($article['creation_date'])) ?></p>
      <p class="like_button">
      <form method="POST" action="./likeupdate_db.php">
        <span><input type="submit" value="♡" class="iine_button left"></span>
        <span class="text"><?= $article['like_count'] ?></span>
      </form>
      </p>
      <?php
      if ($article['user_id'] == $user_id and $article['is_public'] == false) {
      ?>
        <p><a class="article-show-change" href="./article_delete.php">記事を非公開にする</a></p>
      <?php
      } elseif ($article['user_id'] == $user_id and $article['is_public'] == true) {
      ?>
        <p><a class="article-show-change" href="./article_repost.php">記事を公開する</a></p>
      <?php
      }
      ?>
    </div>
    <h1 class="article-show-title"><?= $article['title'] ?></h1>
    <div class="tag">
      <?php
      foreach ($tags as $tag) {
      ?>
        <label>
          <p class="tag-button"><a href=<?= $tag_search_php ?>?tag=<?= $tag['tags']  ?>><?= $tag['tags'] ?></a></p>
        </label>
      <?php
      }
      ?>
    </div>
    <div class="text-pos">
      <p class="article-text"><?= nl2br($html) ?></p>
    </div>
    <?php if ($article['article_image'] != "") { ?>
      <div class="article_img_box">
        <label for="pu-on">
          <img class="article_image" src="../article_image/<?= $article['article_image'] ?>" alt="">
        </label>
        <input type="checkbox" id="pu-on">
        <div class="pu">
          <label for="pu-on" class="icon-close">×</label>
          <div>
            <img class="pu-content" src="../article_image/<?= $article['article_image'] ?>" alt="">
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  </div>
  <div class="anser-title">
    <h1 class="anser-border">コメント</h1>
  </div>
  <?php
  foreach ($article_comments as $article_comment) {
  ?>
    <div class="anser">
      <div class="anser-show">
        <?php
        if ($article_comment['user_id'] == $article['user_id']) {
          $author = "投稿者:";
        } else {
          $author = "";
        }
        ?>
        <div class="text-pos">
          <p class="comment-user"><a href=<?= $user_php ?>?user_id=<?= $article_comment['user_id'] ?>><?= $author, " ", $article_comment['name'] ?></a></p>
          <p class="article-show-date">投稿日 <?= date('Y年m月d日 H時i分s秒', strtotime($article_comment['posted_date'])) ?></p>
          <p class="comment-border"><?= nl2br($article_comment['comment']) ?></p>
        </div>
      </div>
    </div>
  <?php
  }
  ?>



  <?php
  require_once __DIR__ . '/../article_comment/article_comment.php'
  ?>

</main>
<?php
require_once __DIR__ . '/../footer.php'
?>