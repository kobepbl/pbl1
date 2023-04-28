<?php
    require_once __DIR__ . '/../util.php';
    require_once __DIR__ . '/../header.php';
    date_default_timezone_set('Asia/Tokyo');

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $sentence = $_POST['sentence'];
    $question_date = date('Y-m-d ') . date('H:i:s');

    // タイトル
    if(mb_strlen($title) > 30){
        $_SESSION['question_error'] = '30文字以下でタイトルをつけてください';
        header('Location: question_post.php');
        exit();
    }

    // 本文
    if(mb_strlen($sentence) > 400){
        $_SESSION['question_error'] = '400文字以下でタイトルをつけてください';
        header('Location: question_post.php');
        exit();
    }

    require_once __DIR__ . '/../classes/user.php';
    $question = new Question();
    $result = $question -> insert_question($user_id, $title, $sentence, $question_date);

    // 質問の格納
    if($result !== ''){
        $_SESSION['question_error'] = $result;
        header('Location: question_post.php');
        exit();
    }

    $_SESSION['title'] = $title;
    $_SESSION['sentence'] = $sentence;

    $result = $question -> select_question($title, $sentence);
    echo $result;

    header("Location: ../question/question_show.php?question_id={$result['question_id']}");
    require_once __DIR__ . '/../footer.php';
