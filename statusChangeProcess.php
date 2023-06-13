<?php
require "connection.php";

$id = $_GET["p"];

$status_result = Database::search("SELECT * FROM `invoice` WHERE `id`='".$id."'"); 
$sn = $status_result->num_rows;

if($sn == 1){
    $sd = $status_result->fetch_assoc();
    $oid = $sd["order_id"];

    $statusid = $sd["status_id"];

    if($statusid == 1){
        Database::iud("UPDATE `invoice` SET `status_id`='4' WHERE `order_id`='".$oid."'");
        echo "2";

    }else if($statusid == 4){

        Database::iud("UPDATE `invoice` SET `status_id`='1' WHERE `order_id`='".$oid."'");
        echo "1";
    }

}else{
    echo "Product does not exist";
}



?>