<div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up active d-md-none">
  <div class="content-boxpage col">
    <div class="box-header d-flex justify-content-between align-items-center">
      <div class="title-box">Menu</div>
      <div class="close-box">Close</div>
    </div>
    <div class="box-content">
      <nav>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div id="megamenu" class="clearfix">
          <ul class="menu level1">

            <?php if (isset($_SESSION['isLogin'])) : ?>

              <li class="item home-page has-sub">
                <a href="." title="Home">
                  <i class="fa fa-home" aria-hidden="true"></i>Home</a>
              </li>

              <li class="item has-sub">
                <a href="user-acount.php" title="My account">
                <i class="fas fa-id-card"></i></i>My account</a>
              </li>
              <li class="item has-sub">
                <a href="shop.php" title="Shop">
                <i class="fa fa-shopping-bag"></i></i>Shop</a>
              </li>
              <li class="item has-sub">
                <a href="logout.php" title="Logout">
                <i class="fas fa-sign-out-alt"></i></i>Logout</a>
              </li>

            <?php else : ?>

              <li class="item home-page has-sub">
                <a href="." title="Home">
                  <i class="fa fa-home" aria-hidden="true"></i>Home</a>
              </li>
              <li class="item home-page has-sub">
                <a href="user-login.php" title="Login">
                <i class="fa fa-sign-in"></i></i>Sign in</a>
              </li>
              <li class="item home-page has-sub">
                <a href="user-register.php" title="Home">
                <i class="fa fa-user"></i></i>Sign up</a>
              </li>

            <?php endif; ?>

          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>