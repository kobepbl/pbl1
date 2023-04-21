<?php
// 送られてきたデータを受けとる

//$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : ''; 

$userid = $_POST['userid'];
$title = $_POST['title']; //タイトル
$sentence = $_POST['sentence']; //本文 

$creation_date = date('Y-m-d ') . date('H:i:s'); //更新日時がんばる


// session_start();

if (mb_strlen($title) > 30) {
    $_SESSION['article_error'] = '30文字以下でタイトルをつけてください'; // エラーメッセージをセット
    header('Location: article_post.php');
    exit();
}

if (mb_strlen($sentence) > 400) {
    $_SESSION['article_error'] = '400文字以下でタイトルをつけてください'; // エラーメッセージをセット
    header('Location: article_post.php');
    exit();
}

require_once __DIR__ . '/../classes/user.php';
$article = new Article();

$result = $article->Insertarticle($userid, $title, $sentence, $creation_date);


if ($result !== '') {
    $_SESSION['article_error'] = $result;
    header('Location: article_post.php');
    exit();
}

$_SESSION['title'] = $title;
$_SESSION['sentence'] = $sentence;

require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';
?>
記事を投稿しました<br>
<table>
    <tr>
        <td>タイトル</td>
        <td><?= h($_SESSION['title']) ?></td>
    </tr>
    <tr>
        <td>本文</td>
        <td><?= h($_SESSION['sentence']) ?></td>
    </tr>
</table>
<?php
require_once __DIR__ . '/../footer.php';
?>