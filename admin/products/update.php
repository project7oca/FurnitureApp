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
$connection = mysqli_connect("localhost", "root", "", "project7");

if (isset($_POST['update'])) {

    $id = $_POST['edit_id'];
    $product_name = $_POST['product_name-edit'];
    $product_price = $_POST['product_price-edit'];
    $product_desc = $_POST['product_desc-edit'];
    $discount = $_POST['discount-edit'];
    $product_image = $_POST['product_image-edit'];
    $category_id = $_POST['category_id-edit'];
    $sql = "UPDATE products SET product_name='$product_name', product_price='$product_price',product_desc='$product_desc'
    , discount='$discount', product_image='$product_image' , category_id='$category_id' WHERE id='$id'";
    $query = $connection->query($sql);
    header('location: index.php');
}
