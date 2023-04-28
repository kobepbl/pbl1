<?php
if(isset($_SESSION['article_comment_error'] )){
    echo '<p class="error_class">' . $_SESSION['article_comment_error'] . '</p>';
    unset($_SESSION['article_comment_error'] );
}
?>

<br><hr>
<div class="outer">
  <div class="inner">
    <h2>新規コメント投稿<h2>
  </div>
</div>

<link rel="stylesheet" href="../css/article_post.css">

<form method="POST" action="../article_comment/article_comment_db.php">
  <input type="hidden" name="article_comment_id" value=<?= $_SESSION['article_comment_id']?>>
  <h1 class="comment_left">コメント入力</h1>
  <textarea class="comment-text" name="comment" placeholder="コメントを入力" maxlength="400" required></textarea>
  <input type="submit" value="送信" class="comment_button">
</form>