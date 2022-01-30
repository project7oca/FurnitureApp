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
<!-- Fontfaces CSS-->
<link href="css/font-face.css" rel="stylesheet" media="all">
<link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<!-- Vendor CSS-->
<link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
<link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
<link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
<link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
<link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
<link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="css/theme.css" rel="stylesheet" media="all">

<!-- USER DATA-->
<div class="user-data m-b-30">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">product_name:</div>
                            <input type="text" id="product_name" name="product_name" class="form-control">
                            <div class="input-group-addon">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">product_price:</div>
                            <input type="number" id="product_price" name="product_price" class="form-control">
                            <div class="input-group-addon">

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">product_desc:</div>
                            <input type="text" id="product_desc" name="product_desc" class="form-control">
                            <div class="input-group-addon">

                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">discount:</div>
                            <input type="number" id="discount" name="discount" class="form-control">
                            <div class="input-group-addon">

                            </div>



                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group-addon">stock:</div>
                        <input type="number" id="stock" name="stock" class="form-control">
                        <div class="input-group-addon">

                        </div>
                    </div>
            </div>
            <div class="input-group">
                <div class="input-group-addon">product_image:</div>
                <input type="text" id="product_image" name="product_image" class="form-control">
                <div class="input-group-addon">

                </div>
            </div>
            <div class='form-group'>
                <label> categories:</label>
                <select name='category_id' class='form-control' required>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=project7", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                    $sql = "SELECT * FROM categories";
                    $data = $conn->query($sql);
                    $data = $data->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row) {
                        echo "<option value='{$row['id']}'>{$row['category_name']}</option>";
                    }

                    ?>
            </div>

            </select>
        </div>
    </div>
    <div class="form-actions form-group">
        <button type="submit" value="submit" class="btn btn-primary btn-sm">submit </button>

    </div>
    </form>
</div>
</div>
</div>
<?php


if (isset($_POST['product_name'])) {
    echo $_POST['product_name'] . "<br/>";
    echo $_POST['product_price'] . "<br/>";
    echo $_POST['product_desc'] . "<br/>";
    echo $_POST['discount'] . "<br/>";
    echo $_POST['stock'] . "<br/>";
    echo $_POST['product_image'] . "<br/>";
    echo $_POST['category_id'] . "<br/>";
    if (!empty($_POST['product_name']) && !strlen($_POST['product_price']) == 0 && !empty($_POST['product_desc']) && !strlen($_POST['discount']) == 0 && !strlen($_POST['stock']) == 0 && !empty($_POST['product_image']) && !empty($_POST['category_id'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $discount = $_POST['discount'];
        $stock = $_POST['stock'];
        $product_image = $_POST['product_image'];
        $category_id = $_POST['category_id'];
        $query = "INSERT INTO products(product_name, product_price, product_desc, discount, stock, product_image, category_id) VALUES (:product_name,:product_price,:product_desc,:discount, :stock,:product_image, :category_id)";
        $stmt = $conn->prepare($query);
        $stmt->execute(['product_name' => $product_name, 'product_price' => $product_price, 'product_desc' => $product_desc, 'discount' => $discount, 'stock' => $stock, 'product_image' => $product_image, 'category_id' => $category_id]);
        echo "<script>
        window.location.href = 'index.php';
    </script>";
    }
}
?>
<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>