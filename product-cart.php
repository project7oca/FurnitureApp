<?php
session_start();

$servername = "localhost";
$username = "root";
$dbname = "project7";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
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


<!-- product-cart07:06-->

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

<body class="product-cart checkout-cart blog">
  <?php include_once("./navbar.php"); ?>


  <!-- main content -->
  <div class="main-content" id="cart">
    <!-- main -->
    <div id="wrapper-site">
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
                  <span>Shopping Cart</span>
                </a>
              </li>
            </ol>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
            <section id="main">
              <div class="cart-grid row">
                <div class="col-md-9 col-xs-12 check-info">
                  <h1 class="title-page">Shopping Cart</h1>
                  <div class="cart-container">
                    <div class="cart-overview js-cart">
                      <!-- cart -->
                      <ul class="cart-items">
                        <?php
                        if (isset($_SESSION["cart"])) {
                          if (count($_SESSION["cart"]) == 0)
                            echo "<h4>empty cart</h4>";
                          foreach ($_SESSION["cart"] as $element) {
                        ?>
                            <li class="cart-item">
                              <div class="product-line-grid row justify-content-between">
                                <!--  product left content: image-->
                                <div class="product-line-grid-left col-md-2">
                                  <span class="product-image media-middle">
                                    <a href="product-detail.html">
                                      <img class="img-fluid" src='<?php echo $element['product_image']; ?>' alt='<?php echo $element['product_name']; ?>'>
                                    </a>
                                  </span>
                                </div>
                                <div class="product-line-grid-body col-md-6">
                                  <div class="product-line-info">
                                    <a class="label" href="product-detail.html" data-id_customization="0"><?php echo $element['product_name']; ?></a>
                                  </div>
                                  <div class="product-line-info product-price">
                                    <span class="value"><?php echo $element['product_price']; ?> JOD</span>
                                  </div>
                                  <!-- <div class="product-line-info">
                <span class="label-atrr">Size:</span>
                 <span class="value">S</span>
                 </div> -->
                                  <!-- <div class="product-line-info">
                <span class="label-atrr">Color:</span>
                 <span class="value">Blue</span>
                 </div> -->
                                </div>
                                <div class="product-line-grid-right text-center product-line-actions col-md-4">
                                  <div class="row">
                                    <div class="col-md-5 col qty">
                                      <div class="label">Qty:</div>
                                      <div class="quantity">
                                        <input type="text" name="qty" value="<?php echo $element['quantity']; ?>" class="input-group form-control">

                                        <span class="input-group-btn-vertical">
                                          <a href='./AddToCart.php?id=<?php echo $element['product_id']; ?>&&name=increase'> <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-up" type="button">
                                              +
                                            </button></a>
                                          <a href='./AddToCart.php?id=<?php echo $element['product_id']; ?>&&name=decrease'><button class="btn btn-touchspin js-touchspin bootstrap-touchspin-down" type="button">
                                              -
                                            </button></a>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="col-md-5 col price">
                                      <div class="label">Total:</div>
                                      <div class="product-price total">
                                        <?php echo $element['product_price'] * $element['quantity']; ?> JOD
                                      </div>
                                    </div>
                                    <div class="col-md-2 col text-xs-right align-self-end">
                                      <div class="cart-line-product-actions ">
                                        <a class="remove-from-cart" rel="nofollow" href="./AddToCart.php?id=<?php echo $element['product_id']; ?>&&name=remove">
                                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                        <?php }
                        } ?>



                      </ul>
                    </div>
                  </div>
                  <a href="product-checkout.html" class="continue btn btn-primary pull-xs-right">
                    Continue
                  </a>
                </div>
                <div class="cart-grid-right col-xs-12 col-lg-3">
                  <div class="cart-summary">
                    <div class="cart-detailed-totals">
                      <div class="cart-summary-products">
                        <div class="summary-label">There are <?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']);
                                                              else echo '0'; ?> item in your cart</div>
                      </div>
                      <div class="cart-summary-line" id="cart-subtotal-products">
                        <span class="label js-subtotal">
                          Total:
                        </span>
                        <?php
                        $sum = 0;
                        if (isset($_SESSION['cart'])) {
                          for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                            $sum += $_SESSION['cart'][$i]['product_price'] * $_SESSION['cart'][$i]['quantity'];
                          }
                        }
                        ?>

                        <span class='value'><?php echo $sum; ?> JOD</span>

                        <?php
                        if (isset($_SESSION['cart'])) {

                          $_SESSION['cart-summary'] = ['total' => $sum, 'item-number' => count($_SESSION['cart'])];
                          // var_dump($_SESSION['cart-summary']);
                        }
                        ?>

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
                      <!-- <div class="cart-summary-line cart-total">
            <span class="label">Total:</span>
            <span class="value">£200.00 (tax incl.)</span>
           </div> -->
                    </div>
                  </div>
                  <div id="block-reassurance">
                    <ul>
                      <li>
                        <div class="block-reassurance-item">
                          <img src="img/product/check1.png" alt="Security policy (edit with Customer reassurance module)">
                          <span>Security policy (edit with Customer reassurance module)</span>
                        </div>
                      </li>
                      <li>
                        <div class="block-reassurance-item">
                          <img src="img/product/check2.png" alt="Delivery policy (edit with Customer reassurance module)">
                          <span>Delivery policy (edit with Customer reassurance module)</span>
                        </div>
                      </li>
                      <li>
                        <div class="block-reassurance-item">
                          <img src="img/product/check3.png" alt="Return policy (edit with Customer reassurance module)">
                          <span>Return policy (edit with Customer reassurance module)</span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </section>
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

  <!-- Template JS -->
  <script src="js/theme.js"></script>
</body>


<!-- product-cart07:12-->

</html>
<?php
// echo "<pre>";
// echo var_dump($_SESSION['cart']);
?>