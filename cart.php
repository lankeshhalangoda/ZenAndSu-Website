<?php

require "connection.php";

session_start();

if (isset($_SESSION["u"])) {
    $id = $_SESSION["u"]["id"];


    $total = "0";
    $subtotal = "0";
    $shipping = "0";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Zen & Su | Cart</title>

        <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">

        <!-- Use the minified version files listed below for better performance and remove the files listed above -->
        <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
        <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
        <link rel="stylesheet" href="assets/css/style.min.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/snackbar.min.css">

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


<!-- Start Breadcrumb Section -->

<div class="breadcrumb-section breadcrumb-bg-color--golden" style="background-color: #000000;">
        <div class="breadcrumb-wrapper p-6">
            <div class="container">
                <div class="row ">
                    <div class="col-12 mt-10 mt-lg-0 pt-10">
                        <h3 class="breadcrumb-title text-white fw-bold"><b>My Shopping Cart</b></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="fw-bold text-white"><a href="index.php" class="text-white">Home</a></li>
                                    <li class="active text-warning" aria-current="page">My Shopping Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Section -->

        <div id="load">

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
                <!--Start About Us Center Section-->
                <div style="margin-top: -115px;" class="empty-cart-section section-fluid  mb-9">
                    <div class="emptycart-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                                    <div class="emptycart-content text-center">
                                        <div class="image">
                                            <img class="img-fluid" src="assets/images/emprt-cart/empty-cart.png" alt="">
                                        </div>
                                        <h4 class="title">Your Cart is empty!</h4>
                                        <h6 class="sub-title">Nothing in your cart. Add items and try again.</h6>
                                        <a href="index.php" class="btn btn-lg btn-golden">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--End  About Us Center Section-->

            <?php
            } else {


            ?>
        


                <div class="cart-section">
                    <!-- Start Cart Table -->
                    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table_desc">
                                        <div class="table_page table-responsive">
                                            <table>
                                                <!-- Start Cart Table Head -->
                                                <thead>
                                                    <tr>
                                                        <th class="product_remove">Delete</th>
                                                        <th class="product_thumb">Image</th>
                                                        <th class="product_name">Product</th>

                                                        <th class="product-color">Package</th>
                                                        <th class="product-condition">Size</th>
                                                        <th class="product_quantity">Quantity</th>
                                                        <th class="product_total">Unit Price</th>


                                                    </tr>
                                                </thead> <!-- End Cart Table Head -->
                                                <tbody>
                                                    <tr>
                                                        <td style="font-weight: bolder;" colspan="3"><small>You can delete unwanted products from cart.</small></td>
                                                    </tr>
                                                    <?php
                                                    for ($i = 0; $i < $cn; $i++) {
                                                        $cr = $cartrs->fetch_assoc();

                                                        $productrs  = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
                                                        $pr = $productrs->fetch_assoc();

                                                        $total = $total + ($cr["unit_price"] * $cr["qty"]);

                                                    ?>
                                                        <!-- Start Cart Single Item-->
                                                        <tr>
                                                            <td class="product_remove"><a href="#" onclick="deletefromCart(<?php echo $cr['id']; ?>);"><i class="fa fa-trash-o"></i></a>
                                                            </td>
                                                            <?php
                                                            $imagers = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $pr["id"] . "'");
                                                            $in = $imagers->num_rows;
                                                            $arr;
                                                            for ($x = 0; $x < $in; $x++) {
                                                                $ir = $imagers->fetch_assoc();
                                                                $arr[$x] = $ir["code"];
                                                            }
                                                            ?>
                                                            <td class="product_thumb"><a href="#"><img src="<?php echo $arr[0] ?>" alt=""></a></td>
                                                            <td class="product_name"><a href="<?php echo "product_details.php?id=" . ($pr["id"]); ?>"><?php echo $pr["title"]; ?></a></td>

                                                            <?php

                                                            $stock_rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $cr["product_id"] . "'");
                                                            $stockr = $stock_rs->num_rows;


                                                            ?>

                                                            <td class="product-color">
                                                                <input class="form-control text-center" disabled type="text" value="<?php echo $cr["color"]; ?>">
                                                            </td>


                                                            <td class="product-size">
                                                                <input class="form-control text-center" disabled type="text" value="<?php echo $cr["size"]; ?>">
                                                            </td>
                                                            <td> <input disabled class="form-control text-center" min="1" max="100" value="0<?php echo $cr["qty"]; ?>" type="number" onchange="cartupdate(<?php echo $cr['id'] ?>);autoprice(<?php echo $cr['id'] ?>);" id="qtyup<?php echo $cr["id"]; ?>"></td>
                                                            <td class="product_total" id="price<?php echo $cr["id"] ?>">Rs.<?php echo $cr["unit_price"]; ?>.00</td>

                                                        </tr> <!-- End Cart Single Item-->
                                                    <?php

                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Cart Table -->


                    <!-- Start Coupon Start -->
                    <div class="coupon_area">
                        <div class="container">
                            <div class="row">
                               
                                <div class="col-12">
                                    <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                                        <h3>Cart Totals</h3>
                                        <div class="coupon_inner">

                                            <div class="cart_subtotal">
                                                <p>Total Items</p>
                                                <p class="cart_amount" id="sub">0<?php echo $cart_sumqty; ?></p>
                                            </div>
                                            <div class="cart_subtotal">
                                                <p>Subtotal</p>
                                                <p class="cart_amount" id="sub">LKR <?php echo $total; ?> .00</p>
                                            </div>
                                            <div class="cart_subtotal ">
                                                <p>Courier</p>
                                                <p class="cart_amount">+ LKR <?php echo $delivery ?> .00</p>
                                            </div>
                                            <div class="cart_subtotal">
                                                <p class="text-danger">Total</p>
                                                <p style="font-size: 2em;" class="cart_amount text-danger" id="tot">LKR <?php echo $total + $delivery ?> .00 /=</p>
                                            </div>
                                            <div class="checkout_btn">
                                                <a href="payment_method_c.php" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Coupon Start -->
                </div> <!-- ...:::: End Cart Section:::... -->

            <?php

            }
            ?>
        </div>

        <?php

        require "footer.php";

        ?>

        <!-- material-scrolltop button -->
        <button class="material-scrolltop" type="button"></button>



        <script src="assets/js/vendor/vendor.min.js"></script>
        <script src="assets/js/plugins/plugins.min.js"></script>

        <!-- Main JS -->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>


    </html>

<?php
} else {
?>
    <link rel="stylesheet" href="assets/css/style.min.css">

    <body class="bg-dark">

    </body>


    <!-- Modal -->
    <div class="modal fade" id="mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Unknown user please sign in or sign up to continue
                </div>
                <div class="modal-footer">
                    <a style="background-color: black;" href="login.php" type="button" class="btn btn-dark text-white">Sign in or Sign up</a>

                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>

    <script>
        var modal = document.getElementById("mod")
        k = new bootstrap.Modal(modal);
        k.show();
    </script>

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

<?php
}
?>