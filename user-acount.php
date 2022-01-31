<?php
session_start();

include('./config/functions.php');
if (!isLoggedIn()) {
 header('location: user-login');
}
$currentUserId = $_SESSION["userData"]["id"];
$servername = "localhost";
$username = "root";
$password = "";

try {
 $conn = new PDO("mysql:host=$servername;dbname=project7", $username, $password);
 // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- user-acount11:10-->

<head>
 <!-- Basic Page Needs -->
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Furnitica - Minimalist Furniture HTML Template</title>

 <meta name="keywords" content="Furniture, Decor, Interior">
 <meta name="description" content="Furnitica - Minimalist Furniture HTML Template">
 <meta name="author" content="tivatheme">

 <!-- Mobile Meta -->
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

 <!-- libs CSS -->
 <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="libs/nivo-slider/css/nivo-slider.css">
 <link rel="stylesheet" href="libs/nivo-slider/css/animate.css">
 <link rel="stylesheet" href="libs/nivo-slider/css/style.css">
 <link rel="stylesheet" href="libs/font-material/css/material-design-iconic-font.min.css">
 <link rel="stylesheet" href="libs/slider-range/css/jslider.css">
 <link rel="stylesheet" href="libs/owl-carousel/assets/owl.carousel.min.css">
 <link rel="stylesheet" href="libs/slick-slider/css/slick.css">
 <link rel="stylesheet" href="libs/slick-slider/css/slick-theme.css">

 <!-- Template CSS -->
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/reponsive.css">
</head>

<body class="user-acount">

 <?php include_once("./navbar.php"); ?>


 <!-- main content -->
 <div class="main-content">
  <div class="wrap-banner">

   <!-- breadcrumb -->
   <nav class="breadcrumb-bg">
    <div class="container no-index">
     <div class="breadcrumb">
      <ol>
       <li>
        <a href=".">
         <span>Home</span>
        </a>
       </li>
       <li>
        <a href="user-acount.php">
         <span>My Account</span>
        </a>
       </li>
      </ol>
     </div>
    </div>
   </nav>

   <div class="acount head-acount">
    <div class="container">
     <div id="main">
      <h1 class="title-page">My Account</h1>
      <div class="content" id="block-history">
       <table class="std table">
        <tbody>
         <tr>
          <th class="first_item">My Name :</th>
          <td><?php echo $_SESSION['userData']['fullname'] ?></td>
         </tr>
         <tr>
          <th class="first_item">Email :</th>
          <td><?php echo $_SESSION['userData']['email']  ?></td>
         </tr>
         <tr>
          <th class="first_item">Phone :</th>
          <td><?php echo $_SESSION['userData']['phone']  ?></td>
         </tr>
        </tbody>
       </table>

      </div>
      <a href="edit-profile.php" class="text-light">
       <button class="btn btn-primary" data-link-action="sign-in" type="submit">
        Edit Profile
       </button>
      </a>
     </div>
    </div>
    <!-- ************************************** -->
    <div class="container">
     <div id="main">
      <h1 class="title-page">Order History</h1>
      <div class="content" id="block-history">
       <table class="std table">

        <thead>
         <th>Order Number</th>
         <th>Date & Time</th>
         <th>Address</th>
         <th>Total price</th>
        </thead>
        <tbody>
         <?php
         $orders = $conn->prepare("SELECT * FROM orders WHERE user_id=$currentUserId");
         $orders->execute();
         foreach ($orders as $order) {
         ?>
          <tr>
           <td><?= $order["id"] ?></td>
           <td><?= $order["date"] ?></td>
           <td><?= $order["address"] ?></td>
           <td><?= $order["totalprice"] ?> Jd</td>
          </tr>
         <?php
         }
         ?>
        </tbody>
       </table>

      </div>

     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- footer -->
 <?php include_once("./footer.php") ?>

 <!-- back top top -->
 <?php include_once("./backToTopBtn.php") ?>


 <!-- menu mobie right -->
 <?php include_once("./menuMobileRight.php") ?>

 <!-- Vendor JS -->
 <script src="libs/jquery/jquery.min.js"></script>
 <script src="libs/popper/popper.min.js"></script>
 <script src="libs/bootstrap/js/bootstrap.min.js"></script>
 <script src="libs/nivo-slider/js/jquery.nivo.slider.js"></script>
 <script src="libs/owl-carousel/owl.carousel.min.js"></script>
 <script src="libs/slider-range/js/tmpl.js"></script>
 <script src="libs/slider-range/js/jquery.dependClass-0.1.js"></script>
 <script src="libs/slider-range/js/draggable-0.1.js"></script>
 <script src="libs/slider-range/js/jquery.slider.js"></script>
 <script src="libs/slick-slider/js/slick.min.js"></script>

 <!-- Template JS -->
 <script src="js/theme.js"></script>
</body>


<!-- user-acount11:10-->

</html>