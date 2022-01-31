<?php
session_start();
include('../../config/functions.php');
if (!isLoggedIn()) {
  header('location: ../index.php');
}
if (!isAdmin()) {
  header('location: ../index.php');
}

if (isset($_GET["error"])) {
  echo "<script>alert('This user has a comment or order');</script>";
  unset($_GET["error"]);
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
  <style>
    a {
      color: black;
    }
  </style>
</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
            <a class="logo" href="index.html">
              <img src="images/icon/logo.png" alt="CoolAdmin" />
            </a>
            <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
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
              </ul>
            </li>
            <li>
              <a href="chart.html">
                <i class="fas fa-chart-bar"></i>Charts</a>
            </li>
            <li>
              <a href="table.html">
                <i class="fas fa-table"></i>Tables</a>
            </li>
            <li>
              <a href="form.html">
                <i class="far fa-check-square"></i>Forms</a>
            </li>
            <li>
              <a href="calendar.html">
                <i class="fas fa-calendar-alt"></i>Calendar</a>
            </li>
            <li>
              <a href="map.html">
                <i class="fas fa-map-marker-alt"></i>Maps</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-copy"></i>Pages</a>
              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                <li>
                  <a href="login.html">Login</a>
                </li>
                <li>
                  <a href="register.html">Register</a>
                </li>
                <li>
                  <a href="forget-pass.html">Forget Password</a>
                </li>
              </ul>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-desktop"></i>UI Elements</a>
              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                <li>
                  <a href="button.html">Button</a>
                </li>
                <li>
                  <a href="badge.html">Badges</a>
                </li>
                <li>
                  <a href="tab.html">Tabs</a>
                </li>
                <li>
                  <a href="card.html">Cards</a>
                </li>
                <li>
                  <a href="alert.html">Alerts</a>
                </li>
                <li>
                  <a href="progress-bar.html">Progress Bars</a>
                </li>
                <li>
                  <a href="modal.html">Modals</a>
                </li>
                <li>
                  <a href="switch.html">Switchs</a>
                </li>
                <li>
                  <a href="grid.html">Grids</a>
                </li>
                <li>
                  <a href="fontawesome.html">Fontawesome Icon</a>
                </li>
                <li>
                  <a href="typo.html">Typography</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- END HEADER MOBILE-->

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

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="table-data__tool-right">
              <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <a href="create.php">add item</a>
                <i class="zmdi zmdi-plus"> </i></button>
              <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <div class="dropDownSelect2"></div>
              </div>
              <?php
              $connection = mysqli_connect("localhost", "root", "", "project7");
              $query = "SELECT * FROM users";
              $query_run = mysqli_query($connection, $query);
              ?>
              <div class="row m-t-30">
                <div class="col-md-12">
                  <!-- DATA TABLE-->
                  <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> full name </th>
                          <th> email </th>
                          <th> phone </th>
                          <th> password </th>
                          <th> userRole </th>
                          <th>EDIT </th>
                          <th>DELETE </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        if (mysqli_num_rows($query_run) > 0)
                          while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                          <tr>
                            <td><?php echo $row['id']; ?> </td>
                            <td><?php echo $row['fullname']; ?> </td>
                            <td><?php echo $row['email']; ?> </td>
                            <td><?php echo $row['phone']; ?> </td>
                            <td><?php echo $row['password']; ?> </td>
                            <td><?php echo $row['userRole'] == 1 ? "admin" : "user"; ?> </td>
                            <td>
                              <?php if ($row['userRole'] != 1) { ?>
                                <form action="delete.php" method="POST">
                                  <input type="hidden" name="edit" value="<?php echo $row['id']; ?>">
                                  <button type="submit" class="btn btn-warning"> EDIT</button>
                                </form>
                              <?php
                              }
                              ?>
                            </td>
                            <td>
                              <?php if ($row['userRole'] != 1) {
                              ?>
                                <form action="index.php" method="POST">
                                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="delete_btn" class="btn btn-danger">
                                    <a href='./up.php?id=<?php echo $row['id']; ?>'> Delete</a></button>
                                </form>
                              <?php

                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                          }
                        else {
                          echo "No Record Found";
                        }
                        ?>
                        <?php
                        if (isset($_POST['delete_btn'])) {

                          $id = $_POST['delete_id'];
                          $query = "DELETE FROM users WHERE id =$id";
                          $query_run = mysqli_query($connection, $query);


                          header("Location: index.php");
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
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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