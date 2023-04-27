<?php
require_once __DIR__ . '/pre.php';
$url = $_SERVER['REQUEST_URI'];
if (($name == "no_login" && !strstr($url, 'login.php')) && ($name == "no_login" && !strstr($url, 'register.php'))) {
  header("Location:$login_php");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>神戸電子情報共有サイト</title>
  <link rel="stylesheet" href="<?= $layout_css ?>">
  <link rel="stylesheet" href="<?= $post_css ?>">
  <link rel="stylesheet" href="<?= $login_css ?>">
</head>

<body>
  <!-- header部分 -->
  <header>
    <div class="top-info">
      <a href="<?= $index_php ?>">
        <div class="logo_img"><img src=<?php echo $logo_img ?> alt="神戸電子情報共有サイト"></div>
      </a>
    </div>
    <nav>
      <ul class="nav-list">
        <li class="nav-list-item">
          <?php
          if ($name == "no_login") {
            echo '<li class="nav-list-item"><a href="' . $register_php . '">新規登録</a></li>';
            echo '<li class="nav-list-item"><a href="' . $login_php . '">ログイン</a></li>';
          } else {
            // echo '<li class="nav-list-item"><a href="' . $user_php . '">マイページ</a></li>';
            echo '<li class="nav-list-item"><a href="' . $article_post_php . '">投稿</a></li>';
            echo '<li class="nav-list-item"><a href="' . $logout_php . '">ログアウト</a></li>';
          }
          ?>
        </li>
      </ul>
    </nav>
  </header>
<hr>  