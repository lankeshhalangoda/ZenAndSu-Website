<?php
require "connection.php";
session_start();

if (isset($_SESSION["u"])) {
?>
    <!DOCTYPE html>
    <html lang="en">


    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Zen & Su | Wishlist</title>

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
        </style>


    </head>

    <body>

        <?php
        require "large_header.php";
        require "mobile_header.php";

        if (isset($_SESSION["u"])) {

            $umail = $_SESSION["u"]["email"];

        ?>

 <!-- ...:::: Start Breadcrumb Section:::... -->

 <div class="breadcrumb-section breadcrumb-bg-color--golden" style="background-color: #000000;">
        <div class="breadcrumb-wrapper p-6">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-10 mt-lg-0 pt-10">
                        <h3 class="breadcrumb-title text-white fw-bold"><b>My Wishlist</b></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="fw-bold text-white"><a href="index.php" class="text-white">Home</a></li>
                                    <li class="active text-warning" aria-current="page">My Wishlist</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Breadcrumb Section:::... -->

            <div id="load">





                <!-- ...:::: Start Wishlist Section:::... -->
                <div class="wishlist-section">
                    <!-- Start Cart Table -->
                    <div class="wishlish-table-wrapper" data-aos="fade-up" data-aos-delay="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table_desc">
                                        <div class="table_page table-responsive">

                                            <?php

                                            $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $umail . "' ");
                                            $user_data = $user->fetch_assoc();
                                            $user_id = $user_data["id"];

                                            $wishlistrs = Database::search("SELECT * FROM `wishlist` WHERE `user_id`='" . $user_id . "'");
                                            $wn = $wishlistrs->num_rows;

                                            if ($wn == 0) {
                                            ?>

                                                <!-- ...::::Start About Us Center Section:::... -->
                                                <div class="empty-cart-section section-fluid mt-9 mb-9">
                                                    <div class="emptycart-wrapper">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                                                                    <div class="emptycart-content text-center">
                                                                        <div class="image">
                                                                            <img class="img-fluid" src="assets/images/other/wishlist_empty.webp" alt="">
                                                                        </div>
                                                                        <h4 class="title">Your Wishlist is Empty</h4>
                                                                        <h6 class="sub-title">Nothing in your cart. Add items and try again.</h6>
                                                                        <a href="index.php" class="btn btn-lg btn-golden">Continue Shopping</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- ...::::End  About Us Center Section:::... -->

                                            <?php
                                            } else {



                                            ?>
                                                <table>
                                                    <!-- Start Wishlist Table Head -->
                                                    <thead>
                                                        <tr>
                                                            <th class="product_remove">Delete</th>
                                                            <th class="product_thumb">Image</th>
                                                            <th class="product_name">Product</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-condition">Available Quantity</th>
                                                            <th class="product_stock">Stock Status</th>
                                                            <th class="product_addcart">Product Details View</th>
                                                        </tr>
                                                    </thead> <!-- End Cart Table Head -->
                                                    <?php
                                                    for ($i = 0; $i < $wn; $i++) {
                                                        $wr = $wishlistrs->fetch_assoc();
                                                        $wid = $wr["product_id"];

                                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $wid . "'");
                                                        $pn = $productrs->num_rows;
                                                        if ($pn == 1) {
                                                            $pr = $productrs->fetch_assoc();
                                                            $prodid = $pr["id"];

                                                    ?>
                                                            <tbody>
                                                                <!-- Start Wishlist Single Item-->
                                                                <tr>
                                                                    <td class="product_remove"><a href="#" onclick="deleteFromWatchlist(<?php echo $wr['id']; ?>);"><i class="fa fa-trash-o"></i></a></td>
                                                                    <?php
                                                                    $imagers = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $prodid . "'");
                                                                    $in = $imagers->num_rows;
                                                                    $arr;
                                                                    for ($x = 0; $x < $in; $x++) {
                                                                        $ir = $imagers->fetch_assoc();
                                                                        $arr[$x] = $ir["code"];
                                                                    }
                                                                    ?>
                                                                    <td class="product_thumb"><a href="<?php echo "product_details.php?id=" . ($pr['id']); ?>"><img src="<?php echo $arr[0]; ?>" alt=""></a></td>
                                                                    <td class="product_name"><a href="<?php echo "product_details.php?id=" . ($pr['id']); ?>"><?php echo $pr["title"]; ?></a></td>
                                                                    <td class="product-price">LKR. <?php echo $pr["price"] ?> .00 </td>

                                                                    <td class="product-condition"><?php echo $pr["total_qty"]; ?></td>
                                                                    <td class="product_stock"><?php if ((int)$pr["total_qty"] > 0) {
                                                                                                    echo "In Stock";
                                                                                                } else {
                                                                                                    echo "Out of Stock";
                                                                                                }
                                                                                                ?></td>
                                                                    <input class="d-none" type="number" value="1" id="qtyinput<?php echo $pr["id"] ?>">
                                                                    <td class="product_addcart"><a href="<?php echo "product_details.php?id=" . ($pr['id']); ?>"  class="btn btn-md btn-golden">View Product</a></td>
                                                                </tr> <!-- End Wishlist Single Item-->

                                                            </tbody>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </table>

                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Cart Table -->
                </div> <!-- ...:::: End Wishlist Section:::... -->
            </div>
        <?php
        }

        require "footer.php";
        ?>
        <!-- Modal -->
        <div class="modal fade" id="md" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cart Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="inner">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-golden">See Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- material-scrolltop button -->
        <button class="material-scrolltop" type="button"></button>


        <script src="assets/js/vendor/vendor.min.js"></script>
        <script src="assets/js/plugins/plugins.min.js"></script>

        <!-- Main JS -->
        <script src="assets/js/main.js"></script>
        <script src="script.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/snackbar.min.js"></script>
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
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Warning !!</h5>
                    <a href="javascript:history.go(-1)" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    Unknown user please signin or signup to continue.
                </div>
                <div class="modal-footer">
                    <a href="javascript:history.go(-1)" type="button" class="btn btn-dark text-white">Cancel</a>
                    <a href="login.php" type="button" class="btn btn-dark text-white">Signin or signup</a>

                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>

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