<?php
require_once __DIR__ . '/../classes/user_login.php';

$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$grade = $_SESSION['grade'];
$gender = $_SESSION['gender'];
$graduation_year = $_SESSION['graduation_year'];
$password = $_SESSION['password'];

session_start();

// パスワード5文字以上40文字以下
if(mb_strlen($password)>=41 || mb_strlen($password)<=4){
    $_SESSION['update_error']='パスワードは5文字以上40文字以下で入力してください。';
    header('Location: update.php');
    exit();
}

$user = new User();
// ハッシュ化処理　いったん保留
// $hash=password_hash($_POST[$password],PASSWORD_DEFAULT);
$result = $user->updateUser($password,$mail);
echo $result;
if ($result !== '') {
    $_SESSION['update_error'] = $result;
    header('Location: update.php');
    exit();
}

$_SESSION['password']=$password;

// setcookie("id",$id,time()+60*60*24*14,'/');
setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';
?>

<?php
require_once __DIR__ . '/../footer.php';
?>