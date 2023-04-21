<!-- 新規登録 -->
<?php
    require_once __DIR__.'/../index/header.php';
    require_once __DIR__.'/util.php';

    if(isset($_SESSION['signup_error'])){
        echo '<p class="error_class">'.$_SESSION['signup_error'].'</p>';
        unset($_SESSION['signup_error']);
    }

    $id=isset($_SESSION['id'])?$_SESSION['id']:'';
    $name=isset($_SESSION['name'])?$_SESSION['name']:'';
    $mail=isset($_SESSION['mail'])?$_SESSION['mail']:'';
    $grade=isset($_SESSION['grade'])?$_SESSION['grade']:'';
    $gender=isset($_SESSION['gender'])?$_SESSION['gender']:'';
    $graduation_year=isset($_SESSION['graduation_year'])?$_SESSION['graduation_year']:'';

    if($name=="ゲスト"){
        $kubun="insert";
        $title="ユーザー情報を登録してください";
        $id='';
        $name='';
    }
    // 登録情報の変更
    // else{
        // $kubun="update";
        // $title="ユーザー情報を確認・変更することができます。";
    // }
?>

<!-- <p><?=$title?></p> -->

<form method="POST" action="./register_db.php">
<center>
<table>
    <tr><td>ユーザーId</td><td><input type="text" name="id" value="<?=$id?>" required></td></tr>
    <tr><td>名前</td><td><input type="text" name="name" value="<?=$name?>" required></td></tr>
    <tr><td>メールアドレス</td><td><input type="email" name="mail" value="<?=$mail?>" required></td></tr>
    <tr><td>学年</td><td><input type="text" name="number" value="<?=$grade?>" required></td></tr>
    <tr><td>性別</td><td>
    <p style="desplay:inline-block;width: 100px;">
    <input type="radio" name="input_gender" value="<?=$gender?>"required>男性
    <p style="desplay:inline-block;width: 100px;">
    <input type="radio" name="input_gender" value="<?=$gender?>"require>女性</td></tr>
    <tr><td>卒業年度</td><td><input type="number" name="graduation_year" value="<?=$graduation_year?>" required></td></tr>
    <tr><td>パスワード</td><td><input type="password" name="password" required></td></tr>
    <tr><td colspan="2"><input type="submit" value="送信"></td></tr>
</table>
</center>
<input type="hidden" name="kubun" value="<?=$kubun?>">
</form>
<?php
    require_once __DIR__.'/../index/footer.php';
?>
