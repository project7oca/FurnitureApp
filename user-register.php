<?php
session_start();


include('./config/functions.php');
if (isLoggedIn()) {
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


    $status = "";
    $alreadyTakenAccount = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = stripslashes($_POST['fullname']); // StripsLashes for removes backslashes.
        $email = stripslashes($_POST['email']);
        $phone = stripslashes($_POST['phone']);
        $password = stripslashes($_POST['password']);
        $password2 = stripslashes($_POST['password2']);
        $encryptedPassword = md5($password);
        $userRole = 0;

        $sql_e = "SELECT * FROM users WHERE email='$email'";

        $res_e = mysqli_query($connect, $sql_e);

        // Validation for Sign up
        if (empty($fullname) || empty($email) || empty($password) || empty($phone)) {
            $status = "All fields are required";
        } else {
            if (strlen($fullname) <= 3 || strlen($fullname) >= 18 || !preg_match("/^[a-zA-Z'\s]+$/", $fullname)) {
                $status = "Username should be between 4 to 17 letters";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $status = "Please enter a valid email";
            } else if (strlen($password) <= 5 || strlen($password) >= 26) {
                $status = "Password should be between 6 to 25 letters";
            } else if ($password != $password2) {
                $status = "Passwords Dosen't match";
            } else if (mysqli_num_rows($res_e) > 0) {
                $alreadyTakenAccount = "Email already registered";
            } else {

                $sql = "INSERT INTO users (fullname, email, phone, password, userRole) VALUE (:fullname, :email, :phone, :password, :userRole)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['fullname' => $fullname, 'email' => $email, 'phone' => $phone, 'password' => $encryptedPassword, 'userRole' => $userRole]);
                header("Location: user-login.php");
            }
        }
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
                                <a href="user-register.php">
                                    <span>Sign up</span>
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
                                    <h1 class="text-center title-page">Create Account</h1>
                                    <form action="user-register.php" id="customer-form" class="js-customer-form" method="POST">
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
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" onkeyup="handleEmail()" name="email" type="email" placeholder="Email" required id="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <div class="input-group js-parent-focus">
                                                        <input class="form-control js-child-focus js-visible-password" onkeyup="lengthPsw(); matchingPsw()" name="password" type="password" placeholder="Password" required id="psw1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group js-parent-focus">
                                                    <input class="form-control js-child-focus js-visible-password" onkeyup="lengthPsw(); matchingPsw()" name="password2" type="password" placeholder="Confirm Password" required id="psw2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div>
                                                <button class="btn btn-primary" data-link-action="sign-in" type="submit" id="signupBtn">
                                                    Create Account
                                                </button>
                                            </div>
                                            <?php echo $status ?>
                                            <?php echo $alreadyTakenAccount ?>
                                            <span id="usernameErr"></span>
                                            <span id="emailErr"></span>
                                            <span id="passwordLengthErr"></span>
                                            <span id="ConfirmPasswordErr"></span>
                                        </div>
                                        <a href="user-login.php">Already Have Account? Login</a>
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