<?php
require_once __DIR__ . '/../header.php';
?>

<div class="outer">
    <div class="inner">
        新規記事登録
    </div>
</div>

<?php
if (isset($_SESSION['article_error'])) {
    echo '<p class="error_class">' . $_SESSION['article_error'] . '</p>';
    unset($_SESSION['article_error']);
}
?>


<form class="form" method="POST" action="./article_db.php">
    <div class="item">
        <label class="label_left" for="num">タイトル</label>
        <input class="form-text" type="text" name="title" id="num" placeholder="タイトルを入力" maxlength="30" required><br>
    </div>
    <!-- <div>
    <input type="file" name="upimg" accept="image/*">
    </div> -->
    <div class="item">
        <label class="label_left" for="num1">本文</label>
        <textarea class="form-text1" id="num" name="sentence" placeholder="本文を入力" maxlength="400" required></textarea>
    </div>

    <div class="item">
        <input type="submit" value="送信" class="button"><input type="reset" value="リセット" class="button">
    </div>
</form>