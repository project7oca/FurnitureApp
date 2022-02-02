<?php
session_start();

include('../../config/functions.php');
if (!isLoggedIn()) {
  header('location: ../index.php');
}
if (!isAdmin()) {
  header('location: ../index.php');
}
function getNameFromId($selectedField, $tableName, $whereValue)
{
  $connection = mysqli_connect("localhost", "root", "", "project7");
  $query = "SELECT $selectedField FROM $tableName WHERE id='$whereValue'";
  $query_run = mysqli_query($connection, $query);
  if (mysqli_num_rows($query_run) > 0) {
    return mysqli_fetch_assoc($query_run)["$selectedField"];
  } else {
    return "name";
  }
  //  echo getNameFromId("fullname", "users", $row['user_id']); 
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

    <!-- DONT TOUCH THIS CODE -->


    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <a href="#">
          <img src="../images/logo.png" alt="Cool Admin" />
        </a>
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
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

    <!-- PAGE CONTAINER-->
    <div class="page-container">

      <?php include_once("../adminNav.php") ?>

      <!-- DONT TOUCH THIS CODE -->
      <?php
      $connection = mysqli_connect("localhost", "root", "", "project7");
      $query = "SELECT * FROM orders";
      $query_run = mysqli_query($connection, $query);
      ?>
      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
              <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                  <table class="table table-borderless table-data3">

                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>User</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                      $counter = 1;

                      if (mysqli_num_rows($query_run) > 0)
                        while ($row = mysqli_fetch_assoc($query_run)) {
                      ?>
                        <tr>
                          <td><?php echo $counter;
                              $counter++ ?> </td>
                          <td><?php echo $row['date']; ?> </td>
                          <td><?php echo $row['address']; ?> </td>
                          <td><?php echo $row['totalprice']; ?> </td>
                          <td><?php echo getNameFromId("fullname", "users", $row['user_id']); ?> </td>
                        </tr>
                      <?php
                        }
                      else {
                        echo "No Record Found";
                      }
                      ?>


                    </tbody>
                  </table>
                </div>
                <!-- END DATA TABLE-->
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="copyright">
                <p>Copyright © 2021 Furnitica. All rights reserved.</p>

                </div>
              </div>
            </div>

          </div>
        </div>
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