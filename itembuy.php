<?php session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $uid = $_SESSION["u"]["id"];
    $size_id = $_GET["size"];
    $color = $_GET["color"];
    $price = $_GET["price"];

    $array;

    $orderID = uniqid();




    $stock_rs = Database::search("SELECT * FROM `stock` WHERE `id` = '" . $id . "' ");
    $st = $stock_rs->fetch_assoc();

    $stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $st["product_id"] . "' AND `color_variation` = '" . $color . "'");
    $srs = $stock->fetch_assoc();

    $stockrs = Database::search("SELECT " . $size_id . " FROM `stock` WHERE `id` = '" . $srs["id"] . "'");
    $ssrs = $stockrs->fetch_assoc();

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_id` = '" . $uid . "' ");
    $cn = $address_rs->num_rows;

    $product = Database::search("SELECT * FROM `product` WHERE `id` = '" . $st["product_id"] . "'");
    $pr = $product->fetch_assoc();

    if ($cn == 1) {

        if ($ssrs[$size_id] >= $qty) {

            if ($qty != 0) {

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

                $amount;

                $amount = $price * $qty + (int)$delivery;

                // fname , lname , mobile , address
                $fname = $_SESSION["u"]["fname"];
                $lname = $_SESSION["u"]["lname"];
                $mobile = $_SESSION["u"]["mobile"];
                $umail = $_SESSION["u"]["email"];
                $address = $ar["line1"] . " , " . $ar["line2"];

                // city
                $cityID = $locr["city_id"];
                $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityID . "' ");
                $cityd = $city_rs->fetch_assoc();
                $city = $cityd["name"];

                //provice
                $provinceID = $locr["province_id"];
                $province_rs = Database::search("SELECT * FROM `province` WHERE `id` = '" . $provinceID . "'");
                $provinced = $province_rs->fetch_assoc();
                $province = $provinced["name"];

                //country
                $countryID = $locr["country_id"];
                $country_rs = Database::search("SELECT * FROM `country` WHERE `id` = '" . $countryID . "'");
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
                $array["provice"] = $country;
                $array["district"] = $country;
                $array["country"] = $country;
                $array["delivery"] = $delivery;

                $array["size"] = $size_id;
                $array["color"] = $color;
                $array["stock_id"] = $id;



                echo json_encode($array);
            } else {
                echo "4";
            }
        } else {
            echo "3";
        }
    } else {
        echo "2";
    }
} else {

    echo "1";
}
