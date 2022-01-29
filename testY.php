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

$productId = 4;
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
function calculateProductRate()
{
    $allComments = fetchProductComments();
    if (!count($allComments) <= 0) {
        $sumOfStars = 0;
        $calculatedReviewsCounter = 0;
        foreach ($allComments as $comment) {
            if ($comment['stars']) {
                $sumOfStars += $comment['stars'];
                $calculatedReviewsCounter++;
            }
        }
        echo $sumOfStars > 0 ? $sumOfStars / $calculatedReviewsCounter : "no reviews";
    } else {
        echo "no reviews";
    }
}
calculateProductRate();
function fetchUserNameFromId($userId)
{
    global $conn;
    $stmt = $conn->prepare("SELECT fullname FROM users WHERE id=? LIMIT 1");
    $stmt->execute([$userId]);
    $row = $stmt->fetch();
    return $row;
}
// print_r(fetchUserNameFromId(1)["fullname"]);


// function calculateProductRate()
// {
//     global $conn, $productId;
//     $sth = $conn->prepare("SELECT * FROM comments WHERE product_id=?");
//     $sth->execute([1]);
//     $result = $sth->fetchAll();
//     return $result;
// }
// echo "<pre>";

// var_dump(calculateProductRate()[4]["stars"]);
