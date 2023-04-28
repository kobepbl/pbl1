<?php
if(isset($_SESSION['question_comment_error'] )){
    echo '<p class="error_class">' . $_SESSION['question_comment_error'] . '</p>';
    unset($_SESSION['question_comment_error'] );
}
?>

<br><hr>
<div class="outer">
  <div class="inner">
    新規回答登録
  </div>
</div>

<link rel="stylesheet" href="../css/article_post.css">

<form class="form" method="POST" action="../question_comment/question_comment_db.php">
  <input type="hidden" name="question_comment_id" value=<?= $_SESSION['question_comment_id']?>>
  <div class="item">
    <label class="label_left" for="num1">本文</label>
    <textarea class="form-text1" id="num" name="comment" placeholder="本文を入力" maxlength="400" required></textarea>
  </div>   
  <div class="item">
      <input type="submit" value="送信" class="button">
  </div>
</form>
