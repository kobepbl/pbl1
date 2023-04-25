<?php
if (!isset($_SESSION)) {
  session_start();
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
if (empty($use_id) || empty($name)) {
  if (isset($_COOKIE['user_id']) && isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    $user_id = $_COOKIE["user_id"];
  } else {
    $name = 'no_login';
    setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
    setcookie("user_id", $user_id, time() + 60 * 60 * 24 * 14, '/');
  }
  $_SESSION['name'] = $name;
  $_SESSION['user_id'] = $user_id;
}



$http_host = '//' . $_SERVER['SERVER_NAME'];
$id = "pbl1"; #フォルダ名に変更する

$index_php = $http_host . '/' . $id . '/index.php';
$article_post_php = $http_host . '/' . $id . '/insert_article/article_post.php';
$post_php = $http_host . '/' . $id . '/post/post.php';
$login_php = $http_host . '/' . $id . '/login/login.php';
$logout_php = $http_host . '/' . $id . '/login/logout.php';
$register_php = $http_host . '/' . $id . '/login/register.php';

$layout_css = $http_host . '/' . $id . '/css/layout.css';
$post_css = $http_host . '/' . $id . '/css/post.css';
$login_css = $http_host . '/' . $id . '/css/login.css';
