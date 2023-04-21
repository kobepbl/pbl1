<?php
require_once __DIR__ . '/pre.php';
// if (!$_SESSION["is_login"]) {
//   header("Location:$login_php");
// }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>神戸電子情報共有サイト</title>
<<<<<<< HEAD
  <link rel="stylesheet" href="<?= $style_css ?>">
=======
  <link rel="stylesheet" href="<?= $layout_css ?>">
  <link rel="stylesheet" href="<?= $post_css ?>">
>>>>>>> 6b023fbe301576bb6d9010692e2b64e2bc4f00d5
</head>

<body>
  <!-- header部分 -->
  <header>
    <div class="top-info">
      <a href="<?= $index_php ?>">
        <h1>神戸電子情報共有サイト</h1>
      </a>
    </div>
    <nav>
      <ul class="nav-list">
        <li class="nav-list-item">
<<<<<<< HEAD
          <a href="$post_php">投稿</a>
=======
          <a href="post_php">投稿</a>
>>>>>>> 6b023fbe301576bb6d9010692e2b64e2bc4f00d5
        </li>
        <?php
        if (!$_SESSION["is_login"]) {
          echo '<li class="nav-list-item"><a href="' . $signup_php . '">新規登録</a></li>';
          echo '<li class="nav-list-item"><a href="' . $login_php . '">ログイン</a></li>';
<<<<<<< HEAD
          echo '<li class="nav-list-item"><a href="' . $post_php . '">投稿</a></li>';
=======
>>>>>>> 6b023fbe301576bb6d9010692e2b64e2bc4f00d5
        } else {
          // echo '<li class="nav-list-item"><a href="' . $user_php . '">マイページ</a></li>';
          // echo '<li class="nav-list-item"><a href="' . $user_php . '">投稿</a></li>';
          // echo '<li class="nav-list-item"><a href="' . $user_php . '">ログアウト</a></li>';
        }
        ?>
      </ul>
    </nav>
  </header>