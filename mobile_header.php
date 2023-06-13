<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>


    <!-- Start Mobile Header -->
    <div style="position: fixed; z-index: 999; width: 100%; background-color: rgba(0, 0, 0);" class="mobile-header sticky-header mobile-header-bg-color--black section-fluid d-lg-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <!-- Start Mobile Left Side -->
                    <div class="mobile-header-left">
                        <ul class="mobile-menu-logo">
                            <li>
                                <a href="index.php">
                                    <div class="logo">
                                        <img src="assets/images/logo/logo-main.png" alt="">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Left Side -->

                    <!-- Start Mobile Right Side -->
                    <div class="mobile-right-side">
                        <ul class="header-action-link action-color--white action-hover-color--pink">
                            <!-- <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li> -->



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
                                            <a href="wishlist.php" class="offcanvas-toggle">
                                                <i class="icon-heart"></i>
                                                <span class="item-count"><?php echo $wishn; ?></span>
                                            </a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                            <a href="wishlist.php" class="offcanvas-toggle">
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
                                        <a href="wishlist.php" class="offcanvas-toggle">
                                            <i class="icon-heart"></i>
                                            <span class="item-count">0</span>
                                        </a>
                                    </li>

                                <?php

                                }
                            } else {
                                ?>
                                <li>
                                    <a href="wishlist.php" class="offcanvas-toggle">
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
                                <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu offside-menu-color--black">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Right Side -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Header -->




    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>
        <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="index.php"><span>Home</span></a>
                            <!-- <ul class="mobile-sub-menu">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="shop-grid-sidebar-left.php"><span>Shop</span></a>
                            <!-- <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Shop Layout</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="shop-grid-sidebar-left.html">Grid Left Sidebar</a></li>
                                        <li><a href="shop-grid-sidebar-right.html">Grid Right Sidebar</a></li>
                                        <li><a href="shop-full-width.html">Full Width</a></li>
                                        <li><a href="shop-list-sidebar-left.html">List Left Sidebar</a></li>
                                        <li><a href="shop-list-sidebar-right.html">List Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Shop Pages</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="empty-cart.html">Empty Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Product Single</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="product-details-default.html">Product Default</a></li>
                                        <li><a href="product-details-variable.html">Product Variable</a></li>
                                        <li><a href="product-details-affiliate.html">Product Referral</a></li>
                                        <li><a href="product-details-group.html">Product Group</a></li>
                                        <li><a href="product-details-single-slide.html">Product Slider</a></li>
                                        <li><a href="product-details-tab-left.html">Product Tab Left</a></li>
                                        <li><a href="product-details-tab-right.html">Product Tab Right</a></li>
                                        <li><a href="product-details-gallery-left.html">Product Gallery Left</a></li>
                                        <li><a href="product-details-gallery-right.html">Product Gallery Right</a></li>
                                        <li><a href="product-details-sticky-left.html">Product Sticky Left</a></li>
                                        <li><a href="product-details-sticky-right.html">Product Sticky right</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </li>

                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                        <li><a href="login.php">Sign up / Sign in</a></li>
                    </ul>
                </div>
                <!-- End Mobile Menu Nav -->
            </div>
            <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/logo/logo-main.png" alt=""></a>
                </div>

                <address style="color: white;">
                    <span>Zen & Su</span><br />
                    <span>Address: 286 Mandala Pl, Nugegoda</span><br />
                    <span>Email: yash@zenandsu.com</span><br />
                </address>

                <ul class="social-link">
                    <li><i class="fa fa-facebook"></i></a></li>
                    <li><i class="fa fa-whatsapp"></i></a></li>
                    <li><i class="fa fa-instagram"></i></a></li>
                    <li><a href="tel:+94767740385"><i class="fa fa-phone"></i></a></li>
                </ul>

                <ul class="user-link">
                    <li><a href="wishlist.php">Wishlist</a></li>
                    <li><a href="cart.php">Cart</a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->

        </div>
        <!-- End Offcanvas Mobile Menu Wrapper -->
    </div>
    <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>
        <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index.php"><img src="assets/images/logo/logo-main.png" alt=""></a>
            </div>
            <br />

            <address style="color: white;">
                <span>Zen & Su</span><br />
                <span>Address: 286 Mandala Pl, Nugegoda</span><br />
                <span>Email: yash@zenandsu.com</span><br />
            </address>

            <ul class="social-link">
                <li><a target="_blank" ><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                <li><a target="_blank" ><i class="fa fa-instagram"></i></a></li>
                <li><a href="tel:+76767740385"><i class="fa fa-phone"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="wishlist.php">Wishlist</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div>
    <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->




</body>

</html>