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
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tables</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstr../ap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Vendor ../CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../images/logo.png" alt=" Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <!-- <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
              <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                  <a href="index.html">Dashboard 1</a>
                </li>
                <li>
                  <a href="index2.html">Dashboard 2</a>
                </li>
                <li>
                  <a href="index3.html">Dashboard 3</a>
                </li>
                <li>
                  <a href="index4.html">Dashboard 4</a>
                </li>
              </ul> -->
                        </li>
                        <li>
                            <a href="../index.php">
                                <i class="fas fa-chart-bar"></i>main</a>
                        </li>
                        <li>
                            <a href="../categories/index.php">
                                <i class="fas fa-chart-bar"></i>categories</a>
                        </li>
                        <li class="active">
                            <a href="../users/index.php">
                                <i class="fas fa-table"></i>users</a>
                        </li>
                        <li>
                            <a href="../comments/index.php">
                                <i class="far fa-check-square"></i>comments</a>
                        </li>
                        <li>
                            <a href="../orders/index.php">
                                <i class="fas fa-calendar-alt"></i>orders</a>
                        </li>
                        <li>
                            <a href="../products/index.php">
                                <i class="fas fa-map-marker-alt"></i>products</a>
                        </li>

            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <div class="page-container">
            <?php include_once("../adminNav.php") ?>

            <div class="main-content">







                <!-- Edit from here -->
                <h3 class="ml-3">Add Products</h3>
                <!-- Replace -->
                <!-- USER DATA-->
                <div class="card shadow mb-4 mt-5" style="max-width: 80%; display: block; margin: 0 auto;">
                    <div class="user-data m-b-20">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Example Form</div>
                                <div class="card-body card-block">
                                    <form action="" method="post" class="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">product_name:</div>
                                                <input type="text" id="product_name" name="product_name" class="form-control">
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">product_price:</div>
                                                <input type="number" id="product_price" name="product_price" class="form-control">
                                                <div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">product_desc:</div>
                                                <input type="text" id="product_desc" name="product_desc" class="form-control">
                                                <div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">discount:</div>
                                                <input type="number" id="discount" name="discount" class="form-control">
                                                <div>

                                                </div>



                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-addon">stock:</div>
                                            <input type="number" id="stock" name="stock" class="form-control">
                                            <div>

                                            </div>
                                        </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon">product_image:</div>
                                    <input type="text" id="product_image" name="product_image" class="form-control">
                                    <div class="">

                                    </div>
                                </div>
                                <div class='form-group'>
                                    <div class="input-group-addon">categories:</div>
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
        </div>
    </div>
    <!-- Stop here -->






    </div>
    </div>
    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

    <script type="text/javascript">
        (function() {
            window['__CF$cv$params'] = {
                r: '6d5433f31bc75b80',
                m: 'gv7H83Is4o6s8VNM6bqZnmA010KLqb4m8li2xnRd6n0-1643477578-0-Ac9gKmPCbCdl+MP0X9O2Z1ZwwEnYY0m9PzNaS4ndVS3GczSN3ouOYu92xM3rVC79uhk4dzLRcUSuwj3y0ulcXSYExXsfV3PKUOingfMAsyfqTEnJ1o6pvlezZBJYCC87Nx/j/2WkNz7u4GJom/gRcgWczHzriYPofBPQexf5xA16xa0dGEs2LOOIRVl37clACQ==',
                s: [0x196ccbd686, 0xb55c502a9c],
            }
        })();
    </script>
</body>

</html>
<!-- end document-->