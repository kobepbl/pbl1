<?php

require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';

$user_id = $_SESSION["user_id"];
$comment = $_POST['comment']; 
$creation_date = date('Y-m-d ') . date('H:i:s');

if (mb_strlen($title) > 30) {
    $_SESSION['article_error'] = '30文字以下でタイトルをつけてください'; // エラーメッセージをセット
    header('Location: article_post.php');
    exit();
}

if (preg_match('/[&"\'<>]/', $comment)) {
    $_SESSION['article_error'] = '使用できない文字が含まれています'; // エラーメッセージをセット
    header('Location: article_comment_post.php');
    exit();
}

if (mb_strlen($sentence) > 400) {
    $_SESSION['article_error'] = '400文字以下でタイトルをつけてください'; // エラーメッセージをセット
    header('Location: article_comment_post.php');
    exit();
}


require_once __DIR__ . '/../classes/user.php';

$article = new Article();
$result = $article->Insertarticle($user_id, $title, $sentence, $creation_date);


if ($result !== '') {
    $_SESSION['article_error'] = $result;
    header('Location: article_comment_post.php');
    exit();
}

$_SESSION['title'] = $title;
$_SESSION['sentence'] = $sentence;

$result = $article->SelectArticle($title, $sentence);
header("Location:../article/article_show.php?article_id={$result['article_id']}");

require_once __DIR__ . '/../footer.php';
?>