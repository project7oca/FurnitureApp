<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project7";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$productId = 3;
function fetchProductData()
{
    global $conn, $productId;
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=? LIMIT 1");
    $stmt->execute([$productId]);
    $row = $stmt->fetch();
    return $row;
}
// fetchProductData();
function fetchProductComments()
{
    global $conn, $productId;
    $sth = $conn->prepare("SELECT * FROM comments WHERE product_id=?");
    $sth->execute([$productId]);
    $result = $sth->fetchAll();
    return $result;
}
if (!count(fetchProductComments()) <= 0) {
    echo "<pre>";
    var_dump(fetchProductComments());
} else {
    echo "empty";
}

function fetchUserNameFromId($userId)
{
    global $conn;
    $stmt = $conn->prepare("SELECT fullname FROM users WHERE id=? LIMIT 1");
    $stmt->execute([$userId]);
    $row = $stmt->fetch();
    return $row;
}
print_r(fetchUserNameFromId(1)["fullname"]);
