<?php

require "connection.php";

$e = $_POST["e"];
$np = $_POST["np"];
$rnp = $_POST["rnp"];
$vc = $_POST["vc"];



if (empty($e)) {
    echo "Missing email address";
} else if (empty($np)) {
    echo "Plese enter your new password";
} else if (strlen($np) < 5 || strlen($np) >= 20) {
    echo "Password length must between 5 to 20";
} else if (empty($rnp)) {
    echo "Plese Re-type your password";
} else if ($np != $rnp) {
    echo "Password and Re-type password does not match";
} else if (!preg_match('@[0-9]@', $rnp) || !preg_match('@[A-Z]@', $rnp) || !preg_match('@[a-z]@', $rnp) || !preg_match('@[^\w]@', $rnp)) {
    echo "Password should include at least one upper case letter, one number, and one special character";
} else if (empty($vc)) {
    echo "Plese enter your verification code";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "' AND `verification_code`='" . $vc . "'");
    if ($rs->num_rows == 1) {
        Database::iud("UPDATE `user` SET `password`='" . $np . "' WHERE `email`='" . $e . "'");
        echo "1";
    } else {
        echo "Password reset fail";
    }
}
