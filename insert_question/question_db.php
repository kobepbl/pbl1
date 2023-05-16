<?php
    require_once __DIR__ . '/../util.php';
    require_once __DIR__ . '/../header.php';
    date_default_timezone_set('Asia/Tokyo');

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $sentence = $_POST['sentence'];
    $question_date = date('Y-m-d ') . date('H:i:s');
    $tags_id = $_POST['tags_id'];


    $question_image = $_FILES['image']['name'];
    if ($question_image!=""){
        $question_image=$user_id.$question_image;
    }

    
      //画像を保存
    move_uploaded_file($_FILES['image']['tmp_name'], '../question_image/' . $question_image);



    // タイトル
    if (mb_strlen($title) > 30){
        $_SESSION['question_error'] = '30文字以下でタイトルをつけてください';
        header('Location: question_post.php');
        exit();
    }
    if (preg_match('/[&"\'<>]/', $title)) {
    $_SESSION['question_error'] = '使用できない文字が含まれています';
    header('Location: question_post.php');
    exit();
    }
    // 本文
    if (mb_strlen($sentence) > 2000){
        $_SESSION['question_error'] = '400文字以下でタイトルをつけてください';
        header('Location: question_post.php');
        exit();
    }
    if (preg_match('/[&"\'<>]/', $sentence)) {
    $_SESSION['question_error'] = '使用できない文字が含まれています'; // エラーメッセージをセット
    header('Location: question_post.php');
    exit();
    }

    require_once __DIR__ . '/../classes/user.php';
    $question = new Question();
    $result = $question -> insert_question($user_id, $title, $sentence, $question_date, $question_image);

    // 質問の格納
    if($result !== ''){
        $_SESSION['question_error'] = $result;
        header('Location: question_post.php');
        exit();
    }

    require_once __DIR__ . '/../classes/tag.php';

    $_SESSION['title'] = $title;
    $_SESSION['sentence'] = $sentence;

    $result = $question -> select_question($title, $sentence);
    $question_id = $result['question_id'];
    $tags = new Tag();
    foreach ($tags_id as $tag_id) {
      $tags->insert_q_Tags($question_id, $tag_id);
    }

    header("Location: ../question/question_show.php?question_id={$question_id}");
    require_once __DIR__ . '/../footer.php';
