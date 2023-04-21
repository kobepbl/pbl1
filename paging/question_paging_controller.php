<?php
//define('MAX', '10');
$count = count($questions);
$max_page = ceil($count / MAX);

if (!isset($_GET['page_id'])) {
  $page = 1;
} else {
  $page = $_GET['page_id'];
}

$start_no = ($page - 1) * MAX;

$disp_data2 = array_slice($questions, $start_no, MAX, true);

if ($page == 1 || $page == $max_page) {
  $range = 4;
} elseif ($page == 2 || $page == $max_page - 1) {
  $range = 3;
} else {
  $range = 2;
}

$from_record = ($page - 1) * 10 + 1;

if ($page == $max_page && $count % 10 !== 0) {
  $to_record = ($page - 1) * 10 + $count % 10;
} else {
  $to_record = $page * 10;
}
