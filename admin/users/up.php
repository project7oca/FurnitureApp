<?php
session_start();

include('../../config/functions.php');
if (!isLoggedIn()) {
    header('location: ../index.php');
}
if (!isAdmin()) {
    header('location: ../index.php');
}
?>
<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "project7";

try {
    $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    echo "DB Connection Failed" . $e->getMessage();
}

$connect = mysqli_connect("localhost", "root", "", "project7");

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $value = $_GET["id"];
    try {

        $deleteQuery = $pdo->prepare("DELETE FROM users WHERE id='$value' ");
        $deleteQuery->execute();
        header('location: index.php');
    } catch (PDOException $e) {
        header('location: index.php?error=1');
    }
}
?>