<?php
session_start();
require "connection.php";


if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];
    $uid = $_SESSION["u"]["id"];


    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];

    if (empty($fname)) {
        echo "Enter your first name";
    } else if (empty($lname)) {
        echo "Enter your last name";
    } else if (empty($mobile)) {
        echo "Enter your mobile number";
    } else if (empty($line1)) {
        echo "Enter your Address line 1";
    } else if (empty($line2)) {
        echo "Enter your Address line 2";
    }else {

    
        // Update User fname , lname , mobile
        Database::iud("UPDATE `user` SET `fname`='" . $fname . "' , `lname`='" . $lname . "' , `mobile`='" . $mobile . "'
        WHERE `id`='" . $_SESSION["u"]["id"] . "';");

          //user session list update

          $_SESSION["u"]["fname"] = $fname;
          $_SESSION["u"]["lname"] = $lname;
          $_SESSION["u"]["mobile"] = $mobile;


        


        // Update address
        $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_id`='" . $uid . "'");
        $nr = $address->num_rows;

        if ($nr == 1) {

            $update_address = Database::iud("UPDATE `user_has_address` SET `user_id` = '".$uid."', `line1` = '".$line1."', `line2` = '".$line2."', `location_id` = '1' 
            WHERE `user_id` = '".$uid."'  ");
            $added = 2;
            echo $added;

           
        } else {

          // insert address
            $location_I = Database::iud("INSERT INTO `user_has_address` 
                                        (`user_id`,`line1`,`line2`,`location_id`) 
                                        VALUES 
                                        ('" . $uid . "', '" . $line1 . "', '" . $line2 . "', '1')");

            $added = 1;
            echo $added;

           
        }
    }
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php

}
