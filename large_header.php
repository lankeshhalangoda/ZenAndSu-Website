<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <!-- Start Header Area -->
    <header style="position: static; z-index: 999; width: 100%; background-color: #3a3b5a;" class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--black section-fluid sticky-header sticky-color--black">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/images/logo/logo-main.png" alt=""></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--white menu-hover-color--pink">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="index.php">Home </a>
                                        </li>

                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="shop-grid-sidebar-left.php">Shop </a>
                                        </li>

                                        <!-- <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html">Shop <i class="fa fa-angle-down"></i></a> -->
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title">Shop Layouts</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="shop-grid-sidebar-left.html">Grid Left
                                                                    Sidebar</a></li>
                                                            <li><a href="shop-grid-sidebar-right.html">Grid Right
                                                                    Sidebar</a></li>
                                                            <li><a href="shop-full-width.html">Full Width</a></li>
                                                            <li><a href="shop-list-sidebar-left.html">List Left
                                                                    Sidebar</a></li>
                                                            <li><a href="shop-list-sidebar-right.html">List Right
                                                                    Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title">Other Pages</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="cart.html">Cart</a></li>
                                                            <li><a href="empty-cart.html">Cart</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="compare.html">Compare</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="login.html">Login</a></li>
                                                            <li><a href="my-account.html">My Account</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title">Product Types</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="product-details-default.html">Product
                                                                    Default</a></li>
                                                            <li><a href="product-details-variable.html">Product
                                                                    Variable</a></li>
                                                            <li><a href="product-details-affiliate.html">Product
                                                                    Referral</a></li>
                                                            <li><a href="product-details-group.html">Product Group</a>
                                                            </li>
                                                            <li><a href="product-details-single-slide.html">Product
                                                                    Slider</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title">Product Types</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="product-details-tab-left.html">Product Tab
                                                                    Left</a></li>
                                                            <li><a href="product-details-tab-right.html">Product Tab
                                                                    Right</a></li>
                                                            <li><a href="product-details-gallery-left.html">Product
                                                                    Gallery Left</a></li>
                                                            <li><a href="product-details-gallery-right.html">Product
                                                                    Gallery Right</a></li>
                                                            <li><a href="product-details-sticky-left.html">Product
                                                                    Sticky Left</a></li>
                                                            <li><a href="product-details-sticky-right.html">Product
                                                                    Sticky Right</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <div class="menu-banner">
                                                    <a href="#" class="menu-banner-link">
                                                        <img style="object-fit: cover; height: 200px;" class="menu-banner-img" src="assets/images/banner/header_banner.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                        

                                        <li>
                                            <a href="about-us.php">About Us</a>
                                        </li>
                                        <li>
                                            <a href="contact-us.php">Contact Us</a>
                                        </li>

                                        <?php
                                        if (isset($_SESSION["u"])) {
                                            $fname = $_SESSION["u"]["fname"];
                                            $lname =  $_SESSION["u"]["lname"];
                                            $gender =  $_SESSION["u"]["gender_id"];
                                        ?>
                                            <li class="logi-div">
                                                <a href="my_account.php">

                                                    <?php
                                                    if ($gender == 1) {
                                                    ?>
                                                        <span class="d-signin1">Mr . <?php echo $fname; ?></span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="d-signin1">Mrs . <?php echo $fname; ?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <!-- <span class="d-signin1"> <?php echo $fname . " " . $lname; ?> </span> -->
                                                </a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="logi-div">
                                                <a href="login.php">
                                                    <span class="d-signin1">Sign Up / Sign In</span>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>


                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--white action-hover-color--pink">

                                <!-- Wishlist -->
                                <?php

                                if (isset($_SESSION["u"])) {
                                    $u_email = $_SESSION["u"]["email"];


                                    $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $u_email . "' ");
                                    $user_r = $user->num_rows;

                                    if ($user_r != 0) {

                                        $user_data = $user->fetch_assoc();
                                        $user_id = $user_data["id"];

                                        $wish = Database::search("SELECT * FROM `wishlist` WHERE `user_id` = '" . $user_id . "' ");
                                        $wishn = $wish->num_rows;

                                        if ($wishn >= 1) {
                                ?>
                                            <li>
                                                <a href="wishlist.php">
                                                    <i class="icon-heart"></i>
                                                    <span class="item-count"><?php echo $wishn; ?></span>
                                                </a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li>
                                                <a href="wishlist.php">
                                                    <i class="icon-heart"></i>
                                                    <span class="item-count">0</span>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                    <?php

                                    } else {

                                    ?>
                                        <li>
                                            <a href="wishlist.php">
                                                <i class="icon-heart"></i>
                                                <span class="item-count">0</span>
                                            </a>
                                        </li>

                                    <?php

                                    }
                                } else {
                                    ?>
                                    <li>
                                        <a href="wishlist.php">
                                            <i class="icon-heart"></i>
                                            <span class="item-count">0</span>
                                        </a>
                                    </li>

                                <?php
                                }

                                ?>




                                <!-- Cart -->

                                <?php


                                if (isset($_SESSION["u"])) {
                                    $u_email = $_SESSION["u"]["email"];


                                    $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $u_email . "' ");
                                    $user_r = $user->num_rows;

                                    if ($user_r != 0) {

                                        $user_data = $user->fetch_assoc();
                                        $user_id = $user_data["id"];

                                        $wish = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $user_id . "' ");
                                        $cartr = $wish->num_rows;

                                        if ($cartr >= 1) {
                                ?>
                                            <li>
                                                <a href="cart.php">
                                                    <i class="icon-bag"></i>
                                                    <span class="item-count"><?php echo $cartr; ?></span>
                                                </a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li>
                                                <a href="cart.php">
                                                    <i class="icon-bag"></i>
                                                    <span class="item-count">0</span>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                    <?php

                                    } else {

                                    ?>
                                        <li>
                                            <a href="cart.php">
                                                <i class="icon-bag"></i>
                                                <span class="item-count">0</span>
                                            </a>
                                        </li>

                                    <?php

                                    }
                                } else {
                                    ?>
                                    <li>
                                        <a href="cart.php">
                                            <i class="icon-bag"></i>
                                            <span class="item-count">0</span>
                                        </a>
                                    </li>

                                <?php
                                }

                                ?>



                                <li>
                                    <a href="shop-grid-sidebar-left.php">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header Area -->



</body>

</html>