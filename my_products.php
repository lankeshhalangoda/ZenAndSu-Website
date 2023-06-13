<?php
session_start();
require "connection.php";
if (isset($_SESSION["admin"])) {
    $pageno;
?>

    <!doctype html>
    <html lang="en">

    <head>

        <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin | My Products</title>
        <link href="css/font-awesome.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
        <!-- Alerts -->
        <link rel="stylesheet" href="assets/css/snackbar.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">

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
                                                <i class="fa fa-archive  icon-gradient bg-malibu-beach">
                                                </i>
                                            </div>
                                            <div>My Products
                                                <div class="page-title-subheading">Clothes and footwear can be managed here.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="page-title-actions">
                                            <button onclick="history_back1();" type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Back">
                                                Back
                                            </button>
                                            <a href="admin.php"><button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-info " data-original-title="Dashboard">
                                                    Dashboard
                                                </button></a>

                                        </div>
                                    </div>
                                </div>

                                <!-- -------------------------------------------------------- My product --------------------------------------------------------  -->

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 col-md-3 ">
                                            <div class="row">
                                                <span class="mb-1">Search product : </span>
                                                <input onkeyup="addfilters('1');" class="form-control" type="text" name="" id="my_product_filter" placeholder="Search product.." />
                                            </div>
                                        </div>

                                        <div onclick="desc_desc();" class="col-12 col-md-3 mb-4 offset-0 offset-md-1">
                                            <div class="row">
                                                <span class="mb-1">Sort By : </span>
                                                <select onchange="addfilters('1');" name="" id="my_product_select" class="form-control">
                                                    <option value="0">Best Match</option>
                                                    <option value="1">Price low to high</option>
                                                    <option value="2">Price high to low</option>
                                                    <option value="3">Quantity low to high</option>
                                                    <option value="4">Quantity high to low</option>
                                                    <option value="5">Newest on top</option>
                                                    <option value="6">Oldest on top</option>
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row" id="filter_div1">

                                        <?php

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $product_rs = Database::search("SELECT * FROM `product`");
                                        $product_rows = $product_rs->num_rows;

                                        $results_per_page = 6;
                                        $number_of_pages = ceil($product_rows / $results_per_page);
                                        $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                        $product_rs = Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                                        $product_rows = $product_rs->num_rows;

                                        for ($x = 0; $x < $product_rows; $x++) {
                                            $pd = $product_rs->fetch_assoc();
                                            $prduct_id = $pd["id"];

                                        ?>
                                            <div class="col-12 col-md-4 card-body">
                                                <div class="row">

                                                    <?php
                                                    $p_img = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $prduct_id . "' AND `code` LIKE '%thumbnail%'");
                                                    $p_imgd = $p_img->fetch_assoc();
                                                    ?>

                                                    <div class="main-card mb-3 card">
                                                        <img style="width: auto; height: 245px; object-fit: cover;" src="<?php echo $p_imgd["code"]; ?>" class="card-img-top">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $pd["title"]; ?></h5>
                                                            <h6 style="color: black;" class="card-subtitle"><b>LKR <?php echo $pd["newPrice"]; ?> /= &nbsp; <small><del>LKR <?php echo $pd["price"]; ?> /=</del></small></b> &nbsp;&nbsp;<b><span style="font-size: larger;"><?php echo $pd["discount"]; ?>% OFF</span></b> </h6>

                                                            <textarea style="width: 100%; height: 100px; border: none; overflow-y: hidden; outline: none; background-color: transparent; resize: none;" name="" id=""><?php echo $pd["description"]; ?></textarea>

                                                            <br /> <br />
                                                            <button onclick="update_product(<?php echo $pd['id'] ?>);" class="btn btn-dark col-12">Update Product</button>
                                                            
                                                            <?php
                                                            if ($pd["status_id"] == 1) {
                                                            ?>
                                                                <button onclick="product_deactive(<?php echo $pd['id'] ?>);" id="deactive_product<?php echo $pd['id'] ?>" class="btn btn-danger col-12 mt-2">Deactivate Your Product</button>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <button onclick="product_deactive(<?php echo $pd['id'] ?>);" id="deactive_product<?php echo $pd['id'] ?>" class="btn btn-warning col-12 mt-2">Activate Your Product</button>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>



                                    </div>
                                </div>



                                <!--  -------------------------------------------------------- My product  --------------------------------------------------------   -->

                                <!-- pagination -->


                                <div style="display: block;" id="sp" class="col-12 mb-3 text-center">

                                    <div class=" col-12 col-lg-4 offset-lg-4 d-flex justify-content-center">
                                        <div class="text-dark" style="font-size: 2em;">
                                            <a href="
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
                                                    <a href="<?php echo "?page=" . ($page); ?>" style="margin-right: 1px;" class="ms-1 btn btn-dark active"><?php echo $page; ?></a>

                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo "?page=" . ($page); ?>" style="margin-right: 1px;" class="ms-1 btn btn-secondary"><?php echo $page; ?></a>

                                            <?php
                                                }
                                            }

                                            ?>
                                            <a href="
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
            <script src="assets/js/update_product.js"></script>
            <!-- Alerts -->
            <script src="assets/js/snackbar.min.js"></script>
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