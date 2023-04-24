<?php
require_once __DIR__ . '/../header.php';

if(isset($_SESSION['article_error'] )){
    echo '<p class="error_class">' . $_SESSION['article_error'] . '</p>';
    unset($_SESSION['article_error'] );
}
$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : ''; 
?>
<p>新規記事登録</p>
<form method="POST" action="./article_db.php">

<fieldset>
<input type="hidden" name="userid" value="1"> 
<legend><label for="num">タイトル</label></legend>
<input type="text" name="title" id="num" placeholder="タイトルを入力" maxlength ="30" required>
</fieldset>
<fieldset>
<legend><label for="num1">本文</label></legend>
<input type="text" name="sentence" id="num1"placeholder="本文を入力" maxlength ="400" required>
</fieldset>
<input type="submit" value="送信">
</form>
