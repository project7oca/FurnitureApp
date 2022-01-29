<?php
session_start();
$productId = 3;
$currentUserId = 1;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project7";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
function fetchProductData()
{
  global $conn, $productId;
  $stmt = $conn->prepare("SELECT * FROM products WHERE id=? LIMIT 1");
  $stmt->execute([$productId]);
  $row = $stmt->fetch();
  return $row;
}
function fetchProductComments()
{
  global $conn, $productId;
  $sth = $conn->prepare("SELECT * FROM comments WHERE product_id=?");
  $sth->execute([$productId]);
  $result = $sth->fetchAll();
  return $result;
}

function calculateProductRate()
{
  $allComments = fetchProductComments();
  if (!count($allComments) <= 0) {
    $sumOfStars = 0;
    $calculatedReviewsCounter = 0;
    foreach ($allComments as $comment) {
      if ($comment['stars']) {
        $sumOfStars += $comment['stars'];
        $calculatedReviewsCounter++;
      }
    }
    echo $sumOfStars > 0 ? $sumOfStars / $calculatedReviewsCounter : "no reviews";
  } else {
    echo "no reviews";
  }
}
function fetchUserNameFromId($userId)
{
  global $conn;
  $stmt = $conn->prepare("SELECT fullname FROM users WHERE id=? LIMIT 1");
  $stmt->execute([$userId]);
  $row = $stmt->fetch();
  return $row;
}
function fetchUserCategoryFromId($categoryId)
{
  global $conn;
  $stmt = $conn->prepare("SELECT category_name FROM categories WHERE id=? LIMIT 1");
  $stmt->execute([$categoryId]);
  $row = $stmt->fetch();
  return $row;
}
if (isset($_POST['newUserReview'])) {
  $reviewStars = isset($_POST["rating"]) ? $_POST["rating"] : 0;
  $comment_desc = $_POST['newUserReview'];
  $stmt = $conn->prepare("INSERT INTO comments (comment_desc, user_id , product_id,stars )
  VALUES (:comment_desc, :user_id , :product_id, :stars )");
  $stmt->bindParam(':comment_desc', $comment_desc);
  $stmt->bindParam(':user_id', $currentUserId);
  $stmt->bindParam(':product_id', $productId);
  $stmt->bindParam(':stars', $reviewStars);
  $stmt->execute();
}


?>
<!DOCTYPE html>
<html lang="en">

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

<body id="product-detail">
  <?php include_once("./navbar.php"); ?>

  <!-- main content -->
  <div class="main-content">
    <div id="wrapper-site">
      <div id="content-wrapper">
        <div id="main">
          <div class="page-home">

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
            </nav>
            <div class="container">
              <div class="content">
                <div class="row">
                  <div class="sidebar-3 sidebar-collection col-lg-3 col-md-3 col-sm-4">

                    <!-- category -->
                    <div class="sidebar-block">
                      <div class="title-block">Categories</div>
                      <div class="block-content">
                        <div class="cateTitle hasSubCategory open level1">
                          <span class="arrow collapse-icons collapsed" data-toggle="collapse" data-target="#livingroom">
                            <i class="zmdi zmdi-minus"></i>
                            <i class="zmdi zmdi-plus"></i>
                          </span>
                          <a class="cateItem" href="#">Living Room</a>
                          <div class="subCategory collapse" id="livingroom" aria-expanded="true" role="status">
                            <div class="cateTitle">
                              <a href="#" class="cateItem">Side Table</a>
                              <div class="subCategory collapse" id="subCategory-fruits" aria-expanded="true" role="status">
                                <div class="cateTitle">
                                  <a href="#" class="cateItem">Side Table</a>
                                </div>
                                <div class="cateTitle">
                                  <a href="#" class="cateItem">FIREPLACE</a>
                                </div>
                                <div class="cateTitle">
                                  <a href="#" class="cateItem">FIREPLACE</a>
                                </div>
                                <div class="cateTitle">
                                  <a href="#" class="cateItem">floor lamp</a>
                                </div>
                                <div class="cateTitle">
                                  <a href="#" class="cateItem">ottoman</a>
                                </div>
                                <div class="cateTitle">
                                  <a href="#" class="cateItem">armchair</a>
                                </div>
                                <div class="cateTitle">
                                  <a href="#" class="cateItem">cushion</a>
                                </div>
                              </div>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">FIREPLACE</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">FIREPLACE</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">floor lamp</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">ottoman</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">armchair</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">cushion</a>
                            </div>
                          </div>
                        </div>
                        <div class="cateTitle hasSubCategory open level1">
                          <span class="arrow collapsed collapse-icons" data-toggle="collapse" data-target="#bathroom">
                            <i class="zmdi zmdi-minus"></i>
                            <i class="zmdi zmdi-plus"></i>
                          </span>
                          <a class="cateItem" href="#">Bathroom</a>
                          <div class="subCategory collapse" id="bathroom">
                            <div class="cateTitle">
                              <a href="#" class="cateItem">TOMATO</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">BROCCOLI</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">CABBAGE</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">CUCUMBER</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">EGGPLANT</a>
                            </div>
                          </div>
                        </div>
                        <div class="cateTitle hasSubCategory open level1">
                          <span class="arrow collapsed collapse-icons" data-toggle="collapse" data-target="#diningroom">
                            <i class="zmdi zmdi-minus"></i>
                            <i class="zmdi zmdi-plus"></i>
                          </span>
                          <a class="cateItem" href="#">Dining Rooom</a>
                          <div class="subCategory collapse" id="diningroom" aria-expanded="true" role="status">
                            <div class="cateTitle">
                              <a href="#" class="cateItem">DRY BREAD</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">BREAD SLICES</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">FRENCH BREAD</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">BLACK BREAD</a>
                            </div>
                          </div>
                        </div>
                        <div class="cateTitle hasSubCategory open level1">
                          <span class="arrow collapsed collapse-icons" data-toggle="collapse" data-target="#bedroom">
                            <i class="zmdi zmdi-minus"></i>
                            <i class="zmdi zmdi-plus"></i>
                          </span>
                          <a class="cateItem" href="#">BedRoom</a>
                          <div class="subCategory collapse" id="bedroom" aria-expanded="true" role="status">
                            <div class="cateTitle">
                              <a href="#" class="cateItem">ORANGE JUICES</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">TOMATO JUICES</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">APPLE JUICES</a>
                            </div>

                          </div>
                        </div>
                        <div class="cateTitle hasSubCategory open level1">
                          <span class="arrow collapsed collapse-icons" data-toggle="collapse" data-target="#kitchen">
                            <i class="zmdi zmdi-minus"></i>
                            <i class="zmdi zmdi-plus"></i>
                          </span>
                          <a class="cateItem" href="#">Kitchen</a>
                          <div class="subCategory collapse" id="kitchen" aria-expanded="true" role="status">
                            <div class="cateTitle">
                              <a href="#" class="cateItem">ORANGE JUICES</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">TOMATO JUICES</a>
                            </div>
                            <div class="cateTitle">
                              <a href="#" class="cateItem">APPLE JUICES</a>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- best seller -->
                    <div class="sidebar-block">
                      <div class="title-block">
                        Best seller
                      </div>
                      <div class="product-content tab-content">
                        <div class="row">
                          <div class="item col-md-12">
                            <div class="product-miniature item-one first-item d-flex">
                              <div class="thumbnail-container border">
                                <a href="product-detail.html">
                                  <img class="img-fluid image-cover" src="img/product/1.jpg" alt="img">
                                  <img class="img-fluid image-secondary" src="img/product/22.jpg" alt="img">
                                </a>
                              </div>
                              <div class="product-description">
                                <div class="product-groups">
                                  <div class="product-title">
                                    <a href="product-detail.html">Nulla et justo augue</a>
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
                                      <span class="price">£28.08</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="item col-md-12">
                            <div class="product-miniature item-one first-item d-flex">
                              <div class="thumbnail-container border">
                                <a href="product-detail.html">
                                  <img class="img-fluid image-cover" src="img/product/2.jpg" alt="img">
                                  <img class="img-fluid image-secondary" src="img/product/11.jpg" alt="img">
                                </a>
                              </div>
                              <div class="product-description">
                                <div class="product-groups">
                                  <div class="product-title">
                                    <a href="product-detail.html">Nulla et justo augue</a>
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
                                      <span class="price">£31.08</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="item col-md-12">
                            <div class="product-miniature item-one first-item d-flex">
                              <div class="thumbnail-container border">
                                <a href="product-detail.html">
                                  <img class="img-fluid image-cover" src="img/product/3.jpg" alt="img">
                                  <img class="img-fluid image-secondary" src="img/product/14.jpg" alt="img">
                                </a>
                              </div>
                              <div class="product-description">
                                <div class="product-groups">
                                  <div class="product-title">
                                    <a href="product-detail.html">Nulla et justo augue</a>
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
                                      <span class="price">£20.08</span>
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
                  <div class="col-sm-8 col-lg-9 col-md-9">
                    <div class="main-product-detail">
                      <h2><?php
                          echo (fetchProductData()["product_name"]);
                          ?></h2>
                      <div class="product-single row">
                        <div class="product-detail col-xs-12 col-md-5 col-sm-5">
                          <div class="page-content" id="content">
                            <div class="images-container">
                              <div class="js-qv-mask mask tab-content border">
                                <div id="item1" class="tab-pane fade active in show">
                                  <img src="img/product/<?php
                                                        echo (fetchProductData()["product_image"]);
                                                        ?>" alt="img">
                                </div>
                                <div id="item2" class="tab-pane fade">
                                  <img src="img/product/2.jpg" alt="img">
                                </div>
                                <div id="item3" class="tab-pane fade">
                                  <img src="img/product/3.jpg" alt="img">
                                </div>
                                <div id="item4" class="tab-pane fade">
                                  <img src="img/product/5.jpg" alt="img">
                                </div>
                                <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                                  <i class="fa fa-expand"></i>
                                </div>
                              </div>
                              <!-- <ul class="product-tab nav nav-tabs d-flex">
                <li class="active col">
                 <a href="#item1" data-toggle="tab" aria-expanded="true" class="active show">
                  <img src="img/product/1.jpg" alt="img">
                 </a>
                </li>
                <li class="col">
                 <a href="#item2" data-toggle="tab">
                  <img src="img/product/2.jpg" alt="img">
                 </a>
                </li>
                <li class="col">
                 <a href="#item3" data-toggle="tab">
                  <img src="img/product/3.jpg" alt="img">
                 </a>
                </li>
                <li class="col">
                 <a href="#item4" data-toggle="tab">
                  <img src="img/product/5.jpg" alt="img">
                 </a>
                </li>
               </ul> -->
                              <div class="modal fade" id="product-modal" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <div class="modal-body">
                                        <div class="product-detail">
                                          <div>
                                            <div class="images-container">
                                              <div class="js-qv-mask mask tab-content">
                                                <div id="modal-item1" class="tab-pane fade active in show">
                                                  <img src="img/product/<?php
                                                                        echo (fetchProductData()["product_image"]);
                                                                        ?>" alt="img">
                                                </div>
                                                <!-- <div id="modal-item2" class="tab-pane fade">
                         <img src="img/product/2.jpg" alt="img">
                        </div>
                        <div id="modal-item3" class="tab-pane fade">
                         <img src="img/product/3.jpg" alt="img">
                        </div>
                        <div id="modal-item4" class="tab-pane fade">
                         <img src="img/product/5.jpg" alt="img">
                        </div> -->
                                              </div>
                                              <!-- <ul class="product-tab nav nav-tabs">
                        <li class="active">
                         <a href="#modal-item1" data-toggle="tab" class=" active show">
                          <img src="img/product/1.jpg" alt="img">
                         </a>
                        </li>
                        <li>
                         <a href="#modal-item2" data-toggle="tab">
                          <img src="img/product/2.jpg" alt="img">
                         </a>
                        </li>
                        <li>
                         <a href="#modal-item3" data-toggle="tab">
                          <img src="img/product/3.jpg" alt="img">
                         </a>
                        </li>
                        <li>
                         <a href="#modal-item4" data-toggle="tab">
                          <img src="img/product/5.jpg" alt="img">
                         </a>
                        </li>
                       </ul> -->
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
                        <div class="product-info col-xs-12 col-md-7 col-sm-7">
                          <div class="detail-description">
                            <div class="price-del">
                              <span class="price"><?php
                                                  echo (fetchProductData()["product_price"]);
                                                  ?>Jd</span>
                              <span class="float-right">
                                <span class="availb">Availability: </span>
                                <span class="check">
                                  <!-- <i class="fa fa-check-square-o" aria-hidden="true"></i> -->
                                  <?php
                                  echo (fetchProductData()["stock"]);
                                  ?>
                                </span>
                              </span>
                            </div>
                            <p class="description"><?php
                                                    echo (fetchProductData()["product_desc"]);
                                                    ?></p>
                            <div class="has-border cart-area">
                              <div class="product-quantity">
                                <div class="qty">
                                  <div class="input-group">
                                    <div class="quantity">
                                      <span class="control-label">QTY : </span>
                                      <input type="number" name="qty" id="quantity_wanted" value="1" maxlength="2" min="1" max="<?php
                                                                                                                                echo (fetchProductData()["stock"]);
                                                                                                                                ?>" class="input-group form-control">

                                      <!-- <span class="input-group-btn-vertical">
                    <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-up" type="button">
                     +
                    </button>
                    <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-down" type="button">
                     -
                    </button>
                   </span> -->
                                    </div>
                                    <span class="add">
                                      <button class="btn btn-primary add-to-cart add-item" data-button-action="add-to-cart" type="submit">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span>Add to cart</span>
                                      </button>

                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <p class="product-minimal-quantity">
                              </p>
                            </div>

                            <div class="rating-comment has-border d-flex">
                              <div class="read after-has-border">
                                <a href="#review">
                                  <span>REVIEW : <?php
                                                  echo calculateProductRate();
                                                  ?></span>
                                </a>
                              </div>
                              <div class="read after-has-border">
                                <a href="#review">
                                  <i class="fa fa-commenting-o color" aria-hidden="true"></i>
                                  <span>READ REVIEWS (<?php
                                                      echo count(fetchProductComments());
                                                      ?>)</span>
                                </a>
                              </div>
                              <div class="apen after-has-border">
                                <a href="#review">
                                  <i class="fa fa-pencil color" aria-hidden="true"></i>
                                  <span>WRITE A REVIEW</span>
                                </a>
                              </div>
                            </div>
                            <div class="content">
                              <p>ProductNo :
                                <span class="content2">
                                  <?php
                                  echo (fetchProductData()["id"]);
                                  ?>
                                </span>
                              </p>
                              <p>Category :
                                <span class="content2">
                                  <?php
                                  echo (fetchUserCategoryFromId(fetchProductData()["category_id"])["category_name"]);
                                  ?>
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="review">
                        <ul class="nav nav-tabs">
                          <li class="active">
                            <a data-toggle="tab" href="#review" class="active show">Reviews (<?php
                                                                                              echo count(fetchProductComments());
                                                                                              ?>)</a>
                          </li>
                          <li>
                            <a data-toggle="tab" href="#description">Description</a>
                          </li>

                        </ul>

                        <div class="tab-content">
                          <div id="description" class="tab-pane fade in ">
                            <p><?php
                                echo (fetchProductData()["product_desc"]);
                                ?>
                            </p>

                          </div>

                          <div id="review" class="tab-pane fade active show">
                            <div class="spr-form">
                              <div class="user-comment">

                                <?php
                                $userHasReviewed = false;
                                if (!count(fetchProductComments()) <= 0) {
                                  $allreviews = fetchProductComments();
                                  for ($i = 0; $i < count($allreviews); $i++) {
                                    $userFullName = (fetchUserNameFromId($allreviews[$i]["user_id"])["fullname"]);
                                    if ($allreviews[$i]["user_id"] == $currentUserId) {
                                      $userHasReviewed = true;
                                    }
                                ?>
                                    <div class="spr-review">
                                      <div class="spr-review-header">
                                        <span class="spr-review-header-byline">
                                          <strong><?= $userFullName ?></strong> -
                                          <span><?= $allreviews[$i]["date"] ?></span>
                                        </span>
                                        <div class="rating">
                                          <div class="star-content">
                                            <?php
                                            if ($allreviews[$i]["stars"] > 0) {

                                              for ($j = 0; $j < $allreviews[$i]["stars"]; $j++) {
                                            ?>
                                                <div class="star"></div>
                                            <?php
                                              }
                                            } else {
                                              echo "<small style='text-transform: lowercase; font-size:0.7rem'>without rating</small>";
                                            }
                                            ?>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="spr-review-content">
                                        <p class="spr-review-content-body"><?= $allreviews[$i]["comment_desc"] ?></p>
                                      </div>
                                    </div>
                                <?php
                                  }
                                } else {
                                  echo "There's no reviews for this product so far";
                                }
                                ?>


                              </div>
                            </div>
                            <?php
                            if (!$userHasReviewed) { //!$userHasReviewed
                            ?>

                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="new-review-form">
                                <input type="hidden" name="review[rating]" value="3">
                                <input type="hidden" name="product_id">
                                <h3 class="spr-form-title">Write a review</h3>
                                <fieldset>
                                  <div class="spr-form-review-rating">
                                    <label class="spr-form-label">Your Rating</label>
                                    <fieldset class="ratings">
                                      <input type="radio" id="star5" name="rating" value="5" />
                                      <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                      <input type="radio" id="star4" name="rating" value="4" />
                                      <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                      <input type="radio" id="star3" name="rating" value="3" />
                                      <label class="full" for="star3" title="Meh - 3 stars"></label>
                                      <input type="radio" id="star2" name="rating" value="2" />
                                      <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                      <input type="radio" id="star1" name="rating" value="1" />
                                      <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                    </fieldset>
                                  </div>
                                </fieldset>
                                <fieldset>
                                  <div class="spr-form-review-body">
                                    <div class="spr-form-input">
                                      <textarea class="spr-form-input-textarea" rows="10" placeholder="Write your comments here" name="newUserReview" required></textarea>
                                    </div>
                                  </div>
                                </fieldset>
                                <div class="submit">
                                  <input type="submit" name="addComment" id="submitComment" class="btn btn-default" value="Submit Review">
                                </div>
                              </form>
                            <?php
                            }
                            ?>
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

  <!-- Template JS -->
  <script src="js/theme.js"></script>
</body>



</html>