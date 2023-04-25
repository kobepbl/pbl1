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
if (strlen($name)>=21) {
    $_SESSION['signup_error'] = '名前は20文字以下で入力してください。';
    header('Location: register.php');
    exit();
}
// メールアドレス50文字以下
 if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || strlen($mail)>=51 ||
    (mb_substr($mail,mb_strrpos($mail,'@'),mb_strlen($mail))=="@st.kobedenshi.ac.jp")==false) {
    $_SESSION['signup_error'] = '正しいメールアドレスを入力してください。';
    header('Location: register.php');
    exit();
}
// 学年半角数字で4以下
if (!is_numeric($grade) || $grade > 4) {
    $_SESSION['signup_error'] = '正しい学年を入力してください。';
    header('Location: register.php');
    exit();
}
// 卒業年度半角数字4桁
if (!is_numeric($graduation_year) || strlen($graduation_year) !== 4) {
    $_SESSION['signup_error'] = '卒業年度を西暦で正しく入力してください。';
    header('Location: register.php');
    exit();
}
// パスワード5文字以上40文字以下
if(strlen($password)>=41 || strlen($password)<=4){
    $_SESSION['signup_error']='パスワードは4文字以上40文字以下で入力してください。';
    header('Location: register.php');
    exit();
}

$user = new User();
// ハッシュ化処理　いったん保留
// $hash=password_hash($_POST[$password],PASSWORD_DEFAULT);
$result = $user->register($name, $mail, $grade, $gender, $graduation_year, $password);

if ($result !== '') {
    $_SESSION['signup_error'] = $result;
    header('Location: register.php');
    exit();
}

$user_sesion = new User();
$result_session = $user_session->authUser($mail, $password);

$_SESSION['user_id'] =  $result_session['user_id'];
$_SESSION['name'] = $name;
$_SESSION['mail'] = $mail;
$_SESSION['grade'] = $grade;
$_SESSION['gender'] = $gender;
$_SESSION['graduation_year'] = $graduation_year;

setcookie("user_id", $result['user_id'],time()+60*60*24*14,'/');
setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';
?>
<!-- ユーザー情報を登録しました。<br> 
<table>
    <tr>
        <td>ユーザーネーム</td>
        <td><?= h($name) ?></td>
    </tr>
    <tr>
        <td>メールアドレス</td>
        <td><?= h($mail) ?></td>
    </tr>
    <tr>
        <td>学年</td>
        <td><?= h($grade) ?></td>
    </tr>
    <tr>
        <td>性別</td>
        <td><?= h($gender) ?></td>
    </tr>
    <tr>
        <td>卒業年度</td>
        <td><?= h($graduation_year) ?></td>
    </tr>
</table>-->
<?php
header('Location:' . $index_php);
require_once __DIR__ . '/../footer.php';
?>