<?php
    require_once __DIR__.'/util.php';
    require_once __DIR__.'/../index/header.php';

    $kubun=$_POST['kubun'];
    $id=$_POST['id'];
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $grade=$_POST['grade'];
    $gender=$_POST['gender'];
    $graduation_year=$_POST['graduation_year'];
    $password=$_POST['password'];

    session_start();

    if(!ctype_alnum($id)){
        $_SESSION['signup_error']='IDは半角英数字のみで入力してください。';
        header('Location:/register.php');
        exit();
    }

    if(!filter_var($id,FILTER_VALIDATE_EMAIL)){
        $_SESSION['signup_error']='正しいメールアドレスを入力してください。';
        header('Location:/register.php');
        exit();
    }

    if(!is_numeric($grade)||$grade>4){
        $_SESSION['signup_error']='正しい学年を入力してください。';
        header('Location:/register.php');
        exit();
    }

    if(!is_numeric($graduation_year)||strlen($graduation_year)!==4){
        $_SESSION['signup_error']='卒業年度を西暦で正しく入力してください。';
        header('Location:/register.php');
        exit();
    }

    require_once __DIR__.'/user.php';
    $user=new User();
    if($kubun=="insert"){
        $result=$user->register($id,$name,$mail,$grade,$gender,$graduation_year,$password,$_SESSION['id']);
    }else{
        $result=$user->register($id,$name,$mail,$grade,$gender,$graduation_year,$password,$_SESSION['id']);
    }

    if($result!==''){
        $_SESSION['signup_error']=$result;
        header('Location:./register.php');
        exit();
    }

    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['mail']=$mail;
    $_SESSION['grade']=$grade;
    $_SESSION['gender']=$gender;
    $_SESSION['graduation_year']=$graduation_year;

    setcookie("id",$id,time()+60*60*24*14,'/');
    setcookie("name",$name,time()+60*60*24*14,'/');
?>
ユーザー情報を登録しました。<br>
<table>
    <tr><td>ID</td><td><?=h($id)?></td></tr>
    <tr><td>ユーザーネーム</td><td><?=h($name)?></td></tr>
    <tr><td>メールアドレス</td><td><?=h($mail)?></td></tr>
    <tr><td>性別</td><td><?=h($gender)?></td></tr>
    <tr><td>学年</td><td><?=h($grade)?></td></tr>
    <tr><td>卒業年度</td><td><?=h($graduation_year)?></td></tr>
</table>
<?php
    require_once __DIR__.'/../index/footer.php';
?>
