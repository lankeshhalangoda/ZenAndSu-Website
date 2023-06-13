<?php

session_start();

require "connection.php";


if (isset($_SESSION["u"])) {

    $total = 0;

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $_SESSION["u"]["id"] . "';");
    $cnum = $cartrs->num_rows;

    $totalqty = 0;

    $orderID = uniqid();

    for ($x = 0; $x < $cnum; $x++) {

        $totalpr = $cartrs->fetch_assoc();

        $catqty[$x] = (int)$totalpr["qty"];

        // echo $catqty[$x]."///////////";

        $product = Database::search("SELECT * FROM `product` WHERE `id` = '" . $totalpr["product_id"] . "' ");
        $pr = $product->fetch_assoc();

        $price = $pr["price"];

        $arr[$x] = $catqty[$x] * $price;
    }

    $getqty = array_sum($catqty);

    $totalqty = $totalqty + $getqty;

    $total =  array_sum($arr);

    $uid = $_SESSION["u"]["id"];

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_id` = '" . $uid . "' ");
    $cn = $address_rs->num_rows;

    if ($cn == 1) {

        $ar = $address_rs->fetch_assoc();

        // location , district , province
        $rs1 = Database::search("SELECT `location`.`id`, `province_id` , `district_id`, `city_id`, `country_id`,
        city.id AS `cid`, city.name AS `c_name`, 
        city.postal_code, 
        district.id AS `did`, district.name AS `d_name`, 
        province.id AS `pid`, province.name AS `p_name`,
        country.id AS `cuid`,country.name AS `cu_name`
        FROM `location` JOIN `city` ON city.id=location.city_id
        JOIN `district` ON district.id=location.district_id
        JOIN `province` ON province.id=location.province_id 
        JOIN `country` ON country.id=location.country_id
        WHERE `location`.id='" . $ar["location_id"] . "';");

        $locr = $rs1->fetch_assoc();

        $delivery = "0";

        if ($totalqty > 7) {
            $delivery = "400";
        } else {
            $delivery = "350";
        }

        $item = "Checkout Payment";
        $amount = $total + (int)$delivery;

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

        //provice
        $provinceID = $locr["province_id"];
        $province_rs = Database::search("SELECT * FROM `province` WHERE `id` = '".$provinceID."'");
        $provinced = $province_rs->fetch_assoc();
        $province = $provinced["name"];

        //country
        $countryID = $locr["country_id"];
        $country_rs = Database::search("SELECT * FROM `country` WHERE `id` = '".$countryID."'");
        $countryd = $country_rs->fetch_assoc();
        $country = $countryd["name"];

        $array;

        $umail = $_SESSION["u"]["email"];

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
        $array["province"] = $province;
        $array["country"] = $country;
        $array["delivery"] = $delivery;
        

        echo json_encode($array);
    } else {
        echo "2";
    }



    // echo $total;
} else {
    echo "1";
}
