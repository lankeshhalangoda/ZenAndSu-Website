<?php
session_start();
require "connection.php";

$e = $_POST["e"];
$p = $_POST["p"];

if(empty($e)){
    echo "Enter your email";
}else if(empty($p)){
    echo "Enter your password";
}else{

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$e."' AND `password` = '".$p."'");
    $admin_rows = $admin_rs->num_rows;
    $admin_data = $admin_rs->fetch_assoc();

    if($admin_rows == 1){
        $_SESSION["admin"] = $admin_data;
        setcookie("e",$e, time()+(60*60*24*365));
        setcookie("p",$p, time()+(60*60*24*364));
        echo "1";
    }else{
        echo "Invalid Sign In";
    }

}

?>
