<!-- 登録情報の変更 -->
<?php
session_start();
require_once __DIR__ . '/../header.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー情報変更</title>
    <link rel="stylesheet" href="<?= $update_css ?>">
</head>
<?php
    $name=$_SESSION['name'];
    $mail=$_SESSION['mail'];
    $grade=$_SESSION['grade'];
    $gender=$_SESSION['gender'];
    $graduation_year=$_SESSION['graduation_year'];
    $password=$_SESSION['password'];
            
    if (isset($_SESSION['update_error'])) {
        echo '<p class="error_message">' . $_SESSION['update_error'] . '</p>';
        unset($_SESSION['update_error']);
    }

    if($gender==0){
        $gender_details="男性";
    }elseif($gender==1){
        $gender_details="女性";
    }
        
    $grade_details=$grade."年生";
?>
<div class="profile" align="center">
<form method="POST" action="./update_db.php">
  <h3>プロフィール</h3>
  <div>
    <dl class="inline">
      <dt>名前</dt>
      <dd><?= $name ?></dd>
      <dt>メールアドレス</dt>
      <dd>
        <td><?= $mail ?>
      </dd>
      <dt>学年</dt>
      <dd><?= $grade_details ?></dd>
      <dt>性別</dt>
      <dd><?= $gender_details ?></dd>
      <dt>卒業年度</dt>
      <dd><?= $graduation_year ?></dd>
      <dt>パスワード</dt>
      <dd>現在のパスワード：<input type="password" name="password" required><br>
      新しいパスワード：<input type="password" name="newpassword" required></dd>

    </dl>
    <br>
    <div class="update">
        <input type="submit" value="変更" class="button">
        <a href="../user/user_.php"></a>
    </div>
    <br>
    <a href="../user/user_.php">ユーザー詳細へ戻る</a>
  </div>
</form>
</div>
</html>
