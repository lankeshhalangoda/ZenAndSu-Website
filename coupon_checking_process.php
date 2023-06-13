<?php
require "connection.php";

$coupon = $_GET["c_input"];
$pid = $_GET["pid"];

if(empty($coupon)){
    echo "Empty Coupon";
}else{

    $coupon_rs = Database::search("SELECT * FROM `product` WHERE `coupon` = '".$coupon."' AND `id` = '".$pid."' ");
    $cr = $coupon_rs->num_rows;

    if($cr == 1){
        echo "1";
    }else{
        echo "2";
    }


}




?>