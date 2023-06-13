<?php

session_start();
require "connection.php";

if (isset($_GET["orderID"]) && isset($_GET["size"])) {



    $orderID = $_GET["orderID"];
    $item = $_GET["item"];
    $amount = $_GET["amount"];
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    $email = $_GET["email"];
    $mobile = $_GET["mobile"];
    $address = $_GET["address"];
    $city = $_GET["city"];
    $country = $_GET["country"];
    $delivery = $_GET["delivery"];
    $qty = $_GET["qty"];
    $color = $_GET["color"];
    $size = $_GET["size"];
    $price = $_GET["price"];
    $stock_id = $_GET["stock_id"];

    $price_with_qty = ($price * $qty);
    // echo $price_with_qty;

    // echo $amount;

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
                background-color: black;
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
        ?>
            <!-- Offcanvas Overlay -->
            <div class="offcanvas-overlay"></div>




            <!-- ...:::: Start Breadcrumb Section:::... -->
            <div class="breadcrumb-section breadcrumb-bg-color--black">
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-10 mt-lg-0">
                                <h3 class="breadcrumb-title"><b>Select Payment Method</b></h3>
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
                                                                        <input placeholder="Enter a correct shipping address" class="border-3 border-dark" type="text" id="line1" name="add-1" value="<?php echo $d["line1"] ?>">
                                                                    </div>

                                                                    <div class="default-form-box mb-20 col-12 col-md-6">
                                                                        <label>Your City</label>
                                                                        <input placeholder="Enter your city" class="border-3 border-dark" type="text" id="line2" name="add-2" value="<?php echo $d["line2"] ?>">
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
                                                <form method="POST" action="payone.php">

                                                    <p class="form-group d-none">

                                                        <input type="text" class="form-control" id="ID" placeholder="Student ID"  required name="stuid" value="<?php echo $orderID ?>" >

                                                    </p>

                                                    <p class="form-group">

                                                        <input type="text" class="form-control" id="name" placeholder="First Name" required name="firstname">

                                                    </p>

                                                    <p class="form-group">

                                                        <input type="text" class="form-control" id="name" placeholder="Last Name" required name="lastname">

                                                    </p>

                                                    <p class="form-group">

                                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>

                                                    </p>


                                                    <p class="form-group">

                                                        <input type="tel" class="form-control" id="wh" placeholder="Whatsapp No (ex: +947xxxxxx)" name="tele" pattern="^(?:7|0|(?:\+94))[0-9]{9,10}$" required>

                                                    </p>

                                                    <p class="form-group d-none">

                                                        <input type="text" step="0.01" class="form-control" name="pay" placeholder="Payment" min="0.00" max="10000.00" value="<?php echo $amount ?>"  required>

                                                    </p>

                                                    <p class="form-group">

                                                        <button type="submit" class="btn btn-primary">Pay</button>

                                                    </p>

                                                </form>
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
                                            <!-- <span>Cash On Delivery</span> -->
                                            <a style="font-size: 3em;" class="Returning text-danger" href="#" data-bs-toggle="collapse" data-bs-target="#cashon" aria-expanded="true">Cash On Delivery</a>

                                        </h3>
                                        <div id="cashon" class=" cashon" data-parent="#cashon">
                                            <div class="checkout_info">
                                                <!-- <img src="assets/images/other/payment_methods.png" class="col-12" alt=""> -->
                                                <!-- <input class="border border-2 border-secondary" id="coupon_id" placeholder="Coupon code" type="text"> -->


                                                <table style="font-size: small; overflow-x: scroll;">


                                                    <h6>Order Summery</h6>
                                                    <tr>
                                                        <th>Product</th>
                                                        <td><?php echo $item; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Color</th>
                                                        <td><?php echo $color; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size</th>
                                                        <td><?php echo $size; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td>LKR <?php echo $price; ?> .00 &nbsp;&nbsp;<span style="font-weight: bolder;">x</span>&nbsp;&nbsp; <?php echo $qty; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Delivery fee</th>
                                                        <td><?php echo $delivery; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Paymemt method</th>
                                                        <td>Cash on delivery</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td style="font-size: 1.5em; font-weight: bolder;" class="text-danger">LKR <?php echo $amount; ?> .00 /=</td>
                                                    </tr>


                                                </table>


                                                <button onclick="order_now();" class="btn btn-md btn-black-default-hover mt-3 col-12 col-md-6">Place The Order</button>
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
                                <p>We will deliver your parcel within 2 - 5 working days. <br />You can pay after you get the parcel. <br />Confirm Order?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
                            <button style="background-color: red; border-color: red;" type="button" class="btn btn-dark text-white" onclick="cash_on_deliver_invoice('<?php echo $orderID ?>','<?php echo $stock_id ?>','<?php echo $color ?>','<?php echo $size ?>',<?php echo $qty ?>,<?php echo $price ?>,<?php echo $delivery ?>,<?php echo $amount ?>, <?php echo $price_with_qty ?>);">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--model-->


            </div>


            <?php
            require "footer.php";
            ?>

            <!-- material-scrolltop button -->
            <button style="left: 23px;" class="material-scrolltop bg-dark" type="button"></button>

        <?php

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
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>