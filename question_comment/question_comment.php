<?php
if (isset($_SESSION['question_comment_error'])) {
  echo '<p class="error_class">' . $_SESSION['question_comment_error'] . '</p>';
  unset($_SESSION['question_comment_error']);
}
?>

<br>

<link rel="stylesheet" href="../css/article_post.css">
<script src="<?= $no_comment_js ?>"></script>
<div class="anser-show-2">
  <form method="POST" action="../question_comment/question_comment_db.php">
    <input type="hidden" name="question_comment_id" value=<?= $_SESSION['question_comment_id'] ?>>
    <h1 class="comment_left">回答入力</h1>
    <textarea class="comment-text" name="comment" id="comment" placeholder="質問の回答を入力" maxlength="400" required></textarea>
    <input type="submit" value="送信" class="comment_button">
  </form>
</div>