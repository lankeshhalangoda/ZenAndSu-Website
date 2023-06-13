<?php

session_start();

require "connection.php";

$e = $_POST["email"];
$p = $_POST["password"];

if (!empty($e) || !empty($p)) {


    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "' AND `password`='" . $p . "' AND `status_id`='1'");
    $n = $rs->num_rows;

    if ($n == 1) {

        echo "1";
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;
    } else {
        echo "You are not a valid user";
    }
} else {
    echo "Email or password is missing";
}
