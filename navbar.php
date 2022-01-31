<header>
   <!-- header left mobie -->
   <div class="header-mobile d-md-none">
      <div class="mobile hidden-md-up text-xs-center d-flex align-items-center justify-content-around">

         <!-- menu left -->
         <!-- <div id="mobile_mainmenu" class="item-mobile-top">
    <i class="fa fa-bars" aria-hidden="true"></i>
   </div> -->

         <!-- logo -->
         <div class="mobile-logo">
            <a href=".">
               <img class="logo-mobile img-fluid" src="img/home/logo-mobie.png" alt="Prestashop_Furnitica">
            </a>
         </div>

         <!-- menu right -->
         <div class="mobile-menutop" data-target="#mobile-pagemenu">
            <i class="fa fa-bars" aria-hidden="true"></i>
         </div>
      </div>

      <!-- search -->
      <div id="mobile_search" class="d-flex">
         <div class="desktop_cart">
            <div class="blockcart block-cart cart-preview tiva-toggle">
               <a href="product-cart.php">
                  <div class="header-cart tiva-toggle-btn">
                     <span class="cart-products-count">
                        <?php
                        if (isset($_SESSION["cart"])) {
                           echo (count($_SESSION["cart"]));
                        } else {
                           echo "0";
                        }
                        ?>
                     </span>
                     <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </div>
               </a>
               <!-- <div class="dropdown-content">
                  <div class="cart-content">
                     <table>
                        <tbody>
                           <tr>
                              <td class="product-image">
                                 <a href="product-detail.php">
                                    <img src="img/product/5.jpg" alt="Product">
                                 </a>
                              </td>
                              <td>
                                 <div class="product-name">
                                    <a href="product-detail.php">Organic Strawberry Fruits</a>
                                 </div>
                                 <div>
                                    2 x
                                    <span class="product-price">£28.98</span>
                                 </div>
                              </td>
                              <td class="action">
                                 <a class="remove" href="#">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                 </a>
                              </td>
                           </tr>
                           <tr class="total">
                              <td colspan="2">Total:</td>
                              <td>£92.96</td>
                           </tr>

                           <tr>
                              <td colspan="3" class="d-flex justify-content-center">
                                 <div class="cart-button">
                                    <a href="product-cart.php" title="View Cart">View Cart</a>
                                    <a href="product-checkout.php" title="Checkout">Checkout</a>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
   </div>

   <!-- header desktop -->
   <div class="header-top d-xs-none ">
      <div class="container">
         <div class="row">
            <!-- logo -->
            <div class="col-sm-2 col-md-2 d-flex align-items-center">
               <div id="logo">
                  <a href=".">
                     <img class="img-fluid" src="img/home/logo.png" alt="logo">
                  </a>
               </div>
            </div>

            <!-- menu -->
            <div class="main-menu col-sm-4 col-md-5 align-items-center justify-content-center navbar-expand-md">
               <div class="menu navbar collapse navbar-collapse">
                  <ul class="menu-top navbar-nav">
                     <li class="nav-link">
                        <a href="." class="parent">Home</a>
                     </li>
                     <li>
                        <a href="shop.php" class="parent">Shop</a>
                     </li>
                     <li>
                        <a href="contact.php" class="parent">Contact US</a>
                     </li>
                  </ul>
               </div>
            </div>

            <!-- search-->
            <div id="search_widget" class="col-sm-6 col-md-5 align-items-center justify-content-end d-flex">


               <!-- acount  -->
               <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                  <div class="myaccount-title">
                     <a href="#acount" data-toggle="collapse" class="acount" style="margin: 0 1rem;">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Account</span>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                     </a>
                  </div>
                  <div id="acount" class="collapse">
                     <div class="account-list-content">
                        <?php if (isset($_SESSION['isLogin'])) : ?>
                           <div>
                              <a class="login" href="user-acount.php" rel="nofollow" title="Log in to your customer account">
                                 <i class="fa fa-cog"></i>
                                 <span>My Account</span>
                              </a>
                           </div>
                           <div>
                              <a class="login" href="shop.php" rel="nofollow" title="Log in to your customer account">
                                 <i class="fa fa-shopping-bag"></i>
                                 <span>Shop</span>
                              </a>
                           </div>
                           <div>
                              <a href="logout.php" title="Logout">
                                 <i class="fa fa-sign-out"></i>
                                 <span>Logout</span>
                              </a>
                           </div>
                        <?php else : ?>

                           <div>
                              <a class="login" href="user-login.php" rel="nofollow" title="Log in to your customer account">
                                 <i class="fa fa-sign-in"></i>
                                 <span>Sign in</span>
                              </a>
                           </div>
                           <div>
                              <a class="register" href="user-register.php" rel="nofollow" title="Register Account">
                                 <i class="fa fa-user"></i>
                                 <span>Register Account</span>
                              </a>
                           </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               <a href="product-cart.php">
                  <div class="desktop_cart">
                     <div class="blockcart block-cart cart-preview tiva-toggle">
                        <div class="header-cart tiva-toggle-btn">
                           <span class="cart-products-count">
                              <?php
                              if (isset($_SESSION["cart"])) {
                                 echo (count($_SESSION["cart"]));
                              } else {
                                 echo "0";
                              }
                              ?></span> <!-- Here -->
                           <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <!-- <div class="dropdown-content">
                           <div class="cart-content">
                              <table>
                                 <tbody>
                                    <tr>
                                       <td class="product-image">
                                          <a href="product-detail.php">
                                             <img src="img/product/5.jpg" alt="Product">
                                          </a>
                                       </td>
                                       <td>
                                          <div class="product-name">
                                             <a href="product-detail.php">Organic Strawberry Fruits</a>
                                          </div>
                                          <div>
                                             2 x
                                             <span class="product-price">£28.98</span>
                                          </div>
                                       </td>
                                       <td class="action">
                                          <a class="remove" href="#">
                                             <i class="fa fa-trash-o" aria-hidden="true"></i>
                                          </a>
                                       </td>
                                    </tr>
                                    <tr class="total">
                                       <td colspan="2">Total:</td>
                                       <td>£92.96</td>
                                    </tr>
   
                                    <tr>
                                       <td colspan="3" class="d-flex justify-content-center">
                                          <div class="cart-button">
                                             <a href="product-cart.php" title="View Cart">View Cart</a>
                                             <a href="product-checkout.php" title="Checkout">Checkout</a>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div> -->

                     </div>
                  </div>
               </a>

            </div>
         </div>
      </div>
   </div>
</header>