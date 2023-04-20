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

<table>
<input type="hidden" name="userid" value="<?= $userId ?>">
<tr><td>タイトル</td><td><input type="text" name="title" required></td></tr>
<tr><td>本文</td><td><input type="text" name="sentence" required></td></tr>



<tr><td colspan="2"><input type="submit" value="送信"></td></tr>
</table>
</form>
