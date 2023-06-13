<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Zen & Su | Shop</title>

    <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">

    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/snackbar.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .sticky-color--black {
            background-color: #2d2f3e;
        }
    </style>

</head>

<body>
    <?php
    require "large_header.php";
    require "mobile_header.php";
    ?>


    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden" style="background-color: #000;">
        <div class="breadcrumb-wrapper p-6">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-10 mt-lg-0 pt-10">
                        <h3 class="breadcrumb-title text-white fw-bold"><b>Shop</b></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="fw-bold text-white"><a href="index.php" class="text-white">Home</a></li>
                                    <li class="active text-warning" aria-current="page">Shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Breadcrumb Section:::... -->


    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">

                            <h6 class="sidebar-title">CATEGORIES</h6>

                            <select id="ca1" class="form-select" onclick="advancedSearch(0);" style="display:block;">
                                <option value="0">CATEGORIES</option>
                                <?php

                                $categoryResult = Database::search('SELECT * FROM `category`');
                                $cNrows = $categoryResult->num_rows;

                                for ($x = 0; $x < $cNrows; $x++) {
                                    $category = $categoryResult->fetch_assoc();

                                ?>
                                    <option value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option>
                                <?php

                                }

                                ?>

                                <!-- <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option> -->
                            </select>


                        </div>
                        <!-- End Single Sidebar Widget -->


                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">TYPE</h6>

                            <select name="" id="ty" class="form-select" onclick="advancedSearch(0);">
                                <option value="0">TYPE</option>
                                <?php

                                $typeResult = Database::search('SELECT * FROM `type`');
                                $tNrows = $typeResult->num_rows;

                                for ($x = 0; $x < $tNrows; $x++) {
                                    $type = $typeResult->fetch_assoc();

                                ?>
                                    <option value="<?php echo $type["id"] ?>"><?php echo $type["name"] ?></option>
                                <?php

                                }

                                ?>

                                <!-- <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option> -->
                            </select>


                        </div>
                        <!-- End Single Sidebar Widget -->



                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <!-- <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">COLOUR</h6> -->

                            <select name="" id="clr" class="form-select" onclick="advancedSearch(0);" hidden>
                                <option value="0">COLOUR</option>
                                <?php

                                $colorResult = Database::search('SELECT * FROM `color`');
                                $cNrows = $colorResult->num_rows;

                                for ($x = 0; $x < $cNrows; $x++) {
                                    $color = $colorResult->fetch_assoc();

                                ?>
                                    <option value="<?php echo $color["id"] ?>"><?php echo $color["name"] ?></option>
                                <?php

                                }

                                ?>

                                <!-- <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option> -->
                            </select>


                        <!-- </div> -->
                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SIZE</h6>

                            <select name="" id="siz" class="form-select" onclick="advancedSearch(0);">
                                <option value="0">SIZE</option>
                                <?php

                                $sizeResult = Database::search('SELECT * FROM `size`');
                                $sizeNrows = $sizeResult->num_rows;

                                for ($x = 0; $x < $sizeNrows; $x++) {
                                    $size = $sizeResult->fetch_assoc();

                                ?>
                                    <option value="<?php echo $size["name"] ?>"><?php echo $size["name"] ?></option>
                                <?php

                                }

                                ?>

                                <!-- <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option> -->
                            </select>


                        </div>
                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SORT BY</h6>

                            <select name="" id="sort" class="form-select" onclick="advancedSearch(0);">

                                <option value="0"><i class="bi bi-funnel-fill"></i>Sort Results</option>
                                <option value="1">Price Low To High</option>
                                <option value="2">Price High To Low</option>
                                <option value="3">Quantity Low To High</option>
                                <option value="4">Quantity High To Low</option>

                                <!-- <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option> -->
                            </select>


                        </div>
                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <!-- <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">MANUFACTURER</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts">
                                                <span>Brake Parts(6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" id="accessories">
                                                <span>Accessories (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="EngineParts">
                                                <input type="checkbox" id="EngineParts">
                                                <span>Engine Parts (4)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" id="hermes">
                                                <span>hermes (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="tommyHilfiger">
                                                <input type="checkbox" id="tommyHilfiger">
                                                <span>Tommy Hilfiger(7)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <!-- <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SELECT BY COLOR</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="black">
                                                <input type="checkbox" id="black">
                                                <span>Black (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="blue">
                                                <input type="checkbox" id="blue">
                                                <span>Blue (8)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brown">
                                                <input type="checkbox" id="brown">
                                                <span>Brown (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="Green">
                                                <input type="checkbox" id="Green">
                                                <span>Green (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="pink">
                                                <input type="checkbox" id="pink">
                                                <span>Pink (4)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <div class="sidebar-content">
                                <div id="slider-range" style="background: #969696;"></div>
                                <div class="filter-type-price">
                                    <!-- <label for="amount">Price range:</label> -->
                                    <input style="width: 100%;" class="form-control" disabled type="text" id="amount">
                                </div>
                            </div>
                        </div>
                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <!-- <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tag products</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    <a href="#">asian</a>
                                    <a href="#">brown</a>
                                    <a href="#">euro</a>
                                    <a href="#">fashion</a>
                                    <a href="#">hat</a>
                                    <a href="#">t-shirt</a>
                                    <a href="#">teen</a>
                                    <a href="#">travel</a>
                                    <a href="#">white</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <!-- <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="assets/images/banner/side-banner.jpg" alt="">
                                </a>
                            </div>
                        </div> -->
                        <!-- End Single Sidebar Widget -->

                    </div>
                    <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="s1" placeholder="Please capitalize the first letter of every word you search" aria-label="Please capitalize the first letter of every word you search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn" type="button" onclick="basicsearch('1');"> <i class="icon-magnifier"></i></button>
                                    </div>
                                </div>
                                <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div>
                    <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row" id="filter">
                                                <?php

                                                if (isset($_GET["page"])) {
                                                    $pageno = $_GET["page"];
                                                } else {
                                                    $pageno = 1;
                                                }

                                                $products = Database::search("SELECT * FROM `product`");
                                                $nProduct = $products->num_rows;
                                                $userProduct = $products->fetch_assoc();

                                                $results_per_page = 9;
                                                $number_of_pages = ceil($nProduct / $results_per_page);

                                                $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                                $product = Database::search("SELECT * FROM product WHERE `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");
                                                $productNrow = $product->num_rows;



                                                for ($x = 0; $x < $productNrow; $x++) {

                                                    $productData = $product->fetch_assoc();


                                                ?>

                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden" data-aos="fade-up" data-aos-delay="0">
                                                            <div class="image-box">
                                                                <a href="<?php echo "product_details.php?id=" . ($productData["id"]); ?>" class="image-link">

                                                                    <?php

                                                                    $img = Database::search("SELECT * FROM product_img WHERE product_id='" . $productData["id"] . "'");

                                                                    $imgData = $img->fetch_assoc();

                                                                    ?>
                                                                    <img style="object-fit: cover; height: 200px; width: 100%;" src="<?php echo $imgData["code"] ?>" alt="">
                                                                    <?php
                                                                    $img2 = Database::search("SELECT `product_img1` FROM stock WHERE product_id='" . $productData["id"] . "'");
                                                                    if ($img2->num_rows > 0) {
                                                                        $img2Data = $img2->fetch_assoc();
                                                                    ?>
                                                                        <img style="object-fit: cover; height: 350px;" src="<?php echo  $img2Data['product_img1'] ?>" alt="">
                                                                        <!-- <img src="assets/images/product/default/home-1/default-10.jpg" alt=""> -->
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </a>
                                                                <?php
                                                                if ($productData["total_qty"] == 0) {
                                                                ?>
                                                                    <div class="tag">
                                                                        <span style="background-color: red;" class="">Out OF Stock</span>
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
                                                                        <input class="d-none" type="number" value="1" id="qtyinput<?php echo $productData["id"] ?>">
                                                                        <a onclick="addToWishList(<?php echo $productData['id'] ?>);" href="#" data-bs-toggle="modal" data-bs-target="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i style="font-weight: bolder; font-size: 0.9em;" class="icon-heart"></i>&nbsp; Add To Wishlist</a>
                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="<?php echo "product_details.php?id=" . ($productData['id']); ?>"><i style="font-weight: bolder; font-size: 1em;" class="icon-magnifier" data-toggle="tooltip" data-placement="top" title="View Product"></i></a>
                                                                        <a href="shop-grid-sidebar-left.php"><i style="font-weight: bolder; font-size: 1em;" class="icon-shuffle" data-toggle="tooltip" data-placement="top" title="All Products"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="content">
                                                                    <div class="content-left">
                                                                        <h6 style="text-transform: none; font-size: 1.1em; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 270px;" class="title"><a href="product-details-default.html"><?php echo $productData["title"] ?></a></h6>
                                                                        <ul class="review-star">
                                                                            <li style="color: red;" class="fill"><i class="ion-android-star"></i></li>
                                                                            <li style="color: red;" class="fill"><i class="ion-android-star"></i></li>
                                                                            <li style="color: red;" class="fill"><i class="ion-android-star"></i></li>
                                                                            <li style="color: red;" class="fill"><i class="ion-android-star"></i></li>
                                                                            <li style="color: red;" class="fill"><i class="ion-android-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="content-right">
                                                                    <span class="price">
                                                                        <h3>LKR <?php echo $productData["newPrice"]; ?> /= </h3>&nbsp;

                                                                        <?php
                                                                        if ($productData["discount"] != 0) {
                                                                        ?>
                                                                            <del class="text-danger">LKR <?php echo $productData["price"]; ?> /=</del>
                                                                    </span>
                                                                <?php
                                                                        }
                                                                ?>

                                                                <?php
                                                                if ($productData["discount"] != 0) {
                                                                ?>
                                                                    <span style="font-weight: bolder; font-size: 1.3em; color: black;"><?php echo $productData["discount"]; ?> % OFF</span>
                                                                <?php
                                                                }
                                                                ?>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <!-- End Product Default Single Item -->
                                                    </div>

                                                <?php

                                                }

                                                ?>
                                                <!-- Start Pagination -->
                                                <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                                                    <ul>
                                                        <li><a href=" <?php

                                                                        if ($pageno <= 1) {
                                                                            echo "javascript:void(0)";
                                                                        } else {
                                                                            echo "?page=" . ($pageno - 1);
                                                                        }

                                                                        ?>"><i class="ion-ios-skipbackward"></i></a></li>
                                                        <?php

                                                        for ($page = 1; $page <= $number_of_pages; $page++) {
                                                            if ($page == $pageno) {
                                                        ?>
                                                                <li><a class="active" style="background: #969696;" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a></li>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <li><a href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a></li>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                        <li><a href=" <?php

                                                                        if ($pageno >= $number_of_pages) {
                                                                            echo "javascript:void(0)";
                                                                        } else {
                                                                            echo "?page=" . ($pageno + 1);
                                                                        }

                                                                        ?>"><i class="ion-ios-skipforward"></i></a></li>
                                                    </ul>
                                                </div>
                                                <!-- End Pagination -->

                                            </div>
                                        </div>
                                        <!-- End Grid View Product -->
                                        <!-- Start List View Product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Wrapper -->


                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Shop Section:::... -->

    <?php
    require "company_logo.php";
    require "footer.php";
    ?>

    <!-- material-scrolltop button -->
    <button style="left: 23px;" class="material-scrolltop bg-dark" type="button"></button>


    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/advance_search.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/snackbar.min.js"></script>
    <!-- <script src="advancesSearch.js"></script> -->

    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        function basicsearch(x) {
            var page = x;

            var searchText = document.getElementById("s1").value;
            var searching = document.getElementById("filter");

            var f = new FormData();
            f.append("t", searchText);
            f.append("p", page);

            var r = new XMLHttpRequest();

            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    var t = r.responseText;

                    searching.innerHTML = t;
                }
            };

            r.open("POST", "basicSearchProcess.php", true);
            r.send(f);
        }
    </script>
    
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "100007954332999");
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

</body>



</html>