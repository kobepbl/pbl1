<?php
require_once __DIR__ . '/../classes/user_login.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$grade = $_POST['grade'];
$gender = $_POST['gender'];
$graduation_year = $_POST['graduation_year'];
$password = $_POST['password'];

session_start();

// 名前20文字以下
if (mb_strlen($name)>=21) {
    $_SESSION['update_error'] = '名前は20文字以下で入力してください。';
    header('Location: update.php');
    exit();
}
// メールアドレス50文字以下 stメール以外不可
 if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || mb_strlen($mail)>=51 ||
    (mb_substr($mail,mb_strrpos($mail,'@'),mb_strlen($mail))=="@st.kobedenshi.ac.jp")==false) {
    $_SESSION['update_error'] = '正しいメールアドレスを入力してください。';
    header('Location: update.php');
    exit();
}
// 卒業年度桁数取得
$abs=abs($graduation_year);
$i=0;
while(1<=$abs){
    $abs/=10;
    $i++;
}
// 卒業年度半角数字4桁
if (!is_numeric($graduation_year) || $i !== 4 || $graduation_year<=0) {
    $_SESSION['update_error'] = '卒業年度を西暦で正しく入力してください。';
    header('Location: update.php');
    exit();
}
// パスワード5文字以上40文字以下
if(mb_strlen($password)>=41 || mb_strlen($password)<=4){
    $_SESSION['update_error']='パスワードは4文字以上40文字以下で入力してください。';
    header('Location: update.php');
    exit();
}

$user = new User();
// ハッシュ化処理　いったん保留
// $hash=password_hash($_POST[$password],PASSWORD_DEFAULT);
$result = $user->updateuser($name, $mail, $grade, $gender, $graduation_year, $password);
echo $result;
if ($result !== '') {
    $_SESSION['update_error'] = $result;
    header('Location: update.php');
    exit();
}

$_SESSION['name'] = $name;
$_SESSION['mail'] = $mail;
$_SESSION['grade'] = $grade;
$_SESSION['gender'] = $gender;
$_SESSION['graduation_year'] = $graduation_year;
$_SESSION['password']=$password;

// setcookie("id",$id,time()+60*60*24*14,'/');
setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';
?>

<?php
require_once __DIR__ . '/../footer.php';
?>