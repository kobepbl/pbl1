<?php
require_once __DIR__ . '/../header.php';

if(isset($_SESSION['article_error'] )){
    echo '<p class="error_class">' . $_SESSION['article_error'] . '</p>';
    unset($_SESSION['article_error'] );
}
$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : ''; 
?>

<br><hr>

<div class="outer">
  <div class="inner">
  新規記事登録
  </div>
</div>


<link rel="stylesheet" href="article_post.css">

<form class="form" method="POST" action="./article_db.php">

    <input type="hidden" name="userid" value="1"> 
    <div class="item">
        <fieldset>
            <legend><br><label for="num">タイトル</label></legend>
            <input type="text" name="title" id="num" placeholder="タイトルを入力" maxlength ="30" required>
        </fieldset>
    </div>
    <div class="item">
        <fieldset>
                <legend><label for="num1">本文</label></legend>
                <input type="text" name="sentence" id="num1"placeholder="本文を入力" maxlength ="400" required>
            </fieldset>
    </div>
    <div class="item">
        <input type="submit" value="送信"><input type="reset" value="リセット">
    <div class="item">
</form>
