<?php
session_start();
require "connection.php";

if (isset($_SESSION["admin"])) {


    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }
?>

    <!doctype html>
    <html lang="en">

    <head>
        <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin | Dashboard</title>
        <link href="css/font-awesome.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">


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

                <?php

                $today = date("Y-m-d");
                $thisMonth = date("m");
                $thisyear = date("Y");

                $a = "0";
                $b = "0";
                $c = "0";
                $e = "0";
                $f = "0";

                $invoice_rs = Database::search("SELECT * FROM `invoice` ");
                $in = $invoice_rs->num_rows;

                for ($x = 0; $x < $in; $x++) {
                    $ir = $invoice_rs->fetch_assoc();

                    $f = $f + $ir["qty"];

                    $d = $ir["date"];
                    $splitdate = explode(" ", $d);
                    $pdate = $splitdate[0];


                    if ($pdate == $today) {
                        $a = $a + $ir["total"];
                        $c = $c + $ir["qty"];
                    }
                    $splitMonth = explode("-", $pdate);
                    $pyear = $splitMonth[0];
                    $pmonth = $splitMonth[1];

                    if ($pyear == $thisyear) {
                        if ($pmonth == $thisMonth) {
                            $b = $b + $ir["total"];
                            $e = $e + $ir["qty"];
                        }
                    }
                }

                ?>


                <div class="app-main__outer">
                    <div class="app-main__inner">

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Daily Earnings</div>


                                            <div class="widget-subheading">Realtime Updated Results</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span style="font-size: medium;">LKR <?php echo $a; ?> </span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Monthly Earnings</div>
                                            <div class="widget-subheading">Realtime Updated Results</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span style="font-size: medium;">LKR <?php echo $b; ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Sold Today</div>
                                            <div class="widget-subheading">Realtime Updated Results</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span style="font-size: medium;"><?php echo $c; ?> Items</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Monthly Selling</div>
                                            <div class="widget-subheading">Realtime Updated Results</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span style="font-size: medium;"><?php echo $e; ?> Items</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Sold</div>
                                            <div class="widget-subheading">Realtime Updated Results</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span style="font-size: medium;"><?php echo $f; ?> Items</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Engagement</div>

                                            <?php
                                            $users_rs = Database::search("SELECT * FROM `user`");
                                            $number_of_users = $users_rs->num_rows;
                                            ?>

                                            <div class="widget-subheading">Realtime Updated Results</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span style="font-size: medium;"><?php echo $number_of_users; ?> Members</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-xl-12">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Admin</div>

                                            <div class="widget-subheading">Total Active Time</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div style="font-size: large;" class="widget-numbers text-white"><span id="date">

                                                    Year: 2022 Month: 8 Day: 15 Hours: 14 Minutes: 15 Seconds: 02

                                                </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                        <div class="row">

                            <div class="col-md-12 col-lg-6">
                                <div class="mb-3 card">


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Orders</div>
                                                <div class="widget-subheading">Customers love our products.</div>
                                            </div>

                                            <?php
                                            $to = Database::search("SELECT * FROM `invoice`");
                                            $tr = $to->num_rows;
                                            ?>
                                            <div class="widget-content-right">

                                                <div class="widget-numbers text-success">
                                                    <span style="font-size: medium;"><?php echo $tr; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Feedbacks</div>
                                                <div class="widget-subheading">All feedbacks given by customers.</div>
                                            </div>
                                            <?php
                                            $to2 = Database::search("SELECT * FROM `contact`");
                                            $tr2 = $to2->num_rows;
                                            ?>
                                            <div class="widget-content-right">

                                                <div class="widget-numbers text-success"><span style="font-size: medium;"><?php echo $tr2; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="main-card mb-3 card ">
                                    <div class="card-header">Active Users</div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>

                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Name</th>
                                                    <th class="text-center">Mobile</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Register Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $activeu = Database::search("SELECT * FROM `user` WHERE `status_id` = '1' ");
                                                $activeur = $activeu->num_rows;

                                                if ($activeur != 0) {
                                                ?>


                                                    <?php

                                                    $results_per_page = 10;
                                                    $number_of_pages = ceil($activeur / $results_per_page);
                                                    $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                                    $activeu = Database::search("SELECT * FROM `user` WHERE `status_id` = '1' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");
                                                    $activeur = $activeu->num_rows;


                                                    for ($x = 0; $x < $activeur; $x++) {
                                                        $activefetch = $activeu->fetch_assoc();
                                                    ?>

                                                        <tr>
                                                            <td class="text-center text-muted">#</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">

                                                                                <i class="fa fa-user"></i>

                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading"><?php echo $activefetch["fname"] . " " . $activefetch["lname"] ?> &nbsp; (<?php echo $activefetch["email"] ?>)</div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <?php
                                                            if (empty($activefetch["mobile"])) {
                                                            ?>
                                                                <td class="text-center text-black-50">Profile not updated yet.</td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td class="text-center"><?php echo $activefetch["mobile"] ?></td>
                                                            <?php
                                                            }
                                                            ?>


                                                            <td class="text-center">
                                                                <div class="badge badge-danger">Active</div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="badge badge-success"><?php echo $activefetch["register_date"] ?></div>
                                                            </td>

                                                        </tr>

                                                    <?php
                                                    }
                                                    ?>


                                                <?php
                                                }else{
                                                    ?>
                                                        <td style="text-align: center;" colspan="5">No users to display.</td>
                                                    <?php
                                                }

                                                ?>





                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="d-block justify-content-justify-content-end d-flex text-center card-footer">
                                        <!-- pagination -->

                                        <div style="margin-left: auto; margin-right: auto; display: block;" id="sp" class="mb-3 text-center justify-content-center">

                                            <div class="aa-product-catg-pagination">
                                                <div class="pagination">
                                                    <a style="margin-left: 5px;" class="btn btn-light" href="
                                                            <?php
                                                            if ($pageno <= 1) {
                                                                echo "#";
                                                            } else {
                                                                echo "?page=" . ($pageno - 1);
                                                            }
                                                            ?>">&laquo;</a>


                                                    <?php
                                                    $page;

                                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                                        if ($page == $pageno) {
                                                    ?>
                                                            <a style="margin-left: 5px;" href="<?php echo "?page=" . ($page); ?>" class="ms-1 active btn btn-primary bg-primary"><?php echo $page; ?></a>

                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a style="margin-left: 5px;" href="<?php echo "?page=" . ($page); ?>" class="ms-1 btn btn-light"><?php echo $page; ?></a>

                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                    <a style="margin-left: 5px;" class="btn btn-light" href="
                                                        <?php
                                                        if ($pageno >= $number_of_pages) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno + 1);
                                                        }
                                                        ?>
                                                        ">&raquo;</a>

                                                </div>

                                            </div>
                                        </div>

                                        <!-- pagination -->
                                        <!-- <button class="btn-wide btn btn-success">Pagination</button> -->
                                    </div>



                                </div>



                                <div class="main-card mb-3 card">
                                    <div class="card-header">Most Sold Item</div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Product Title</th>
                                                    <th class="text-center">Items Sold</th>
                                                    <th class="text-center">Item Cost</th>
                                                    <th class="text-center">Stock Status</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php
                                                //most sold item
                                                $item_rs = Database::search("SELECT `user_id`, `product_id` , COUNT(`product_id`) AS `max_product` FROM invoice GROUP BY `product_id` ORDER BY `max_product` DESC LIMIT 1;");
                                                $item_rows = $item_rs->num_rows;

                                                if ($item_rows != 0) {

                                                ?>
                                                    <?php
                                                    $item_d = $item_rs->fetch_assoc();
                                                    $max_product = $item_d["max_product"];
                                                    $pr_id = $item_d["product_id"];
                                                    // $uemail = $item_d["user_email"];
                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pr_id . "' ");
                                                    $product = $product_rs->fetch_assoc();

                                                    //most sold item img
                                                    // $img_rs = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img1%' AND `product_id` = '" . $pr_id . "' ");
                                                    // $img = $img_rs->fetch_assoc();

                                                    ?>

                                                    <tr>
                                                        <td class="text-center text-muted">#</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left mr-3">
                                                                        <div class="widget-content-left">
                                                                            <img width="40" class="rounded-circle" src="<?php echo $img["code"] ?>" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading"><?php echo $product["title"]; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><?php echo $max_product; ?> Items</td>
                                                        <td class="text-center">LKR <?php echo $product["price"]; ?> .00</td>
                                                        <td class="text-center">
                                                            <?php
                                                            if ((int)$product["total_qty"] > 0) {
                                                            ?>
                                                                <div class="badge badge-danger">In Stock</div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="badge badge-danger">Out Of Stock</div>
                                                            <?php
                                                            }
                                                            ?>

                                                        </td>
                                                        <td class="text-center">
                                                            <div class="badge badge-success"><?php echo $product["datetime_added"]; ?></div>
                                                        </td>
                                                    </tr>
                                                <?php

                                                } else {
                                                ?>
                                                    <td style="text-align: center;" colspan="6">No items to display.</td>
                                                <?php
                                                }
                                                ?>




                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        <!-- <button class="btn-wide btn btn-success">Pagination</button> -->
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="row">

                                        <div class="mb-3 text-center card card-body col-12 col-md-6">
                                            <h5 class="card-title">Update Website Banners</h5><span>Lankesh develops this yet :) Coming soon.</span><br />
                                            <button onclick="banner_update();" class="btn btn-focus"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp; Need To Update</button>
                                        </div>
                                        <div class="mb-3 text-center card card-body col-12 col-md-6">
                                            <h5 class="card-title">Add Products</h5><span>You can add products to Zen & Su.</span><br />
                                            <button onclick="goToAddProduct();" class="btn btn-focus"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp; Go To Add Product</button>
                                        </div>
                                        <div class="mb-3 text-center card card-body col-12 col-md-6">
                                            <h5 class="card-title">My Products</h5><span>You can see all products listed in Zen & Su.</span><br />
                                            <button onclick="goToMyProducts();" class="btn btn-focus"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp; Go To My Products</button>
                                        </div>
                                        <div class="mb-3 text-center card card-body col-12 col-md-6">
                                            <h5 class="card-title">Manage Orders</h5><span>Lankesh develops this yet :) Coming soon.</span><br />
                                            <button onclick="goToAddManageOrders();" class="btn btn-focus"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp; Go To Manage Orders</button>
                                        </div>

                                    </div>
                                </div>






                            </div>
                        </div>

                    </div>

                </div>



                <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->

            </div>
        </div>

        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="js/all.js"></script>
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