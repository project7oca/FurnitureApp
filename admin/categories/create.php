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
                    $servername = "localhost";
                    $dbname = "project7";
                    $nameSql = "root";
                    $passSql = "";
                    // $conn = mysqli_connect($server, $username, $password, $dbname) ;
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $nameSql, $passSql);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    if (isset($_POST['category_name'])) {
                        if (!empty($_POST['category_name'])) {

                            $category_name = $_POST['category_name'];

                            $query = "INSERT INTO categories(`category_name`) VALUES ('$category_name')";
                            $conn->exec($query);

                            echo 'good';
                            header("Location: index.php");
                        }
                    }
                    //   echo  '<button><a href="index.php">back</button>';
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
        <?php include_once("../sidebar.php")?>
        <!-- END MENU SIDEBAR-->

        <div class="page-container">
            <?php include_once("../adminNav.php") ?>

            <div class="main-content">


                <!-- Edit from here -->
                <h3 class="ml-3">Add Category</h3>
                <!-- Replace -->


                <!-- USER DATA-->
                <div class="card shadow mb-4 mt-5" style="max-width: 55%; display: block; margin: 0 auto;">

                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary"> Add Category </h6>
                    </div>
                    <div class="col-lg-13">
                        <div class="card">

                            <div class="card-body card-block">
                                <form action="" method="post" class="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">category name</div>
                                            <input type="text" id="category_name" name="category_name" class="form-control">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions form-group">
                                        <button type="submit" value="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </form>
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