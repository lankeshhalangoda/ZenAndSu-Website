<?php session_start();
require "connection.php"; ?>

<?php
if (isset($_SESSION["u"])) {

    $id = $_GET["pid"];
    $qty = $_GET["qty"];
    $coupon = $_GET["coupon"];

    $size_id = $_GET["size_id"];
    $stock_id = $_GET["color_set"];

    $umail = $_SESSION["u"]["email"];

    if ($size_id == "0") {
        echo "0";
    } else {
        

        $color;

        // if ($stock_id != 0 && $size_id != 0) {

            $stock_rs = Database::search("SELECT * FROM `stock` WHERE `id` = '" . $stock_id . "' ");
            $stock_data = $stock_rs->fetch_assoc();
            $color = $stock_data["color_variation"];

        // }



        $array;

        $orderID = uniqid();

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "' ");
        $pr = $product_rs->fetch_assoc();

        $u_id = Database::search("SELECT * FROM `user` WHERE `email` = '" . $umail . "' ");
        $u_email = $u_id->fetch_assoc();
        $user_id = $u_email["id"];

        $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_id` = '" . $user_id . "' ");
        $cn = $address_rs->num_rows;



        if ($cn == 1) {

            $ar = $address_rs->fetch_assoc();

            // location , district , province
            $rs1 = Database::search("SELECT `location`.`id`, `province_id` , `district_id`, `city_id`, `country_id`,
        city.id AS `cid`, city.name AS `c_name`, 
        city.postal_code AS `p_code`, 
        district.id AS `did`, district.name AS `d_name`, 
        province.id AS `pid`, province.name AS `p_name`, 
        country.id AS `con_id`, country.name AS `con_name`
        FROM `location` JOIN `city` ON city.id=location.city_id
        JOIN `district` ON district.id=location.district_id
        JOIN `province` ON province.id=location.province_id
        JOIN `country` ON country.id=location.country_id
        WHERE `location`.id='" . $ar["location_id"] . "';");

            $locr = $rs1->fetch_assoc();

            $delivery = "350";

            if ($qty > "7") {
                $delivery = $delivery + 50;
            } else {
                $delivery = $delivery;
            }

            $item = $pr["title"];

            $coupon_rs = Database::search("SELECT * FROM `product` WHERE `coupon` = '" . $coupon . "' AND `id` = '" . $id . "' ");
            $coupon_rows = $coupon_rs->num_rows;

            $amount;
            $price;

            if ($coupon_rows == 1) {
                $price = $pr["newPrice"];
            } else {
                $price = $pr["price"];
            }

            
           
            $amount = $price * $qty + (int)$delivery;
           
           



            // fname , lname , mobile , address
            $fname = $_SESSION["u"]["fname"];
            $lname = $_SESSION["u"]["lname"];
            $mobile = $_SESSION["u"]["mobile"];
            $address = $ar["line1"] . " , " . $ar["line2"];

            // city
            $cityID = $locr["city_id"];
            $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityID . "' ");
            $cityd = $city_rs->fetch_assoc();
            $city = $cityd["name"];

            // country
            $country_ID = $locr["country_id"];
            $country_rs = Database::search("SELECT * FROM `country` WHERE `id` = '" . $country_ID . "' ");
            $countryd = $country_rs->fetch_assoc();
            $country = $countryd["name"];

            // array
            $array["id"] = $orderID;
            $array["item"] = $item;
            $array["amount"] = $amount;
            $array["fname"] = $fname;
            $array["lname"] = $lname;
            $array["email"] = $umail;
            $array["mobile"] = $mobile;
            $array["address"] = $address;
            $array["city"] = $city;
            $array["country"] = $country;
            $array["delivery"] = $delivery;

            $array["size"] = $size_id;
            $array["color"] = $color;
            $array["price"] = $price;
            $array["stock_id"] = $stock_id;

            echo json_encode($array);
        } else {
            echo "2";
        }
    }
} else {

    echo "1";
}
?>