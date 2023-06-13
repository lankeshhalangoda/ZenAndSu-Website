<?php

session_start();
require "connection.php";

if (isset($_SESSION["admin"])) {
    
    if (isset($_GET["pid"])) {
        $pid = $_GET["pid"];

?>

        <!doctype html>
        <html lang="en">

        <head>

            <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta http-equiv="Content-Language" content="en">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Admin | Update Product</title>
            <!-- <link href="css/font-awesome.css" rel="stylesheet"> -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
            <meta name="description" content="This is an example dashboard created using build-in elements and components.">
            <meta name="msapplication-tap-highlight" content="no">
            <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
            <!-- Alerts -->
            <link rel="stylesheet" href="assets/css/snackbar.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

            <style>
                label {
                    font-weight: bolder;
                }
            </style>

        </head>

        <body>

            <script>
                document.addEventListener("contextmenu", function(event) {
                    event.preventDefault();
                }, false);
            </script>

            <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

                <?php
                require "admin_header.php";
                ?>

                <div class="app-main">

                    <?php
                    require "admin_sidepannel.php";
                    ?>


                    <div class="app-main__outer">
                        <div class="app-main__inner">

                            <div class="row ">
                                <div class="col-md-12 ">


                                    <div class="app-page-title">
                                        <div class="page-title-wrapper">
                                            <div class="page-title-heading">
                                                <div class="page-title-icon">
                                                    <i class="fa fa-satellite icon-gradient bg-strong-bliss">
                                                    </i>
                                                </div>
                                                <div>Update Product
                                                    <div class="page-title-subheading">Product ID : <span id="product_id0"><?php echo $pid ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="page-title-actions">
                                                <button onclick="history_back1();" type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Back">
                                                    Back
                                                </button>
                                                <a href="admin.php"><button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-info" data-original-title="Dashboard">
                                                        Dashboard
                                                    </button></a>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- -------------------------------------------------------- add product --------------------------------------------------------  -->

                                    <div class="main-card mb-3 card ">
                                        <!-- <div class="card-header">Products Listing Form</div> -->
                                        <div class="table-responsive">
                                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">

                                                <?php

                                                $product_rs = Database::search("SELECT product.id AS `pid`, product.category_has_type_id AS `pcateg`, product.material AS `pmaterial`, product.brand AS `pbrand`, product.title AS `ptitle`, product.price AS `pprice`, product.discount AS `pdiscount`, product.newPrice AS `pnewprice`, product.coupon AS `pcoupon`, product.total_qty AS `pqty`, product.description AS `pdesc`, product.status_id AS `pstatusid`, product.user_id AS `puserid`, product.datetime_added AS `pdate`, category_has_type.id AS `chtid`, category_has_type.category_id AS `chtcid`, category_has_type.type_id AS `chttid`, category.id AS `cid`, category.name AS `cname`, type.id AS `tid`, type.name AS `tname`, product_img.code AS `img_code`, product_img.product_id AS `product_id`, 
                                                stock.product_id AS `stock_pid`, stock.color_id AS `stock_clrid`, stock.color_variation AS `stock_var`, stock.XS AS `stock_xs`, stock.S AS `stock_s`, stock.M AS `stock_m`, stock.L AS `stock_l`, stock.XL AS `stock_xl`, stock.XXL AS `stock_xxl`, stock.XXXL AS `stock_xxxl`, stock.4XL AS `stock_4xl`, stock.product_img1 AS `stock_img1`, stock.product_img2 AS `stock_img2`
                                                FROM `product`
                                                INNER JOIN category_has_type ON product.category_has_type_id = category_has_type.id
                                                INNER JOIN category ON category_has_type.category_id = category.id
                                                INNER JOIN TYPE ON category_has_type.type_id = type.id
                                                INNER JOIN stock ON product.id = stock.product_id
                                                INNER JOIN product_img ON product.id = product_img.product_id
                                                WHERE `product`.id = '" . $pid . "';");
                                                $pd = $product_rs->fetch_assoc();

                                                ?>


                                                <div class="col-12 card-body">
                                                    <!-- <h6 class="card-title">Add product details</h6> -->
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 position-relative form-group"><label for="exampleEmail" class="">Category</label>
                                                            <select disabled name="" id="ca" class="form-control" onchange="auto_category();">
                                                                <option style="font-weight: 350;" value="<?php echo $pd["cid"]; ?>"><?php echo $pd["cname"]; ?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12 col-md-4 position-relative form-group"><label for="exampleEmail" class="">Type</label>
                                                            <div id="brand_div">
                                                                <div onclick="product_type_alert();">
                                                                    <select disabled name="" id="typeid" class="form-control">
                                                                        <option value="<?php echo $pd["tid"]; ?>"><?php echo $pd["tname"]; ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-12 col-md-4 position-relative form-group"><label for="examplePassword" class="">Product brand</label><input value="<?php echo $pd["pbrand"]; ?>" name="" id="brand_id" placeholder="Enter Your Product brand" type="text" class="form-control"></div>

                                                        <div class="col-12 col-md-4 position-relative form-group"><label for="examplePassword" class="">Product Title</label><input value="<?php echo $pd["ptitle"]; ?>" name="" id="title_id" placeholder="Enter Your Product name" type="text" class="form-control"></div>

                                                        <div class="col-12 col-md-4 position-relative form-group"><label for="examplePassword" class="">Product Material</label><input value="<?php echo $pd["pmaterial"]; ?>" name="" id="material_id" placeholder="Enter Your Product material" type="text" class="form-control"></div>


                                                        <!-- <div class="col-12 col-md-4 position-relative form-group"><label for="qty_id" class="">Product Quantity</label><input min="1" name="" id="qty_id" placeholder="Enter your product quantity" type="number" class="form-control"></div> -->

                                                        <div class="col-12 col-md-4 position-relative form-group"><label for="price_id" class="">Product Price</label><input value="<?php echo $pd["pprice"]; ?>" onkeyup="calculate_discount();" min="1" name="" id="price_id" placeholder="Enter Your Product price" type="number" class="form-control"></div>

                                                        <!-- <div class="col-12 col-md-4 position-relative form-group"><label for="price_id" class="">Product Discount</label><input min="0" max="100" name="" id="discount" placeholder="Enter your product discount" type="number" class="form-control"></div> -->

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationCustomUsername">Product Discount</label>
                                                            <div class="input-group">
                                                                <input value="<?php echo $pd["pdiscount"]; ?>" onkeyup="coupon_function();" min="0" max="100" type="number" class="form-control" value="0" id="discount_id" placeholder="Enter your product discount" aria-describedby="inputGroupPrepend">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroupPrepend">%</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-3 position-relative form-group"><label class="text-white">.</label><button onclick="calculate_discount();" class="btn btn-outline-secondary form-control">Calculate Discount</button></div>

                                                        <div class="col-6 col-md-2 mb-3">
                                                            <label for="validationCustomUsername" class="text-white">New Price</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="new_price_id1">New Price - LKR &nbsp;<span id="new_price_id"><?php echo $pd["pnewprice"]; ?></span> &nbsp;/=</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-2 offset-md-1 offset-lg-0 mb-3">
                                                            <label for="validationCustomUsername" class="text-white">Coupon Code</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <input value="<?php echo $pd["pcoupon"]; ?>" class=" form-control border-success text-dark fw-bold" placeholder="Coupon Code" type="text" name="" id="coupon_code">
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="col-12 position-relative form-group"><label for="description_id" class="">Product Description</label><textarea style="background-color: #FAFAFA; border-color: rgb(0, 0, 0, 0.2); border-width: 2px;" rows="10" name="text" id="description_id" class="form-control"><?php echo $pd["pdesc"]; ?></textarea></div>

                                                        <div class="col-12 mt-5 position-relative form-group text-muted font-weight-lighter"><label class="text-black-50 " for="">Allowed image extensions : png , jpg , jpeg , svg</label></div>




                                                        <!-- ****** -->

                                                        <div class="col-md-6">
                                                            <div id="accordion1" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Blue Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $blue_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '1' ");
                                                                    $blue_stock_rows = $blue_stock->num_rows;
                                                                    $stock_blue = $blue_stock->fetch_assoc();
                                                                    ?>


                                                                    <div data-parent="#accordion1" id="collapseOne1" aria-labelledby="headingOne" class="<?php if ($blue_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($blue_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $stock_blue["color_variation"];
                                                                                            } ?>" type="text" name="" id="blue_clr_variation" placeholder="Ex: Pacific blue" class="col-6 form-control mb-3" />


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id1" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid1" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id1" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class="">
                                                                                                <input value="<?php echo $stock_blue["XS"]; ?>" id="blue_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id2" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid2" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id2" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $stock_blue["S"]; ?>" id="blue_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id3" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid3" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id3" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $stock_blue["M"]; ?>" id="blue_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id4" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid4" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id4" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $stock_blue["L"]; ?>" id="blue_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id5" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid5" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id5" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $stock_blue["XL"]; ?>" id="blue_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id6" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid6" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id6" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $stock_blue["XXL"]; ?>" id="blue_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id7" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid7" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id7" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $stock_blue["XXXL"]; ?>" id="blue_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id8" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid8" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id8" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $stock_blue["4XL"]; ?>" id="blue_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <?php
                                                                                                if (empty($stock_blue["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="b_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $stock_blue["product_img1"]; ?>" id="b_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="b_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="b_imguploader1" onclick="b_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('b1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->

                                                                                                <?php
                                                                                                if (empty($stock_blue["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="b_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $stock_blue["product_img2"]; ?>" id="b_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="b_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="b_imguploader2" onclick="b_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('b2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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

                                                        <!-- ********************************** -->


                                                        <!-- ****** -->

                                                        <div class="col-md-6">
                                                            <div id="accordion2" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Green Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $green_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '2' ");
                                                                    $green_stock_rows = $green_stock->num_rows;
                                                                    $green_stock_data = $green_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion2" id="collapseOne2" aria-labelledby="headingOne" class="<?php if ($green_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($green_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $green_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="green_clr_variation" placeholder="Ex: light green" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id9" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid9" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id9" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["XS"]; ?>" id="green_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id10" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid10" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id10" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["S"]; ?>" id="green_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id11" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid11" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id11" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["M"]; ?>" id="green_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id12" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid12" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id12" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["L"]; ?>" id="green_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id13" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid13" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id13" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["XL"]; ?>" id="green_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id14" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid14" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id14" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["XXL"]; ?>" id="green_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id15" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid15" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id15" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["XXXL"]; ?>" id="green_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id16" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid16" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id16" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $green_stock_data["4XL"]; ?>" id="green_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="g_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($green_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="g_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $green_stock_data["product_img1"]; ?>" id="g_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="g_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="g_imguploader1" onclick="g_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('g1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="g_prev2"> -->


                                                                                                <?php
                                                                                                if (empty($green_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="g_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $green_stock_data["product_img2"]; ?>" id="g_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="g_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="g_imguploader2" onclick="g_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('g2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <div class="col-md-6">
                                                            <div id="accordion3" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Gold Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $gold_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '3' ");
                                                                    $gold_stock_rows = $gold_stock->num_rows;
                                                                    $gold_stock_data = $gold_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion3" id="collapseOne3" aria-labelledby="headingOne" class="<?php if ($gold_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($gold_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $gold_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="gold_clr_variation" placeholder="Ex: dark gold" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id17" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid17" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id17" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["XS"]; ?>" id="gold_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id18" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid18" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id18" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["S"]; ?>" id="gold_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id19" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid19" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id19" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["M"]; ?>" id="gold_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id20" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid20" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id20" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["L"]; ?>" id="gold_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id21" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid21" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id21" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["XL"]; ?>" id="gold_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id22" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid22" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id22" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["XXL"]; ?>" id="gold_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id23" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid23" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id23" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["XXXL"]; ?>" id="gold_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id24" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid24" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id24" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gold_stock_data["4XL"]; ?>" id="gold_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gold_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($gold_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gold_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $gold_stock_data["product_img1"]; ?>" id="gold_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="gold_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="gold_imguploader1" onclick="gold_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('gold1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gold_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($gold_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gold_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $gold_stock_data["product_img2"]; ?>" id="gold_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="gold_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="gold_imguploader2" onclick="gold_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('gold2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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



                                                        <!-- ****** -->

                                                        <div class="col-md-6">
                                                            <div id="accordion4" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Silver Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $silver_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '4' ");
                                                                    $silver_stock_rows = $silver_stock->num_rows;
                                                                    $silver_stock_data = $silver_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion4" id="collapseOne4" aria-labelledby="headingOne" class="<?php if ($silver_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($silver_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $silver_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="silver_clr_variation" placeholder="Ex: litmus silver" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id25" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid25" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id25" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["XS"]; ?>" id="silver_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id26" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid26" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id26" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["S"]; ?>" id="silver_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id27" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid27" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id27" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["M"]; ?>" id="silver_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id28" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid28" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id28" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["L"]; ?>" id="silver_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id29" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid29" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id29" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["XL"]; ?>" id="silver_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id30" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid30" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id30" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["XXL"]; ?>" id="silver_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id31" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid31" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id31" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["XXXL"]; ?>" id="silver_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id32" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid32" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id32" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $silver_stock_data["4XL"]; ?>" id="silver_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="silver_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($silver_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="silver_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $silver_stock_data["product_img1"]; ?>" id="silver_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="silver_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="silver_imguploader1" onclick="silver_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('silver1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="silver_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($silver_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="silver_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $silver_stock_data["product_img2"]; ?>" id="silver_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="silver_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="silver_imguploader2" onclick="silver_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('silver2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ************************************************************ -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion5" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Brown Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $brown_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '5' ");
                                                                    $brown_stock_rows = $brown_stock->num_rows;
                                                                    $brown_stock_data = $brown_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion5" id="collapseOne5" aria-labelledby="headingOne" class="<?php if ($brown_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($brown_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $brown_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="brown_clr_variation" placeholder="Ex: weawy brown" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id33" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid33" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id33" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["XS"]; ?>" id="brown_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id34" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid34" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id34" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["S"]; ?>" id="brown_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id35" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid35" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id35" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["M"]; ?>" id="brown_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id36" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid36" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id36" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["L"]; ?>" id="brown_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id37" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid37" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id37" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["XL"]; ?>" id="brown_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id38" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid38" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id38" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["XXL"]; ?>" id="brown_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id39" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid39" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id39" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["XXXL"]; ?>" id="brown_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id40" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid40" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id40" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $brown_stock_data["4XL"]; ?>" id="brown_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="brown_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($brown_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="brown_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $brown_stock_data["product_img1"]; ?>" id="brown_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="brown_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="brown_imguploader1" onclick="brown_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('brown1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="brown_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($brown_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="brown_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $brown_stock_data["product_img2"]; ?>" id="brown_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="brown_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="brown_imguploader2" onclick="brown_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('brown2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion6" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Black Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $black_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '6' ");
                                                                    $black_stock_rows = $black_stock->num_rows;
                                                                    $black_stock_data = $black_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion6" id="collapseOne6" aria-labelledby="headingOne" class="<?php if ($black_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($black_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $black_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="black_clr_variation" placeholder="Ex: black shine" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id41" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid41" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id41" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["XS"]; ?>" id="black_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id42" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid42" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id42" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["S"]; ?>" id="black_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id43" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid43" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id43" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["M"]; ?>" id="black_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id44" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid44" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id44" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["L"]; ?>" id="black_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id45" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid45" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id45" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["XL"]; ?>" id="black_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id46" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid46" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id46" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["XXL"]; ?>" id="black_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id47" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid47" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id47" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["XXXL"]; ?>" id="black_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id48" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid48" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id48" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $black_stock_data["4XL"]; ?>" id="black_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="black_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($black_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="black_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $black_stock_data["product_img1"]; ?>" id="black_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="black_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="black_imguploader1" onclick="black_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('black1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="black_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($black_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="black_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $black_stock_data["product_img2"]; ?>" id="black_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="black_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="black_imguploader2" onclick="black_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('black2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion7" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Yellow Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $yellow_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '7' ");
                                                                    $yellow_stock_rows = $yellow_stock->num_rows;
                                                                    $yellow_stock_data = $yellow_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion7" id="collapseOne7" aria-labelledby="headingOne" class="<?php if ($yellow_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($yellow_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $yellow_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="yellow_clr_variation" placeholder="Ex: Busted yellow" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id49" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid49" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id49" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["XS"]; ?>" id="yellow_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id50" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid50" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id50" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["S"]; ?>" id="yellow_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id51" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid51" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id51" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["M"]; ?>" id="yellow_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id52" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid52" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id52" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["L"]; ?>" id="yellow_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id53" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid53" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id53" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["XL"]; ?>" id="yellow_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id54" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid54" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id54" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["XXL"]; ?>" id="yellow_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id55" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid55" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id55" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["XXXL"]; ?>" id="yellow_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id56" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid56" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id56" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $yellow_stock_data["4XL"]; ?>" id="yellow_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="yellow_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($yellow_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="yellow_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $yellow_stock_data["product_img1"]; ?>" id="yellow_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="yellow_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="yellow_imguploader1" onclick="yellow_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('yellow1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="yellow_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($yellow_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="yellow_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $yellow_stock_data["product_img2"]; ?>" id="yellow_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="yellow_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="yellow_imguploader2" onclick="yellow_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('yellow2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion8" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Red Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $red_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '8' ");
                                                                    $red_stock_rows = $red_stock->num_rows;
                                                                    $red_stock_data = $red_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion8" id="collapseOne8" aria-labelledby="headingOne" class="<?php if ($red_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($red_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $red_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="red_clr_variation" placeholder="Ex: light red" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id57" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid57" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id57" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["XS"]; ?>" id="red_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id58" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid58" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id58" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["S"]; ?>" id="red_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id59" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid59" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id59" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["M"]; ?>" id="red_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id60" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid60" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id60" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["L"]; ?>" id="red_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id61" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid61" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id61" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["XL"]; ?>" id="red_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id62" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid62" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id62" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["XXL"]; ?>" id="red_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id63" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid63" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id63" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["XXXL"]; ?>" id="red_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id64" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid64" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id64" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $red_stock_data["4XL"]; ?>" id="red_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="red_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($red_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="red_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $red_stock_data["product_img1"]; ?>" id="red_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="red_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="red_imguploader1" onclick="red_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('red1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="red_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($red_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="red_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $red_stock_data["product_img2"]; ?>" id="red_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="red_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="red_imguploader2" onclick="red_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('red2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion9" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne9" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Purple Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $purple_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '9' ");
                                                                    $purple_stock_rows = $purple_stock->num_rows;
                                                                    $purple_stock_data = $purple_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion9" id="collapseOne9" aria-labelledby="headingOne" class="<?php if ($purple_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($purple_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $purple_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="purple_clr_variation" placeholder="Ex: Light purple" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id65" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid65" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id65" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class="">
                                                                                                <input value="<?php echo $purple_stock_data["XS"]; ?>" id="purple_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id66" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid66" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id66" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $purple_stock_data["S"]; ?>" id="purple_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id67" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid67" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id67" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $purple_stock_data["M"]; ?>" id="purple_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id68" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid68" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id68" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $purple_stock_data["L"]; ?>" id="purple_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id69" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid69" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id69" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $purple_stock_data["XL"]; ?>" id="purple_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id70" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid70" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id70" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $purple_stock_data["XXL"]; ?>" id="purple_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id71" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid71" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id71" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $purple_stock_data["XXXL"]; ?>" id="purple_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id72" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid72" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id72" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $purple_stock_data["4XL"]; ?>" id="purple_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="purple_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($purple_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="purple_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $purple_stock_data["product_img1"]; ?>" id="purple_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="purple_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="purple_imguploader1" onclick="purple_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('purple1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="purple_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($purple_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="purple_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $purple_stock_data["product_img2"]; ?>" id="purple_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="purple_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="purple_imguploader2" onclick="purple_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('purple2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion10" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne10" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Pink Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $pink_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '10' ");
                                                                    $pink_stock_rows = $pink_stock->num_rows;
                                                                    $pink_stock_data = $pink_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion10" id="collapseOne10" aria-labelledby="headingOne" class="<?php if ($pink_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($pink_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $pink_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="pink_clr_variation" placeholder="Ex: Dark pink" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id73" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid73" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id73" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["XS"]; ?>" id="pink_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id74" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid74" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id74" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["S"]; ?>" id="pink_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id75" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid75" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id75" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["M"]; ?>" id="pink_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id76" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid76" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id76" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["L"]; ?>" id="pink_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id77" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid77" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id77" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["XL"]; ?>" id="pink_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id78" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid78" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id78" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["XXL"]; ?>" id="pink_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id79" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid79" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id79" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["XXXL"]; ?>" id="pink_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id80" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid80" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id80" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $pink_stock_data["4XL"]; ?>" id="pink_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="pink_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($pink_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="pink_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $pink_stock_data["product_img1"]; ?>" id="pink_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="pink_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="pink_imguploader1" onclick="pink_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('pink1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="pink_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($pink_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="pink_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $pink_stock_data["product_img2"]; ?>" id="pink_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="pink_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="pink_imguploader2" onclick="pink_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('pink2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion11" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne11" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Orange Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $orange_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '11' ");
                                                                    $orange_stock_rows = $orange_stock->num_rows;
                                                                    $orange_stock_data = $orange_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion11" id="collapseOne11" aria-labelledby="headingOne" class="<?php if ($orange_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($orange_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $orange_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="orange_clr_variation" placeholder="Ex: Clean orange" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id81" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid81" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id81" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["XS"]; ?>" id="orange_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id82" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid82" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id82" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["S"]; ?>" id="orange_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id83" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid83" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id83" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["M"]; ?>" id="orange_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id84" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid84" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id84" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["L"]; ?>" id="orange_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id85" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid85" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id85" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["XL"]; ?>" id="orange_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id86" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid86" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id86" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["XXL"]; ?>" id="orange_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id87" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid87" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id87" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["XXXL"]; ?>" id="orange_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id88" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid88" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id88" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $orange_stock_data["4XL"]; ?>" id="orange_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="orange_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($orange_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="orange_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $orange_stock_data["product_img1"]; ?>" id="orange_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="orange_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="orange_imguploader1" onclick="orange_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('orange1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="orange_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($orange_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="orange_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $orange_stock_data["product_img2"]; ?>" id="orange_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="orange_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="orange_imguploader2" onclick="orange_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('orange2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion12" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne12" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Gray Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $gray_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '12' ");
                                                                    $gray_stock_rows = $gray_stock->num_rows;
                                                                    $gray_stock_data = $gray_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion12" id="collapseOne12" aria-labelledby="headingOne" class="<?php if ($gray_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($gray_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $gray_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="gray_clr_variation" placeholder="Ex: Night gray" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id89" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid89" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id89" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["XS"]; ?>" id="gray_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id90" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid90" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id90" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["S"]; ?>" id="gray_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id91" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid91" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id91" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["M"]; ?>" id="gray_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id92" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid92" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id92" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["L"]; ?>" id="gray_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id93" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid93" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id93" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["XL"]; ?>" id="gray_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id94" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid94" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id94" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["XXL"]; ?>" id="gray_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id95" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid95" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id95" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["XXXL"]; ?>" id="gray_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id96" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid96" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id96" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $gray_stock_data["4XL"]; ?>" id="gray_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gray_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($gray_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gray_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $gray_stock_data["product_img1"]; ?>" id="gray_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="gray_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="gray_imguploader1" onclick="gray_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('gray1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gray_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($gray_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gray_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $gray_stock_data["product_img2"]; ?>" id="gray_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="gray_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="gray_imguploader2" onclick="gray_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('gray2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion13" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne13" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">Black & White</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $BnW_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '13' ");
                                                                    $BnW_stock_rows = $BnW_stock->num_rows;
                                                                    $BnW_stock_data = $BnW_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion13" id="collapseOne13" aria-labelledby="headingOne" class="<?php if ($BnW_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($BnW_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $BnW_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="BnW_clr_variation" placeholder="Ex: black & white" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id97" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid97" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id97" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["XS"]; ?>" id="BnW_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id98" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid98" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id98" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["S"]; ?>" id="BnW_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id99" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid99" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id99" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["M"]; ?>" id="BnW_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id100" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid100" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id100" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["L"]; ?>" id="BnW_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id101" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid101" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id101" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["XL"]; ?>" id="BnW_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id102" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid102" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id102" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["XXL"]; ?>" id="BnW_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id103" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid103" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id103" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["XXXL"]; ?>" id="BnW_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id104" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid104" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id104" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $BnW_stock_data["4XL"]; ?>" id="BnW_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="BnW_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($BnW_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="BnW_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $BnW_stock_data["product_img1"]; ?>" id="BnW_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="BnW_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="BnW_imguploader1" onclick="BnW_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('BnW1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="BnW_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($BnW_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="BnW_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $BnW_stock_data["product_img2"]; ?>" id="BnW_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="BnW_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="BnW_imguploader2" onclick="BnW_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('BnW2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->

                                                        <!-- ************************************************************ -->

                                                        <div class="col-md-6">
                                                            <div id="accordion14" class="accordion-wrapper mb-3">
                                                                <div class="card">
                                                                    <div id="headingOne" class="card-header">
                                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne14" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block ">
                                                                            <h5 class="m-0 p-0">White Color</h5>
                                                                        </button>
                                                                    </div>

                                                                    <?php
                                                                    $white_stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pid . "' AND `color_id` = '14' ");
                                                                    $white_stock_rows = $white_stock->num_rows;
                                                                    $white_stock_data = $white_stock->fetch_assoc();
                                                                    ?>

                                                                    <div data-parent="#accordion14" id="collapseOne14" aria-labelledby="headingOne" class="<?php if ($white_stock_rows == 0) {
                                                                                                                                                                echo "collapse";
                                                                                                                                                            } else {
                                                                                                                                                            } ?>" style="">
                                                                        <div class="card-body">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Color Variation:</label></div>
                                                                                </div>
                                                                            </div>
                                                                            <input value="<?php if ($white_stock_rows == 0) {
                                                                                            } else {
                                                                                                echo $white_stock_data["color_variation"];
                                                                                            } ?>" type="text" name="" id="white_clr_variation" placeholder="Ex: Windy White" class="col-6 form-control mb-3" />

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Select Sizes:</label></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id105" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid105" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id105" class="form-check-label">XS</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["XS"]; ?>" id="white_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id106" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid106" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id106" class="form-check-label">S</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["S"]; ?>" id="white_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id107" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid107" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id107" class="form-check-label">M</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["M"]; ?>" id="white_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id108" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid108" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id108" class="form-check-label">L</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["L"]; ?>" id="white_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id109" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid109" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id109" class="form-check-label">XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["XL"]; ?>" id="white_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id110" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid110" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id110" class="form-check-label">XXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["XXL"]; ?>" id="white_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id111" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid111" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id111" class="form-check-label">XXXL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["XXXL"]; ?>" id="white_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-6 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="position-relative form-check">
                                                                                                <input checked name="check" id="size_label_id112" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid112" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                                <label for="size_label_id112" class="form-check-label">4XL</label>
                                                                                            </div>
                                                                                            <div id="" aria-labelledby="headingOne" class=" ">
                                                                                                <input value="<?php echo $white_stock_data["4XL"]; ?>" id="white_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="white_prev1"> -->

                                                                                                <?php
                                                                                                if (empty($white_stock_data["product_img1"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="white_prev1">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $white_stock_data["product_img1"]; ?>" id="white_prev1">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="white_imguploader1" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="white_imguploader1" onclick="white_changeImg1();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('white1');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-4">
                                                                                        <div class="row">
                                                                                            <div class="mb-3 text-center card card-body">
                                                                                                <!-- <h5 class="card-title">Image - 08</h5> -->
                                                                                                <!-- <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="white_prev2"> -->

                                                                                                <?php
                                                                                                if (empty($white_stock_data["product_img2"])) {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="white_prev2">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img style="width: 130px; height: 100px; object-fit: cover;" src="<?php echo $white_stock_data["product_img2"]; ?>" id="white_prev2">
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                                <br />
                                                                                                <input type="file" accept="image/*" id="white_imguploader2" class="d-none" />
                                                                                                <label class="btn btn-outline-focus" for="white_imguploader2" onclick="white_changeImg2();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                                                <button style="position: absolute" onclick="remove_img('white2');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
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


                                                        <!-- ****** -->




                                                        <div class="col-12"></div>
                                                        <div class="col-12 col-md-4">
                                                            <div class="row">
                                                                <div class="mb-3 text-center card card-body">
                                                                    <h5 class="card-title">Thumbnail Photo</h5>
                                                                    <!-- img style="object-fit: cover;" src="assets/images/file-upload.jpg" id="thumbnail_prev" -->

                                                                    <?php 
                                                                        $thum = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '".$pid."'");
                                                                        $thumd = $thum->num_rows;

                                                                        if($thumd == 0){
                                                                            ?>
                                                                            <img style="object-fit: cover; height: 350px; width: auto;" src="assets/images/file-upload.jpg" id="thumbnail_prev">
                                                                         <?php
                                                                        }else{
                                                                            $thumbnail = $thum->fetch_assoc();
                                                                            ?>
                                                                       <img style="object-fit: cover; height: 350px; width: auto;" src="<?php echo $thumbnail["code"] ?>" id="thumbnail_prev">
                                                                    <?php
                                                                        }
                                                                    ?>


                                                                    <br />
                                                                    <input type="file" accept="image/*" id="thumbnail_imguploader" class="d-none" />
                                                                    <label class="btn btn-outline-focus" for="thumbnail_imguploader" onclick="thumbnail_changeImg();">Upload &nbsp;&nbsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                                                                    <button style="position: absolute" onclick="remove_img('thumbnail');" class="btn btn-outline-light text-danger"><i class="fa fa-university" aria-hidden="true"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>




                                                    </div>
                                                    <button class="mt-1 btn btn-danger" onclick="addProduct();">Submit</button>
                                                    <a href="add_product.php" class="mt-1 btn btn-dark text-white">Reset All</a>
                                                </div>
                                        </div>





                                        <!--  -------------------------------------------------------- Add product  --------------------------------------------------------   -->



                                    </div>
                                </div>

                            </div>

                        </div>



                        <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->

                    </div>
                </div>

                <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
                <script src="other/script.js"></script>
                <script src="assets/js/script.js"></script>
                <script src="assets/js/update_product.js"></script>
                <!-- Alerts -->
                <script src="assets/js/snackbar.min.js"></script>
        </body>

        </html>

    <?php
    } else {
    ?>
        <script>
            alert("Please select a Product");
            window.location = "my_products.php";
        </script>
    <?php
    }
    ?>

<?php
} else {
?>
    <script>
        window.location = "adminSignin.php";
    </script>
<?php
}
?>