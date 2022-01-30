<?php
session_start();

include('./config/functions.php');
if (isLoggedIn()) {
    header('location: user-acount.php');
}
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- user-login11:10-->

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

<body class="user-login blog">

    <?php

    $connect = mysqli_connect("localhost", "root", "", "project7");

    $status = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = stripslashes($_POST['email']);
        $password = stripslashes($_POST['password']);
        $encryptedPassword = md5($password);

        if (empty($email) || empty($password)) {
            $status = "All fields are required";
        } else {
            $email = mysqli_real_escape_string($connect, $_POST["email"]);
            $password = mysqli_real_escape_string($connect, isset($_POST["password"]));

            $login = "SELECT * FROM users WHERE email = '$email' AND password = '$encryptedPassword' LIMIT 1";

            $result = mysqli_query($connect, $login);

            $loggedUser = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) == 1) {

                if ($loggedUser['userRole'] == 1) {

                    $_SESSION['userRole'] = true;
                    $_SESSION['isLogin'] = "true";
                    $_SESSION['name'] = $loggedUser['fullname'];
                    $_SESSION['email'] = $loggedUser['email'];

                    header("location: ./admin");

                } else {
                    $_SESSION['isLogin'] = "true";

                    // ! Users Array Data
                    $_SESSION['userData'] = $loggedUser;


                    $_SESSION['name'] = $loggedUser['fullname'];
                    $_SESSION['email'] = $loggedUser['email'];
                    $_SESSION['phone'] = $loggedUser['phone'];
                    header("location: ./index.php"); 
                }
            } else {
                $status = "Email or Password is Incorrect";
            }
        }
    }
    ?>


        <!-- header desktop -->
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
                                <a href="#">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Login</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

        </div>

        <!-- main -->
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
                    <div class="container">
                        <h1 class="text-center title-page">Log In</h1>
                        <div class="login-form">
                            <form id="customer-form" action="user-login.php" method="POST">
                                <div>
                                    <input type="hidden" name="back" value="my-account">
                                    <div class="form-group no-gutters">
                                        <input class="form-control" name="email" type="email" placeholder=" Email" required>
                                    </div>
                                    <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" name="password" type="password" value="" placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="1">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                            Sign in
                                        </button>
                                    </div>
                                    <?php echo $status ?>
                                </div>
                                <div class="justMsg" style="display: block; margin: 0 auto; text-align: center;">
                                    <a href="user-register.php">Don't have an account? Sign up </a>
                                </div>
                            </form>
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


<!-- user-login11:10-->

</html>