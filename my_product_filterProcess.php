<?php
session_start();
if (isset($_SESSION["admin"])) {
    require "connection.php";

$search = $_POST["search"];
$select = $_POST["select"];

$price;
$qty;
$activetime;

if ($select == 1) {
    $price = "ASC";
} else if ($select == 2) {
    $price = "DESC";
} else {
    $price = "null";
}

if ($select == 3) {
    $qty = "ASC";
} else if ($select == 4) {
    $qty = "DESC";
} else {
    $qty = "null";
}

if ($select == 5) {
    $activetime = "DESC";
} else if ($select == 6) {
    $activetime = "ASC";
} else {
    $activetime = "null";
}

if (empty($search) && $select == "10") {
// echo "1";
} else {

$results_per_page = 6;
$pageno = $_POST["page"];


if (empty($search) && $select == "0") {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product` INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' ORDER BY `datetime_added` DESC ;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product` INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' ORDER BY `datetime_added` DESC LIMIT $results_per_page OFFSET $page_first_result;");

} else if(!empty($search) && $select == "0") {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product` INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' ;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product` INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' LIMIT $results_per_page OFFSET $page_first_result;");

} else if (!empty($search) && ($select == "1" || $select == "2")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `price` $price;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `price` $price LIMIT $results_per_page OFFSET $page_first_result;");

} else if (!empty($search) && ($select == "3" || $select == "4")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `total_qty` $qty;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `total_qty` $qty LIMIT $results_per_page OFFSET $page_first_result;");

} else if (!empty($search) && ($select == "5" || $select == "6")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `datetime_added` $activetime;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `datetime_added` $activetime LIMIT $results_per_page OFFSET $page_first_result;");

} else if (empty($search) && ($select == "0")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%';");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' LIMIT $results_per_page OFFSET $page_first_result;");

} else if (empty($search) && ($select == "1" || $select == "2")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' ORDER BY `price` $price;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' ORDER BY `price` $price LIMIT $results_per_page OFFSET $page_first_result;");

} else if (empty($search) && ($select == "3" || $select == "4")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id  WHERE product_img.code LIKE '%thumbnail%' ORDER BY `total_qty` $qty;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id  WHERE product_img.code LIKE '%thumbnail%' ORDER BY `total_qty` $qty;");
} else if (empty($search) && ($select == "5" || $select == "6")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' ORDER BY `datetime_added` $activetime;");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' ORDER BY `datetime_added` $activetime LIMIT $results_per_page OFFSET $page_first_result;");
} else if (!empty($search) && ($select !== "0")) {

    $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%';");
    $allproductresultnumber = $allproductresult->num_rows;
    $number_of_pages = ceil($allproductresultnumber / $results_per_page);
    $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
    $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `product_img` ON product.id = product_img.product_id WHERE product_img.code LIKE '%thumbnail%' LIMIT $results_per_page OFFSET $page_first_result;");

} else{

}


$productnum = $productresult->num_rows;




?>
        <?php
        for ($x = 0; $x < $productnum; $x++) {
            $product = $productresult->fetch_assoc();
        
        ?>
        <div class="col-12 col-md-4 card-body">
            <div class="row">
                <div class="main-card mb-3 card">
                    <img style="width: auto; height: 245px; object-fit: cover;" src="<?php echo $product["code"]; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product["title"]; ?></h5>
                        <h6 style="color: black;" class="card-subtitle"><b>LKR <?php echo $product["newPrice"]; ?> /= &nbsp; <small><del>LKR <?php echo $product["price"]; ?> /=</del></small></b> &nbsp;&nbsp;<b><span style="font-size: larger;"><?php echo $product["discount"]; ?>% OFF</span></b> </h6>

                        <textarea style="width: 100%; height: 100px; border: none; overflow-y: hidden; outline: none; background-color: transparent; resize: none;" name="" id=""><?php echo $product["description"]; ?></textarea>

                        <br /> <br />
                        <button onclick="update_product(<?php echo $product['id'] ?>);" class="btn btn-dark col-12">Update Product</button>
                        <button onclick="product_deactive(<?php echo $product['id'] ?>);" id="deactive_product<?php echo $product['id'] ?>" class="btn btn-danger col-12 mt-2"><?php if($product["status_id"] == 1){echo "Deactivate Your Product";} else { echo "Activate Your Product"; } ?></button>
                    </div>
                </div>
            </div>
        </div>


        <?php

}



        ?>
        <!--pagination-->
        <div class="col-12 col-lg-4 mb-4 offset-lg-4 d-flex justify-content-center">
            <div class="text-dark" style="font-size: 2em;">
                <?php

                if ($pageno != 1) {

                ?>
                    <button class="ms-1 btn btn-dark" style="width: 35px;" onclick="addfilters(<?php echo $pageno - 1; ?>);">&laquo;</button>
                <?php
                }
                ?>

                <?php

                for ($i = 1; $i <= $number_of_pages; $i++) {

                    if ($i == $pageno) {

                ?>
                        <button class="ms-1 btn btn-dark" style="width: 35px;" onclick="addfilters(<?php echo $i; ?>);"><?php echo $i; ?></button>
                    <?php

                    } else {

                    ?>
                        <button class="ms-1 btn btn-dark" style="width: 35px;" onclick="addfilters(<?php echo $i; ?>);"><?php echo $i; ?></button>
                <?php
                    }
                }
                ?>

                <?php
                if ($pageno != $number_of_pages) {
                ?>
                    <button class="ms-1 btn btn-dark" style="width: 35px;" onclick="addfilters(<?php echo $pageno + 1; ?>);">&raquo;</button>
                <?php
                }
                ?>
            </div>
        </div>
        <!--pagination-->
    <?php




    }
} else {
    ?>
    <script>
        window.location = "adminSignin.php";
    </script>
<?php
}
?>