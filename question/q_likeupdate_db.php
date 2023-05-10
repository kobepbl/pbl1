<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../classes/user.php';
$likecount = $_SESSION['like_count'];
$question_id = $_SESSION['question_id'];
$like = new Iine();
$likeupdate = $like->q_Iineupdate($question_id);

header("Location:../question/question_show.php?question_id={$question_id}");
require_once __DIR__ . '/../footer.php';
