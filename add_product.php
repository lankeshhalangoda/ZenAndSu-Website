<?php
session_start();
require "connection.php";
if (isset($_SESSION["admin"])) {
?>

    <!doctype html>
    <html lang="en">

    <head>

        <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin | Add Products</title>
        <link href="css/font-awesome.css" rel="stylesheet">
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

            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
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
                                                <i class="fa fa-download icon-gradient bg-malibu-beach">
                                                </i>
                                            </div>
                                            <div>Add Products
                                                <div class="page-title-subheading">Add products to Zen & Su.
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



                                            <div class="col-12 card-body">
                                                <!-- <h6 class="card-title">Add product details</h6> -->
                                                <div class="row">
                                                    <div class="col-12 col-md-4 position-relative form-group"><label for="exampleEmail" class="">Category</label>
                                                        <select name="" id="ca" class="form-control" onchange="auto_category();">
                                                            <option style="font-weight: 350;" value="0">Select product category</option>
                                                            <?php
                                                            $category_results = Database::search("SELECT * FROM `category`");
                                                            $category_rows = $category_results->num_rows;

                                                            for ($x = 0; $x < $category_rows; $x++) {
                                                                $category_details = $category_results->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo $category_details["id"] ?>"><?php echo $category_details["name"]; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-md-4 position-relative form-group"><label for="exampleEmail" class="">Type</label>
                                                        <div id="brand_div">
                                                            <div onclick="product_type_alert();">
                                                                <select style="background-color: white;" name="" id="typeid" class="form-control">
                                                                    <option value="0">Select product type</option>
                                                                    <?php
                                                                    $type_results = Database::search("SELECT * FROM `type`");
                                                                    $type_rows = $type_results->num_rows;

                                                                    for ($x = 0; $x < $type_rows; $x++) {
                                                                        $type_details = $type_results->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $type_details["id"] ?>"><?php echo $type_details["name"]; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 col-md-4 position-relative form-group"><label for="examplePassword" class="">Product brand</label><input name="" id="brand_id" placeholder="Enter Your Product brand" type="text" class="form-control"></div>

                                                    <div class="col-12 col-md-4 position-relative form-group"><label for="examplePassword" class="">Product Title</label><input name="" id="title_id" placeholder="Enter Your Product name" type="text" class="form-control"></div>

                                                    <div class="col-12 col-md-4 position-relative form-group"><label for="examplePassword" class="">Product Material</label><input name="" id="material_id" placeholder="Enter Your Product material" type="text" class="form-control"></div>


                                                    <!-- <div class="col-12 col-md-4 position-relative form-group"><label for="qty_id" class="">Product Quantity</label><input min="1" name="" id="qty_id" placeholder="Enter your product quantity" type="number" class="form-control"></div> -->

                                                    <div class="col-12 col-md-4 position-relative form-group"><label for="price_id" class="">Product Price</label><input onkeyup="calculate_discount();" min="1" name="" id="price_id" placeholder="Enter Your Product price" type="number" class="form-control"></div>

                                                    <!-- <div class="col-12 col-md-4 position-relative form-group"><label for="price_id" class="">Product Discount</label><input min="0" max="100" name="" id="discount" placeholder="Enter your product discount" type="number" class="form-control"></div> -->

                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustomUsername">Product Discount</label>
                                                        <div class="input-group">
                                                            <input onkeyup="coupon_function();" min="0" max="100" type="number" class="form-control" value="0" id="discount_id" placeholder="Enter your product discount" aria-describedby="inputGroupPrepend">
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
                                                                <span class="input-group-text" id="new_price_id1">New Price - LKR &nbsp;<span id="new_price_id">0</span> &nbsp;/=</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-2 offset-md-1 offset-lg-0 mb-3">
                                                        <label for="validationCustomUsername" class="text-white">Coupon Code</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <input class=" form-control border-success text-dark fw-bold" placeholder="Coupon Code" type="text" name="" id="coupon_code">
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="col-12 position-relative form-group"><label for="description_id" class="">Product Description</label><textarea style="background-color: #FAFAFA; border-color: rgb(0, 0, 0, 0.2); border-width: 2px;" rows="10" name="text" id="description_id" class="form-control"></textarea></div>

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



                                                                <div data-parent="#accordion1" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="blue_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />


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
                                                                                            <input name="check" id="size_label_id1" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid1" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id1" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid1" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id2" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid2" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id2" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid2" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id3" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid3" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id3" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid3" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id4" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid4" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id4" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid4" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id5" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid5" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id5" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid5" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id6" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid6" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id6" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid6" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id7" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid7" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id7" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid7" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id8" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid8" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id8" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid8" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="blue_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="b_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="b_prev2">
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


                                                                <div data-parent="#accordion2" id="collapseOne2" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="green_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id9" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid9" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id9" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid9" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id10" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid10" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id10" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid10" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id11" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid11" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id11" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid11" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id12" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid12" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id12" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid12" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id13" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid13" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id13" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid13" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id14" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid14" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id14" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid14" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id15" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid15" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id15" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid15" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id16" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid16" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id16" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid16" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="green_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="g_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="g_prev2">
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
                                                                <div data-parent="#accordion3" id="collapseOne3" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="gold_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id17" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid17" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id17" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid17" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id18" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid18" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id18" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid18" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id19" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid19" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id19" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid19" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id20" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid20" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id20" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid20" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id21" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid21" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id21" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid21" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id22" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid22" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id22" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid22" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id23" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid23" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id23" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid23" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id24" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid24" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id24" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid24" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gold_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gold_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gold_prev2">
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
                                                                <div data-parent="#accordion4" id="collapseOne4" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="silver_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id25" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid25" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id25" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid25" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id26" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid26" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id26" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid26" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id27" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid27" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id27" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid27" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id28" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid28" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id28" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid28" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id29" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid29" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id29" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid29" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id30" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid30" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id30" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid30" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id31" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid31" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id31" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid31" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id32" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid32" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id32" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid32" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="silver_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="silver_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="silver_prev2">
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
                                                                <div data-parent="#accordion5" id="collapseOne5" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="brown_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id33" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid33" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id33" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid33" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id34" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid34" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id34" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid34" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id35" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid35" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id35" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid35" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id36" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid36" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id36" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid36" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id37" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid37" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id37" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid37" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id38" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid38" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id38" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid38" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id39" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid39" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id39" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid39" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id40" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid40" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id40" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid40" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="brown_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="brown_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="brown_prev2">
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
                                                                <div data-parent="#accordion6" id="collapseOne6" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="black_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id41" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid41" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id41" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid41" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id42" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid42" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id42" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid42" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id43" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid43" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id43" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid43" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id44" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid44" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id44" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid44" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id45" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid45" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id45" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid45" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id46" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid46" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id46" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid46" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id47" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid47" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id47" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid47" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id48" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid48" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id48" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid48" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="black_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="black_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="black_prev2">
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
                                                                <div data-parent="#accordion7" id="collapseOne7" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="yellow_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id49" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid49" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id49" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid49" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id50" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid50" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id50" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid50" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id51" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid51" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id51" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid51" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id52" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid52" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id52" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid52" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id53" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid53" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id53" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid53" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id54" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid54" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id54" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid54" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id55" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid55" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id55" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid55" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id56" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid56" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id56" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid56" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="yellow_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="yellow_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="yellow_prev2">
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
                                                                <div data-parent="#accordion8" id="collapseOne8" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="red_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id57" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid57" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id57" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid57" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id58" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid58" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id58" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid58" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id59" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid59" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id59" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid59" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id60" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid60" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id60" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid60" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id61" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid61" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id61" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid61" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id62" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid62" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id62" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid62" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id63" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid63" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id63" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid63" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id64" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid64" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id64" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid64" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="red_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="red_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="red_prev2">
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
                                                                <div data-parent="#accordion9" id="collapseOne9" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="purple_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id65" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid65" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id65" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid65" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id66" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid66" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id66" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid66" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id67" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid67" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id67" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid67" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id68" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid68" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id68" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid68" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id69" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid69" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id69" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid69" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id70" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid70" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id70" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid70" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id71" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid71" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id71" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid71" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id72" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid72" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id72" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid72" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="purple_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="purple_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="purple_prev2">
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
                                                                <div data-parent="#accordion10" id="collapseOne10" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="pink_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id73" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid73" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id73" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid73" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id74" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid74" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id74" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid74" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id75" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid75" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id75" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid75" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id76" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid76" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id76" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid76" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id77" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid77" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id77" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid77" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id78" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid78" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id78" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid78" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id79" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid79" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id79" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid79" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id80" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid80" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id80" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid80" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="pink_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="pink_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="pink_prev2">
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
                                                                <div data-parent="#accordion11" id="collapseOne11" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="orange_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id81" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid81" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id81" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid81" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id82" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid82" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id82" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid82" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id83" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid83" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id83" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid83" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id84" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid84" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id84" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid84" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id85" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid85" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id85" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid85" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id86" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid86" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id86" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid86" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id87" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid87" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id87" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid87" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id88" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid88" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id88" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid88" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="orange_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="orange_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="orange_prev2">
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
                                                                <div data-parent="#accordion12" id="collapseOne12" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="gray_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id89" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid89" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id89" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid89" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id90" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid90" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id90" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid90" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id91" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid91" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id91" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid91" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id92" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid92" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id92" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid92" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id93" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid93" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id93" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid93" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id94" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid94" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id94" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid94" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id95" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid95" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id95" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid95" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id96" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid96" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id96" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid96" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="gray_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gray_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="gray_prev2">
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
                                                                <div data-parent="#accordion13" id="collapseOne13" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="BnW_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id97" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid97" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id97" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid97" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id98" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid98" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id98" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid98" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id99" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid99" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id99" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid99" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id100" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid100" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id100" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid100" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id101" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid101" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id101" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid101" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id102" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid102" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id102" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid102" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id103" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid103" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id103" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid103" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id104" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid104" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id104" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid104" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="BnW_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="BnW_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="BnW_prev2">
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
                                                                <div data-parent="#accordion14" id="collapseOne14" aria-labelledby="headingOne" class="collapse" style="">
                                                                    <div class="card-body">

                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div><label style="font-weight: normal;" class="form-label fw-lighter" for="examplePassword">Package Type:</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="" id="white_clr_variation" placeholder="Ex: Box / Bottle" class="col-6 form-control mb-3" />

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
                                                                                            <input name="check" id="size_label_id105" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid105" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id105" class="form-check-label">XS</label>
                                                                                        </div>
                                                                                        <div id="sizeid105" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_xs" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id106" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid106" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id106" class="form-check-label">S</label>
                                                                                        </div>
                                                                                        <div id="sizeid106" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_s" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id107" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid107" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id107" class="form-check-label">M</label>
                                                                                        </div>
                                                                                        <div id="sizeid107" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_m" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id108" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid108" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id108" class="form-check-label">L</label>
                                                                                        </div>
                                                                                        <div id="sizeid108" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_l" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id109" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid109" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id109" class="form-check-label">XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid109" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id110" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid110" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id110" class="form-check-label">XXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid110" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_xxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id111" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid111" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id111" class="form-check-label">XXXL</label>
                                                                                        </div>
                                                                                        <div id="sizeid111" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_xxxl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-4">
                                                                                    <div class="row">
                                                                                        <div class="position-relative form-check">
                                                                                            <input name="check" id="size_label_id112" type="checkbox" class="form-check-input" data-toggle="collapse" data-target="#sizeid112" aria-expanded="false" aria-controls="collapseOne" class="text-left  btn btn-light btn-block collapsed">
                                                                                            <label for="size_label_id112" class="form-check-label">4XL</label>
                                                                                        </div>
                                                                                        <div id="sizeid112" aria-labelledby="headingOne" class="collapse ">
                                                                                            <input id="white_4xl" onkeyup="add_product();" placeholder="Qty" min="1" type="number" class="form-control col-6" />
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="white_prev1">
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
                                                                                            <img style="width: 130px; height: 100px; object-fit: cover;" src="assets/images/product/img_upload.jpg" id="white_prev2">
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
                                                                <img style="object-fit: cover; height: 350px; width: auto;" src="assets/images/file-upload.jpg" id="thumbnail_prev">
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
            <script src="js/all.js"></script>
            <!-- Alerts -->
            <script src="assets/js/snackbar.min.js"></script>
            <script src="assets/js/add_product.js"></script>
    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "adminSignin.php";
    </script>
<?php
}
?>