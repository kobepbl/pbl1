<?php
define('max', '20');
$q_count = count($questions);
$q_max_page = ceil($q_count / max);

if (!isset($_GET['q_page_id'])) {
  $q_page = 1;
} else {
  $q_page = $_GET['q_page_id'];
}

$q_start_no = ($q_page - 1) * max;

$question_data = array_slice($questions, $q_start_no, MAX, true);

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
