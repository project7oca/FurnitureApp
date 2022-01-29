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

if($_SERVER["REQUEST_METHOD"] == 'GET') {
      $value = $_GET["id"];
            $deleteQuery = $pdo->prepare("DELETE FROM products WHERE id='$value' ");
            $deleteQuery->execute();
            header('location: http://localhost/project7/FurnitureApp/admin/products/index.php');
}
?>