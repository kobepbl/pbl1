<?php
require_once __DIR__ . '/../classes/user_login.php';

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
if(password_verify($_POST['password'], $result['hash'])){
}else{
}
$name = $result['name'];

$_SESSION['name'] = $name;
$_SESSION['password'] = $result['password'];
$_SESSION['mail'] = $mail;
$_SESSION['grade'] = $result['grade'];
$_SESSION['gender'] = $result['gender'];
$_SESSION['graduation_year'] = $result['graduation_year'];

setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');

require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';

?>

<?php
header('Location:' . $index_php);
require_once __DIR__ . '/../footer.php';
?>