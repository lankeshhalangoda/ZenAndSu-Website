<?php

session_start();

require "connection.php";

if (!isset($_SESSION["code"]) || !isset($_SESSION["fname"]) || !isset($_SESSION["lname"]) || !isset($_SESSION["email"]) || !isset($_SESSION["password"]) || !isset($_SESSION["mobile"])) {
    echo "<h1 style='color:red';>Invalid Request</h1>";
} else {

    $code = $_SESSION["code"];
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];
    $mobile = $_SESSION["mobile"];
    $gender=$_SESSION["gender"];



    if (isset($_POST["code"])) {
        $code = $_POST["code"];

        if ($code == $_SESSION["code"]) {

                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");

                Database::iud("INSERT INTO `user`(`email`,`fname`,`lname`,`password`,`mobile`,`register_date`,`verification_code`,`status_id`,`gender_id`) VALUES('" . $email . "','" . $fname . "','" . $lname . "','" . $password . "','" . $mobile . "','" . $date . "','" . $code . "','1','".$gender."')");
                echo 1;
            
        } else {
            echo "2";
        }
    } else {
        echo "<h1 style='color:red';>Invalid Request</h1>";
    }
}
