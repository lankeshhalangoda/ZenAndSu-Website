<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $uid = $_SESSION["u"]["id"];

    $id = $_POST["id"];
    $qty = $_POST["qty"];
    $color = $_POST["color"];
    $size = $_POST["size"];

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $uid . "'");
    $cn = $cartrs->num_rows;

    if ($qty < 0) {
        echo "n";
    } else {
        if ($cn == 0) {
            echo "Not Found";
        } else {
            $x = Database::search("SELECT * FROM `cart` WHERE `id` = '" . $id . "'");
            $xn = $x->num_rows;

            if ($xn == 0) {
                echo "Not Found";
            } else {
                Database::iud("UPDATE `cart` SET `color_id`='" . $color . "' WHERE `user_id` = '" . $uid . "' AND `id` = '" . $id . "'");

                Database::iud("UPDATE `cart` SET `qty`='" . $qty . "' WHERE `user_id` = '" . $uid . "' AND `id` = '" . $id . "'");
                
                Database::iud("UPDATE `cart` SET `size`='" . $size . "' WHERE `user_id` = '" . $uid . "' AND `id` = '" . $id . "'");

                echo "success";
            }
        }
    }
} else {
?>

<?php
}
?>