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
  <script src="https://kit.fontawesome.com/a269103010.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= $layout_css ?>">
  <link rel="stylesheet" href="<?= $post_css ?>">
  <link rel="stylesheet" href="<?= $login_css ?>">
  <link rel="stylesheet" href="<?= $article_post_css ?>">
  <link rel="stylesheet" href="<?= $retop_css ?>">

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
            echo '<li class="nav-list-item"><a class="fa-solid fa-user-plus" href="' . $register_php . '"> 新規登録</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-to-bracket" href="' . $login_php . '"> ログイン</a></li>';
          } else {
            require_once __DIR__ . '/search/search_form.php';
            echo '<li class="nav-list-item"><a class="fa-solid fa-address-card" href="' . $mypage_php . '"> マイページ</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-pen" href="' . $article_post_php . '"> 投稿</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-question" href="' . $question_post_php . '"> 質問</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-from-bracket" href="' . $logout_php . '"> ログアウト</a></li>';
          }
          ?>
        </li>
      </ul>
    </nav>
  </header>