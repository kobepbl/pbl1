<?php
if(isset($_SESSION['article_comment_error'] )){
    echo '<p class="error_class">' . $_SESSION['article_comment_error'] . '</p>';
    unset($_SESSION['article_comment_error'] );
}
?>

<br><hr>

<div class="outer">
  <div class="inner">
    新規記事登録
  </div>
</div>

<link rel="stylesheet" href="../css/article_post.css">

<form class="form" method="POST" action="./article_comment_db.php">
    <div class="item">
            <label class="label_left" for="num">COMMENT</label>
            <input class="form-text" type="text" name="comment" id="num" placeholder="コメントを入力" maxlength ="400" required><br>        
    </div>    
    <div class="item">
        <input type="submit" value="送信" class="button">
    <div class="item">
</form>
