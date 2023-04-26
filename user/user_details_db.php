<?php
$sql="select user_id from current_users where mail=?";
$user_id = $this->query($sql, [$mail]);

$sql="select *from article_list where user_id=?";
$stmt = $this->query($sql, [$user_id]);
$result = $stmt->fetchAll();