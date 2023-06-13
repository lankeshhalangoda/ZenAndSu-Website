<?php

session_start();
require "connection.php";



?>
<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Zen & Su | Payment</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/snackbar.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>

    <style>
        .sticky-color--black {
            background-color: #2d2f3e;
        }

        tr {
            border-style: solid;
            border-color: black;
            border-width: 1px;
        }

        td {
            border-style: solid;
            border-color: black;
            border-width: 1px;
            padding: 5px;
        }
    </style>

</head>

<body>
    <?php
    require "large_header.php";
    require "mobile_header.php";
    ?>

    <?php

    if (isset($_SESSION["u"])) {
        $id = $_SESSION["u"]["id"];


        $total = "0";
        $subtotal = "0";
        $shipping = "0";
    ?>
        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>

        <?php

        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $id . "'");
        $cn = $cartrs->num_rows;

        $cart_qty = Database::search("SELECT SUM(qty) AS `qty_sum` FROM cart WHERE `user_id`='" . $id . "';");
        $cart_qty_d = $cart_qty->fetch_assoc();
        $cart_sumqty = $cart_qty_d["qty_sum"];

        $cart_up = Database::search("SELECT SUM(unit_price) AS `unit_price` FROM cart WHERE `user_id`='" . $id . "';");
        $cart_uprice_d = $cart_up->fetch_assoc();
        $cart_sumuprice = $cart_uprice_d["unit_price"];


        $delivery = "0";

        if ($cart_sumqty > 7) {
            $delivery = "400";
        } else {
            $delivery = "350";
        }

        if ($cn == 0) {

        ?>
            <script>
                window.location = "cart.php";
            </script>
        <?php

        } else {

        ?>

            <!-- ...:::: Start Breadcrumb Section:::... -->
            <div class="breadcrumb-section breadcrumb-bg-color--black">
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-10 mt-lg-0">
                                <h3 class="breadcrumb-title">Select Payment Method</h3>
                                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden d-none">
                                    <nav aria-label="breadcrumb">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                            <li class="active" aria-current="page">Select Payment Method</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- ...:::: End Breadcrumb Section:::... -->
            <div id="load">




                <!-- ...:::: Start Account Dashboard Section:::... -->
                <div class="account-dashboard mt-7">
                    <div class="pl-5 pr-5">
                        <div class="row mb-9 mt-9">

                            <div class="row col-sm-12 col-md-7">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">

                                    <div class="tab-pane fade active" id="account-details">
                                        <h3>Shipping Details </h3>
                                        <div class="login">
                                            <div class="login_form_container">
                                                <div class="account_login_form">
                                                    <?php

                                                    $usinfo = $_SESSION["u"];
                                                    ?>
                                                    <div>
                                                        <p>We are delivering your product to the information that you have mentioned here. <br> Therefore please provide us correct details.</p>
                                                        <br>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>First Name</label>
                                                                    <input disabled class="border-3 border-dark" type="text" name="first-name" id="fname" value="<?php echo $usinfo["fname"] ?>">
                                                                </div>
                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Last Name</label>
                                                                    <input disabled class="border-3 border-dark" type="text" name="last-name" id="lname" value="<?php echo $usinfo["lname"] ?>">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Email</label>
                                                                    <input disabled class="border-3 border-dark" type="text" id="email" name="email-name" value="<?php echo $usinfo["email"] ?>" disabled>
                                                                </div>
                                                                <div class="default-form-box col-12 col-md-6">
                                                                    <label>Mobile</label>
                                                                    <input disabled class="border-3 border-dark" type="text" id="mobile" name="mobile" value="<?php echo $usinfo["mobile"] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php

                                                        $uid = $_SESSION["u"]["id"];
                                                        $addressrs = Database::search("SELECT * FROM  user_has_address WHERE `user_id` ='" . $uid . "'");
                                                        $n = $addressrs->num_rows;

                                                        if ($n == 1) {

                                                            $d = $addressrs->fetch_assoc();

                                                        ?>
                                                           <div class="col-12">
                                                            <div class="row">
                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Address Line 1 (with district)</label>
                                                                    <input placeholder="Enter a correct shipping address" class="border-3 border-dark"  type="text" id="line1" name="add-1" value="<?php echo $d["line1"] ?>">
                                                                </div>

                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Your City</label>
                                                                    <input placeholder="Enter your city" class="border-3 border-dark"  type="text" id="line2" name="add-2" value="<?php echo $d["line2"] ?>">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <?php
                                                        } else {
                                                        }
                                                        ?>
                                                        <br />

                                                        <div class="mt-3">
                                                            <button class="btn btn-md btn-black-default-hover" onclick="updateProfile();">Change Shpping Details</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12 col-lg-5 pl-6 mt-8 mt-lg-0">
                                <div class="row">

                                    <p style="background-color: black;" class="text-white pt-1 pb-1 pl-5 pr-5 col-12" style="font-size: 1.4em;">Select Payment Method</p>

                                    <!-- User Quick Action Form -->
                                    <div class="col-12">
                                        <div class="user-actions accordion " data-aos="fade-up" data-aos-delay="100">
                                            <h3 style="border-color: black;">
                                                <!-- <i class="fa fa-file-o" aria-hidden="true"></i> -->
                                                <!-- Online Payment -->
                                                <a style="font-size: 3em;" class="Returning text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon" aria-expanded="true">Card Payment</a>

                                            </h3>
                                            <div class="row " data-parent="#checkout_coupon">
                                                <div class="row">
                                                    <img src="assets/images/other/payment_methods.png" class="col-8 offset-2" alt="">
                                                    <!-- <input class="border border-2 border-secondary" id="coupon_id" placeholder="Coupon code" type="text"> -->

                                                </div>
                                                <div class="row">
                                                    <h5>Comming soon..</h5>
                                                    <!-- <button class="col-8 offset-2 btn btn-black-default-hover" onclick="checkout();">Pay Now</button> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- User Quick Action Form -->


                                    <!-- User Quick Action Form -->
                                    <div style="margin-bottom: -30px;">
                                        <div class="user-actions accordion " data-aos="fade-up" data-aos-delay="100">
                                            <h3 style="border-color: black;">
                                                <!-- <i class="fa fa-file-o" aria-hidden="true"></i> -->
                                                <!-- <span>Cash On Deliver</span> -->
                                                <a style="font-size: 3em;" class="Returning text-danger" href="#" data-bs-toggle="collapse" data-bs-target="#cashon" aria-expanded="true">Cash On Deliver</a>

                                            </h3>
                                            <div id="cashon" class=" cashon" data-parent="#cashon">
                                                <div class="checkout_info">
                                                    <!-- <img src="assets/images/other/payment_methods.png" class="col-12" alt=""> -->
                                                    <!-- <input class="border border-2 border-secondary" id="coupon_id" placeholder="Coupon code" type="text"> -->

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Product</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Color</th>
                                                                <th scope="col">Size</th>
                                                                <th scope="col">Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            for ($i = 0; $i < $cn; $i++) {
                                                                $cr = $cartrs->fetch_assoc();

                                                                $productrs  = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
                                                                $pr = $productrs->fetch_assoc();

                                                                $total = $total + ($cr["unit_price"] * $cr["qty"]);

                                                            ?>
                                                                <!-- Start Cart Single Item-->



                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td><?php echo $pr["title"] ?></td>
                                                                    <td><?php echo $cr["color"] ?></td>
                                                                    <td><?php echo $cr["size"] ?></td>
                                                                    <td>Rs.<?php echo $cr["unit_price"]; ?>.00</td>
                                                                </tr>



                                                            <?php
                                                            }
                                                            ?>
                                                            <tr>
                                                                <th scope="row" style="text-align: right;" colspan="5">
                                                                    Delivery fee: &nbsp; Rs.<?php echo $delivery ?>.00
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" style="text-align: right;" colspan="5">
                                                                    Total: &nbsp; Rs.<?php echo $total + $delivery ?>.00
                                                                </th>

                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <!-- <h5>Comming Soon..</h5> -->

                                                    <button onclick="order_now2();" class="btn btn-md btn-black-default-hover mt-3 col-12 col-md-6">Place The Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- User Quick Action Form -->


                                </div>
                            </div>



                        </div>
                    </div>
                </div>



                <!--model-->
                <div class="modal fade" tabindex="-1" id="order_now_id">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Place Your Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <p>We will deliver your parcel within 2 - 5 working days. <br />After you get the parcel you can pay us. <br />Confirm Order ?</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
                                <button style="background-color: red; border-color: red;" type="button" class="btn btn-dark text-white" onclick="deliveryfull();">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--model-->

                <!--model-->
                <div class="modal fade" tabindex="-1" id="deliveryset">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Order Has Been Confirmed</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <p>Order Will be shipped soon.<br />We sent an email about your order check now.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal" onclick="movetohome();">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!--model-->

                <!-- Modal -->
                <div class="modal fade" id="wd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="inner2">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>
                                <a href="Signin_and_signup.php" class="btn btn-golden">Signin or Signup</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <?php
            require "footer.php";
            ?>

            <!-- material-scrolltop button -->
            <button style="left: 23px;" class="material-scrolltop bg-dark" type="button"></button>

        <?php
        }
    } else {
        ?>
        <script>
            window.location = "login.php";
        </script>
    <?php
    }

    ?>



    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="assets/js/snackbar.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/account.js"></script>
    <script src="assets/js/script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>