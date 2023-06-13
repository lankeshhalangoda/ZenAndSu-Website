<?php
require "connection.php";


session_start();

if (isset($_SESSION["u"])) {

    $oid = $_POST["oid"];

    $trackid = uniqid();

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $_SESSION["u"]["id"] . "';");
    $cnum = $cartrs->num_rows;

    for ($c = 0; $c < $cnum; $c++) {
        $cfetch = $cartrs->fetch_assoc();

        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cfetch["product_id"] . "'");
        $pn = $productrs->fetch_assoc();

        $qty = $pn["total_qty"];
        $price = $pn["price"];
        $newqty = $qty - $cfetch["qty"];

        $svalue = $cfetch["size"];

        $stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $cfetch["product_id"] . "' AND `color_variation` = '" . $cfetch["color"] . "'");
        $srs = $stock->fetch_assoc();

        $stockrs = Database::search("SELECT " . $svalue . " FROM `stock` WHERE `id` = '" . $srs["id"] . "'");
        $ssrs = $stockrs->fetch_assoc();


        $sqty = $ssrs[$svalue];

        if ($sqty <= 0) {
            echo "2";
        } else {
            $newsqty = $sqty - $cfetch["qty"];


            Database::iud("UPDATE `stock` SET " . $svalue . " = '" . $newsqty . "' WHERE `id` = '" . $srs["id"] . "'");

            Database::iud("UPDATE `product` SET `total_qty`='" . $newqty . "' WHERE `id` = '" . $cfetch["product_id"] . "'");

            $total = $price * $cfetch["qty"];

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `invoice`(`order_id`,`product_id`,`user_id`,`date`,`color`,`size`,`qty`,`total`,`status_id`,`delivery_method_id`) VALUES
                ('" . $oid . "','" . $cfetch["product_id"] . "','" .  $_SESSION["u"]["id"] . "','" . $date . "','" . $cfetch["color"] . "','" . $cfetch["size"] . "','" . $cfetch["qty"] . "','" . $total . "','1','2')");

            Database::iud("DELETE FROM `cart` WHERE `user_id` = '" . $_SESSION["u"]["id"] . "'");



            echo '1';
        }
    }
} else {
    echo "Error";
}
