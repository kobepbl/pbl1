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
            $password_details=$_SESSION['password_details'];

            if(isset($_SESSION['update_error'])) {
                echo '<p class="error_message">' . $_SESSION['update_error'] . '</p>';
                unset($_SESSION['update_error']);
            } else {
                echo 'ユーザー情報を更新しました</p>';
            }

            if($gender==0){
                $gender_details="男性";
            }elseif($gender==1){
                $gender_details="女性";
            }
        
            $grade_details=$grade."年生";
        ?>

        <table border="1" bordercolor="" align="left">
            <tr>
                <th>名前</th>
                <td><input type="text" name="name" value="<?= $name ?>" required></td>
            </tr>
            <tr>
                <th>メールアドレス　</th>
                <td><input type="email" name="mail" value="<?= $mail ?>" required></td>
            </tr>
            <tr>
                <th>学年</th>
                <td align="left">
                    <select name="grade">
                        <option value="1">1年</option>
                        <option value="2">2年</option>
                        <option value="3">3年</option>
                        <option value="4">4年</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td align="left">
                    <input type="radio" name="gender" value="0" checked required>男性
                    <input type="radio" name="gender" value="1" required>女性
                </td>
            </tr>
            <tr>
                <th>卒業年度</th>
                <td><input type="number" name="graduation_year" value="<?= $graduation_year ?>" required></td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td><input type="password" name="password" value="<?= $password_datails ?>" required></td>
            </tr>
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