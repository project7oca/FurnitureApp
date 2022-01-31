<?php
session_start();


include('./config/functions.php');
if (!isLoggedIn()) {
   header('location: user-acount.php');
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

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

<body class="user-register blog">


   <?php
   // Database information
   $dbHost = "localhost";
   $dbUser = "root";
   $dbPassword = "";
   $dbName = "project7";

   try {
      $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
      $pdo = new PDO($dsn, $dbUser, $dbPassword);
   } catch (PDOException $e) {
      echo "DB Connection Failed" . $e->getMessage();
   }

   $connect = mysqli_connect("localhost", "root", "", "project7");


   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $fullname = stripslashes($_POST['fullname']); // StripsLashes for removes backslashes.
      $phone = stripslashes($_POST['phone']);
      $userID = $_SESSION['userData']['id'];
      
      
      
      $updateSql = "UPDATE users SET fullname='$fullname', phone='$phone' WHERE id=$userID";
      $stmt = $pdo->prepare($updateSql);
      $stmt->execute();
      
      $selectUsers = "SELECT * FROM users WHERE fullname = '$fullname'";
      $result = mysqli_query($connect, $selectUsers);

      $loggedUser = mysqli_fetch_assoc($result);


      $_SESSION['userData'] = $loggedUser;

      

      header("location: user-acount.php");

      

   } else {
      $s;
   }
   ?>

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
                     <li>
                        <a href="edit-profile.php">
                           <span>Edit Profile</span>
                        </a>
                     </li>
                  </ol>
               </div>
            </div>
         </nav>
      </div>

      <!-- main -->
      <div id="wrapper-site">
         <div class="container">
            <div class="row">
               <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                  <div id="main">
                     <div id="content" class="page-content">
                        <div class="register-form text-center">
                           <h1 class="text-center title-page">Edit Profile</h1>
                           <form action="edit-profile.php" id="customer-form" class="js-customer-form" method="POST">
                              <div>
                                 <div class="form-group">
                                    <div>
                                       <input class="form-control" onchange="handleInputErr()" name="fullname" type="text" placeholder="Full name" required id="fullname">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div>
                                       <input class="form-control" name="phone" type="tel" placeholder="Phone number" minlength="9" maxlength="13" required id="phone">
                                    </div>
                                 </div>
                                 

                              </div>
                              <div class="clearfix">
                                 <div>
                                    <button class="btn btn-primary" data-link-action="sign-in" type="submit" id="signupBtn">
                                       Edit Profile
                                    </button>
                                 </div>

                              </div>
                           </form>
                        </div>
                     </div>
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
   <script src="./config/functions.js"></script>
</body>


<!-- user-register11:10-->

</html>