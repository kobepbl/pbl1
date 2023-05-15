<?php
require_once __DIR__ . '/../classes/user_login.php';

session_start();
$userid=$_SESSION['user_id'];
$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$grade = $_SESSION['grade'];
$gender = $_SESSION['gender'];
$graduation_year = $_SESSION['graduation_year'];
$password = $_POST['password'];
$newpassword=$_POST['newpassword'];


// パスワード5文字以上40文字以下
if(mb_strlen($newpassword)>=41 || mb_strlen($newpassword)<=4){
    $_SESSION['update_error']='パスワードは5文字以上40文字以下で入力してください。';
    header('Location: update.php');
    exit();
}

$user=new User();
$result=$user->authPassword($password,$userid);
if($result==''){
    $user = new User();
    $result = $user->updateUser($newpassword,$mail);

    if ($result !== '') {
        $_SESSION['update_error'] = $result;
        header('Location: update.php');
        exit();
    }

    $_SESSION['password']=$newpassword;
}elseif($result!==''){
    $_SESSION['update_error']=$result;
    header('Location: update.php');
    exit();
}


setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';
?>

<?php
header('Location:../user/user_show.php');
require_once __DIR__ . '/../footer.php';
?>