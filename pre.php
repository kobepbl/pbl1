<?php
if (!isset($_SESSION)) {
  session_start();
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (empty($name)) {
  if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    $user_id = $_COOKIE['user_id'];
  } else {
    $name = 'no_login';
    $user_id = 'no_login';
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
$question_post_php = $http_host . '/' . $id . '/insert_question/question_post.php';
$post_php = $http_host . '/' . $id . '/post/post.php';
$login_php = $http_host . '/' . $id . '/login/login.php';
$logout_php = $http_host . '/' . $id . '/login/logout.php';
$register_php = $http_host . '/' . $id . '/login/register.php';
$user_php = $http_host . '/' . $id . '/user/user_show.php';
$mypage_php = $http_host . '/' . $id . '/user/user_details.php';
$article_show_php = $http_host . '/' . $id . '/article/article_show.php';
$question_show_php = $http_host . '/' . $id . '/question/question_show.php';
$search_php = $http_host . '/' . $id . '/search/search_result.php';
$tag_search_php = $http_host . '/' . $id . '/search/tag_search_result.php';
$tag_q_search_php = $http_host . '/' . $id . '/search/tag_q_search_result.php';
$no_post_js = $http_host . '/' . $id . '/js/no_continue_post.js';
$no_comment_js = $http_host . '/' . $id . '/js/no_continue_comment.js';
$no_anser_js = $http_host . '/' . $id . '/js/no_anser.js';






$retop_css = $http_host . '/' . $id . '/css/retop.css';
$layout_css = $http_host . '/' . $id . '/css/layout.css';
$post_css = $http_host . '/' . $id . '/css/post.css';
$login_css = $http_host . '/' . $id . '/css/login.css';
$article_post_css = $http_host . '/' . $id . '/css/article_post.css';
$logo_img = $http_host . '/' . $id . '/img/pbl1_logo_02.png';
$userpage_css = $http_host . '/' . $id . '/css/userpage.css';
$update_css = $http_host . '/' . $id . '/css/update.css';
$button_css = $http_host . '/' . $id . '/css/button.css';
$icon_css = $http_host . '/' . $id . '/css/.css';
