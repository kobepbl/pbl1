<?php
try {
    // コメント時間
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Asia/Tokyo'));
    $comment_text = $_POST['text'];
    $comment_image_name = $_FILES['image_name'];

    if (!empty($_POST['comment_id'])) {
        $comment_id = $_POST['comment_id'];
    }

    $id = $_POST['id'];
    $question_id = $_POST['comment_id'];

    if ($comment_text == '') {
        set_flash('danger', 'コメントが空です');
        reload();
    }

    if ($comment_image_name['size'] > 0) {
        if ($comment_image_name['size'] > 1000000) {
            set_flash('danger', '画像が大きすぎます');
            reload();
        } else {
            move_uploaded_file($comment_image_name['tmp_name'], './image/' . $comment_image_name['name']);
        }
    }

    $comment_text = htmlspecialchars($comment_text, ENT_QUOTES, 'UTF-8');
    $user_id = htmlspecialchars($user_id, ENT_QUOTES, 'UTF-8');
    $dsn = '';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'insert into comment(text,image,user_id,created_at,post_id,comment_id) values(?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $comment_text;
    $data[] = $comment_image_name['name'];
    $data[] = $user_id;
    $data[] = $date->format('Y-m-d H:i:s');
    $data[] = $post_id;

    if (!empty($comment_id)) {
        $data[] = $comment_id;
    } else {
        $data[] = '';
    }

    $stmt->execute($data);
    $dbh = null;

    set_flash('sucsess', 'コメントを追加しました');
    require_once __DIR__ . '/../header.php';
} catch (Exception $e) {
    echo '障害中';
    exit();
}
