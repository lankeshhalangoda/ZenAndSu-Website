<?php
session_start();
require "connection.php";

//$user = $_SESSION["u"];
$s = $_POST["s"];
$c = $_POST["c"];
$b = $_POST["ty"];
$clr = $_POST["clr"];
$siz = $_POST["siz"];

$pf = $_POST["prif"];
$pt = $_POST["prit"];
$sort = $_POST["sort"];
$states = "0";


$cbm;

//echo array_values($user);

$quvry = "SELECT * FROM product WHERE product.user_id AND `status_id` = '1' LIKE '%%'";

if (isset($s)) {

    $quvry .= " AND (`title` LIKE '%" . $s . "%' OR `description` LIKE '%" . $s . "%' OR `material` LIKE '" . $s . "' OR `brand`='" . $s . "' OR `id` IN (SELECT product_id FROM stock WHERE color_variation LIKE '%" . $s . "%'))";
}



if ($b !== "0"  && $c != "0") {
    // echo $s,$c,$b,$m,$co,$col,$pf,$pt;
    $products = Database::search("SELECT * FROM category_has_type WHERE category_has_type.type_id='" . $b . "' AND  category_has_type.category_id='" . $c . "'");
    $nProduct = $products->num_rows;
    if ($nProduct > 0) {
        for ($x = 0; $x < $nProduct; $x++) {
            $cotagery = $products->fetch_assoc();
            $cat = $cotagery["id"];
            $states = "1";
            $cbm[$x] = $cotagery["id"];
        }
    } else {
        $cbm[0] = 0;
    }
}
//  else if ($b !== "0" && $c != "0") {
//     $products = Database::search("SELECT * FROM category_has_type WHERE category_has_type.type_id='" . $b . "' AND category_has_type.category_id='" . $c . "'");
//     $nProduct = $products->num_rows;
//     if ($nProduct > 0) {
//         for ($x = 0; $x < $nProduct; $x++) {
//             $cotagery = $products->fetch_assoc();
//             $cat = $cotagery["id"];
//             $states = "1";
//             $cbm[$x] = $cotagery["id"];
//         }
//     } else {
//         $cbm[0] = 0;

//     }
// }
else if ($c != "0" && $b == "0") {
    $products = Database::search("SELECT * FROM category_has_type WHERE category_has_type.category_id='" . $c . "'");
    $nProduct = $products->num_rows;
    if ($nProduct > 0) {
        for ($x = 0; $x < $nProduct; $x++) {
            $cotagery = $products->fetch_assoc();
            $cat = $cotagery["id"];
            $states = "1";
            $cbm[$x] = $cotagery["id"];
        }
    } else {
        $cbm[0] = 0;
    }
} else if ($b !== "0" && $c == "0") {
    $products = Database::search("SELECT * FROM category_has_type WHERE category_has_type.type_id='" . $b . "'");
    $nProduct = $products->num_rows;
    if ($nProduct > 0) {
        for ($x = 0; $x < $nProduct; $x++) {
            $cotagery = $products->fetch_assoc();
            $cat = $cotagery["id"];
            $states = "1";
            $cbm[$x] = $cotagery["id"];
        }
    } else {
        $cbm[0] = 0;
    }
} else if ($c != "0" && $b == "0") {

    $products = Database::search("SELECT * FROM `category_has_type` WHERE `category_id`='" . $c . "'");
    $nProduct = $products->num_rows;
    if ($nProduct > 0) {
        for ($x = 0; $x < $nProduct; $x++) {
            $cotagery = $products->fetch_assoc();
            $cat = $cotagery["id"];
            $states = "1";
            $cbm[$x] = $cotagery["id"];
        }
    } else {
        $cbm[0] = 0;
    }
} else if ($b != "0" && $c == "0") {
    $products = Database::search("SELECT * FROM category_has_type WHERE category_has_type.type_id='" . $b . "'");
    $nProduct = $products->num_rows;
    if ($nProduct > 0) {
        for ($x = 0; $x < $nProduct; $x++) {
            $cotagery = $products->fetch_assoc();
            $cat = $cotagery["id"];
            $states = "1";
            $cbm[$x] = $cotagery["id"];
        }
    } else {
        $cbm[0] = 0;
    }
}
// else if ($m != "0" && $b == "0" && $c == "0") {
//     $products = Database::search("SELECT * FROM category_has_type WHERE category_has_type.model_id='" . $m . "'");
//     $nProduct = $products->num_rows;
//     if ($nProduct > 0) {
//         for ($x = 0; $x < $nProduct; $x++) {
//             $cotagery = $products->fetch_assoc();
//             $cat = $cotagery["id"];
//             $states = "1";
//             $cbm[$x] = $cotagery["id"];
//         }
//     } else {
//         $cbm[0] = 0;
//     }
// }




if (isset($cbm) && $cbm != 0) {
    $cunt = count($cbm);

    $quvry .= " AND (product.category_has_type_id = '" . $cbm[0] . "'";

    for ($x = 1; $x < $cunt; $x++) {
        $quvry .= " OR product.category_has_type_id  = '" . $cbm[$x] . "'";
    }

    $quvry .= ")";
}

if ($clr != 0) {
    $quvry .= " AND `id` IN (SELECT product_id FROM stock WHERE color_id='" . $clr . "')";
}

if ($siz != 0) {
    $quvry .= " AND `id` IN (SELECT product_id FROM stock WHERE $siz!=0)";
}

