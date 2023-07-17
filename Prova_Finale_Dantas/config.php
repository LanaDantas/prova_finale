<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mostre');
define('DB_DSN', "mysql:host=".DB_HOST.";dbname=".DB_NAME);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prova_finale"; // nome del db

$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("An error ocurred during connection try: " . $e->getMessage());
}



?>