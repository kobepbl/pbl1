<?php
require_once __DIR__ . '/../header.php';

if (isset($_SESSION['login_error'])) {
    echo '<p class="error_class">' . $_SESSION['login_error'] . '</p>';
    unset($_SESSION['login_error']);
} else {
    echo '<p>ログインしてください。</p>';
}
?>
<div class="login-form">
    <form method="POST" action="./login_db.php">
        <center>
            <table>
                <tr>
                    <th class="right-align">ユーザーID：</th>
                    <td class="left-align"><input type="text" name="login_id"></td>
                </tr>
                <tr>
                    <th class="right-align">パスワード：</th>
                    <td class="left-align"><input type="password" name="login_pass"></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td class="left-align"><input type="submit" value="ログイン"></td>
                </tr>
            </table>
        </center>
    </form>
</div>
</div>
<!-- 新規ユーザー登録ボタン -->
<p><a href="register.php">新規ユーザー登録</a></p>
</body>

<?php
require_once __DIR__ . '/../footer.php';
?>