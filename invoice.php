<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];

    if (isset($_GET["id"])) {

        $oid = $_GET["id"];
        $unit_price = $_GET["unit_price"];
        $delivery = $_GET["delivery"];


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>


        
            <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="assets/css/invoice.css" />
            <link rel="stylesheet" href="assets/css/invoice.css" />
            <title>Zen & Su | Invoice</title>

        </head>

        <body style="background-color: white;">

            <script>
                function createPDF() {
                    var element = document.getElementById('element-to-print');
                    html2pdf(element, {
                        margin: 1,
                        padding: 0,
                        filename: 'Zen & Su invoice.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 1
                        },
                        html2canvas: {
                            scale: 2,
                            logging: true
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'A2',
                            orientation: 'P'
                        },
                        class: createPDF
                    });
                };
            </script>



            <div id="invoiceholder">
                <div id="" class="">


                    <div id="element-to-print">
                        <div id="GFG">

                            <?php

                            $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $umail . "' ");
                            $userd = $user->fetch_assoc();
                            $user_id = $userd["id"];

                            $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_id` = '" . $user_id . "'");
                            $ar = $addressrs->fetch_assoc();

                            $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");
                            $in = $invoicers->num_rows;
                            $ir = $invoicers->fetch_assoc();

                            ?>

                            <div id="invoice-top">
                                <div class="logo"><img style="height: 75px; width: auto; " src="assets/images/logo/logo_black_png.png" alt="Logo" /></div>
                                <div class="title">
                                    <h1>Invoice #<span class="invoiceVal invoice_num"><?php echo $ir["id"]; ?></span></h1>
                                    <p>Invoice Date: <span id="invoice_date"><?php echo $ir["date"] ?></span><br>

                                    </p>
                                </div>
                                <!--End Title-->
                            </div>
                            <!--End InvoiceTop-->



                            <div id="invoice-mid">
                                <div id="message">
                                    <h2>Hello <?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?>,</h2>
                                    <p>We at <span style="font-weight: bold;">Zen & Su</span> truly appreciate your purchase, and we’re so grateful for the trust you’ve placed in us. We sincerely hope you are satisfied with your purchase. <br /> If you need any help please contact us 0767740385 (Lankesh)</p>
                                </div>

                                <div class="clearfix">
                                    <div class="col-left">
                                        <div class="clientlogo"><img src="https://cdn3.iconfinder.com/data/icons/daily-sales/512/Sale-card-address-512.png" alt="Sup" /></div>
                                        <div class="clientinfo">
                                            <h2 id="supplier"><?php echo $_SESSION["u"]["fname"]; ?></h2>
                                            <p><span id="address"><?php echo $ar["line1"] . ",<br/>" . $ar["line2"]; ?></span><br><span id="city"><?php echo $umail; ?></span><br><span id="country"></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--End Invoice Mid-->

                            <div id="invoice-bot">

                                <div id="table">
                                    <table class="table-main">
                                        <thead>
                                            <tr class="tabletitle">
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Product</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>


                                        <?php
                                        $invoices = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");
                                        $ind = $invoices->num_rows;

                                        $grand_total = "0";
                                        $subtotal = "0";

                                        $old_delivery = 350;
                                        $new_delivery = 400;
                                        $new_grand_total;
                                        $New_delivery_eka = 350;


                                        for ($i = 0; $i < $ind; $i++) {
                                            $irs = $invoices->fetch_assoc();
                                            $pid = $irs["product_id"];
                                            $qty_eka = $irs["qty"];
                                            $new_total = $irs["total"];

                                            if($qty_eka > 7){
                                                $New_delivery_eka =  $New_delivery_eka + 50;
                                            }else{
                                                $new_grand_total =  $New_delivery_eka;
                                            }

                                            $grand_total = $grand_total + $irs["total"];
                                            $subtotal = ($unit_price * $qty_eka);
                                            $new_grand_total = ($subtotal + $New_delivery_eka);

                                            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
                                            $pr = $productrs->fetch_assoc();
                                        ?>

                                            <tr class="list-item">
                                                <td data-label="#" class="tableitem"><?php echo $irs["id"]; ?></td>
                                                <td data-label="Order ID" class="tableitem"><?php echo $irs["order_id"]; ?></td>
                                                <td data-label="Product" class="tableitem"><?php echo $pr["title"]; ?></td>
                                                <td data-label="Unit Price" class="tableitem">LKR <?php echo $unit_price ?> .00</td>
                                                <td data-label="Quantity" class="tableitem"><?php echo $irs["qty"]; ?></td>
                                                <td data-label="subtotal" class="tableitem"><?php echo $subtotal ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>






                                        <?php
                                        }
                                        ?>
                                        <tr style="font-size: 1.3em;" class="list-item total-row">
                                            <th colspan="9" class="tableitem">+ Delivery Cost</th>
                                            <td data-label="Grand Total" class="tableitem">LKR <?php echo $delivery; ?> .00</td>
                                        </tr>
                                        <tr style="color: red; font-size: 1.5em;" class="list-item total-row">
                                            <th colspan="9" class="tableitem">Grand Total</th>
                                            <td data-label="Grand Total" class="tableitem">LKR <?php echo $new_grand_total; ?> .00/=</td>
                                        </tr>

                                    </table>
                                </div>



                            </div>

                            <!--End Table-->
                            <div style="margin-left: 5px;" class="cta-group">
                                <!-- <a style="background-color: black;" onclick="printDiv();" href="#" class="btn-dark">Print Invoice</a> -->
                                <a style="background-color: black;" href="index.php" class="btn-primary">Back to Home</a>
                                <a style="background-color: black;" onclick="createPDF()" href="#" class="btn-default">Save as PDF</a>
                            </div>



                        </div>

                    </div>
                    <!--End InvoiceBot-->
                    <footer>
                        <div id="legalcopy" class="clearfix">
                            <p class="col-right">Direct contact for any help:
                                <span class="email"><a href="tel:+94767740385">Supplier : +94767740385</a></span>
                            </p>
                        </div>
                    </footer>
                </div>
                <!--End Invoice-->
            </div><!-- End Invoice Holder-->




            <script src="assets/js/script.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
        </body>

        </html>

    <?php
    } else {
    ?>
        <script>
            window.location = "index.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>