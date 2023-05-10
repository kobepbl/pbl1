<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../classes/user.php';
$likecount = $_SESSION['like_count'];
$article_id = $_SESSION['article_id'];
$like = new Iine();
$likeupdate = $like->Iineupdate($article_id);

header("Location:../article/article_show.php?article_id={$article_id}");
require_once __DIR__ . '/../footer.php';
