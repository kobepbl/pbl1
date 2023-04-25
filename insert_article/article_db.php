<?php
// 送られてきたデータを受けとる


require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';
//$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; 
$user_id = $_SESSION["user_id"];
$title = $_POST['title']; //タイトル
$sentence = $_POST['sentence']; //本文 

$creation_date = date('Y-m-d ') . date('H:i:s'); //更新日時がんばる


// session_start();

if (mb_strlen($title) > 30) {
    $_SESSION['article_error'] = '30文字以下でタイトルをつけてください'; // エラーメッセージをセット
    header('Location: article_post.php');
    exit();
}

if (mb_strlen($sentence) > 400) {
    $_SESSION['article_error'] = '400文字以下でタイトルをつけてください'; // エラーメッセージをセット
    header('Location: article_post.php');
    exit();
}

require_once __DIR__ . '/../classes/user.php';
$article = new Article();

$result = $article->Insertarticle($user_id, $title, $sentence, $creation_date);


if ($result !== '') {
    $_SESSION['article_error'] = $result;
    header('Location: article_post.php');
    exit();
}

$_SESSION['title'] = $title;
$_SESSION['sentence'] = $sentence;

$article = new Article();
$result = $article->SelectArticle($title, $sentence);
echo $result;
//<a href="article/article_show.php?article_id=<?= $result['article_id']
header("Location:../article/article_show.php?article_id={$result['article_id']}");

require_once __DIR__ . '/../footer.php';
?>