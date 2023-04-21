<?php
session_start();

$_SESSION["is_login"] = false;
$_SESSION["userId"] = isset($_SESSION["userId"]) ? $_SESSION["userId"] : '';
$_SESSION["userName"] = isset($_SESSION["userName"]) ? $_SESSION["userName"] : '';

$http_host = '//' . $_SERVER['SERVER_NAME'];
$id = "pbl1"; #フォルダ名に変更する

$index_php = $http_host . '/' . $id . '/index.php';
$post_php = $http_host . '/' . $id . '/post/post.php';
$login_php = $http_host . '/' . $id . '/login/login.php';
$logout_php = $http_host . '/' . $id . '/login/logout.php';
$register_php = $http_host . '/' . $id . '/login/resister.php';

$layout_css = $http_host . '/' . $id . '/css/layout.css';
$post_css = $http_host . '/' . $id . '/css/post.css';
