<?php

require_once __DIR__ . '/../header.php';
?>

<div class="profile" align="center">
<form method="POST" action="./article_repost_db.php">
  <h3>記事再投稿しますか？</h3>
  <div>
    <div class="update">
        <input type="submit" value="変更" class="button">
    </div>
    <br>
    <a href="../user/user_show.php">記事詳細へ戻る</a>
  </div>
</form>
</div>
</html>