<?php
session_start();

$_SESSION["is_login"] = false;
if ($_SESSION["is_login"]) {
}

$http_host = '//' . $_SERVER['SERVER_NAME'];
$id = "pbl1"; #フォルダ名に変更する

$index_php = $http_host . '/' . $id . '/index.php';
$post_php = $http_host . '/' . $id . '/post/post.php';
$login_php = $http_host . '/' . $id . '/user/login.php';
$logout_php = $http_host . '/' . $id . '/user/logout.php';
$signup_php = $http_host . '/' . $id . '/user/signup.php';

$style_css = $http_host . '/' . $id . '/css/style.css';
