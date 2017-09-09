<?php

//セッション開始
session_start();

/*PDOを使用してDBに接続*/

$pdo = new PDO('mysql:host=localhost;dbname=welcome;charset=utf8','admin','admin');


 ?>
