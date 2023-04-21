<?php
require_once __DIR__ . '/../classes/user_login.php';
require_once __DIR__ . '/util.php';
require_once __DIR__ . '/../header.php';
$mail = $_POST['mail'];
$password = $_POST['password'];

$user = new User();
$result = $user->authUser($mail, $password);

session_start();

if (empty($result['mail'])) {
    $_SESSION['login_error'] = 'ユーザID、パスワードを確認してください。';
    header('Location:./login.php');
    exit();
}

$userName = $result['name'];

$_SESSION['name'] = $name;
$_SESSION['password'] = $result['password'];
$_SESSION['mail'] = $result['mail'];
$_SESSION['grade'] = $result['grade'];
$_SESSION['gender'] = $result['gender'];
$_SESSION['graduation_year'] = $result['graduation_year'];

setcookie("mail", $mail, time() + 60 * 60 * 24 * 14, '/');
setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');



?>
<p>こんにちは、<?= h($name) ?>さん。</p>
<p>ショッピングをお楽しみください。</p>
<?php
require_once __DIR__ . '/../footer.php';
?>