<?php
session_start();
// unset($_SESSION['add']);
// echo "<h1>".var_dump($_SESSION['add'])."</h1>";

$servername = "localhost";
$username = "root";
$dbname = "project7";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (isset($_GET['id'])) {
  $flag = false;
  if (isset($_SESSION['cart'])) {
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
      if ($_SESSION['cart'][$i]['product_id'] == $_GET['id'] && ($_GET['name'] == 'add'
        || (($_GET['name'] == 'increase' || $_GET['addFromList']) || $_GET['name'] == "addFromDetail"))) {
        $_SESSION['cart'][$i]["quantity"] += 1;
        $flag = true;
      } else if (
        $_SESSION['cart'][$i]['product_id'] == $_GET['id'] && $_GET['name'] == 'decrease'
        && $_SESSION['cart'][$i]["quantity"] >= 2
      ) {
        $_SESSION['cart'][$i]["quantity"] -= 1;
        $flag = true;
      } else if ($_SESSION['cart'][$i]['product_id'] == $_GET['id'] && ($_GET['name'] == 'decrease'
        || ($_SESSION['cart'][$i]["quantity"] = 1 && $_GET['name'] == 'remove'))) {
        array_splice($_SESSION['cart'], $i, 1);
        $flag = true;
      }
    }
  }
  if (!$flag) {
    $addToCart = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$addToCart";
    $result = $conn->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['cart'][] = [
      'product_id' => $row['id'], 'product_name' => $row['product_name'],
      'product_price' => $row['product_price'],
      'product_image' => $row['product_image'], 'quantity' => 1
    ];
  }
  if ($_GET['name'] == 'decrease' || $_GET['name'] == 'increase') {
    header('Location:product-cart.php');
  } else if ($_GET['name'] == 'remove') {
    header('Location:product-cart.php');
  } else if ($_GET['name'] == 'addFromDetail') {
    header('Location:product-detail.php?id='.$_GET["id"].'');
  } else {
    header('Location:shop.php');
  }
}
