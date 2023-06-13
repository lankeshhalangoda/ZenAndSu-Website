<?php
session_start();
require "connection.php";
?>

<!DOCTYPE html>
<html lang="eng">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Zen & Su | Home</title>

    
    <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">

    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/ionicons.css">
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/venobox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/snackbar.min.css">


    

</head>

<body>

    <?php
    require "large_header.php";
    require "mobile_header.php";
    ?>


    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-pink">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img style="filter: brightness(60%);" src="assets/images/hero-slider/home-3/woman.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 style="color: white;" class="subtitle">#1 for health and beauty</h4>
                                        <h1 style="color: white;" class="title">Hello There! <br> Welcome to Zen & Su </h1>
                                        <a href="shop-grid-sidebar-left.php" class="btn btn-lg btn-white">Buy Now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img style="filter: brightness(60%)" src="assets/images/hero-slider/home-3/hero-slider-2.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 style="color: white;" class="subtitle">With Discounts and Offers</h4>
                                        <h1 style="color: white;" class="title">Islandwide Delivery <br> Now Available</h1>
                                        <a href="shop-grid-sidebar-left.php" class="btn btn-lg btn-white">Buy Now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Hero Single Slider Item -->

                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img style="filter: brightness(60%)" src="assets/images/hero-slider/home-3/hero-slider-1.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 style="color: white;" class="subtitle">Something new</h4>
                                        <h1 style="color: white;" class="title">Newly Added<br> Facepacks for men & women</h1>
                                        <a href="shop-grid-sidebar-left.php" class="btn btn-lg btn-white">Buy Now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Hero Single Slider Item -->

                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img style="filter: brightness(60%)" src="assets/images/hero-slider/home-3/payment.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 style="color: white;" class="subtitle">Pay Online</h4>
                                        <h1 style="color: white;" class="title">Pay now or pay <br>With Cash On Delivery</h1>
                                        <a href="shop-grid-sidebar-left.php" class="btn btn-lg btn-white">Buy Now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Hero Single Slider Item -->
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-pink"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->

    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-5.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">FAST DELIVERY</h6>
                                <p>Get 10% cash back, free returns, and more!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-6.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">05 DAYS MONEY BACK GUARANTEE</h6>
                                <p>100% satisfaction guaranteed, or get your money back within 05 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-7.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">SECURE PAYMENT</h6>
                                <p>Pay with the world’s most popular and safest payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-8.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">PRIVILEDGE CUSTOMER</h6>
                                <p>Become a priviledge customer and get awesome offers!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <a href="shop-grid-sidebar-left.php">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left" data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img style="object-fit: cover;" class="img-fluid" src="assets/images/banner/1.jpg" alt="" width="100%">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="shop-grid-sidebar-left.php">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left" data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img style="object-fit: cover;" class="img-fluid" src="assets/images/banner/2.jpg" width="100%" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="shop-grid-sidebar-left.php">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left" data-aos="fade-up"  data-aos-delay="400">
                    <div class="image">
                        <img style="object-fit: cover;" class="img-fluid" src="assets/images/banner/3.jpg" width="100%" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">The New Products</h3>
                                <p>Pre-order now to receive exclusive deals, offers & prizes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">

                                    <?php
                                    $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_img` ON product.id=product_img.product_id WHERE `status_id` = '1' ORDER BY  `datetime_added` DESC LIMIT 12");
                                    $product_rows = $product_rs->num_rows;

                                    for ($x = 0; $x < $product_rows; $x++) {
                                        $product_data = $product_rs->fetch_assoc();
                                        $pid = $product_data["id"];
                                    ?>

                                        <!-- Start Product Default Single Item -->
                                        <div class="product-default-single-item product-color--pink swiper-slide">
                                            <div class="image-box">
                                                <a href="<?php echo "product_details.php?id=" . ($pid); ?>" class="image-link">

                                                    <?php
                                                    $stock_rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' LIMIT 1");
                                                    $stock_data = $stock_rs->fetch_assoc();
                                                    ?>

                                                    <img style="object-fit: cover; height: 350px;" src="<?php echo $product_data["code"]; ?>" alt="">
                                                    <img style="object-fit: cover; height: 350px" src="<?php echo $stock_data["product_img1"]; ?>" alt="">
                                                </a>

                                                <?php
                                                if ($product_data["total_qty"] == 0) {
                                                ?>
                                                    <div class="tag">
                                                        <span class="">Out of stock</span>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="tag">
                                                        <span class="bg-danger">In stock</span>
                                                    </div>
                                                <?php
                                                }
                                                ?>



                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <input class="d-none" type="number" value="1" id="qtyinput<?php echo $product_data["id"] ?>">
                                                        <a onclick="addToWishList(<?php echo $product_data['id'] ?>);" href="#" data-bs-toggle="modal" data-bs-target="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i  style="font-weight: bolder; font-size: 0.9em;" class="icon-heart"></i>&nbsp; Add To Wishlist</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="<?php echo "product_details.php?id=" . ($product_data['id']); ?>" ><i style="font-weight: bolder; font-size: 1em;" class="icon-magnifier" data-toggle="tooltip" data-placement="top" title="View Product"></i></a>
                                                        <a href="shop-grid-sidebar-left.php"><i style="font-weight: bolder; font-size: 1em;" class="icon-shuffle" data-toggle="tooltip" data-placement="top" title="All Products"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 style="text-transform: none; font-size: 1.1em; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 270px;" class="title"><a href="product-details-default.html"><?php echo $product_data["title"] ?></a></h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>


                                            </div>
                                            <div class="content-right">
                                                <span class="price"><h3>LKR <?php echo $product_data["newPrice"]; ?> /= </h3>&nbsp;
                                                
                                                <?php
                                                 if ($product_data["discount"] != 0) {
                                                ?>
                                                <del class="text-danger">LKR <?php echo $product_data["price"]; ?> /=</del></span>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($product_data["discount"] != 0) {
                                                ?>
                                                    <span style="font-weight: bolder; font-size: 1.3em; color: black;"><?php echo $product_data["discount"]; ?> % OFF</span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- End Product Default Single Item -->

                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">

        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">

                                    <?php
                                    $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_img` ON product.id=product_img.product_id WHERE `status_id` = '1' ORDER BY  `datetime_added` DESC LIMIT 12 OFFSET 12");
                                    $product_rows = $product_rs->num_rows;

                                    for ($x = 0; $x < $product_rows; $x++) {
                                        $product_data = $product_rs->fetch_assoc();
                                        $pid = $product_data["id"];
                                    ?>

                                        <!-- Start Product Default Single Item -->
                                        <div class="product-default-single-item product-color--pink swiper-slide">
                                            <div class="image-box">
                                                <a href="<?php echo "product_details.php?id=" . ($pid); ?>"  class="image-link">

                                                    <?php
                                                    $stock_rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' LIMIT 1");
                                                    $stock_data = $stock_rs->fetch_assoc();
                                                    ?>

                                                    <img style="object-fit: cover; height: 250px;" src="<?php echo $product_data["code"]; ?>" alt="">
                                                    <img style="object-fit: cover; height: 250px" src="<?php echo $stock_data["product_img1"]; ?>" alt="">
                                                </a>

                                                <?php
                                                if ($product_data["total_qty"] == 0) {
                                                ?>
                                                    <div class="tag">
                                                        <span class="">Out OF Stock</span>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="tag">
                                                        <span class="bg-danger">In Stock</span>
                                                    </div>
                                                <?php
                                                }
                                                ?>



                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                    <a onclick="addToWishList(<?php echo $product_data['id'] ?>);" href="#" data-bs-toggle="modal" data-bs-target="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i  style="font-weight: bolder; font-size: 0.9em;" class="icon-heart"></i>&nbsp; Add To Wishlist</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="<?php echo "product_details.php?id=" . ($product_data['id']); ?>"><i class="icon-magnifier" data-toggle="tooltip" data-placement="top" title="View Product"></i> </a>
                                                        <a href="compare.html"><i class="icon-shuffle" data-toggle="tooltip" data-placement="top" title="All Products"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 style="text-transform: none; font-size: 1.1em; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 270px;" class="title"><a href="product-details-default.html"><?php echo $product_data["title"] ?></a></h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>


                                            </div>
                                            <div class="content-right">
                                                <span class="price">LKR <?php echo $product_data["newPrice"]; ?> /= <del> <?php echo $product_data["price"]; ?> /=</del></span>
                                                <?php
                                                if ($product_data["discount"] != 0) {
                                                ?>
                                                    <span style="font-weight: bolder; font-size: 1.3em; color: black;"><?php echo $product_data["discount"]; ?> % OFF</span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- End Product Default Single Item -->

                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <a href="shop-grid-sidebar-left.php">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left" data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="assets/images/banner/4.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="shop-grid-sidebar-left.php">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left" data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img class="img-fluid" src="assets/images/banner/5.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->




    <?php
    require "company_logo.php";
    ?>



    <?php
    require "footer.php";
    ?>

    <!-- material-scrolltop button -->
    <button style="left: 10px;" class="material-scrolltop bg-dark" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid" src="assets/images/product/default/home-3/default-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart successfully!
                                        </div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.html">View Cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your
                                            Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE
                                            SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Add cart -->


        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "100007954332999");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
    

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script> -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/snackbar.min.js"></script>
</body>



</html>