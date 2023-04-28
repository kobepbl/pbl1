<!-- 登録情報の変更 -->
<?php
session_start();
require_once __DIR__ . '/../header.php';
// require_once __DIR__ . '/util.php';

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー情報変更</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div id=main>
    <form method="POST" action="./update_db.php">
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
            } else {
                echo 'パスワードを変更しました';
            }

            if($gender==0){
                $gender_details="男性";
            }elseif($gender==1){
                $gender_details="女性";
            }
        
            $grade_details=$grade."年生";
        ?>
        <table border="1" bordercolor="" align="left">
            <tr><th>名前</th><td><?=$name?></td></tr>
            <tr><th>メールアドレス　</th><td><?=$mail?></td></tr>
            <tr><th>学年</th><td><?=$grade_details?></td></tr>
            <tr><th>性別</th><td><?=$gender_details?></td></tr>
            <tr><th>卒業年度</th><td><?=$graduation_year?></td></tr>
            <tr><th>パスワード</th><td><input type="password" name="password" required></td> </tr>    
        </table>
        <!-- 更新ボタン -->
        <br clear="all">
        <td colspan="2"><input type="submit" value="送信"></td>
        <!-- ユーザー詳細 -->
        <center>
            <br clear="all">
            <a href="../user/user_details.php">ユーザー詳細へ戻る</a>
        </center>
    </form>
    </div>
</body>
</html>
<?php
    require_once __DIR__ . '/../footer.php';
?>