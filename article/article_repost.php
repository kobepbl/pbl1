<?php

require_once __DIR__ . '/../header.php';
?>

<div class="profile" align="center">
  <form method="POST" action="./article_repost_db.php">
    <h3>記事を公開しますか？</h3>
    <div>
      <div class="update">
        <input type="submit" value="記事を公開する" class="button">
      </div>
      <br>
      <a href=<?= $article_show_php ?>?article_id=<?= $_SESSION['article_id'] ?>>記事詳細へ戻る</a>
    </div>
  </form>
</div>

</html>