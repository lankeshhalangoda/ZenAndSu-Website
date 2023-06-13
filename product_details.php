<?php
session_start();
require "connection.php";

if (isset($_GET["id"])) {
    $pid = $_GET["id"];

    $products = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
    $pn = $products->num_rows;

    if ($pn == 1) {
        $pd = $products->fetch_assoc();

?>
        <!DOCTYPE html>
        <html lang="eng">

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <title>Zen & Su | Product Details</title>

            <!-- ::::::::::::::Favicon icon::::::::::::::-->
            <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">

            <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
            <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
            <link rel="stylesheet" href="assets/css/style.min.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/snackbar.min.css">

            <style>
                .sticky-color--black {
                    background-color: #2d2f3e;
                }

                @media (max-width:524px) {
                    .main_imgs {
                        width: 500px;
                        height: 300px;
                    }

                }

                @media (min-width:524px) {
                    .main_imgs {
                        width: 500px;
                        height: 450px;
                    }

                    .responsive_maker1 {
                        margin-top: 50px;
                    }
                }
            </style>

            <!-- Messenger Chat Plugin Code -->
            <div id="fb-root"></div>

            <!-- Your Chat Plugin code -->
            <div id="fb-customer-chat" class="fb-customerchat">
            </div>

            <script>
                var chatbox = document.getElementById('fb-customer-chat');
                chatbox.setAttribute("page_id", "101481332267271");
                chatbox.setAttribute("attribution", "biz_inbox");
            </script>

            <!-- Your SDK code -->
            <script>
                window.fbAsyncInit = function() {
                    FB.init({
                        xfbml: true,
                        version: 'v12.0'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

        </head>

        <body onload="disble_product_size();">


            <?php
            require "large_header.php";
            require "mobile_header.php";
            ?>


            <!-- ...:::: Start Breadcrumb Section:::... -->
            <div class="breadcrumb-section breadcrumb-bg-color--product-detsils">
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-lg-0">
                                <h3 class="breadcrumb-title">Product Details</h3>
                                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden d-md-none">
                                    <nav aria-label="breadcrumb">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li class="active" aria-current="page">Product Details</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ...:::: End Breadcrumb Section:::... -->


            <!-- Start Product Details Section -->

            <div class="product-details-section mt-7 mt-lg-10">
                <div class="container">
                    <div class="row">


                        <div class="col-xl-5 col-lg-6">
                            <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                                <!-- Start Large Image -->
                                <div class="product-large-image product-large-image-horaizontal swiper-container">
                                    <div class="swiper-wrapper">

                                        <?php
                                        $pimg = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $pid . "'");
                                        $pimgd = $pimg->fetch_assoc();
                                        ?>

                                        <div style=" background-repeat: no-repeat;width: 100px;" class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                            <img class="main_imgs" id="thumbnail_photo1" style="object-fit: cover; background-repeat: no-repeat;" src="<?php echo $pimgd["code"]; ?>" alt="">
                                        </div>

                                        <?php

                                        $img_rs1 = Database::search("SELECT `product_img1` AS `product_img001` FROM `stock` WHERE `product_id` = '" . $pid . "' ");
                                        $img_r1 = $img_rs1->num_rows;

                                        for ($a = 0; $a < $img_r1; $a++) {
                                            $img_data1 = $img_rs1->fetch_assoc();

                                            if (!empty($img_data1["product_img001"])) {
                                        ?>
                                                <div class="product-image-large-image swiper-slide zoom-image-hover  img-responsive">
                                                    <img class="main_imgs img-fluid" id="small_photo1" style="object-fit: cover; background-repeat: no-repeat;" src="<?php echo $img_data1["product_img001"]; ?>" alt="">
                                                </div>
                                        <?php
                                            }
                                        }

                                        ?>
                                        <!-- small photo set 1 -->
                                        <div class="product-image-large-image swiper-slide zoom-image-hover  img-responsive">
                                            <img class="main_imgs img-fluid" id="small_photo_set1" style="object-fit: cover; background-repeat: no-repeat;" src="" alt="">
                                        </div>

                                        <?php

                                        $img_rs02 = Database::search("SELECT `product_img2` AS `product_img002` FROM `stock` WHERE `product_id` = '" . $pid . "' ");
                                        $img_r02 = $img_rs02->num_rows;

                                        for ($a = 0; $a < $img_r02; $a++) {
                                            $img_data02 = $img_rs02->fetch_assoc();

                                        ?>
                                            <?php
                                            if (!empty($img_data02["product_img002"])) {
                                            ?>
                                                <div class="product-image-large-image swiper-slide zoom-image-hover zoom-image-hover img-responsive">
                                                    <img class="main_imgs img-fluid" id="small_photo2" style="object-fit: cover; background-repeat: no-repeat;" src="<?php echo $img_data02["product_img002"]; ?>" alt="">
                                                </div>
                                        <?php
                                            }
                                        }

                                        ?>
                                        <!-- small photo set 2 -->
                                        <div class="product-image-large-image swiper-slide zoom-image-hover zoom-image-hover img-responsive">
                                            <img class="main_imgs img-fluid" id="small_photo_set2" style="object-fit: cover; background-repeat: no-repeat;" src="" alt="">
                                        </div>

                                        <!-- <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                            <img src="assets/images/product/default/home-1/default-2.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                            <img src="assets/images/product/default/home-1/default-3.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                            <img src="assets/images/product/default/home-1/default-4.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                            <img src="assets/images/product/default/home-1/default-5.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                            <img src="assets/images/product/default/home-1/default-6.jpg" alt="">
                                        </div> -->
                                    </div>
                                </div>
                                <!-- End Large Image -->
                                <!-- Start Thumbnail Image -->
                                <div class="responsive_maker1 product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-lg-5 mt-10 ">
                                    <div style="transition: none;" id="small_pic_id" class="swiper-wrapper">

                                        <div class="product-image-thumb-single swiper-slide">
                                            <img id="zoom_thumbnail" style="object-fit: cover; width: 100px; height: 100px;" class="img-fluid" src="<?php echo $pimgd["code"]; ?>" alt="">
                                        </div>



                                        <?php

                                        $img_rs = Database::search("SELECT DISTINCT `product_img1` AS `product_img01` FROM `stock` WHERE `product_id` = '" . $pid . "' ");
                                        $img_r = $img_rs->num_rows;

                                        // echo $img_r;

                                        for ($x = 0; $x < $img_r; $x++) {
                                            $img_data = $img_rs->fetch_assoc();

                                            if (!empty($img_data["product_img01"])) {
                                        ?>

                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img id="smallphoto1" style="object-fit: cover; width: 100px; height: 100px;" class="img-fluid" src="<?php echo $img_data["product_img01"]; ?>" alt="">
                                                </div>
                                        <?php
                                            }
                                        }


                                        ?>
                                        <!-- Set img 1 -->
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img id="smallphoto_set1" style="object-fit: cover; width: 100px; height: 100px;" class="img-fluid" src="" alt="">
                                        </div>

                                        <?php

                                        $img_rs2 = Database::search("SELECT DISTINCT `product_img2` AS `product_img02` FROM `stock` WHERE `product_id` = '" . $pid . "' ");
                                        $img_r2 = $img_rs2->num_rows;

                                        // echo $img_r;

                                        // for ($x = 0; $x < $img_r2; $x++) {
                                        $img_data2 = $img_rs2->fetch_assoc();

                                        ?>

                                        <?php
                                        if (!empty($img_data2["product_img02"])) {
                                        ?>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img id="smallphoto2" style="object-fit: cover; width: 100px; height: 100px;" class="img-fluid" src="<?php echo $img_data2["product_img02"]; ?>" alt="">
                                            </div>
                                        <?php
                                        }
                                        // }

                                        ?>

                                        <div class="product-image-thumb-single swiper-slide">
                                            <img id="smallphoto_set2" style="object-fit: cover; width: 100px; height: 100px;" class="img-fluid" src="" alt="">
                                        </div>

                                        <!--                                         
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid" src="assets/images/product/default/home-1/default-2.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid" src="assets/images/product/default/home-1/default-3.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid" src="assets/images/product/default/home-1/default-4.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid" src="assets/images/product/default/home-1/default-5.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid" src="assets/images/product/default/home-1/default-6.jpg" alt="">
                                        </div> -->
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="gallery-thumb-arrow swiper-button-next"></div>
                                    <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                </div>
                                <!-- End Thumbnail Image -->
                            </div>
                        </div>



                        <div class="col-xl-7 col-lg-6">
                            <div class="product-details-content-area product-details--golden" data-aos="fade-up" data-aos-delay="200">
                                <!-- Start  Product Details Text Area-->
                                <div class="product-details-text">
                                    <h6 style="font-size: 1.7em;" class="title"><?php echo $pd["title"] ?></h6>
                                    <h6 class="product-ref ">Reference By: <span>Zen & Su</span></h6>
                                    <div class="d-flex align-items-center">
                                        <ul class="review-star">
                                            <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                            <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                            <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                            <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                            <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                        </ul>
                                        <a href="#" class="customer-review ml-2">(Customer Feedbacks )</a>
                                    </div>
                                    <div class="price fw-bolder">LKR <?php echo $pd["newPrice"] ?> .00 <span style="font-size: medium;"><del>LKR <?php echo $pd["price"] ?> .00</del></span> <?php
                                                                                                                                                                                                if ($pd["discount"] != 0) {
                                                                                                                                                                                                ?>
                                            <span style="font-weight: bolder; font-size: 1.1em; color: black;"><?php echo $pd["discount"]; ?> % OFF</span>
                                        <?php
                                                                                                                                                                                                }
                                        ?>
                                    </div>



                                    <?php
                                    if (!empty($pd["coupon"])) {
                                    ?>
                                        <p style="background-color: black;" class="text-white pt-1 pb-1 pl-5 pr-5 col-12 col-md-6" style="font-size: 1.4em;">Coupon code : <span class=""><?php echo $pd["coupon"] ?></span></p>



                                        <!-- User Quick Action Form -->
                                        <div style="margin-bottom: -30px;" class="col-12">
                                            <div class="user-actions accordion " data-aos="fade-up" data-aos-delay="100">
                                                <h3 style="border-color: black;">
                                                    <i class="fa fa-file-o" aria-hidden="true"></i>
                                                    Quickly Get <?php echo $pd["discount"]; ?>% Discount
                                                    <a class="Returning text-success" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>

                                                </h3>
                                                <div id="checkout_coupon" class="collapse checkout_coupon" data-parent="#checkout_coupon">
                                                    <div class="checkout_info">
                                                        <input class="border border-2 border-secondary" id="coupon_id" placeholder="Coupon code" type="text">
                                                        <button onclick="couponf(<?php echo $pd['id']; ?>);" class="btn btn-md btn-black-default-hover">Apply coupon</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- User Quick Action Form -->




                                    <?php
                                    } else {
                                    ?>
                                        <input class="border border-2 border-secondary d-none" id="coupon_id" value="0" placeholder="Coupon code" type="text">
                                    <?php
                                    }
                                    ?>




                                </div>
                                <!-- End  Product Details Text Area-->
                                <!-- Start Product Variable Area -->
                                <div style="border: none; padding: 0%;" class="product-details-variable">
                                    <h4 class="title">Available Options</h4>
                                    <!-- Product Variable Single Item -->
                                    <div class="variable-single-item">
                                        <?php
                                        if (!empty($pd["total_qty"]) || $pd["total_qty"] != 0) {
                                        ?>
                                            <div class="product-stock"> <span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> <?php echo $pd["total_qty"] ?> Total Available Stocks</div>
                                        <?php
                                        } else {
                                        ?>
                                            <div style="font-weight: bolder; font-size: 1.5em;" class="product-stock text-danger"> <span class="product-stock-in"><i class="information"></i></span>OUT OF STOCK !!</div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- Product Variable Single Item -->

                                    <?php

                                    $stock_rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "'");
                                    $stockr = $stock_rs->num_rows;

                                    ?>

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12 col-md-4">
                                                <div class="variable-single-item">
                                                    <span>Select Package Type</span>
                                                    <select class="product-variable-size border-dark" id="color_set" onchange="auto_size(); auto_img_set(<?php echo $pid ?>);">
                                                        <option value="0"> Select Package Type</option>
                                                        <?php
                                                        for ($z = 0; $z < $stockr; $z++) {
                                                            $stock_data = $stock_rs->fetch_assoc();
                                                            $stock_id = $stock_data["id"];
                                                            $clr_v = $stock_data["color_variation"];

                                                        ?>

                                                            <?php
                                                            if (empty($clr_v)) {
                                                            ?>
                                                                <option value="<?php echo $stock_id; ?>">Bottle</option>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value="<?php echo $stock_id; ?>"><?php echo $clr_v ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">

                                                <!-- Product Variable Single Item -->
                                                <div class="variable-single-item">
                                                    <span>Select Size</span>
                                                    <div id="size_div">
                                                        <select id="size_id" class="form-control product-variable-size border-dark">
                                                            <option value="0">Please Package Type First</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <span style="font-family: 'calibri';">QTY: &nbsp;&nbsp;</span>

                                            <div class="col-1 col-md-1">
                                                <div class="qty">
                                                    <button onclick="qty_dec();" class="btn-minus"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-4">
                                                <div class="qty">
                                                    <input class=" form-control" id="qtyinput" disabled type="number" value="1" oninput="this.value = Math.abs(this.value='1')">
                                                    <input class="form-control d-none" id="qtyinput<?php echo $pd['id']; ?>" disabled type="number" value="1">
                                                </div>
                                            </div>
                                            <div class="col-1 col-md-1">
                                                <div class="qty">
                                                    <button onclick="qty_inc(<?php echo $pd['total_qty']; ?>);" class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-4">
                                                <div id="qty_div">
                                                    <span id="qty_set">Please select both</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Product Variable Single Item -->



                                    <!-- <div class="product-add-to-cart-btn col-12 col-md-12 d-grid">
                                            <a href="#" class="col-4">Buy Now</a>
                                        </div> -->

                                    <button onclick="addToCart1(<?php echo $pid ?>);" class="product-add-to-cart-btn text-white col-12 col-md-5 d-grid btn btn-dark p-2"><i class="fa fa-shopping-basket"></i>&nbsp;&nbsp;Add To Cart</button>

                                    <?php
                                    if (empty($pd["total_qty"]) || $pd["total_qty"] == 0) {
                                    ?>
                                        <button disabled class="product-add-to-cart-btn text-white col-12 col-md-6 d-grid btn btn-dark p-2">Buy Now</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button onclick="paynow(<?php echo $pd['id']; ?>);" class="product-add-to-cart-btn text-white col-12 col-md-6 d-grid btn btn-dark p-2 ml-0 mt-3 mt-md-0 ml-md-3">Buy Now</button>
                                    <?php
                                    }
                                    ?>


                                    <!-- Start  Product Details Meta Area-->
                                    <div class="product-details-meta mt-2 mb-20">
                                        <a onclick="addToWishList(<?php echo $pd['id'] ?>);" href="#" class="icon-space-right"><i class="icon-heart"></i>Add to wishlist</a>&nbsp;
                                        <a href="javascript:history.go(-1)" class="icon-space-right"><i class="icon-refresh"></i>Back</a>&nbsp;
                                        <a href="tel:+94767740385" class="icon-space-right"><i class="fa fa-mobile"></i>Contact Seller</a>&nbsp;
                                    </div>
                                    <!-- End  Product Details Meta Area-->
                                </div>
                                <!-- End Product Variable Area -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Section -->

            <!-- Start Product Content Tab Section -->
            <div class="product-details-content-tab-section section-top-gap-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                                <!-- Start Product Details Tab Button -->
                                <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                                    <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                            Description
                                        </a></li>
                                    <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                            Specification
                                        </a></li>
                                    <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                            Reviews (0)
                                        </a></li>
                                </ul>
                                <!-- End Product Details Tab Button -->

                                <!-- Start Product Details Tab Content -->
                                <div class="product-details-content-tab">
                                    <div class="tab-content">
                                        <!-- Start Product Details Tab Content Singel -->
                                        <div class="tab-pane active show" id="description">
                                            <div class="single-tab-content-item">
                                                <p>
                                                    <?php
                                                    $desc_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "' ");
                                                    $desc = $desc_rs->fetch_assoc();

                                                    echo $desc["description"];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- End Product Details Tab Content Singel -->
                                        <!-- Start Product Details Tab Content Singel -->
                                        <div class="tab-pane" id="specification">
                                            <div class="single-tab-content-item">
                                                <table class="table table-bordered mb-20 ">
                                                    <tbody>

                                                        <?php
                                                        $prod_spec_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "' ");
                                                        $prod_spec_r = $prod_spec_rs->num_rows;
                                                        ?>

                                                        <?php
                                                        for ($y = 0; $y < $prod_spec_r; $y++) {
                                                            $prod_spec_data = $prod_spec_rs->fetch_assoc();
                                                        ?>
                                                            <tr>
                                                                <th scope="row">Product ID</th>
                                                                <td>#<?php echo $prod_spec_data["id"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Listed Date</th>
                                                                <td><?php echo $prod_spec_data["datetime_added"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Available Brand</th>
                                                                <td><?php echo $prod_spec_data["brand"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Product Material</th>
                                                                <td><?php echo $prod_spec_data["material"]; ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        $stock_spec_rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' ");
                                                        $stock_spec_r = $stock_spec_rs->num_rows;
                                                        ?>

                                                        <tr>
                                                            <th scope="row">Color Variations</th>
                                                            <?php
                                                            for ($b = 0; $b < $stock_spec_r; $b++) {
                                                                $stock_spec_data = $stock_spec_rs->fetch_assoc();
                                                            ?>

                                                                <td><?php echo $stock_spec_data["color_variation"]; ?></td>


                                                            <?php
                                                            }
                                                            ?>
                                                        </tr>


                                                        <tr>
                                                            <th scope="row">Available Sizes
                                                            </th>

                                                            <?php
                                                            if ($stock_spec_data["XS"] != 0) {
                                                            ?>
                                                                <td>XS</td>
                                                            <?php
                                                            }
                                                            if ($stock_spec_data["S"] != 0) {
                                                            ?>
                                                                <td>S</td>
                                                            <?php
                                                            }
                                                            if ($stock_spec_data["M"] != 0) {
                                                            ?>
                                                                <td>M</td>
                                                            <?php
                                                            }
                                                            if ($stock_spec_data["L"] != 0) {
                                                            ?>
                                                                <td>L</td>
                                                            <?php
                                                            }
                                                            if ($stock_spec_data["XL"] != 0) {
                                                            ?>
                                                                <td>XL</td>
                                                            <?php
                                                            }
                                                            if ($stock_spec_data["XXL"] != 0) {
                                                            ?>
                                                                <td>XXL</td>
                                                            <?php
                                                            }
                                                            if ($stock_spec_data["XXXL"] != 0) {
                                                            ?>
                                                                <td>XXXL</td>
                                                            <?php
                                                            }
                                                            if ($stock_spec_data["4XL"] != 0) {
                                                            ?>
                                                                <td>4XL</td>
                                                            <?php
                                                            }
                                                            ?>

                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- End Product Details Tab Content Singel -->
                                        <!-- Start Product Details Tab Content Singel -->
                                        <div class="tab-pane" id="review">
                                            <div class="single-tab-content-item">
                                                <!-- Start - Review Comment -->
                                                <ul class="comment">



                                                    <!-- Start - Review Comment list-->
                                                    <!-- <li class="comment-list">
                                                        <div class="comment-wrapper">
                                                            <div class="comment-img">
                                                                <img src="assets/images/user/image-1.png" alt="">
                                                            </div>
                                                            <div class="comment-content">
                                                                <div class="comment-content-top">
                                                                    <div class="comment-content-left">
                                                                        <h6 class="comment-name">Kaedyn Fraser</h6>
                                                                        <ul class="review-star">
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="empty"><i class="ion-android-star"></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="comment-content-right">
                                                                        <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                    </div>
                                                                </div>

                                                                <div class="para-content">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos
                                                                        aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores
                                                                        quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="comment-reply">
                                                            <li class="comment-reply-list">
                                                                <div class="comment-wrapper">
                                                                    <div class="comment-img">
                                                                        <img src="assets/images/user/image-2.png" alt="">
                                                                    </div>
                                                                    <div class="comment-content">
                                                                        <div class="comment-content-top">
                                                                            <div class="comment-content-left">
                                                                                <h6 class="comment-name">Oaklee Odom</h6>
                                                                            </div>
                                                                            <div class="comment-content-right">
                                                                                <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="para-content">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos
                                                                                aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim
                                                                                dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                       
                                                    </li> -->
                                                    <!-- End - Review Comment list-->
                                                    <!-- Start - Review Comment list-->
                                                    <!-- <li class="comment-list">
                                                        <div class="comment-wrapper">
                                                            <div class="comment-img">
                                                                <img src="assets/images/user/image-3.png" alt="">
                                                            </div>
                                                            <div class="comment-content">
                                                                <div class="comment-content-top">
                                                                    <div class="comment-content-left">
                                                                        <h6 class="comment-name">Jaydin Jones</h6>
                                                                        <ul class="review-star">
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="empty"><i class="ion-android-star"></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="comment-content-right">
                                                                        <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                    </div>
                                                                </div>

                                                                <div class="para-content">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos
                                                                        aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores
                                                                        quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li> -->
                                                    <!-- End - Review Comment list-->
                                                    <!-- </ul> -->
                                                    <!-- End - Review Comment -->
                                                    <!-- <div class="review-form">
                                                    <div class="review-form-text-top">
                                                        <h5>ADD A REVIEW</h5>
                                                        <p>Your email address will not be published. Required fields are marked *
                                                        </p>
                                                    </div>

                                                    <form action="#" method="post">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="default-form-box">
                                                                    <label for="comment-name">Your name <span>*</span></label>
                                                                    <input id="comment-name" type="text" placeholder="Enter your name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="default-form-box">
                                                                    <label for="comment-email">Your Email <span>*</span></label>
                                                                    <input id="comment-email" type="email" placeholder="Enter your email" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="default-form-box">
                                                                    <label for="comment-review-text">Your review
                                                                        <span>*</span></label>
                                                                    <textarea id="comment-review-text" placeholder="Write a review" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn btn-md btn-black-default-hover" type="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- End Product Details Tab Content Singel -->
                                    </div>
                                </div>
                                <!-- End Product Details Tab Content -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Content Tab Section -->

            <!-- Start Product Default Slider Section -->
            <div class="product-default-slider-section section-top-gap-100 section-fluid">
                <!-- Start Section Content Text Area -->
                <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content-gap">
                                    <div class="secton-content">
                                        <h3 class="section-title">RELATED PRODUCTS</h3>
                                        <p>Browse the collection of our related products.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Section Content Text Area -->
                <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-slider-default-1row default-slider-nav-arrow">
                                    <!-- Slider main container -->
                                    <div class="swiper-container product-default-slider-4grid-1row">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- End Product Default Single Item -->

                                            <?php
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE product.`id` = '" . $pid . "' ");
                                            $product_data = $product_rs->fetch_assoc();
                                            $pcateg = $product_data["category_has_type_id"];

                                            $categ_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_img` ON product.id=product_img.product_id  WHERE product.`status_id` = '1' AND product.`category_has_type_id` = '" . $pcateg . "' ORDER BY  `datetime_added` DESC LIMIT 12 ");
                                            $related_prod_rows = $categ_rs->num_rows;
                                            // echo $related_prod_rows;

                                            for ($x = 0; $x < $related_prod_rows; $x++) {
                                                $related_products = $categ_rs->fetch_assoc();
                                                $pid = $related_products["id"];
                                            ?>

                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden swiper-slide">
                                                    <div class="image-box">
                                                        <a href="<?php echo "product_details.php?id=" . ($pid); ?>" class="image-link">

                                                            <?php
                                                            $stock_rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' LIMIT 1");
                                                            $stock_data = $stock_rs->fetch_assoc();
                                                            ?>

                                                            <img style="object-fit: cover; height: 350px;" src="<?php echo $related_products["code"]; ?>" alt="">

                                                        </a>

                                                        <?php
                                                        if ($related_products["total_qty"] == 0) {
                                                        ?>
                                                            <div class="tag">
                                                                <span style="background-color: red;">Out OF Stock</span>
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
                                                                <a onclick="addToWishList(<?php echo $product_data['id'] ?>);" href="#" data-bs-toggle="modal" data-bs-target="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i style="font-weight: bolder; font-size: 0.9em;" class="icon-heart"></i>&nbsp; Add To Wishlist</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="<?php echo "product_details.php?id=" . ($pid); ?>"><i class="icon-magnifier" data-toggle="tooltip" data-placement="top" title="View Product"></i> </a>
                                                                <a href="shop-grid-sidebar-left.php"><i class="icon-shuffle" data-toggle="tooltip" data-placement="top" title="All Products"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 style="text-transform: none; font-size: 1.1em; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 270px;" class="title"><a href="<?php echo "product_details.php?id=" . ($related_products['id']); ?>"><?php echo $related_products["title"] ?></a></h6>
                                                            <ul class="review-star">
                                                                <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                                                <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                                                <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                                                <li class="fill text-danger"><i class="ion-android-star"></i></li>
                                                                <li class="empty text-danger"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                            <div class="content-right">
                                                                <span class="price">
                                                                    <h3> LKR <?php echo $related_products["newPrice"]; ?> /= </h3>
                                                                    <?php
                                                                    if ($related_products["discount"] != 0) {
                                                                    ?>
                                                                        <del class="text-danger"> LKR <?php echo $related_products["price"]; ?> /=</del>
                                                                </span>
                                                            <?php
                                                                    }
                                                            ?>
                                                            <?php
                                                            if ($related_products["discount"] != 0) {
                                                            ?>
                                                                <span style="font-weight: bolder; font-size: 1.3em; color: black;"><?php echo $related_products["discount"]; ?> % OFF</span>
                                                            <?php
                                                            }
                                                            ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->

                                            <?php
                                            }

                                            ?>

                                            <!-- Start Product Default Single Item -->
                                            <!-- <div class="product-default-single-item product-color--golden swiper-slide">
                                                <div class="image-box">
                                                    <a href="product-details-default.html" class="image-link">
                                                        <img src="assets/images/product/default/home-1/default-7.jpg" alt="">
                                                        <img src="assets/images/product/default/home-1/default-8.jpg" alt="">
                                                    </a>
                                                    <div class="action-link">
                                                        <div class="action-link-left">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to Cart</a>
                                                        </div>
                                                        <div class="action-link-right">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                            <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-left">
                                                        <h6 class="title"><a href="product-details-default.html">Donec eu libero
                                                                ac</a></h6>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="content-right">
                                                        <span class="price">$74</span>
                                                    </div>

                                                </div>
                                            </div> -->
                                            <!-- End Product Default Single Item -->
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

            <?php
            require "company_logo.php";
            require "footer.php";
            ?>

            <!-- material-scrolltop button -->
            <button style="left: 23px;" class="material-scrolltop bg-dark" type="button"></button>



            <script src="assets/js/vendor/vendor.min.js"></script>
            <script src="assets/js/plugins/plugins.min.js"></script>
            <script src="assets/js/script.js"></script>
            <!-- Main JS -->
            <script src="assets/js/main.js"></script>
            <script src="assets/js/snackbar.min.js"></script>
            <!-- <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script> -->
        </body>


        </html>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>