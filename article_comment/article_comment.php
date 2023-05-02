<?php
if(isset($_SESSION['article_comment_error'] )){
    echo '<p class="error_class">' . $_SESSION['article_comment_error'] . '</p>';
    unset($_SESSION['article_comment_error'] );
}
?>

<br>

<link rel="stylesheet" href="../css/article_post.css">

<div class="anser-show">
<form method="POST" action="../article_comment/article_comment_db.php">
  <input type="hidden" name="article_comment_id" value=<?= $_SESSION['article_comment_id']?>>
  <h1 class="comment_left">コメント入力</h1>
  <textarea class="comment-text" name="comment" placeholder="コメントを入力" maxlength="400" required></textarea>
  <input type="submit" value="送信" class="comment_button">
</form>
</div>