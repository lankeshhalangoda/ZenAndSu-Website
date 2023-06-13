<?php
require "connection.php";
$size_name = $_GET["size"];
$stock_id = $_GET["sid"];

$stock_rs = Database::search("SELECT * FROM `stock` WHERE `id` = '" . $stock_id . "' ");
$stock_data = $stock_rs->fetch_assoc();

$XS = $stock_data["XS"];
$S = $stock_data["S"];
$M = $stock_data["M"];
$L = $stock_data["L"];
$XL = $stock_data["XL"];
$XXL = $stock_data["XXL"];
$XXXL = $stock_data["XXXL"];
$fourXL = $stock_data["4XL"];



?>
    <?php

    if ($size_name == "XS") {
    ?>
        <span>Only <span id="items_left"><?php echo $XS; ?></span> items left</span>
    <?php
    }else if($size_name == "S"){
        ?>
        <span>Only <span id="items_left"><?php echo $S; ?></span> items left</span>
    <?php
    }else if($size_name == "M"){
        ?>
        <span>Only <span id="items_left"><?php echo $M; ?></span> items left</span>
    <?php
    }else if($size_name == "L"){
        ?>
        <span>Only <span id="items_left"><?php echo $L; ?></span> items left</span>
    <?php
    }else if($size_name == "XL"){
        ?>
        <span>Only <span id="items_left"><?php echo $XL; ?></span> items left</span>
    <?php
    }else if($size_name == "XXL"){
        ?>
        <span>Only <span id="items_left"><?php echo $XXL; ?></span> items left</span>
    <?php
    }else if($size_name == "XXXL"){
        ?>
        <span>Only <span id="items_left"><?php echo $XXXL; ?></span> items left</span>
    <?php
    }else if($size_name == "4XL"){
        ?>
        <span>Only <span id="items_left"><?php echo $fourXL; ?></span> items left</span>
    <?php
    }else{
        ?>
        <span>Please select both to continue.</span>
    <?php
    }
    
    ?>



<?php


?>