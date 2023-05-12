<?php

require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';

$question_id = $_POST['question_comment_id'];
$user_id = $_SESSION["user_id"];
$comment = $_POST['comment']; 
$posted_date = date('Y-m-d ') . date('H:i:s');


if (preg_match('/[&"\'<>]/', $comment)) {
    header("Location:../question/question_show.php?question_id={$question_id}");
    exit();
}

if (mb_strlen($comment) > 400) {
    header("Location:../question/question_show.php?question_id={$question_id}");
    exit();
}


require_once __DIR__ . '/../classes/user.php';

$question_comment = new Question_comment();
$result = $question_comment->Insertquestion_comment($question_id,$user_id,$comment,$posted_date);


if ($result !== '') {
    $_SESSION['question_comment_error'] = $result;
    header("Location:../question/question_show.php?question_id={$question_id}");
    exit();
}

header("Location:../question/question_show.php?question_id={$question_id}");

require_once __DIR__ . '/../footer.php';
?>