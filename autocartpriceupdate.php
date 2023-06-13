<?php
session_start();

require "connection.php";

$total = "0";
$subtotal = "0";
$shipping = "0";

if (isset($_SESSION["u"])) {

    $uid = $_SESSION["u"]["id"];

    $id = $_POST["id"];

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `id` = '" . $id . "'");
    $cn = $cartrs->num_rows;

    $cr = $cartrs->fetch_assoc();

    $productrs  = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
    $prx = $productrs->fetch_assoc();

    $total = $total + ($prx["price"] * $cr["qty"]);

    $delivery = "0";

    if ($cn >= 10) {
        $delivery = "400";
    } else {
        $delivery = "350";
    }

    $cartprice = ($prx["price"] * $cr["qty"]);

    $totalsb = 0;

    $cartrss = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $_SESSION["u"]["id"] . "';");
    $cnum = $cartrss->num_rows;

    $orderID = uniqid();

    for ($x = 0; $x < $cnum; $x++) {

        $totalpr = $cartrss->fetch_assoc();

        $catqty[$x] = (int)$totalpr["qty"];

        // echo $catqty[$x]."///////////";

        $product = Database::search("SELECT * FROM `product` WHERE `id` = '" . $totalpr["product_id"] . "' ");
        $pr = $product->fetch_assoc();

        $price = $pr["price"];

        $arr[$x] = $catqty[$x] * $price;
    }

    if ($cnum >= 10) {
        $delivery1 = "400";
    } else {
        $delivery1 = "350";
    }

    $totalsb =  array_sum($arr);

    $amount = $totalsb;
    $totupdate = $totalsb + $delivery1;

    // echo "Rs.";
    // echo $amount;
    // echo ".00";

    $array["total"] = $cartprice;
    $array["sub"] = $amount;
    $array["totupdate"] = $totupdate;

    echo json_encode($array);
}
