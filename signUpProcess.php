<?php

require "connection.php";
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;

$code = random_int(100000, 999999);
if (!isset($_POST["fname"]) || !isset($_POST["lname"]) || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["mobile"]) || !isset($_POST["gender"])) {
    echo "<h1 style='color:red';>Invalid Request</h1>";
} else {



    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];
    $RePassword = $_POST["RePassword"];
    $gender = $_POST["gender"];
    $genderOk=0;

    $genderValidate = Database::search("SELECT * FROM `gender` WHERE `id`='" . $gender . "'");


    if ($genderValidate->num_rows == 1) {
        $genderOk = 1;
    }



    if (empty($fname)) {
        echo "01";
    } else if (!preg_match("/^[a-zA-z]*$/", $fname)) {
        echo "02";
    } else if (strlen($fname) >= 50) {
        echo "03";
    } else if (empty($lname)) {
        echo "04";
    } else if (!preg_match("/^[a-zA-z]*$/", $lname)) {
        echo "05";
    } else if (strlen($lname) >= 50) {
        echo "06";
    } else if (empty($email)) {
        echo "07";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "08";
    } else if (strlen($email) > 100) {
        echo "09";
    } else if (empty($mobile)) {
        echo "10";
    } else if ($genderOk != 1) {
        echo "11";
    } else if (empty($password)) {
        echo "12";
    } else if (strlen($password) < 8 || strlen($password) >= 20) {
        echo "13";
    } else if ($RePassword != $password) {
        echo "14";
    } else {

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sendmyemailstoyou@gmail.com';
        $mail->Password = 'kixhwrgelwwrhmwl';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sendmyemailstoyou@gmail.com', 'Zen & Su By Lankesh');
        $mail->addReplyTo('sendmyemailstoyou@gmail.com', 'Zen & Su By Lankesh');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Verification Code';
        $bodyContent = '<h1 style="color:black;">Your Verfication Code : ' . $code . '</h1>';

        
        //  $bodyContent .= '<p>Lankesh Halangoda</p>';
        $mail->Body    = $bodyContent;

        $r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'");
        if ($r->num_rows > 0) {
            echo "16";
        } else {
            if (!$mail->send()) {
                echo '15';
                //. $mail->ErrorInfo
            } else {

                echo "17";
                $_SESSION["code"] = $code;
                $_SESSION["fname"] = $fname;
                $_SESSION["lname"] = $lname;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION["mobile"] = $mobile;
                $_SESSION["gender"] = $gender;
            }
        }
    }
}
