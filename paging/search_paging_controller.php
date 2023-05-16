<?php
define('MAX', '20');
$count = count($search_articles);
$max_page = ceil($count / MAX);

if (!isset($_GET['a_page_id'])) {
  $page = 1;
} else {
  $page = $_GET['a_page_id'];
}
$word = $_GET['q'];

$start_no = ($page - 1) * MAX;

$article_data = array_slice($search_articles, $start_no, MAX, true);

if ($page == 1 || $page == $max_page) {
  $range = 4;
} elseif ($page == 2 || $page == $max_page - 1) {
  $range = 3;
} else {
  $range = 2;
}

$from_record = ($page - 1) * 20 + 1;

if ($page == $max_page && $count % 20 !== 0) {
  $to_record = ($page - 1) * 20 + $count % 20;
} else {
  $to_record = $page * 20;
}

define('max', '20');
$q_count = count($search_questions);
$q_max_page = ceil($q_count / max);

if (!isset($_GET['q_page_id'])) {
  $q_page = 1;
} else {
  $q_page = $_GET['q_page_id'];
}

$q_start_no = ($q_page - 1) * max;

$question_data = array_slice($search_questions, $q_start_no, MAX, true);

if ($q_page == 1 || $q_page == $q_max_page) {
  $q_range = 4;
} elseif ($q_page == 2 || $q_page == $q_max_page - 1) {
  $q_range = 3;
} else {
  $q_range = 2;
}

$q_from_record = ($q_page - 1) * 20 + 1;

if ($q_page == $q_max_page && $q_count % 20 !== 0) {
  $q_to_record = ($q_page - 1) * 20 + $q_count % 20;
} else {
  $q_to_record = $q_page * 20;
}
