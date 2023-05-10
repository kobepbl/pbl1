<?php

require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../classes/user.php';
$article_id =(int) 53;
$iine = new Iine();
$result = $iine->Iineupdate($article_id);


if ($result !== '') {
    header('Location: iine.php');
    exit();
}
header("Location:./iine.php");

require_once __DIR__ . '/../footer.php';
?>