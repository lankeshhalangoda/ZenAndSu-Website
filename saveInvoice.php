<?php
 session_start();
require "connection.php"; 
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;


if(isset($_SESSION["u"])){

    $ses_mail = $_SESSION["u"]["email"];
    $user = Database::search("SELECT * FROM `user` WHERE `email` = '".$ses_mail."' ");
    $userd = $user->fetch_assoc();
    $user_id = $userd["id"];

    $order_id = $_POST["order_id"];
    $stock_id = $_POST["stock_id"];
    $color = $_POST["color"];
    $size = $_POST["size"];
    $pqty = $_POST["qty"];
    $unit_price = $_POST["unit_price"];
    $total = $_POST["total"];
    $price_with_qty = $_POST["price_with_qty"];


    // $subtotal_price = ($unit_price * $pqty);

    $product_rs0 = Database::search("SELECT * FROM `stock` WHERE `id` = '".$stock_id."' ");
    $stock_data = $product_rs0->fetch_assoc();
    $product_id = $stock_data["product_id"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "' ");
    $pn = $product_rs->fetch_assoc();

    $qty = $pn["total_qty"];
    $newQty = $qty - $pqty;

    Database::iud("UPDATE `product` SET `total_qty` = '".$newQty."' WHERE `id` = '".$product_id."' ");


    $set_size;


    $XS = "";
    $S = "";
    $M = "";
    $L = "";
    $XL = "";
    $XXL = "";
    $XXXL = "";
    $fourXL = "";

    if($size == "XS"){

        $qty1 = $stock_data["XS"];
        $newQty1 = $qty1 - $pqty;
        Database::iud("UPDATE `stock` SET `XS` = '".$newQty1."' WHERE `id` = '".$stock_id."' ");

    }else{
        $XS = "0";
    }
    if($size == "S"){

        $qty2 = $stock_data["S"];
        $newQty2 = $qty2 - $pqty;
        Database::iud("UPDATE `stock` SET `S` = '".$newQty2."' WHERE `id` = '".$stock_id."' ");

    }else{
        $S = "0";
    }
    if($size == "M"){

        $qty3 = $stock_data["M"];
        $newQty3 = $qty3 - $pqty;
        Database::iud("UPDATE `stock` SET `M` = '".$newQty3."' WHERE `id` = '".$stock_id."' ");

    }else{
        $M = "0";
    }
    if($size == "L"){

        $qty4 = $stock_data["L"];
        $newQty4 = $qty4 - $pqty;
        Database::iud("UPDATE `stock` SET `L` = '".$newQty4."' WHERE `id` = '".$stock_id."' ");

    }else{
        $L = "0";
    }
    if($size == "XL"){

        $qty5 = $stock_data["XL"];
        $newQty5 = $qty5 - $pqty;
        Database::iud("UPDATE `stock` SET `XL` = '".$newQty5."' WHERE `id` = '".$stock_id."' ");

    }else{
        $XL = "0";
    }
    if($size == "XXL"){

        $qty6 = $stock_data["XXL"];
        $newQty6 = $qty6 - $pqty;
        Database::iud("UPDATE `stock` SET `XXL` = '".$newQty6."' WHERE `id` = '".$stock_id."' ");

    }else{
        $XXL = "0";
    }
    if($size == "XXXL"){

        $qty7 = $stock_data["XXXL"];
        $newQty7 = $qty7 - $pqty;
        Database::iud("UPDATE `stock` SET `XXXL` = '".$newQty7."' WHERE `id` = '".$stock_id."' ");

    }else{
        $XXXL = "0";
    }
    if($size == "4XL"){

        $qty8 = $stock_data["4XL"];
        $newQty8 = $qty8 - $pqty;
        Database::iud("UPDATE `stock` SET `4XL` = '".$newQty8."' WHERE `id` = '".$stock_id."' ");

    }else{
        $fourXL = "0";
    }



    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    Database::iud("INSERT INTO `invoice` (`order_id`,`product_id`,`user_id`,`date`,`color`,`size`,`qty`,`total`,`status_id`,`delivery_method_id`) 
    VALUES 
    ('".$order_id."','".$product_id."','".$user_id."','".$date."','".$color."', '".$size."', '".$pqty."','".$price_with_qty."', '1', '1') ");

    //Email Code
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sendmyemailstoyou@gmail.com';
    $mail->Password = 'giwshpwyglebsag';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('sendmyemailstoyou@gmail.com', 'Zen & Su');
    $mail->addReplyTo('sendmyemailstoyou@gmail.com', 'Zen & Su');
    $mail->addAddress($ses_mail);
    $mail->isHTML(true);
    $mail->Subject = 'Zen & Su Delivery Order Confirmation';
    $bodyContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=320, initial-scale=1" />
      <title>Airmail Invoice</title>
      <style type="text/css">
    
        /* ----- Client Fixes ----- */
    
        /* Force Outlook to provide a "view in browser" message */
        #outlook a {
          padding: 0;
        }
    
        /* Force Hotmail to display emails at full width */
        .ReadMsgBody {
          width: 100%;
        }
    
        .ExternalClass {
          width: 100%;
        }
    
        /* Force Hotmail to display normal line spacing */
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%;
        }
    
    
         /* Prevent WebKit and Windows mobile changing default text sizes */
        body, table, td, p, a, li, blockquote {
          -webkit-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
        }
    
        /* Remove spacing between tables in Outlook 2007 and up */
        table, td {
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
        }
    
        /* Allow smoother rendering of resized image in Internet Explorer */
        img {
          -ms-interpolation-mode: bicubic;
        }
    
         /* ----- Reset ----- */
    
        html,
        body,
        .body-wrap,
        .body-wrap-cell {
          margin: 0;
          padding: 0;
          background: #ffffff;
          font-family: Arial, Helvetica, sans-serif;
          font-size: 14px;
          color: #464646;
          text-align: left;
        }
    
        img {
          border: 0;
          line-height: 100%;
          outline: none;
          text-decoration: none;
        }
    
        table {
          border-collapse: collapse !important;
        }
    
        td, th {
          text-align: left;
          font-family: Arial, Helvetica, sans-serif;
          font-size: 14px;
          color: #464646;
          line-height:1.5em;
        }
    
        b a,
        .footer a {
          text-decoration: none;
          color: #464646;
        }
    
        a.blue-link {
          color: blue;
          text-decoration: underline;
        }
    
        /* ----- General ----- */
    
        td.center {
          text-align: center;
        }
    
        .left {
          text-align: left;
        }
    
        .body-padding {
          padding: 24px 40px 40px;
        }
    
        .border-bottom {
          border-bottom: 1px solid #D8D8D8;
        }
    
        table.full-width-gmail-android {
          width: 100% !important;
        }
    
    
        /* ----- Header ----- */
        .header {
          font-weight: bold;
          font-size: 16px;
          line-height: 16px;
          height: 16px;
          padding-top: 19px;
          padding-bottom: 7px;
        }
    
        .header a {
          color: #464646;
          text-decoration: none;
        }
    
        /* ----- Footer ----- */
    
        .footer a {
          font-size: 12px;
        }
      </style>
    
      <style type="text/css" media="only screen and (max-width: 650px)">
        @media only screen and (max-width: 650px) {
          * {
            font-size: 16px !important;
          }
    
          table[class*="w320"] {
            width: 320px !important;
          }
    
          td[class="mobile-center"],
          div[class="mobile-center"] {
            text-align: center !important;
          }
    
          td[class*="body-padding"] {
            padding: 20px !important;
          }
    
          td[class="mobile"] {
            text-align: right;
            vertical-align: top;
          }
        }
      </style>
    
    </head>
    <body style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
     <td valign="top" align="left" width="100%" style="background-color: black;">
     <center>
    
       <table class="w320 full-width-gmail-android" bgcolor="#f9f8f8" background="" style="background-color:transparent" cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>
            <td width="100%" height="48" valign="top">
                <!--[if gte mso 9]>
                <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:49px;">
                  <v:fill type="tile" src="https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2" color="#ffffff" />
                  <v:textbox inset="0,0,0,0">
                <![endif]-->
                  <table class="full-width-gmail-android" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td class="header center" width="100%">
                        <a href="#" style="color: white;">
                          Zen & Su
                        </a>
                      </td>
                    </tr>
                  </table>
                <!--[if gte mso 9]>
                  </v:textbox>
                </v:rect>
                <![endif]-->
            </td>
          </tr>
        </table>
    
        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
          <tr>
            <td align="center">
              <center>
                <table class="w320" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                    <td class="body-padding mobile-padding">
    
                    <table cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td class="left" style="padding-bottom:20px; text-align:left;">
                          <b>Order ID:</b> '.$order_id.'
                        </td>
                      </tr>
                      <tr>
                        <td class="left" style="padding-bottom:40px; text-align:left;">
                        Hi '.$_SESSION["u"]["fname"].''.$_SESSION["u"]["lname"].',<br>
                        Your Order Will be arrive within 3-5 Working days.:
                        </td>
                      </tr>
                    </table>
    
                    <table cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td>
                          <b>Item Name</b>
                        </td>
                        <td>
                          <b>Size</b>
                        </td>
                        <td>
                          <b>Colour</b>
                        </td>
                        <td>
                          <b>Amount</b>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom" height="5"></td>
                        <td class="border-bottom" height="5"></td>
                        <td class="border-bottom" height="5"></td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;">
                          '.$pn["title"].'
                        </td>
                        <td style="padding-top:5px;">
                        '.$size.'
                        </td>
                        <td style="padding-top:5px;">
                          '.$color.'
                        </td>
                        <td style="padding-top:5px;" class="mobile">
                          '.$total.'
                        </td>
                      </tr>
                    </table>
    
                    <table cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td class="mobile-center" align="left" style="padding:40px 0;">
                          <div class="mobile-center" align="left"><!--[if mso]>
                              <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:190px;" arcsize="11%" strokecolor="#407429" fill="t">
                                <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                                <w:anchorlock/>
                                <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">View Account</center>
                              </v:roundrect>
                            <![endif]--><a href="https://zenandsu.com"
                            style="background-color:black;background-image:url(https://icons8.com/icon/vn4JOzPBucqU/url);border:1px solid #407429;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;text-shadow: -1px -1px #47A54B;line-height:38px;text-align:center;text-decoration:none;width:190px;-webkit-text-size-adjust:none;mso-hide:all;">Visit to Zen & Su</a></div>
                        </td>
                      </tr>
                    </table>
    
                    <table cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td class="left" style="text-align:left;">
                          Thanks so much,
                        </td>
                      </tr>
                      <tr>
                        <td class="left" width="129" height="20" style="padding-top:10px; text-align:left;">
                          <img class="left" width="60" height="60" src="assets/images/logo/logo.jpg" alt="Company Name">
                        </td>
                      </tr>
                    </table>
    
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
        </table>
    
        <table class="w320" bgcolor="#E5E5E5" cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>
            <td style="border-top:1px solid #B3B3B3;" align="center">
              <center>
                <table class="w320" cellspacing="0" cellpadding="0" width="500" bgcolor="#E5E5E5">
                  <tr>
                    <td>
                      <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#E5E5E5">
                        <tr>
                          <td class="center" style="padding:25px; text-align:center;">
                            <b><a href="#">Get in touch</a></b> if you have any questions or feedback
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
          <tr>
            <td style="border-top:1px solid #B3B3B3; border-bottom:1px solid #B3B3B3;" align="center">
              <center>
                <table class="w320" cellspacing="0" cellpadding="0" width="500" bgcolor="#E5E5E5">
                  <tr>
                    <td align="center" style="padding:25px; text-align:center">
                      <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#E5E5E5">
                        <tr>
                          <td class="center footer" style="font-size:12px;">
                            <a href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <span class="footer-group">
                              <a href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="#">Support</a>
                            </span>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
        </table>
    
      </center>
      </td>
    </tr>
    </table>
    </body>
    </html>';

    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Verfication code sending fail' . $mail->ErrorInfo;
    } else {
        echo '1';
    }

}
