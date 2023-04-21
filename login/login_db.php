<?php
    $userId=$_POST['userId'];
    $password=$_POST['password'];

    require_once __DIR__.'/../classes/user.php';
    $user=new User();
    $result=$user->authUser($userId,$password);

    session_start();

    if(empty($result['id'])){
        $_SESSION['login_error']='ユーザID、パスワードを確認してください。';
        header('Location:./login.php');
        exit();
    }

    $userName=$result['name'];

    $user->changeCartUserId($_SESSION['id'],$userId);

    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['password']=$result['kana'];
    $_SESSION['mail']=$result['mail'];
    $_SESSION['grade']=$result['grade'];
    $_SESSION['gender']=$result['gender'];
    $_SESSION['graduation_year']=$result['graduation_year'];

    setcookie("userId",$userId,time()+60*60*24*14,'/');
    setcookie("userName",$userName,time()+60*60*24*14,'/');

    require_once __DIR__.'/../header.php';
    require_once __DIR__.'/../util.php';
?>
<p>こんにちは、<?=h($name)?>さん。</p>
<p>ショッピングをお楽しみください。</p>
<?php
    require_once __DIR__.'/../footer.php';
?>
