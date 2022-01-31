<?php
session_start();
// unset($_SESSION['add']);
// echo "<h1>".var_dump($_SESSION['add'])."</h1>";

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


// unset($_SESSION['add']);
?>




<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- product-grid-sidebar-left10:54-->

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

 <!-- Vendor CSS -->
 <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="libs/nivo-slider/css/nivo-slider.css">
 <link rel="stylesheet" href="libs/nivo-slider/css/animate.css">
 <link rel="stylesheet" href="libs/nivo-slider/css/style.css">
 <link rel="stylesheet" href="libs/font-material/css/material-design-iconic-font.min.css">
 <link rel="stylesheet" href="libs/slider-range/css/jslider.css">
 <link rel="stylesheet" href="libs/owl-carousel/assets/owl.carousel.min.css">

 <!-- Template CSS -->
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/reponsive.css">
</head>

<body id="product-sidebar-left" class="product-grid-sidebar-left">
 <?php include_once("./navbar.php"); ?>


 <!-- main content -->
 <div class="main-content">
  <div id="wrapper-site">
   <div id="content-wrapper" class="full-width">
    <div id="main">
     <div class="page-home">
      <!-- breadcrumb -->
      <!-- <nav class="breadcrumb-bg">
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
                                                <span>Living Room</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Sofa</span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </nav> -->

      <div class="container">
       <div class="content">
        <div class="row">
         <div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">

          <!-- category menu -->
          <div class="sidebar-block">
           <div class="title-block">Categories</div>
           <div class="block-content">
            <?php $category = $conn->prepare("SELECT * FROM categories ");
            $category->execute();
            foreach ($category as $element) { ?>
             <div class="cateTitle hasSubCategory open level1">
              <a class="cateItem" href='shop.php?id=<?php echo $element["id"] ?>'><?php echo $element["category_name"] ?></a>
             </div>
            <?php  } ?>


           </div>
          </div>



          <!-- product tag -->
          <!-- <div class="sidebar-block product-tags">
                                            <div class="title-block">
                                                Product Tags
                                            </div>
                                            <div class="block-content">
                                                <ul class="listSidebarBlog list-unstyled">
                                                    <li>
                                                        <a href="#" title="Show products matching tag Hot Trend">Hot Trend</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Jewelry">Jewelry</a>
                                                    </li>

                                                    <li>
                                                        <a href="man.html" title="Show products matching tag Man">Man</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Party">Party</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag SamSung">SamSung</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Shirt Dresses">Shirt Dresses</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Shoes">Shoes</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Summer">Summer</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Sweaters">Sweaters</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Winter">Winter</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" title="Show products matching tag Woman">Woman</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
         </div>
         <div class="col-sm-8 col-lg-9 col-md-8 product-container">

          <div class="js-product-list-top firt nav-top">
           <div class="d-flex justify-content-around row">
            <div class="col col-xs-12">
             <ul class="nav nav-tabs">
              <li>
               <a href="#grid" data-toggle="tab" class="active show fa fa-th-large"></a>
              </li>
              <li>
               <a href="#list" data-toggle="tab" class="fa fa-list-ul"></a>
              </li>
             </ul>

            </div>
            <div class="col col-xs-12">
             <div class="d-flex sort-by-row justify-content-lg-end justify-content-md-end">

             </div>
            </div>
           </div>
          </div>




          <!-- jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj -->
          <div class="tab-content product-items">
           <div id="grid" class="related tab-pane fade in active show">
            <div class="row">

             <?php

             if (isset($_GET["id"])) {
              $data = $conn->prepare("SELECT * FROM products WHERE category_id='$_GET[id]'");
             } else {
              $data = $conn->prepare("SELECT * FROM products");
             }
             if (isset($_GET["id"]) && $_GET["id"] == 3) {
              $data = $conn->prepare("SELECT * FROM products");
             }
             $data->execute();
             foreach ($data as $element) {
             ?>
              <div class="item text-center col-md-4">
               <div class="product-miniature js-product-miniature item-one first-item">
                <div class="thumbnail-container border">
                 <a href="product-detail.php?id=<?php echo $element['id']; ?>">
                  <img class="img-fluid" src=<?php echo $element['product_image']; ?> alt="img">
                  <!-- <img class="img-fluid image-secondary" src="img/product/22.jpg" alt="img"> -->
                 </a>
                 <!-- <div class="highlighted-informations"> -->
                 <!-- <div class="variant-links">
                                                                        <a href="#" class="color beige" title="Beige"></a>
                                                                        <a href="#" class="color orange" title="Orange"></a>
                                                                        <a href="#" class="color green" title="Green"></a>
                                                                    </div> -->
                 <!-- </div> -->
                </div>
                <div class="product-description">
                 <div class="product-groups">
                  <div class="product-title">
                   <a href="product-detail.php?id=<?php echo $element['id']; ?>"><?php echo $element['product_name']; ?></a>
                  </div>
                  <div class="rating">
                   <div class="star-content">
                    <div class="star"></div>
                    <div class="star"></div>
                    <div class="star"></div>
                    <div class="star"></div>
                    <div class="star"></div>
                   </div>
                  </div>
                  <div class="product-group-price">
                   <div class="product-price-and-shipping">
                    <span class="price">jd<?php echo $element['product_price']; ?></span>
                   </div>
                  </div>
                 </div>
                 <div class="product-buttons d-flex justify-content-center">
                  <form action="#" class="formAddToCart">

                   <input type="hidden" name="id_product" value="1">
                   <a class="add-to-cart" href='AddToCart.php?id=<?php echo $element['id']; ?>&&name=add' data-button-action="add-to-cart" style="display:flex;justify-content:center;align-items:center;">
                    <i class="fa fa-shopping-cart center" aria-hidden="true"></i>
                   </a>
                  </form>

                  <a href="product-detail.php?id=<?php echo $element['id']; ?>" class="quick-view hidden-sm-down" data-link-action="quickview" style="display:flex;justify-content:center;align-items:center;">
                   <i class="fa fa-eye" aria-hidden="true"></i>
                  </a>
                 </div>
                </div>
               </div>
              </div>
             <?php  } ?>
            </div>
           </div>
           <!-- list product -->
           <div id="list" class="related tab-pane fade">
            <div class="row">

             <?php
             if (isset($_GET["id"])) {
              $data = $conn->prepare("SELECT * FROM products WHERE category_id='$_GET[id]'");
             } else {
              $data = $conn->prepare("SELECT * FROM products");
             }
             if (isset($_GET["id"]) && $_GET["id"] == 3) {
              $data = $conn->prepare("SELECT * FROM products");
             }
             $data->execute();
             foreach ($data as $element) {
             ?>
              <div class="item col-md-12">
               <div class="product-miniature item-one first-item">
                <div class="row">
                 <div class="col-md-4">
                  <div class="thumbnail-container border">
                   <a href="product-detail.php?id=<?php echo $element['id']; ?>">
                    <img class="img-fluid" src=<?php echo $element['product_image']; ?> alt="img">
                    <!-- <img class="img-fluid image-secondary" src="img/product/22.jpg" alt="img"> -->
                   </a>
                  </div>
                 </div>
                 <div class="col-md-8">
                  <div class="product-description">
                   <div class="product-groups">
                    <div class="product-title">
                     <a href="product-detail.php?id=<?php echo $element['id']; ?>"><?php echo $element['product_name']; ?></a>
                     <!-- <span class="info-stock">
                                                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                                    In Stock
                                                                                </span> -->
                    </div>
                    <div class="rating">
                     <div class="star-content">
                      <div class="star"></div>
                      <div class="star"></div>
                      <div class="star"></div>
                      <div class="star"></div>
                      <div class="star"></div>
                     </div>
                    </div>
                    <div class="product-group-price">
                     <div class="product-price-and-shipping">
                      <span class="price">jd<?php echo $element['product_price']; ?></span>
                     </div>
                    </div>

                    <!-- hhhhhhhhhh -->
                    <div class="discription">
                     <?php echo $element['product_desc']; ?>
                    </div>
                   </div>
                   <div class="product-buttons d-flex">
                    <form action="#" method="post" class="formAddToCart">
                     <a class="add-to-cart" href='AddToCart.php?id=<?php echo $element['id']; ?>&&name=addFromList' data-button-action="add-to-cart" style="display:flex;justify-content:center;align-items:center;">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart
                     </a>
                    </form>

                    <a href="product-detail.php?id=<?php echo $element['id']; ?>" class="quick-view hidden-sm-down" data-link-action="quickview" style="display:flex;justify-content:center;align-items:center;">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                   </div>
                  </div>
                 </div>
                </div>

               </div>
              </div>

             <?php  } ?>
            </div>
           </div>
          </div>

          <!--jjjjjjjjjjjjjjjjjjjjjjj  -->
















         </div>

         <!-- end col-md-9-1 -->
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
//  include_once("./pagePreLoader.php")
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

 <!-- Template JS -->
 <script src="js/theme.js"></script>
</body>


<!-- product-grid-sidebar-left10:55-->

</html>