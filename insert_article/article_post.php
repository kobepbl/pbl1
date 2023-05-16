<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../classes/tag.php';

$tag = new Tag();
$tags = $tag->getTags();
?>

<div class="outer">
    <div class="inner">
        <div class="a-post">
            新規記事登録
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['article_error'])) {
    echo '<p class="error_class">' . $_SESSION['article_error'] . '</p>';
    unset($_SESSION['article_error']);
}
?>
<script src="../js/insert_tags.js"></script>
<script src="<?= $no_post_js ?>"></script>

<form class="form" method="POST" action="./article_db.php"  enctype="multipart/form-data">
    <div class="item">
        <label class="label_left" for="num">タイトル</label>
        <input class="form-text" type="text" name="title" id="title" placeholder="タイトルを入力" maxlength="30" required><br>
    </div>
    <div class="input_item">
        タグは5つまで登録できます<br>
        <?php
        foreach ($tags  as  $tag) {
        ?>
            <ul>
                <li class="checkbox">
                    <input type="checkbox" name="tags_id[]" id=<?= $tag['tags'] ?> value=<?= $tag['tags_id'] ?> onclick="click_cb();">
                    <label for=<?= $tag['tags'] ?>><?= $tag['tags'] ?></label>
                </li>
            </ul>
        <?php } ?>
    </div>
    <div>
        画像選択：<input type="file" name="up_image" accept="image/*">
    <div>
    <div class="item">
        <label class="label_left" for="num1">本文</label>
        <textarea class="form-text1" id="" name="sentence" placeholder="本文を入力（リンクを貼る場合は「[タイトル](URL)」と記入）" maxlength="2000" required></textarea>
    </div>
    <div class="item">
        <input type="submit" value="送信" class="button"><input type="reset" value="リセット" class="button">
    </div>
</form>

<?php
require_once __DIR__ . '/../footer.php';
?>