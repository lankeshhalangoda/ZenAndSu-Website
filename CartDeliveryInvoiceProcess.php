<?php
require "connection.php";
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

session_start();

if (isset($_SESSION["u"])) {

    $oid = $_POST["oid"];

    $trackid = uniqid();

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $_SESSION["u"]["id"] . "';");
    $cnum = $cartrs->num_rows;

    for ($c = 0; $c < $cnum; $c++) {
        $cfetch = $cartrs->fetch_assoc();

        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cfetch["product_id"] . "'");
        $pn = $productrs->fetch_assoc();

        $qty = $pn["total_qty"];
        $price = $pn["newPrice"];
        $newqty = $qty - $cfetch["qty"];

        $svalue = $cfetch["size"];

        $stock = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $cfetch["product_id"] . "' AND `color_variation` = '" . $cfetch["color"] . "'");
        $srs = $stock->fetch_assoc();

        $stockrs = Database::search("SELECT " . $svalue . " FROM `stock` WHERE `id` = '" . $srs["id"] . "'");
        $ssrs = $stockrs->fetch_assoc();


        $sqty = $ssrs[$svalue];

        if ($sqty <= 0) {
            echo "2";
        } else {
            $newsqty = $sqty - $cfetch["qty"];


            Database::iud("UPDATE `stock` SET " . $svalue . " = '" . $newsqty . "' WHERE `id` = '" . $srs["id"] . "'");

            Database::iud("UPDATE `product` SET `total_qty`='" . $newqty . "' WHERE `id` = '" . $cfetch["product_id"] . "'");

            $total = $price * $cfetch["qty"];

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `invoice`(`order_id`,`product_id`,`user_id`,`date`,`color`,`size`,`qty`,`total`,`status_id`,`delivery_method_id`) VALUES
                ('" . $oid . "','" . $cfetch["product_id"] . "','" .  $_SESSION["u"]["id"] . "','" . $date . "','" . $cfetch["color"] . "','" . $cfetch["size"] . "','" . $cfetch["qty"] . "','" . $total . "','1','1')");

            Database::iud("DELETE FROM `cart` WHERE `user_id` = '" . $_SESSION["u"]["id"] . "'");

            //Email Code
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sendmyemailstoyou@gmail.com';
            $mail->Password = 'giwtshpwyglebsag';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sendmyemailstoyou@gmail.com', 'Zen & Su');
            $mail->addReplyTo('sendmyemailstoyoup@gmail.com', 'Zen & Su');
            $mail->addAddress($_SESSION["u"]["email"]);
            $mail->isHTML(true);
            $mail->Subject = 'Order Placed Successfully';
            $bodyContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <meta name="viewport" content="width=device-width" />
              <title>Airmail Upsell</title>
                <style type="text/css">
              /* -------------------------------------
                GLOBAL
              ------------------------------------- */
              * {
                margin:0;
                padding:0;
                font-family: Helvetica, Arial, sans-serif;
              }
            
              img {
                max-width: 100%;
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
              }
              .image-fix {
                display:block;
              }
              .collapse {
                margin:0;
                padding:0;
              }
              body {
                -webkit-font-smoothing:antialiased;
                -webkit-text-size-adjust:none;
                width: 100%!important;
                height: 100%;
                text-align: center;
                color: #747474;
                background-color: #ffffff;
              }
              h1,h2,h3,h4,h5,h6 {
                font-family: Helvetica, Arial, sans-serif;
                line-height: 1.1;
              }
              h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
                font-size: 60%;
                line-height: 0;
                text-transform: none;
              }
            
              h1 {
                font-weight:200;
                font-size: 44px;
              }
              h2 {
                font-weight:200;
                font-size: 32px;
                margin-bottom: 14px;
              }
              h3 {
                font-weight:500;
                font-size: 27px;
              }
              h4 {
                font-weight:500;
                font-size: 23px;
              }
              h5 {
                font-weight:900;
                font-size: 17px;
              }
              h6 {
                font-weight:900;
                font-size: 14px;
                text-transform: uppercase;
              }
            
              .collapse {
                margin: 0 !important;
              }
            
              td, div {
                font-family: Helvetica, Arial, sans-serif;
                text-align: center;
              }
            
              p, ul {
                margin-bottom: 10px;
                font-weight: normal;
                font-size:14px;
                line-height:1.6;
              }
              p.lead {
                font-size:17px;
              }
              p.last {
                margin-bottom:0px;
              }
            
              ul li {
                margin-left:5px;
                list-style-position: inside;
              }
            
              a {
                color: #747474;
                text-decoration: none;
              }
            
              a img {
                border: none;
              }
            
              /* -------------------------------------
                  ELEMENTS
              ------------------------------------- */
            
            
              table.head-wrap {
                width: 100%;
                margin: 0 auto;
                background-color: #f9f8f8;
                border-bottom: 1px solid #d8d8d8;
              }
            
              .head-wrap * {
                margin: 0;
                padding: 0;
              }
            
              .header-background {
                background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
              }
            
            
              .header {
                height: 42px;
              }
              .header .content {
                padding: 0;
              }
              .header .brand {
                font-size: 16px;
                line-height: 42px;
                font-weight: bold;
              }
              .header .brand a {
                color: #464646;
              }
            
            
            
            
            
              table.body-wrap {
                width: 505px;
                margin: 0 auto;
                background-color: #ffffff;
              }
            
            
              .soapbox .soapbox-title {
                font-size: 30px;
                color: #464646;
                padding-top: 25px;
                padding-bottom: 28px;
              }
            
            
            
              .content .status-container.single .status-padding {
                width: 80px;
              }
            
              .content .status {
                width: 90%;
              }
            
              .content .status-container.single .status {
                  width: 300px;
              }
            
              .status {
                border-collapse: collapse;
                margin-left: 15px;
                color: #656565;
              }
              .status .status-cell {
                border: 1px solid #b3b3b3;
                height: 50px;
                font-size: 16px;
                line-height: 23px;
              }
              .status .status-cell.success,
              .status .status-cell.active {
                height: 65px;
              }
              .status .status-cell.success {
                background: #f2ffeb;
                color: #51da42;
                font-size: 15px;
              }
              .status .status-cell.active {
                background: #fffde0;
                width: 135px;
              }
              .status .status-image {
                vertical-align: text-bottom;
              }
            
            
              .body .body-padded,
              .body .body-padding {
                padding-top: 34px;
              }
              .body .body-padding {
                width: 41px;
              }
              .body-padded,
              .body-title {
                text-align: left;
              }
              .body .body-title {
                font-weight: bold;
                font-size: 17px;
                color: #464646;
              }
              .body .body-text .body-text-cell {
                text-align: left;
                font-size: 14px;
                line-height: 1.6;
                padding: 9px 0 17px;
              }
              .body .body-signature-block .body-signature-cell {
                padding: 25px 0 30px;
                text-align: left;
              }
              .body .body-signature {
                font-family: "Comic Sans MS", Textile, cursive;
                font-weight: bold;
              }
            
            
            
              .footer-wrap {
                width: 100%;
                margin: 0 auto;
                clear: both !important;
                background-color: #e5e5e5;
                border-top: 1px solid #b3b3b3;
                font-size: 12px;
                color: #656565;
                line-height: 30px;
              }
              .footer-wrap td {
                padding: 14px 0;
              }
              .footer-wrap td .content {
                padding: 0;
              }
              .footer-wrap td .footer-lead {
                font-size: 14px;
              }
              .footer-wrap td .footer-lead a {
                font-size: 14px;
                font-weight: bold;
                color: #535353;
              }
              .footer-wrap td a {
                font-size: 12px;
                color: #656565;
              }
              .footer-wrap td a.last {
                margin-right: 0;
              }
              .footer-wrap .footer-group {
                display: inline-block;
              }
            
            
            
              /* ---------------------------------------------------
                  RESPONSIVENESS
              ------------------------------------------------------ */
            
              /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
              .container {
                display: block !important;
                max-width: 505px !important;
                clear: both !important;
              }
            
              /* This should also be a block element, so that it will fill 100% of the .container */
              .content {
                padding: 0;
                max-width: 505px;
                margin: 0 auto;
                display: block;
              }
        
              .content table {
                width: 100%;
              }
            
            
              /* Be sure to place a .clear element after each set of columns, just to be safe */
              .clear {
                display: block;
                clear: both;
              }
            
              table.full-width-gmail-android {
                width: 100% !important;
              }
            
            </style>
            <style type="text/css" media="only screen">
            
            
              /* -------------------------------------------
                  PHONE
                  For clients that support media queries.
                  Nothing fancy.
              -------------------------------------------- */
              @media only screen {
            
                table[class="head-wrap"],
                table[class="body-wrap"],
                table[class*="footer-wrap"] {
                  width: 100% !important;
                }
            
                td[class*="container"] {
                  margin: 0 auto !important;
                }
              }
            
              @media only screen and (max-width: 505px) {
            
                *[class*="w320"] {
                  width: 320px !important;
                }
            
                table[class="status"] td[class*="status-cell"],
                table[class="status"] td[class*="status-cell"].active {
                  display: block !important;
                  width: auto !important;
                  height: auto !important;
                  padding: 15px !important;
                  font-size: 18px !important;
                }
            
              }
              </style>
            </head>
            
            <body bgcolor="#ffffff">
            
              <div align="center">
                <table class="head-wrap w320 full-width-gmail-android" style="background-color: black;" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td style="background-color: black;" width="100%" height="8" valign="top">
                      <!--[if gte mso 9]>
                      <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
                        <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
                        <v:textbox inset="0,0,0,0">
                      <![endif]-->
                      <div height="8">
                      </div>
                      <!--[if gte mso 9]>
                        </v:textbox>
                      </v:rect>
                      <![endif]-->
                    </td>
                  </tr>
                  <tr class="" style="background-color: black;">
                    <td class="header container" align="center">
                      <div class="content">
                        <span class="brand">
                          <a href="#" style="color: wheat;">
                          Zen & Su
                          </a>
                        </span>
                      </div>
                    </td>
                  </tr>
                </table>
            
                <table class="body-wrap w320">
                  <tr>
                    <td></td>
                    <td class="container">
                      <div class="content">
                        <table cellspacing="0">
                          <tr>
                            <td>
                              <table class="soapbox">
                                <tr>
                                  <td class="soapbox-title">Order Placed Successfully</td>
                                </tr>
                              </table>
                              <table class="status-container single">
                                <tr>
                                  <td class="status-padding"></td>
                                  <td>
                                    <table class="status" bgcolor="#fffeea" cellspacing="0">
                                      <tr>
                                        <td class="status-cell">
                                          Order ID: <b>'.$oid.'</b>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                  <td class="status-padding"></td>
                                </tr>
                              </table>
                              <table class="body">
                                <tr>
                                  <td class="body-padding"></td>
                                  <td class="body-padded">
                                    <div class="body-title">Delivery Details</div>
                                    <table class="body-text">
                                      <tr>
                                        <td class="body-text-cell">
                                          Receiver &#8216;s Name: '.$_SESSION["u"]["fname"].' ' .$_SESSION["u"]["lname"].'
                                          <br>
                                          Receiver&#8216;s Mobile: '.$_SESSION["u"]["email"].' 
                                          <br>
                                          Latest fashion at an affordable price! Join us today! 15x7 customer support!
                                        </td>
                                      </tr>
                                    </table>
            
                                    <div><!--[if mso]>
                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:210px;" arcsize="10%" strokecolor="#407429" fill="t">
                                        <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                                        <w:anchorlock/>
                                        <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Add more info here</center>
                                      </v:roundrect>
                                    <![endif]--><a href="zen&supagebylankesh.lk"
                                    style="background-color:#41CC00;background-image:url(https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7);border:1px solid #407429;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:210px;-webkit-text-size-adjust:none;mso-hide:all;">Shop More!</a></div>
            
                                    <table class="body-signature-block">
                                      <tr>
                                        <td class="body-signature-cell">
                                          <p>Thanks so much,</p>
                                          <p class="body-signature"><img src="https://www.filepicker.io/api/file/2R9HpqboTPaB4NyF35xt" alt="Company Name"></p>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                  <td class="body-padding"></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </td>
                    <td></td>
                  </tr>
                </table>
            
                <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
                  <tr>
                    <td>
                      <div class="content footer-lead">
                        <a href="#"><b>Get in touch</b></a> if you have any questions or feedback
                      </div>
                    </td>
                  </tr>
                </table>
                <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
                  <tr>
                    <td>
                      <div class="content">
                        <a href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <span class="footer-group">
                          <a href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="#">Support</a>
                        </span>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            
            </body>
            </html>';

            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verfication code sending fail' . $mail->ErrorInfo;
            } else {
                echo '1';
            }


        }
    }
} else {
    echo "0";
}
