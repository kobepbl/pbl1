<!-- 新規登録 -->
<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../util.php'; ?>
<main>
    <?php
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : '';
    $grade = isset($_SESSION['grade']) ? $_SESSION['grade'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $graduation_year = isset($_SESSION['graduation_year']) ? $_SESSION['graduation_year'] : '';

    if ($name === "no_login") {
        $kubun = "insert";
        $title = "ユーザー情報を登録してください。";
        $name = '';
    } else {
        $kubun = "update";
        $title = "ユーザー情報を確認・変更することができます。";
    }

    if (isset($_SESSION['signup_error'])) {
        echo '<p class="error_message">' . $_SESSION['signup_error'] . '</p>';
        unset($_SESSION['signup_error']);
    } else {
        echo '<p class="user-form">' . $title . '</p>';
    }

    ?>
    <div class="user-form">

        <form method="POST" action="./register_db.php">
            <table>
                <tr>
                    <td>名前</td>
                    <td><input type="text" name="name" value="<?= $name ?>" required></td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td><input type="email" name="mail" value="<?= $mail ?>" required></td>
                </tr>
                <tr>
                    <td>学年</td>
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
                    <td>性別</td>
                    <td align="left">
                        <input type="radio" name="gender" value="0" checked required>男性
                        <input type="radio" name="gender" value="1" required>女性
                    </td>
                </tr>
                <tr>
                    <td>卒業年度</td>
                    <td><input type="number" name="graduation_year" value="<?= $graduation_year ?>" required></td>
                </tr>
                <tr>
                    <td>パスワード</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="送信"></td>
                </tr>
            </table>
        </form>
    </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>