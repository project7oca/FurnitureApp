<?php
session_start();
include('./config/functions.php');
if (!isLoggedIn()) {
    header('location: index.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project7";

try {
    $conn = new PDO("mysql:host=$servername;dbname=project7", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_SESSION["cart"])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = "SELECT * FROM users WHERE id=1";
        $result =  $conn->query($data);
        $row  = $result->fetch(PDO::FETCH_ASSOC);
    }
    if (
        $_SERVER["REQUEST_METHOD"] == "POST"
    ) {
        $lastIdStmt = $conn->prepare("SELECT id FROM orders ORDER BY id DESC LIMIT 1");
        $lastIdStmt->execute();
        $lastId = $lastIdStmt->fetch()["id"];
        lastOrder($lastId + 1);
    }
} else {
    header("location:./index.php");
}
function lastOrder($id)
{
    global $conn;
    $checkOutOfStock = false;
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        $product_id = $_SESSION['cart'][$i]['product_id'];
        $quantity = $_SESSION['cart'][$i]['quantity'];

        $PrevStockSelectStmt = $conn->prepare("SELECT stock FROM products WHERE id=? LIMIT 1");
        $PrevStockSelectStmt->execute([$product_id]);
        $row = $PrevStockSelectStmt->fetch();
        $prevStock = $row["stock"];
        $newStock = $prevStock - $quantity;
        if ($newStock < 0) {
            $checkOutOfStock = true;
        }
    }
    if ($checkOutOfStock == false) {
        $address = $_POST['address'];
        $sql = "INSERT INTO orders (address,totalprice,user_id) VALUES ('$address',10,1)";
        $conn->exec($sql);
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $product_id = $_SESSION['cart'][$i]['product_id'];
            $quantity = $_SESSION['cart'][$i]['quantity'];
            $PrevStockSelectStmt = $conn->prepare("SELECT stock FROM products WHERE id=? LIMIT 1");
            $PrevStockSelectStmt->execute([$product_id]);
            $row = $PrevStockSelectStmt->fetch();
            $prevStock = $row["stock"];
            $newStock = $prevStock - $quantity;
            $stmt = "UPDATE products SET stock=$newStock WHERE id = '$product_id'";

            $sql = "INSERT INTO `orders_products` (order_id,product_id,quantity) VALUES ('$id','$product_id',$quantity)";
            $conn->exec($sql);
            $conn->exec($stmt);
        }
        unset($_SESSION['cart']);
        $_SESSION["successMessage"] = "hoooray";
        header("location:./index.php");
    } else {
        echo '<script>alert("there\'s an item out of stock")</script>';
    }
}


?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- product-checkout07:12-->

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

<body class="product-checkout checkout-cart">
    <?php include_once("./navbar.php"); ?>

    <!-- main content -->
    <div id="checkout" class="main-content">
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
                                    <span>Checkout</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

            <!-- main -->
            <div id="wrapper-site">
                <div class="container">
                    <div class="row">
                        <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                            <div id="main">
                                <div class="cart-grid row">
                                    <div class="col-md-9 check-info">
                                        <div class="checkout-personal-step">
                                            <h3 class="step-title h3 info">
                                                <span class="step-number">1</span>Order details
                                            </h3>
                                        </div>
                                        <div class="content">
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active show" id="checkout-guest-form" role="tabpanel">
                                                    <form action="#" id="customer-form" class="js-customer-form" method="post">
                                                        <div>
                                                            <input type="hidden" name="id_customer" value="">
                                                            <div class="form-group row">
                                                                <input class="form-control" name="fullname" type="text" placeholder="Full name" value='<?php echo (isset($row['fullname']) ? $row['fullname'] : ''); ?>' disabled>
                                                            </div>
                                                            <div class="form-group row">
                                                                <input class="form-control" name="email" type="email" placeholder="Email" value='<?php echo (isset($row['email']) ? $row['email'] : ''); ?>' disabled>
                                                            </div>
                                                            <div class="form-group row">
                                                                <input class="form-control" name="phone" type="tel" placeholder="Phone" value='<?php echo (isset($row['phone']) ? $row['phone'] : ''); ?>' disabled>
                                                            </div>

                                                            <div class="form-group row">
                                                                <input class="form-control" name="address" type="text" placeholder="Address" required>
                                                            </div>

                                                            <div class="form-group row check-input">
                                                                <span class="custom-checkbox d-inline-flex">
                                                                    <input id="cash" class="check" name="optin" type="radio" value="1" required>
                                                                    <label class="label-absolute" for="cash">Cash On Delivery</label>
                                                                </span>
                                                            </div>
                                                            <div class="form-group row check-input">
                                                                <span class="custom-checkbox d-inline-flex">
                                                                    <input id="paypal" class="check" name="optin" type="radio" value="1">
                                                                    <label class="label-absolute" for="paypal">Paybal</label>
                                                                </span>
                                                            </div>


                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="row">
                                                                <input type="hidden" name="submitCreate" value="1">

                                                                <button class="continue btn btn-primary pull-xs-right" name="submit" data-link-action="register-new-customer" type="submit" value="1">
                                                                    Place Order
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="checkout-login-form" role="tabpanel">
                                                    <form id="login-form" action="#" method="post" class="customer-form">
                                                        <div>
                                                            <input type="hidden" name="back" value="">
                                                            <div class="form-group row">
                                                                <input class="form-control" name="email" type="email" placeholder="Email">
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="input-group js-parent-focus">
                                                                    <input class="form-control js-child-focus js-visible-password" name="password" type="password" placeholder="Password">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="forgot-password">
                                                                    <a href="user-reset-password.html" rel="nofollow">
                                                                        Forgot your password?
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="row">
                                                                <button class="continue btn btn-primary pull-xs-right" name="continue" data-link-action="sign-in" type="submit" value="1">
                                                                    Continue
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-grid-right col-xs-12 col-lg-3">
                                        <div class="cart-summary">
                                            <div class="cart-detailed-totals">
                                                <div class="cart-summary-products">
                                                    <div class="summary-label">There are <?php echo isset($_SESSION['cart']['quantity']) ? $_SESSION['cart']['quantity'] : 0; ?> item in your cart</div>
                                                </div>
                                                <div class="cart-summary-line" id="cart-subtotal-products">
                                                    <span class="label js-subtotal">
                                                        Total price:
                                                    </span>
                                                    <span class="value"><?php echo isset($_SESSION['cart']['totalprice']) ? $_SESSION['cart']['totalprice']
                                                                            : 0; ?></span>
                                                </div>
                                                <div class="cart-summary-line" id="cart-subtotal-shipping">
                                                    <span class="label">
                                                        Total Shipping:
                                                    </span>
                                                    <span class="value">Free</span>
                                                    <div>
                                                        <small class="value"></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once("./footer.php"); ?>

    <!-- back top top -->
    <?php include_once("./backToTopBtn.php"); ?>

    <!-- menu mobie left -->


    <!-- menu mobie right -->
    <?php include_once("./menuMobileRight.php") ?>


    <!-- Page Loader -->
    <?php
    include_once("./pagePreLoader.php")
    ?>

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

    <!-- Template JS-->
    <script src="js/theme.js"></script>
</body>


<!-- product-checkout07:13-->

</html>