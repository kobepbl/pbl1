<?php
    require_once __DIR__ . '/../header.php';

    if(isset($_SESSION['question_error'])){
        echo '<p class="error_class">' . $_SESSION['question_error'] . '</p>';
        unset($_SESSION['question_error']);
    }
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
?>

<br><hr>
<div class="outer">
    <div class="inner">
        新規質問登録
    </div>
</div>
<link rel="stylesheet" href="question_post.css">
<form class="form" method="POST" action="./question_db.php">
    <input type="hidden" name="userid" value="1"> 
    <div class="item">
        <label class="label_left" for="num">タイトル</label>
        <input class="form-text" type="text" name="title" id="num" placeholder="タイトルを入力" maxlength="30" required><br>
    </div>

    <div class="item">
        <label class="label_left" for="num1">
            本文
        </label>
        <input class="form-text" type="text" name="sentence" id="num1" placeholder="本文を入力" maxlength="400" required>
    </div>

    <div class="item">
        <input type="submit" value="送信" class="button">
        <input type="reset" value="リセット" class="button">
    <div class="item">
</form>