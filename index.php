<?php
session_start();
if (isset($_SESSION['successMessage'])) {
  header('Location: order.php');
  unset($_SESSION['successMessage']);
}
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
<html lang="zxx">

<head>
  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Furnitica - Minimalist Furniture HTML Template</title>

  <meta name="keywords" content="Furniture, Decor, Interior, sofa , table, desc">
  <meta name="description" content="Furnitica - An e-commerce Website that sells furniture, Each product has name, price and description.client can register and login to set orders ,review the products, and can see the orders history from his profile page">
  <meta name="author" content="Furnitica Team">

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

<body id="home2">
  <?php include_once "./navbar.php"; ?>


  <!-- main content -->
  <div class="main-content">
    <div class="wrap-banner">
      <!-- menu category -->
      <div class="menu-banner d-xs-none">
        <div class="tiva-verticalmenu block" data-count_showmore="17">
          <div class="box-content block_content">
            <div class="verticalmenu" role="navigation">
              <ul class="menu level1">
                <li class="item parent">
                  <a href="#" class="hasicon" title="SIDE TABLE">
                    <img src="img/home/table-lamp.png" alt="img">SIDE TABLE</a>
                  <div class="dropdown-menu">
                    <div class="menu-items">
                      <ul>
                        <li class="item">
                          <a href="#" title="Aliquam lobortis">Aliquam lobortis</a>
                        </li>
                        <li class="item parent-submenu parent">
                          <a href="#" title="Duis Reprehenderit">Duis Reprehenderit</a>
                          <span class="show-sub fa-active-sub"></span>
                          <div class="dropdown-submenu">
                            <div class="menu-items">
                              <ul>
                                <li class="item">
                                  <a href="#" title="Aliquam lobortis">Aliquam lobortis</a>
                                </li>
                                <li class="item">
                                  <a href="#" title="Duis Reprehenderit">Duis Reprehenderit</a>
                                </li>
                                <li class="item">
                                  <a href="#" title="Voluptate">Voluptate</a>
                                </li>
                                <li class="item">
                                  <a href="#" title="Tongue Est">Tongue Est</a>
                                </li>
                                <li class="item">
                                  <a href="#" title="Venison Andouille">Venison Andouille</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                        <li class="item">
                          <a href="#" title="Voluptate">Voluptate</a>
                        </li>
                        <li class="item">
                          <a href="#" title="Tongue Est">Tongue Est</a>
                        </li>
                        <li class="item">
                          <a href="#" title="Venison Andouille">Venison Andouille</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item parent group">
                  <a href="#" class="hasicon" title="FI">
                    <img src="img/home/fireplace.png" alt="img">FIREPLACE
                  </a>
                  <div class="dropdown-menu menu-2">
                    <div class="menu-items">
                      <div class="item">
                        <div class="menu-content">
                          <div class="tags">
                            <div class="title float-left">
                              <b>DINNING ROOM</b>
                            </div>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <a href="#">Toshiba</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Samsung</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">LG</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sharp</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Electrolux</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Hitachi</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Panasonic</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Mitsubishi Electric</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Daikin</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Haier</a>
                              </li>
                            </ul>
                          </div>
                          <div class="tags">
                            <div class="title float-left">
                              <b>BATHROOM</b>
                            </div>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <a href="#">Toshiba</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Samsung</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">LG</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sharp</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Electrolux</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Hitachi</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Panasonic</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Mitsubishi Electric</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Daikin</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Haier Media</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Gee</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Digimart</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Vitivaa</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sanaky</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sunshine</a>
                              </li>
                            </ul>
                          </div>
                          <div class="tags">
                            <div class="title float-left">
                              <b>LIVING ROOM</b>
                            </div>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <a href="#">Media</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Gee</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Digimart</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Vitivaa</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sanaky</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sunshine</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Toshiba</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Samsung</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">LG</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sharp</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Electrolux</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Hitachi</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Panasonic</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Mitsubishi Electric</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Daikin</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Haier</a>
                              </li>
                            </ul>
                          </div>
                          <div class="tags">
                            <div class="title float-left">
                              <b>BEDROOM</b>
                            </div>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <a href="#">LG</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sharp</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Electrolux</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Hitachi</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Panasonic</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Mitsubishi Electric</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Daikin</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Haier</a>
                              </li>
                            </ul>
                          </div>
                          <div class="tags">
                            <div class="title float-left">
                              <b>KITCHEN</b>
                            </div>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <a href="#">LG</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sharp</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Electrolux</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Hitachi</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Panasonic</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Mitsubishi Electric</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Daikin</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Haier</a>
                              </li>
                            </ul>
                          </div>
                          <div class="tags">
                            <div class="title float-left">
                              <b>Blender</b>
                            </div>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <a href="#">LG</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Sharp</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Electrolux</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Hitachi</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Panasonic</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Mitsubishi Electric</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Daikin</a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#">Haier</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="item group-category-img parent group">
                  <a href="#" class="hasicon" title="TABLE LAMP">
                    <img src="img/home/table-lamp.png" alt="img">TABLE LAMP
                  </a>
                  <div class="dropdown-menu menu-3">
                    <div class="menu-items">
                      <div class="item">
                        <div class="menu-content">
                          <div class="group-category row">
                            <div class="mt-20">
                              <div class="d-flex">
                                <div class="col">
                                  <span class="menu-title">Coventry dining</span>
                                  <ul>
                                    <li>
                                      <a href="#">Accessories</a>
                                    </li>
                                    <li>
                                      <a href="#">Activewear</a>
                                    </li>
                                    <li>
                                      <a href="#">ASOS Basic Tops</a>
                                    </li>
                                    <li>
                                      <a href="#">Bags &amp; Purses</a>
                                    </li>
                                    <li>
                                      <a href="#">Beauty</a>
                                    </li>
                                    <li>
                                      <a href="#">Coats &amp; Jackets</a>
                                    </li>
                                    <li>
                                      <a href="#">Curve &amp; Plus Size</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col">
                                  <span class="menu-title">Amara stools</span>
                                  <ul>
                                    <li>
                                      <a href="#">Accessories</a>
                                    </li>
                                    <li>
                                      <a href="#">Activewear</a>
                                    </li>
                                    <li>
                                      <a href="#">ASOS Basic Tops</a>
                                    </li>
                                    <li>
                                      <a href="#">Bags &amp; Purses</a>
                                    </li>
                                    <li>
                                      <a href="#">Beauty</a>
                                    </li>
                                    <li>
                                      <a href="#">Coats &amp; Jackets</a>
                                    </li>
                                    <li>
                                      <a href="#">Curve &amp; Plus Size</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="d-flex">
                                <div class="col">
                                  <span class="menu-title">Kingston dining</span>
                                  <ul>
                                    <li>
                                      <a href="#">Accessories</a>
                                    </li>
                                    <li>
                                      <a href="#">Activewear</a>
                                    </li>
                                    <li>
                                      <a href="#">ASOS Basic Tops</a>
                                    </li>
                                    <li>
                                      <a href="#">Bags &amp; Purses</a>
                                    </li>
                                    <li>
                                      <a href="#">Beauty</a>
                                    </li>
                                    <li>
                                      <a href="#">Coats &amp; Jackets</a>
                                    </li>
                                    <li>
                                      <a href="#">Curve &amp; Plus Size</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col">
                                  <span class="menu-title">Ellinger dining</span>
                                  <ul>
                                    <li>
                                      <a href="#">Accessories</a>
                                    </li>
                                    <li>
                                      <a href="#">Activewear</a>
                                    </li>
                                    <li>
                                      <a href="#">ASOS Basic Tops</a>
                                    </li>
                                    <li>
                                      <a href="#">Bags &amp; Purses</a>
                                    </li>
                                    <li>
                                      <a href="#">Beauty</a>
                                    </li>
                                    <li>
                                      <a href="#">Coats &amp; Jackets</a>
                                    </li>
                                    <li>
                                      <a href="#">Curve &amp; Plus Size</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="ml-15">
                              <a>
                                <img class="img-fluid" src="img/home/img-menu.jpg" alt="img">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="OTTOMAN">
                    <img src="img/home/ottoman.png" alt="img">OTTOMAN
                  </a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="ARMCHAIR">
                    <img src="img/home/armchair.png" alt="img">ARMCHAIR
                  </a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="CUSHION">
                    <img src="img/home/cushion.png" alt="img">CUSHION
                  </a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="COFFEE TABLE">
                    <img src="img/home/coffee_table.png" alt="img">COFFEE TABLE</a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="SHELF">
                    <img src="img/home/shelf.png" alt="img">SHELF
                  </a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="SOFA">
                    <img src="img/home/sofa.png" alt="img">SOFA
                  </a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="DRESSING TABLE">
                    <img src="img/home/dressing.png" alt="img">DRESSING TABLE</a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="WINDOWN CURTAIN">
                    <img src="img/home/windown.png" alt="img">WINDOWN CURTAIN</a>
                </li>
                <li class="item">
                  <a href="#" class="hasicon" title="CHANDELIER">
                    <img src="img/home/chandelier.png" alt="img">CHANDELIER
                  </a>
                </li>
                <li class="item toggleable menu-hidden">
                  <a href="#" class="hasicon" title="CEILING FAN">
                    <img src="img/home/ceiling_fan.png" alt="img">CEILING FAN
                  </a>
                </li>
                <li class="item toggleable menu-hidden">
                  <a href="#" class="hasicon" title="WARDROBE">
                    <img src="img/home/wardrobe.png" alt="img">WARDROBE
                  </a>
                </li>
                <li class="item toggleable menu-hidden">
                  <a href="#" class="hasicon" title="FLOOR LAMP">
                    <img src="img/home/floor_lamp.png" alt="img">FLOOR LAMP</a>
                </li>
                <li class="item toggleable menu-hidden">
                  <a href="#" class="hasicon" title="VASE-FLOWER">
                    <img src="img/home/vase-flower.png" alt="img">VASE-FLOWER
                  </a>
                </li>
                <li class="item toggleable menu-hidden">
                  <a href="#" class="hasicon" title="BED">
                    <img src="img/home/bed.png" alt="img">BED
                  </a>
                </li>
                <li class="item toggleable menu-hidden">
                  <a href="#" class="hasicon" title="BED GIRL">
                    <img src="img/home/bed.png" alt="img">BED GIRL</a>
                </li>
                <li class="item toggleable menu-hidden">
                  <a href="#" class="hasicon" title="BED BOY">
                    <img src="img/home/bed.png" alt="img">BED BOY</a>
                </li>
                <li class="more item">Show More</li>
              </ul>
            </div>
            <div class="d-flex justify-content-center align-items-center header-top-left pull-left">
              <div class="toggle-nav act">
                <div class="btnov-lines-large">
                  <i class="zmdi zmdi-close"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- main -->
    <div id="wrapper-site">
      <div id="content-wrapper" class="full-width">
        <div id="main">
          <section class="page-home">
            <!-- SHOP THE LOOK -->
            <div class="section spacing-10 groupbanner-special">
              <div class="title-block">
                <span>Shop The LookBook 2022</span>
                <span>LookBook</span>
                <span>HAND-PICKED ARRIVALS FROM THE BEST DESIGNER</span>
              </div>

              <div class="row">
                <div class="lookbook owl-carousel owl-theme owl-loaded owl-drag">
                  <div class="item">
                    <!-- Module Lookbooks -->
                    <div class="tiva-lookbook defaul">
                      <div class="items col-lg-12 col-sm-12 col-xs-12">
                        <div class="tiva-content-lookbook">
                          <img class="img-fluid img-responsive" src="img/home/home1-tolltip1.jpg" alt="lookbook">

                          <!-- <div class="item-lookbook item1">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook lookbook-custom">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/home/icon-tolltip2.jpg" alt="lorem-ipsum-dolor-sit-amet">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Lorem ipsum dolor</a>
                                  </div>
                                  <div class="item-price">
                                    £52.00
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="item-lookbook item2">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/home/icon-tolltip1.jpg" alt="contrary-to-popular-belief">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Sed vel malesuada lorem</a>
                                  </div>
                                  <div class="item-price">
                                    £68.00
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="item">
                    <!-- Module Lookbooks -->
                    <div class="tiva-lookbook default">
                      <div class="items col-lg-12 col-sm-12 col-xs-12">
                        <div class="tiva-content-lookbook">
                          <img class="img-fluid img-responsive" src="img/home/home1-tolltip2.jpg" alt="lookbook">

                          <!-- <div class="item-lookbook item3">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/home/icon-tolltip5.jpg" alt="lorem-ipsum-dolor-sit-amet">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Lorem ipsum dolor sit</a>
                                  </div>
                                  <div class="item-price">
                                    £45.00
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="item-lookbook item4">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/home/icon-tolltip6.jpg" alt="lorem-ipsum-dolor-sit-amet">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Lorem ipsum dolor</a>
                                  </div>
                                  <div class="item-price">
                                    £21.00
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="item-lookbook item5">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook lookbook-custom">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/home/icon-tolltip4.jpg" alt="mug-the-adventure-begins">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Sed vel malesuada lorem</a>
                                  </div>
                                  <div class="item-price">
                                    £11.90
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="item">
                    <!-- Module Lookbooks -->
                    <div class="tiva-lookbook default">
                      <div class="items col-lg-12 col-sm-12 col-xs-12">
                        <div class="tiva-content-lookbook">
                          <img class="img-fluid img-responsive" src="img/home/home1-tolltip3.jpg" alt="lookbook">

                          <!-- <div class="item-lookbook item6">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/home/icon-tolltip4.jpg" alt="mug-the-adventure-begins">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Sed vel malesuada lorem</a>
                                  </div>
                                  <div class="item-price">
                                    £11.90
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="item-lookbook item7">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/product/13.jpg" alt="brown-bear-vector-graphics">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Orci varius natoque penatibus</a>
                                  </div>
                                  <div class="item-price">
                                    £9.00
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="item-lookbook item8">
                            <span class="number-lookbook">+</span>
                            <div class="content-lookbook">
                              <div class="main-lookbook d-flex align-items-center">
                                <div class="item-thumb">
                                  <a href="product-detail.php?id=500">
                                    <img src="img/home/icon-tolltip6.jpg" alt="lorem-ipsum-dolor-sit-amet">
                                  </a>
                                </div>
                                <div class="content-bottom">
                                  <div class="item-title">
                                    <a href="product-detail.php?id=500">Etiam congue nisl nec</a>
                                  </div>
                                  <div class="item-price">
                                    £16.00
                                  </div>
                                  <div class="readmore">
                                    <a href="product-detail.php?id=500">View More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->
                        </div>

                        <div class="info-lookbook">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container">
              <div class="row" style="display: flex;margin: 3rem auto 2rem;    justify-content: center; align-items: center;">


                <div class="section best-sellers col-lg-6 col-xs-6">

                  <div class="tab-content">
                    <div class="title-product" style="text-align:center;">
                      <h2 style="text-align:center;">Best Sellers</h2>
                      <p>Discover our best sellers</p>
                    </div>
                    <div class="category-product owl-carousel owl-theme owl-loaded owl-drag">
                      <?php $discount = $conn->prepare("SELECT * FROM products WHERE discount!=0");
                      $discount->execute();
                      foreach ($discount as $element) { ?>
                        <div class="item text-center">
                          <div class="product-miniature js-product-miniature item-one first-item">
                            <div class="thumbnail-container">
                              <a href="product-detail.php?id=<?php echo $element['id'] ?>">
                                <!-- image-cover -->
                                <img class="img-fluid " src="img/furniture-photos/all-products/<?php echo $element['product_image'] ?>" alt="img">
                              </a>
                              <div class="product-flags discount">-<?php echo $element['discount'] ?>%</div>
                            </div>
                            <div class="product-description">
                              <div class="product-groups">
                                <div class="product-title">
                                  <a href="product-detail.php?id=<?php echo $element['id'] ?>"><?php echo $element['product_name'] ?></a>
                                </div>
                                <div class="product-group-price">
                                  <div class="product-price-and-shipping">
                                    <span class="price"><?php echo $element['product_price'] ?>JOD</span>
                                    <!-- <del class="regular-price">£28.68</del> -->
                                  </div>
                                </div>
                              </div>
                              <div class="product-buttons d-flex justify-content-center">
                                <form action="#" method="post" class="formAddToCart">
                                  <input type="hidden" name="token">
                                  <input type="hidden" name="id_product" value="1">
                                  <a class="add-to-cart" href='AddToCart.php?id=<?php echo $element['id']; ?>&&name=addFromHome' data-button-action="add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                  </a>
                                </form>
                                <a href="product-detail.php?id=<?php echo $element['id']; ?>" class="quick-view hidden-sm-down" data-link-action="quickview">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- banner -->
            <div class="section spacing-10 group-image-special">
              <div class="row">
                <div class="col-lg-4 col-md-4 banner1">
                  <div class="effect">
                    <a href="./shop.php?id=6">
                      <img class="img-fluid width-100" src="img/home/effect5.jpg" alt="banner-1" title="banner-1">
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 banner1">
                  <div class="effect">
                    <a href="./shop.php?id=6">
                      <img class="img-fluid width-100" src="img/home/effect6.jpg" alt="banner-2" title="banner-2">
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 banner1">
                  <div class="effect">
                    <a href="./shop.php?id=3">
                      <img class="img-fluid width-100" src="img/home/effect7.jpg" alt="banner-2" title="banner-2">
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 banner1">
                  <div class="effect">
                    <a href="./shop.php?id=5">
                      <img class="img-fluid width-100" src="img/home/effect8.jpg" alt="banner-2" title="banner-2">
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 banner1">
                  <div class="effect">
                    <a href="./shop.php?id=4">
                      <img class="img-fluid width-100" src="img/home/effect9.jpg" alt="banner-2" title="banner-2">
                    </a>
                  </div>
                </div>
              </div>
            </div>





          </section>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php include_once "./footer.php"; ?>


  <!-- back top top -->
  <?php include_once "./backToTopBtn.php"; ?>


  <!-- menu mobie left -->


  <!-- menu mobie right -->
  <?php include_once "./menuMobileRight.php" ?>


  <!-- Page Loader -->
  <?php
  include_once "./pagePreLoader.php"
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


<!-- home207:34-->

</html>