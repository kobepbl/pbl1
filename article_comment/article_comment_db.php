<?php

require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';

$article_id = $_POST['article_comment_id'];
$user_id = $_SESSION["user_id"];
$comment = $_POST['comment']; 
$posted_date = date('Y-m-d ') . date('H:i:s');


if (preg_match('/[&"\'<>]/', $comment)) {
    header("Location:../article/article_show.php?article_id={$article_id}");
    exit();
}

if (mb_strlen($comment) > 400) {
    header("Location:../article/article_show.php?article_id={$article_id}");
    exit();
}


require_once __DIR__ . '/../classes/user.php';

$article_comment = new Article_comment();
$result = $article_comment->Insertarticle_comment($article_id,$user_id,$comment,$posted_date);


if ($result !== '') {
    $_SESSION['article_comment_error'] = $result;
    header('Location: article_comment.php');
    exit();
}

header("Location:../article/article_show.php?article_id={$article_id}");

require_once __DIR__ . '/../footer.php';
?>