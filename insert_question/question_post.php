<?php
require_once __DIR__ . '/../header.php';

if (isset($_SESSION['question_error'])) {
    echo '<p class="error_class">' . $_SESSION['question_error'] . '</p>';
    unset($_SESSION['question_error']);
}
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
?>

<div class="outer">
    <div class="inner">
        <div class="q-post">
        新規質問登録
        </div>
    </div>
</div>

<form class="form" method="POST" action="./question_db.php">
    <div class="item">
        <label class="label_left-q" for="num">タイトル</label>
        <input class="form-text-q" type="text" name="title" id="num" placeholder="タイトルを入力" maxlength="30" required><br>
    </div>
    <div>
        画像選択：<input type="file" name="question_image" accept="image/*">
    <div>
    <div class="item">
        <label class="label_left-q" for="num1">
            本文
        </label>
        <textarea class="form-text1-q" id="num" name="sentence" placeholder="本文を入力（リンクを貼る場合は「[タイトル](URL)」と記入）" maxlength="400" required></textarea>
    </div>

    <div class="item">
        <input type="submit" value="送信" class="button">
        <input type="reset" value="リセット" class="button">
    </div>
</form>

<?php
require_once __DIR__ . '/../footer.php';
?>