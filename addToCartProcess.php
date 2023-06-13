<?php session_start(); require "connection.php" ?>

<?php
if (isset($_SESSION["u"])) {


    $umail = $_SESSION["u"];
    $cart_rs11 = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $umail["id"] . "'  ");
    $cn11 = $cart_rs11->num_rows;

    if($cn11 >= 10){
        echo "Your Cart is Full";
    }else{

            $id = $_GET["pid"];
            $qtyTxt = $_GET["txt"];
            $color = $_GET["color"];
            $size = $_GET["size"];
            $price = $_GET["price"];

            if ($qtyTxt == 0 || $qtyTxt < 0 || empty($qtyTxt)) {
                echo "0";
            } else {
                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $umail["id"] . "' AND `product_id` = '" . $id . "' ");
                $cn = $cart_rs->num_rows;

                Database::iud("INSERT INTO  `cart` (`product_id`,`user_id`,`color`,`size`,`qty`,`unit_price`) VALUES ( '" . $id . "','" . $umail["id"] . "','" . $color. "','" . $size . "','" . $qtyTxt . "','" . $price . "') ");
                echo "1";
                    
            }


    }
}else{
    echo "2";
}



?>