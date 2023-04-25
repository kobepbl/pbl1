<?php
if (!isset($_SESSION)) {
  session_start();
}

$name = isset($_SESSION["name"]) ? $_SESSION["name"] : '';
if (empty($name)) {
  if (isset($_COOKIE["$name"])) {
    $name = $_COOKIE["$name"];
  } else {
    $name = 'no_login';
    setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
  }
  $_SESSION["name"] = $name;
}

$http_host = '//' . $_SERVER['SERVER_NAME'];
$id = "pbl1"; #フォルダ名に変更する

$index_php = $http_host . '/' . $id . '/index.php';
$post_php = $http_host . '/' . $id . '/post/post.php';
$login_php = $http_host . '/' . $id . '/login/login.php';
$logout_php = $http_host . '/' . $id . '/login/logout.php';
$register_php = $http_host . '/' . $id . '/login/register.php';

$layout_css = $http_host . '/' . $id . '/css/layout.css';
$post_css = $http_host . '/' . $id . '/css/post.css';
$login_css = $http_host . '/' . $id . '/css/login.css';
$logo_img = $http_host . '/' . $id . '/img/pbl1_logo.png';