if (!empty($pf) && !empty($pt)) {


    $quvry .= " AND (product.newPrice>='" . $pf . "' AND product.newPrice<='" . $pt . "')";
}




if (isset($sort)) {
    if ($sort == "1") {

        $quvry .= " ORDER BY `price` ASC";
    } else if ($sort == "2") {

        $quvry .= " ORDER BY `price` DESC";
    } else if ($sort == "3") {

        $quvry .= " ORDER BY `total_qty` ASC";
    } else if ($sort == "4") {

        $quvry .= " ORDER BY `total_qty` DESC";
    }
}

$quvry1 = $quvry;

// echo $quvry1;
?>
<div class="row g-2">

    <?php
    if ("0" !== ($_POST["page"])) {
        $pageno = $_POST["page"];
    } else {
        $pageno = 1;
    }
    //  echo $quvry;
    $products = Database::search($quvry);
    $nProduct = $products->num_rows;
    $userProduct = $products->fetch_assoc();

    $results_per_page = 3;
    $number_of_pages = ceil($nProduct / $results_per_page);

    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $quvry1 .= " LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "";
    //echo $quvry1;
    $selectedrs = Database::search($quvry1);

    $srn = $selectedrs->num_rows;

    while ($productImage = $selectedrs->fetch_assoc()) {

        // for ($x = 0; $x < $srn; $x++) {
        // $productImage = $selectedrs->fetch_assoc();
    ?>

        <div class="col-xl-4 col-sm-6 col-12">
            <!-- Start Product Default Single Item -->
            <div class="product-default-single-item product-color--golden" data-aos="fade-up" data-aos-delay="0">
                <div class="image-box">
                    <a href="<?php echo "product_details.php?id=" . ($productImage["id"]); ?>" class="image-link">

                        <?php

                        $pimg = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $productImage["id"] . "' LIMIT 1");
                        $img = $pimg->fetch_assoc();

                        ?>
                        <img style="object-fit: cover; height: 200px;" src="<?php echo $img["code"]; ?>" alt="">
                        <?php
                        $img2 = Database::search("SELECT `product_img1` FROM stock WHERE product_id='" . $productImage["id"] . "'");
                        if ($img2->num_rows > 0) {
                            $img2Data = $img2->fetch_assoc();
                        ?>
                            <img style="object-fit: cover; height: 200px;" src="<?php echo  $img2Data['product_img1'] ?>" alt="">
                            <!-- <img src="assets/images/product/default/home-1/default-10.jpg" alt=""> -->
                        <?php
                        }
                        ?>
                    </a>

                    <?php
                    if ($productImage["total_qty"] == 0) {
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
                            <input class="d-none" type="number" value="1" id="qtyinput<?php echo $productImage["id"] ?>">
                            <a onclick="addToWishList(<?php echo $productImage['id'] ?>);" href="#" data-bs-toggle="modal" data-bs-target="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i style="font-weight: bolder; font-size: 0.9em;" class="icon-heart"></i>&nbsp; Add To Wishlist</a>
                        </div>
                        <div class="action-link-right">
                            <a href="<?php echo "product_details.php?id=" . ($productImage['id']); ?>"><i style="font-weight: bolder; font-size: 1em;" class="icon-magnifier" data-toggle="tooltip" data-placement="top" title="View Product"></i></a>
                            <a href="shop-grid-sidebar-left.php"><i style="font-weight: bolder; font-size: 1em;" class="icon-shuffle" data-toggle="tooltip" data-placement="top" title="All Products"></i></a>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="content">
                        <div class="content-left">
                            <h6 style="text-transform: none; font-size: 1.1em; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 270px;" class="title"><a href="product-details-default.html"><?php echo $productImage["title"] ?></a></h6>
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
                            <h3>LKR <?php echo $productImage["newPrice"]; ?> /= </h3>&nbsp;

                            <?php
                            if ($productImage["discount"] != 0) {
                            ?>
                                <del class="text-danger">LKR <?php echo $productImage["price"]; ?> /=</del>
                        </span>
                    <?php
                            }
                    ?>

                    <?php
                    if ($productImage["discount"] != 0) {
                    ?>
                        <span style="font-weight: bolder; font-size: 1.3em; color: black;"><?php echo $productImage["discount"]; ?> % OFF</span>
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

</div>

<!-- Start Pagination -->
<div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
    <ul>
        <li><a <?php

                if ($pageno <= 1) {
                    echo "javascript:void(0)";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageno - 1) ?>');" <?php
                                                                        }

                                                                            ?>><i class="ion-ios-skipbackward"></i></a></li>
        <?php

        for ($page = 1; $page <= $number_of_pages; $page++) {
            if ($page == $pageno) {
        ?>
                <li><a class="active" onclick="advancedSearch('<?php echo $page ?>');"><?php echo $page; ?></a></li>
            <?php
            } else {
            ?>
                <li><a onclick="advancedSearch('<?php echo $page ?>');"><?php echo $page; ?></a></li>
        <?php
            }
        }
        ?>

        <li><a <?php

                if ($pageno >= $number_of_pages) {
                    echo "javascript:void(0)";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageno + 1) ?>');" <?php
                                                                        }

                                                                            ?>><i class="ion-ios-skipforward"></i></a></li>
    </ul>
</div>
<!-- End Pagination -->