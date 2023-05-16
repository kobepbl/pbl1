<?php
    require_once __DIR__ . '/../header.php';

    require_once __DIR__ . '/../classes/post.php';
    $article_id = $_SESSION['article_id'];
    $post = new POST();
    $result = $post->Article_repost($article_id);

    header('Location:../index.php');

?>