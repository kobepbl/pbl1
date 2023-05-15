<?php
    require_once __DIR__ . '/../header.php';
    $icon_name = $_FILES['up_icon']['name'];
    $mail = $_SESSION['mail'];
    $user_id = $_SESSION['user_id'];
    $icon_name=$user_id.$icon_name;
    
    //画像を保存
    move_uploaded_file($_FILES['up_icon']['tmp_name'], '../icon_image/' . $icon_name);


    require_once __DIR__ . '/../classes/user_login.php';
    $user = new User();
    $result = $user->Icon_update($icon_name,$mail);


    if ($result !== '') {
        $_SESSION['icon_error'] = $result;
        header('Location: icon_update.php');
        exit();
    }
    header('Location:../user/user_show.php');

?>