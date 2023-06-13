<?php
session_start();
require "connection.php";


if(isset($_SESSION["u"])){

    $u_email = $_SESSION["u"]["email"];
    $id = $_GET["id"];

    $user = Database::search("SELECT * FROM `user` WHERE `email` = '".$u_email."' ");
    $user_r = $user->num_rows;

    if($user_r == 0){
        echo "0";
    }else{

        $user_data = $user->fetch_assoc();
        $user_id = $user_data["id"];

    $watchlist_rs1 = Database::search("SELECT * FROM `wishlist` WHERE `user_id`='".$u_email."'");
    $n1 = $watchlist_rs1->num_rows;

    if($n1 >= 10){
        echo "Your Wishlist is Full";
    }else{

        $watchlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='".$id."' AND `user_id`='".$user_id."'");
        $n = $watchlist_rs->num_rows;
    
        if($n >= 1){
            echo "Already Added to Watchlist";
        }else{
            Database::iud("INSERT INTO `wishlist` (`product_id`,`user_id`) VALUES ('".$id."', '".$user_id."') ");
            echo "1";
        }


    }

    }

    




}else{
    echo "5";
}
?>