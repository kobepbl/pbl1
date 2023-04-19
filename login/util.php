<?php
    $dsn='mysql:host=localhost;dbname=login;charset=utf-8';
    $user='';
    $password='';
    $pdo=new PDO($dsn,$user,$password);

    function h($data){
        return htmlspecialchars($data,ENT_QUOTES,"UTF-8");
    }
?>