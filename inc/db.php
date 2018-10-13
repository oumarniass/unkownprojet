<?php

 $pdo = new PDO('mysql:dbname=user_db;host=localhost', 'root', 'oumarsow');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
