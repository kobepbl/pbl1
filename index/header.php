<?php
require_once __DIR__ . '/pre.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>神戸電子情報共有サイト</title>
  <link rel="stylesheet" href="<?= $style_css ?>">
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
          <a href="post_php">投稿</a>
        </li>
        <li class="nav-list-item">
          <a href="login.html">ログイン</a>
        </li>
      </ul>
    </nav>
  </header>