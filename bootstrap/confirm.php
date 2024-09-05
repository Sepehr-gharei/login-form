<?php
$db_host = 'localhost';
$db_name = 'login';
$db_user = 'root';
$db_pass = '';
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    // echo "Connection to database";
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
    die;
}
