<?php

require "connection.php";

$s = $_POST["t"];
$pageno = $_POST["p"];



$result_per_page = 9;

// echo $searchSelect;
// echo $searchText;
if (!empty($s)) {
    $textSearch = Database::search("SELECT * FROM product WHERE product.user_id AND `status_id` = '1' AND (`title` LIKE '%" . $s . "%' OR `description` LIKE '%" . $s . "%' OR `material` LIKE '" . $s . "' OR `brand`='" . $s . "' OR `id` IN (SELECT product_id FROM stock WHERE color_variation LIKE '%" . $s . "%'))");
    $ans = $textSearch->num_rows;
    $number_of_pages = ceil($ans / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $selectedrs = Database::search("SELECT * FROM product WHERE product.user_id AND `status_id` = '1' AND (`title` LIKE '%" . $s . "%' OR `description` LIKE '%" . $s . "%' OR `material` LIKE '" . $s . "' OR `brand`='" . $s . "' OR `id` IN (SELECT product_id FROM stock WHERE color_variation LIKE '%" . $s . "%'))  LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n =  $selectedrs->num_rows;
} else if (empty($s)) {
    $textSearch = Database::search("SELECT * FROM `product` WHERE product.user_id AND `status_id` = '1'");
    $ans = $textSearch->num_rows;
    $number_of_pages = ceil($ans / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $selectedrs = Database::search("SELECT * FROM `product` WHERE product.user_id AND `status_id` = '1' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n =  $selectedrs->num_rows;
} else {
    $n = 0;
}
if ($n >= 1) {

    while ($productImage = $selectedrs->fetch_assoc()) {

        # code...
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
    <!-- Start Pagination -->
    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
        <ul>
            <li> <a class="ion-ios-skipbackward" <?php

                                                    if ($pageno <= 1) {
                                                        echo "#";
                                                    } else {
                                                    ?> onclick="basicsearch('<?php echo ($pageno - 1) ?>');" <?php
                                                                                                            }

                                                                                                                ?>></a></li>

            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageno) {
            ?>
                    <li> <a onclick="basicsearch('<?php echo $page ?>');" class="active"><?php echo $page; ?></a></li>
                <?php
                } else {
                ?>

                    <li><a onclick="basicsearch('<?php echo $page ?>');"><?php echo $page; ?></a></li>

            <?php
                }
            }

            ?>
            <li><a <?php

                    if ($pageno >= $number_of_pages) {
                        echo "#"; ?> class="ion-ios-skipforward" <?php
                                                                } else {
                                                                    ?> onclick="basicsearch('<?php echo ($pageno + 1) ?>');" class="ion-ios-skipforward" <?php
                                                                                                                                                        }

                                                                                                                                                            ?>></a></li>
            <ul>
    </div>










<?php
} else {
?>
    <div class="col-12 bg-light ms-2 mt-5 mb-5" style="margin-left: auto; margin-right: auto;">
        <h3 class="text-center">No Results in your Searching...</h3>
    </div>
<?php

}
?>