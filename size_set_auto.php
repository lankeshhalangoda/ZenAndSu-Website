<?php
require "connection.php";
$stock_id = $_GET["id"];

if ($stock_id != 0) {


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
    <select class="form-control product-variable-size border-dark" id="size_id" onchange="auto_qty(<?php echo $stock_data['id'] ?>);">
        <option value="0">Select size</option>
        <?php

        if ($XS != 0 && $XS > 1) {
        ?>
            <option value="XS">XS</option>
        <?php
        }
        if ($S != 0 && $S > 1) {
        ?>
            <option value="S">S</option>
        <?php
        }
        if ($M != 0 && $M > 1) {
        ?>
            <option value="M">M</option>
        <?php
        }
        if ($L != 0 && $L > 1) {
        ?>
            <option value="L">L</option>
        <?php
        }
        if ($XL != 0 && $XL > 1) {
        ?>
            <option value="XL">XL</option>
        <?php
        }
        if ($XXL != 0 && $XXL > 1) {
        ?>
            <option value="XXL">XXL</option>
        <?php
        }
        if ($XXXL != 0 && $XXXL > 1) {
        ?>
            <option value="XXXL">XXXL</option>
        <?php
        }
        if ($fourXL != 0 && $fourXL > 1) {
        ?>
            <option value="4XL">4XL</option>
        <?php
        }


        ?>

    </select>


<?php




} else {

?>
    <select class="form-control product-variable-size border-dark" id="size_id" onchange="auto_qty(<?php echo $stock_data['id'] ?>);">
        <option value="0">Select size</option>
    </select>
<?php

}
?>