<?php
require "connection.php";

$product_id0 = $_POST["product_id0"];
$category = $_POST["category"];
$type = $_POST["type"];
$brand = $_POST["brand"];
$title = $_POST["title"];
$material = $_POST["material"];
$price = $_POST["price"];
$discount = $_POST["discount"];
$newPrice = $_POST["newPrice"];
$coupon = $_POST["coupon"];
$description = $_POST["description"];

//blue
$blue_clr_variation = $_POST["blue_clr_variation"];
$blue_xs_qty = $_POST["blue_xs_qty"];
$blue_s_qty = $_POST["blue_s_qty"];
$blue_m_qty = $_POST["blue_m_qty"];
$blue_l_qty = $_POST["blue_l_qty"];
$blue_xl_qty = $_POST["blue_xl_qty"];
$blue_xxl_qty = $_POST["blue_xxl_qty"];
$blue_xxxl_qty = $_POST["blue_xxxl_qty"];
$blue_4xl_qty = $_POST["blue_4xl_qty"];
//green
$green_clr_variation = $_POST["green_clr_variation"];
$green_xs_qty = $_POST["green_xs_qty"];
$green_s_qty = $_POST["green_s_qty"];
$green_m_qty = $_POST["green_m_qty"];
$green_l_qty = $_POST["green_l_qty"];
$green_xl_qty = $_POST["green_xl_qty"];
$green_xxl_qty = $_POST["green_xxl_qty"];
$green_xxxl_qty = $_POST["green_xxxl_qty"];
$green_4xl_qty = $_POST["green_4xl_qty"];
//gold
$gold_clr_variation = $_POST["gold_clr_variation"];
$gold_xs_qty = $_POST["gold_xs_qty"];
$gold_s_qty = $_POST["gold_s_qty"];
$gold_m_qty = $_POST["gold_m_qty"];
$gold_l_qty = $_POST["gold_l_qty"];
$gold_xl_qty = $_POST["gold_xl_qty"];
$gold_xxl_qty = $_POST["gold_xxl_qty"];
$gold_xxxl_qty = $_POST["gold_xxxl_qty"];
$gold_4xl_qty = $_POST["gold_4xl_qty"];
//silver
$silver_clr_variation = $_POST["silver_clr_variation"];
$silver_xs_qty = $_POST["silver_xs_qty"];
$silver_s_qty = $_POST["silver_s_qty"];
$silver_m_qty = $_POST["silver_m_qty"];
$silver_l_qty = $_POST["silver_l_qty"];
$silver_xl_qty = $_POST["silver_xl_qty"];
$silver_xxl_qty = $_POST["silver_xxl_qty"];
$silver_xxxl_qty = $_POST["silver_xxxl_qty"];
$silver_4xl_qty = $_POST["silver_4xl_qty"];
//brown
$brown_clr_variation = $_POST["brown_clr_variation"];
$brown_xs_qty = $_POST["brown_xs_qty"];
$brown_s_qty = $_POST["brown_s_qty"];
$brown_m_qty = $_POST["brown_m_qty"];
$brown_l_qty = $_POST["brown_l_qty"];
$brown_xl_qty = $_POST["brown_xl_qty"];
$brown_xxl_qty = $_POST["brown_xxl_qty"];
$brown_xxxl_qty = $_POST["brown_xxxl_qty"];
$brown_4xl_qty = $_POST["brown_4xl_qty"];
//black
$black_clr_variation = $_POST["black_clr_variation"];
$black_xs_qty = $_POST["black_xs_qty"];
$black_s_qty = $_POST["black_s_qty"];
$black_m_qty = $_POST["black_m_qty"];
$black_l_qty = $_POST["black_l_qty"];
$black_xl_qty = $_POST["black_xl_qty"];
$black_xxl_qty = $_POST["black_xxl_qty"];
$black_xxxl_qty = $_POST["black_xxxl_qty"];
$black_4xl_qty = $_POST["black_4xl_qty"];
//yellow
$yellow_clr_variation = $_POST["yellow_clr_variation"];
$yellow_xs_qty = $_POST["yellow_xs_qty"];
$yellow_s_qty = $_POST["yellow_s_qty"];
$yellow_m_qty = $_POST["yellow_m_qty"];
$yellow_l_qty = $_POST["yellow_l_qty"];
$yellow_xl_qty = $_POST["yellow_xl_qty"];
$yellow_xxl_qty = $_POST["yellow_xxl_qty"];
$yellow_xxxl_qty = $_POST["yellow_xxxl_qty"];
$yellow_4xl_qty = $_POST["yellow_4xl_qty"];
//red
$red_clr_variation = $_POST["red_clr_variation"];
$red_xs_qty = $_POST["red_xs_qty"];
$red_s_qty = $_POST["red_s_qty"];
$red_m_qty = $_POST["red_m_qty"];
$red_l_qty = $_POST["red_l_qty"];
$red_xl_qty = $_POST["red_xl_qty"];
$red_xxl_qty = $_POST["red_xxl_qty"];
$red_xxxl_qty = $_POST["red_xxxl_qty"];
$red_4xl_qty = $_POST["red_4xl_qty"];
//purple
$purple_clr_variation = $_POST["purple_clr_variation"];
$purple_xs_qty = $_POST["purple_xs_qty"];
$purple_s_qty = $_POST["purple_s_qty"];
$purple_m_qty = $_POST["purple_m_qty"];
$purple_l_qty = $_POST["purple_l_qty"];
$purple_xl_qty = $_POST["purple_xl_qty"];
$purple_xxl_qty = $_POST["purple_xxl_qty"];
$purple_xxxl_qty = $_POST["purple_xxxl_qty"];
$purple_4xl_qty = $_POST["purple_4xl_qty"];
//pink
$pink_clr_variation = $_POST["pink_clr_variation"];
$pink_xs_qty = $_POST["pink_xs_qty"];
$pink_s_qty = $_POST["pink_s_qty"];
$pink_m_qty = $_POST["pink_m_qty"];
$pink_l_qty = $_POST["pink_l_qty"];
$pink_xl_qty = $_POST["pink_xl_qty"];
$pink_xxl_qty = $_POST["pink_xxl_qty"];
$pink_xxxl_qty = $_POST["pink_xxxl_qty"];
$pink_4xl_qty = $_POST["pink_4xl_qty"];
//orange
$orange_clr_variation = $_POST["orange_clr_variation"];
$orange_xs_qty = $_POST["orange_xs_qty"];
$orange_s_qty = $_POST["orange_s_qty"];
$orange_m_qty = $_POST["orange_m_qty"];
$orange_l_qty = $_POST["orange_l_qty"];
$orange_xl_qty = $_POST["orange_xl_qty"];
$orange_xxl_qty = $_POST["orange_xxl_qty"];
$orange_xxxl_qty = $_POST["orange_xxxl_qty"];
$orange_4xl_qty = $_POST["orange_4xl_qty"];
//gray
$gray_clr_variation = $_POST["gray_clr_variation"];
$gray_xs_qty = $_POST["gray_xs_qty"];
$gray_s_qty = $_POST["gray_s_qty"];
$gray_m_qty = $_POST["gray_m_qty"];
$gray_l_qty = $_POST["gray_l_qty"];
$gray_xl_qty = $_POST["gray_xl_qty"];
$gray_xxl_qty = $_POST["gray_xxl_qty"];
$gray_xxxl_qty = $_POST["gray_xxxl_qty"];
$gray_4xl_qty = $_POST["gray_4xl_qty"];
//black n white
$BnW_clr_variation = $_POST["BnW_clr_variation"];
$BnW_xs_qty = $_POST["BnW_xs_qty"];
$BnW_s_qty = $_POST["BnW_s_qty"];
$BnW_m_qty = $_POST["BnW_m_qty"];
$BnW_l_qty = $_POST["BnW_l_qty"];
$BnW_xl_qty = $_POST["BnW_xl_qty"];
$BnW_xxl_qty = $_POST["BnW_xxl_qty"];
$BnW_xxxl_qty = $_POST["BnW_xxxl_qty"];
$BnW_4xl_qty = $_POST["BnW_4xl_qty"];
//white
$white_clr_variation = $_POST["white_clr_variation"];
$white_xs_qty = $_POST["white_xs_qty"];
$white_s_qty = $_POST["white_s_qty"];
$white_m_qty = $_POST["white_m_qty"];
$white_l_qty = $_POST["white_l_qty"];
$white_xl_qty = $_POST["white_xl_qty"];
$white_xxl_qty = $_POST["white_xxl_qty"];
$white_xxxl_qty = $_POST["white_xxxl_qty"];
$white_4xl_qty = $_POST["white_4xl_qty"];

// echo $category;
// echo "<br/>";
// echo $type;
// echo "<br/>";
// echo $brand;
// echo "<br/>";
// echo $title;
// echo "<br/>";
// echo $color;
// echo "<br/>";
// echo $size;
// echo "<br/>";
// echo $material;
// echo "<br/>";
// echo $qty;
// echo "<br/>";
// echo $price;
// echo "<br/>";
// echo $description;
// echo "<br/>";
// echo $discount;
// echo "<br/>";
// echo $newPrice;
// echo "<br/>";

if ($category == "0" || $category == "Select product category") {
    echo "Select a category";
} else if ($type == "0" || $type == "Select product type") {
    echo "Select a type";
} else if (empty($brand)) {
    echo "Enter the brand";
} else if (empty($title)) {
    echo "Enter the title";
} else if (empty($material)) {
    echo "Enter the material";
} else if (empty($price) || $price == "0") {
    echo "Enter the price";
} else if (empty($description)) {
    echo "Enter the description";
} else {

    if(empty($discount)){
        $discount = "0";
    }

    $selling_price = $price - ($price * ($discount/100));

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $category_has_type = Database::search("SELECT `category_has_type`.id FROM category_has_type WHERE `type_id`='" . $type . "' AND `category_id`='" . $category . "'");
    $type_id = $category_has_type->fetch_assoc();

    // Database::iud("INSERT INTO `product` (`category_has_type_id`,`brand`,`title`,`material`,`price`,`discount`,`newPrice`,`coupon`,`description`,`status_id`,`user_id`,`datetime_added`) 
    //                             VALUES ('" . $type_id["id"] . "','" . $brand . "','" . $title . "','" . $material . "','" . $price . "','".$discount."','".$selling_price."','".$coupon."','" . $description . "','1','1','" . $date . "')");

    Database::iud("UPDATE `product` SET `brand` = '".$brand."', 
    `title` = '".$title."', 
    `material` = '".$material."', 
    `price` = '".$price."', 
    `discount` = '".$discount."', 
    `newPrice` = '".$selling_price."', 
    `coupon` = '".$coupon."', 
    `description` = '".$description."', 
    `status_id` = '1', `user_id` = '1', 
    `datetime_added` = '".$date."' WHERE `id` = '".$product_id0."' ");    

$last_id = Database::$connection->insert_id;  
    // echo $last_id;



$allowed_image_extension = array("jpg", "png", "PNG", "svg", "jpeg","gif","GIF");

if(!empty($blue_clr_variation) || !empty($blue_xs_qty) || !empty($blue_s_qty) || !empty($blue_m_qty) || !empty($blue_l_qty) || !empty($blue_xl_qty) || !empty($blue_xxl_qty) || !empty($blue_xxxl_qty) || !empty($blue_4xl_qty) || 
!empty($green_clr_variation) || !empty($green_xs_qty) || !empty($green_s_qty) || !empty($green_m_qty) || !empty($green_l_qty) || !empty($green_xl_qty) || !empty($green_xxl_qty) || !empty($green_xxxl_qty) || !empty($green_4xl_qty) || 
!empty($gold_clr_variation) || !empty($gold_xs_qty) || !empty($gold_s_qty) || !empty($gold_m_qty) || !empty($gold_l_qty) || !empty($gold_xl_qty) || !empty($gold_xxl_qty) || !empty($gold_xxxl_qty) || !empty($gold_4xl_qty) || 
!empty($silver_clr_variation) || !empty($silver_xs_qty) || !empty($silver_s_qty) || !empty($silver_m_qty) || !empty($silver_l_qty) || !empty($silver_xl_qty) || !empty($silver_xxl_qty) || !empty($silver_xxxl_qty) || !empty($silver_4xl_qty) || 
!empty($brown_clr_variation) || !empty($brown_xs_qty) || !empty($brown_s_qty) || !empty($brown_m_qty) || !empty($brown_l_qty) || !empty($brown_xl_qty) || !empty($brown_xxl_qty) || !empty($brown_xxxl_qty) || !empty($brown_4xl_qty) || 
!empty($black_clr_variation) || !empty($black_xs_qty) || !empty($black_s_qty) || !empty($black_m_qty) || !empty($black_l_qty) || !empty($black_xl_qty) || !empty($black_xxl_qty) || !empty($black_xxxl_qty) || !empty($black_4xl_qty) || 
!empty($yellow_clr_variation) || !empty($yellow_xs_qty) || !empty($yellow_s_qty) || !empty($yellow_m_qty) || !empty($yellow_l_qty) || !empty($yellow_xl_qty) || !empty($yellow_xxl_qty) || !empty($yellow_xxxl_qty) || !empty($yellow_4xl_qty) || 
!empty($red_clr_variation) || !empty($red_xs_qty) || !empty($red_s_qty) || !empty($red_m_qty) || !empty($red_l_qty) || !empty($red_xl_qty) || !empty($red_xxl_qty) || !empty($red_xxxl_qty) || !empty($red_4xl_qty) || 
!empty($purple_clr_variation) || !empty($purple_xs_qty) || !empty($purple_s_qty) || !empty($purple_m_qty) || !empty($purple_l_qty) || !empty($purple_xl_qty) || !empty($purple_xxl_qty) || !empty($purple_xxxl_qty) || !empty($purple_4xl_qty) || 
!empty($pink_clr_variation) || !empty($pink_xs_qty) || !empty($pink_s_qty) || !empty($pink_m_qty) || !empty($pink_l_qty) || !empty($pink_xl_qty) || !empty($pink_xxl_qty) || !empty($pink_xxxl_qty) || !empty($pink_4xl_qty) || 
!empty($orange_clr_variation) || !empty($orange_xs_qty) || !empty($orange_s_qty) || !empty($orange_m_qty) || !empty($orange_l_qty) || !empty($orange_xl_qty) || !empty($orange_xxl_qty) || !empty($orange_xxxl_qty) || !empty($orange_4xl_qty) || 
!empty($gray_clr_variation) || !empty($gray_xs_qty) || !empty($gray_s_qty) || !empty($gray_m_qty) || !empty($gray_l_qty) || !empty($gray_xl_qty) || !empty($gray_xxl_qty) || !empty($gray_xxxl_qty) || !empty($gray_4xl_qty) || 
!empty($BnW_clr_variation) || !empty($BnW_xs_qty) || !empty($BnW_s_qty) || !empty($BnW_m_qty) || !empty($BnW_l_qty) || !empty($BnW_xl_qty) || !empty($BnW_xxl_qty) || !empty($BnW_xxxl_qty) || !empty($BnW_4xl_qty) || 
!empty($white_clr_variation) || !empty($white_xs_qty) || !empty($white_s_qty) || !empty($white_m_qty) || !empty($white_l_qty) || !empty($white_xl_qty) || !empty($white_xxl_qty) || !empty($white_xxxl_qty) || !empty($white_4xl_qty)){


$total_qty =  (int)$blue_xs_qty + (int)$blue_s_qty + (int)$blue_m_qty + (int)$blue_l_qty + (int)$blue_xl_qty + (int)$blue_xxl_qty + (int)$blue_xxxl_qty + (int)$blue_4xl_qty + 
(int)$green_xs_qty + (int)$green_s_qty + (int)$green_m_qty + (int)$green_l_qty + (int)$green_xl_qty + (int)$green_xxl_qty + (int)$green_xxxl_qty + (int)$green_4xl_qty + 
(int)$gold_xs_qty + (int)$gold_s_qty + (int)$gold_m_qty + (int)$gold_l_qty + (int)$gold_xl_qty + (int)$gold_xxl_qty + (int)$gold_xxxl_qty + (int)$gold_4xl_qty +
(int)$silver_xs_qty + (int)$silver_s_qty + (int)$silver_m_qty + (int)$silver_l_qty + (int)$silver_xl_qty + (int)$silver_xxl_qty + (int)$silver_xxxl_qty + (int)$silver_4xl_qty + 
(int)$brown_xs_qty + (int)$brown_s_qty + (int)$brown_m_qty + (int)$brown_l_qty + (int)$brown_xl_qty + (int)$brown_xxl_qty + (int)$brown_xxxl_qty + (int)$brown_4xl_qty + 
(int)$black_xs_qty + (int)$black_s_qty + (int)$black_m_qty + (int)$black_l_qty + (int)$black_xl_qty +(int)$black_xxl_qty +  (int)$black_xxxl_qty + (int)$black_4xl_qty + 
(int)$yellow_xs_qty + (int)$yellow_s_qty + (int)$yellow_m_qty + (int)$yellow_l_qty + (int)$yellow_xl_qty +  (int)$yellow_xxl_qty + (int)$yellow_xxxl_qty + (int)$yellow_4xl_qty + 
(int)$red_xs_qty + (int)$red_s_qty + (int)$red_m_qty + (int)$red_l_qty + (int)$red_xl_qty + (int)$red_xxl_qty + (int)$red_xxxl_qty + (int)$red_4xl_qty + 
(int)$purple_xs_qty + (int)$purple_s_qty + (int)$purple_m_qty + (int)$purple_l_qty + (int)$purple_xl_qty + (int)$purple_xxl_qty + (int)$purple_xxxl_qty + (int)$purple_4xl_qty + 
(int)$pink_xs_qty + (int)$pink_s_qty + (int)$pink_m_qty + (int)$pink_l_qty + (int)$pink_xl_qty + (int)$pink_xxl_qty + (int)$pink_xxxl_qty + (int)$pink_4xl_qty + 
(int)$orange_xs_qty + (int)$orange_s_qty + (int)$orange_m_qty + (int)$orange_l_qty + (int)$orange_xl_qty + (int)$orange_xxl_qty + (int)$orange_xxxl_qty + (int)$orange_4xl_qty + 
(int)$gray_xs_qty + (int)$gray_s_qty + (int)$gray_m_qty + (int)$gray_l_qty + (int)$gray_xl_qty + (int)$gray_xxl_qty + (int)$gray_xxxl_qty + (int)$gray_4xl_qty + 
(int)$BnW_xs_qty + (int)$BnW_s_qty + (int)$BnW_m_qty + (int)$BnW_l_qty + (int)$BnW_xl_qty + (int)$BnW_xxl_qty + (int)$BnW_xxxl_qty + (int)$BnW_xs_qty + (int)$BnW_4xl_qty + 
(int)$white_xs_qty + (int)$white_s_qty + (int)$white_m_qty + (int)$white_l_qty + (int)$white_xl_qty + (int)$white_xxl_qty + (int)$white_xxxl_qty + (int)$white_4xl_qty;

Database::iud("UPDATE `product` SET `total_qty` = '".$total_qty."' WHERE `id` = '".$product_id0."' ");

echo "11";

// Blue color

if(!empty($blue_clr_variation) || !empty($blue_xs_qty) || !empty($blue_s_qty) || !empty($blue_m_qty) || !empty($blue_l_qty) || !empty($blue_xl_qty) || !empty($blue_xxl_qty) || !empty($blue_xxxl_qty) || !empty($blue_4xl_qty) ){

if(empty($blue_clr_variation)){
    $blue_clr_variation = null;
}else{}
if(empty($blue_xs_qty)){
    $blue_xs_qty = 0;
}else{}
if(empty($blue_s_qty)){
    $blue_s_qty = 0;
}else{}
if(empty($blue_m_qty)){
    $blue_m_qty = 0;
}else{}
if(empty($blue_l_qty)){
    $blue_l_qty = 0;
}else{}
if(empty($blue_xl_qty)){
    $blue_xl_qty = 0;
}else{}
if(empty($blue_xxl_qty)){
    $blue_xxl_qty = 0;
}else{}
if(empty($blue_xxxl_qty)){
    $blue_xxxl_qty = 0;
}else{}
if(empty($blue_4xl_qty)){
    $blue_4xl_qty = 0;
}else{}

$blue = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '1' ");
$blue_n = $blue->num_rows;
$blue_d = $blue->fetch_assoc();
if($blue_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$blue_clr_variation."', 
    `XS` = '".$blue_xs_qty."', 
    `S` = '".$blue_s_qty."',
    `M` = '".$blue_m_qty."', 
    `L` = '".$blue_l_qty."',
    `XL` = '".$blue_xl_qty."', 
    `XXL` = '".$blue_xxl_qty."', 
    `XXXL` = '".$blue_xxxl_qty."', 
    `4XL` = '".$blue_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '1' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','1','".$blue_clr_variation."','".$blue_xs_qty."','".$blue_s_qty."','".$blue_m_qty."','".$blue_l_qty."','".$blue_xl_qty."','".$blue_xxl_qty."','".$blue_xxxl_qty."','".$blue_4xl_qty."') ");
}




    if (isset($_FILES["b_imguploader1"])) {

        unlink($blue_d["product_img1"]);

        $imageFile1 = $_FILES["b_imguploader1"];
        $fileNewName1 = $_FILES["b_imguploader1"]["name"];
        $file_extension1 = pathinfo($fileNewName1, PATHINFO_EXTENSION);
        
            $fileName1 = "assets/images/product_images//" . "blue_img1" . uniqid() . "." . $file_extension1;
            move_uploaded_file($imageFile1["tmp_name"], $fileName1);

            Database::iud("UPDATE `stock` SET `product_img1` = '".$fileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '1'");
            // echo "1";
    } else {

    }
    if (isset($_FILES["b_imguploader2"])) {

        unlink($blue_d["product_img2"]);
    
        $imageFile2 = $_FILES["b_imguploader2"];
        $fileNewName2 = $_FILES["b_imguploader2"]["name"];
        $file_extension2 = pathinfo($fileNewName2, PATHINFO_EXTENSION);
        
            $fileName2 = "assets/images/product_images//" . "blue_img2" . uniqid() . "." . $file_extension2;
            move_uploaded_file($imageFile2["tmp_name"], $fileName2);
            Database::iud("UPDATE `stock` SET `product_img2` = '".$fileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '1' ");
           
    } else {
    }

}else{
    // not blue
}

 /* ********************************************************************************************************************** */


// Green color

if(!empty($green_clr_variation) || !empty($green_xs_qty) || !empty($green_s_qty) || !empty($green_m_qty) || !empty($green_l_qty) || !empty($green_xl_qty) || !empty($green_xxl_qty) || !empty($green_xxxl_qty) || !empty($green_4xl_qty) ){

    if(empty($green_clr_variation)){
        $green_clr_variation = null;
    }else{}
    if(empty($green_xs_qty)){
        $green_xs_qty = 0;
    }else{}
    if(empty($green_s_qty)){
        $green_s_qty = 0;
    }else{}
    if(empty($green_m_qty)){
        $green_m_qty = 0;
    }else{}
    if(empty($green_l_qty)){
        $green_l_qty = 0;
    }else{}
    if(empty($green_xl_qty)){
        $green_xl_qty = 0;
    }else{}
    if(empty($green_xxl_qty)){
        $green_xxl_qty = 0;
    }else{}
    if(empty($green_xxxl_qty)){
        $green_xxxl_qty = 0;
    }else{}
    if(empty($green_4xl_qty)){
        $green_4xl_qty = 0;
    }else{}
    
// Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES 
// ('".$last_id."','2','".$green_clr_variation."','".$green_xs_qty."','".$green_s_qty."','".$green_m_qty."','".$green_l_qty."','".$green_xl_qty."','".$green_xxl_qty."','".$green_xxxl_qty."','".$green_4xl_qty."') ");
    

$green = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '2' ");
$green_n = $green->num_rows;
$green_d = $green->fetch_assoc();
if($green_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$green_clr_variation."', 
    `XS` = '".$green_xs_qty."', 
    `S` = '".$green_s_qty."',
    `M` = '".$green_m_qty."', 
    `L` = '".$green_l_qty."',
    `XL` = '".$green_xl_qty."', 
    `XXL` = '".$green_xxl_qty."', 
    `XXXL` = '".$green_xxxl_qty."', 
    `4XL` = '".$green_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '2' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','2','".$green_clr_variation."','".$green_xs_qty."','".$green_s_qty."','".$green_m_qty."','".$green_l_qty."','".$green_xl_qty."','".$green_xxl_qty."','".$green_xxxl_qty."','".$green_4xl_qty."') ");
}


        if (isset($_FILES["g_imguploader1"])) {

            if(!empty($green_d["product_img1"])){
                unlink($green_d["product_img1"]); 
            }
            
            $gimageFile1 = $_FILES["g_imguploader1"];
            $gfileNewName1 = $_FILES["g_imguploader1"]["name"];
            $gfile_extension1 = pathinfo($gfileNewName1, PATHINFO_EXTENSION);
            
                $gfileName1 = "assets/images/product_images//" . "green_img1" . uniqid() . "." . $gfile_extension1;
                move_uploaded_file($gimageFile1["tmp_name"], $gfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$gfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '2'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["g_imguploader2"])) {
            
            if(!empty($green_d["product_img2"])){
                unlink($green_d["product_img2"]); 
            }
        
            $gimageFile2 = $_FILES["g_imguploader2"];
            $gfileNewName2 = $_FILES["g_imguploader2"]["name"];
            $gfile_extension2 = pathinfo($gfileNewName2, PATHINFO_EXTENSION);
            
                $gfileName2 = "assets/images/product_images//" . "green_img2" . uniqid() . "." . $gfile_extension2;
                move_uploaded_file($gimageFile2["tmp_name"], $gfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$gfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '2'");
               
        } else {
        }
    
    }else{
        // not green
    }



/* ********************************************************************************************************************** */


// gold gold

if(!empty($gold_clr_variation) || !empty($gold_xs_qty) || !empty($gold_s_qty) || !empty($gold_m_qty) || !empty($gold_l_qty) || !empty($gold_xl_qty) || !empty($gold_xxl_qty) || !empty($gold_xxxl_qty) || !empty($gold_4xl_qty) ){

    if(empty($gold_clr_variation)){
        $gold_clr_variation = null;
    }else{}
    if(empty($gold_xs_qty)){
        $gold_xs_qty = 0;
    }else{}
    if(empty($gold_s_qty)){
        $gold_s_qty = 0;
    }else{}
    if(empty($gold_m_qty)){
        $gold_m_qty = 0;
    }else{}
    if(empty($gold_l_qty)){
        $gold_l_qty = 0;
    }else{}
    if(empty($gold_xl_qty)){
        $gold_xl_qty = 0;
    }else{}
    if(empty($gold_xxl_qty)){
        $gold_xxl_qty = 0;
    }else{}
    if(empty($gold_xxxl_qty)){
        $gold_xxxl_qty = 0;
    }else{}
    if(empty($gold_4xl_qty)){
        $gold_4xl_qty = 0;
    }else{}

    // echo $gold_xs_qty;
    // echo "<br/>";
    // echo $gold_s_qty;
    // echo "<br/>";
    // echo $gold_m_qty;
    // echo "<br/>";
    // echo $gold_l_qty;
    // echo "<br/>";
    // echo $gold_xl_qty;
    // echo "<br/>";
    // echo $gold_xxl_qty;
    // echo "<br/>";
    // echo $gold_xxxl_qty;
    // echo "<br/>";
    // echo $gold_4xl_qty;
    // echo "<br/>";


    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','3','".$gold_clr_variation."','".$gold_xs_qty."','".$gold_s_qty."','".$gold_m_qty."','".$gold_l_qty."','".$gold_xl_qty."','".$gold_xxl_qty."','".$gold_xxxl_qty."','".$gold_4xl_qty."') ");
    

$gold = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '3' ");
$gold_n = $gold->num_rows;
$gold_d = $gold->fetch_assoc();
if($gold_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$gold_clr_variation."', 
    `XS` = '".$gold_xs_qty."', 
    `S` = '".$gold_s_qty."',
    `M` = '".$gold_m_qty."', 
    `L` = '".$gold_l_qty."',
    `XL` = '".$gold_xl_qty."', 
    `XXL` = '".$gold_xxl_qty."', 
    `XXXL` = '".$gold_xxxl_qty."', 
    `4XL` = '".$gold_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '3' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','3','".$gold_clr_variation."','".$gold_xs_qty."','".$gold_s_qty."','".$gold_m_qty."','".$gold_l_qty."','".$gold_xl_qty."','".$gold_xxl_qty."','".$gold_xxxl_qty."','".$gold_4xl_qty."') ");
}


        if (isset($_FILES["gold_imguploader1"])) {

            if(!empty($gold_d["product_img1"])){
                unlink($gold_d["product_img1"]); 
            }
    
            $goldimageFile1 = $_FILES["gold_imguploader1"];
            $goldfileNewName1 = $_FILES["gold_imguploader1"]["name"];
            $goldfile_extension1 = pathinfo($goldfileNewName1, PATHINFO_EXTENSION);
            
                $goldfileName1 = "assets/images/product_images//" . "gold_img1" . uniqid() . "." . $goldfile_extension1;
                move_uploaded_file($goldimageFile1["tmp_name"], $goldfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$goldfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '3'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["gold_imguploader2"])) {

            if(!empty($gold_d["product_img2"])){
                unlink($gold_d["product_img2"]); 
            }
        
            $goldimageFile2 = $_FILES["gold_imguploader2"];
            $goldfileNewName2 = $_FILES["gold_imguploader2"]["name"];
            $goldfile_extension2 = pathinfo($goldfileNewName2, PATHINFO_EXTENSION);
            
                $goldfileName2 = "assets/images/product_images//" . "gold_img2" . uniqid() . "." . $goldfile_extension2;
                move_uploaded_file($goldimageFile2["tmp_name"], $goldfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$goldfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '3'");
               
        } else {
        }
    
    }else{
        // not gold
    }



// Silver color

if(!empty($silver_clr_variation) || !empty($silver_xs_qty) || !empty($silver_s_qty) || !empty($silver_m_qty) || !empty($silver_l_qty) || !empty($silver_xl_qty) || !empty($silver_xxl_qty) || !empty($silver_xxxl_qty) || !empty($silver_4xl_qty) ){

    if(empty($silver_clr_variation)){
        $silver_clr_variation = null;
    }else{}
    if(empty($silver_xs_qty)){
        $silver_xs_qty = 0;
    }else{}
    if(empty($silver_s_qty)){
        $silver_s_qty = 0;
    }else{}
    if(empty($silver_m_qty)){
        $silver_m_qty = 0;
    }else{}
    if(empty($silver_l_qty)){
        $silver_l_qty = 0;
    }else{}
    if(empty($silver_xl_qty)){
        $silver_xl_qty = 0;
    }else{}
    if(empty($silver_xxl_qty)){
        $silver_xxl_qty = 0;
    }else{}
    if(empty($silver_xxxl_qty)){
        $silver_xxxl_qty = 0;
    }else{}
    if(empty($silver_4xl_qty)){
        $silver_4xl_qty = 0;
    }else{}


    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','4','".$silver_clr_variation."','".$silver_xs_qty."','".$silver_s_qty."','".$silver_m_qty."','".$silver_l_qty."','".$silver_xl_qty."','".$silver_xxl_qty."','".$silver_xxxl_qty."','".$silver_4xl_qty."') ");
    


$silver = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '4' ");
$silver_n = $silver->num_rows;
$silver_d = $silver->fetch_assoc();
if($silver_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$silver_clr_variation."', 
    `XS` = '".$silver_xs_qty."', 
    `S` = '".$silver_s_qty."',
    `M` = '".$silver_m_qty."', 
    `L` = '".$silver_l_qty."',
    `XL` = '".$silver_xl_qty."', 
    `XXL` = '".$silver_xxl_qty."', 
    `XXXL` = '".$silver_xxxl_qty."', 
    `4XL` = '".$silver_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '4' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','4','".$silver_clr_variation."','".$silver_xs_qty."','".$silver_s_qty."','".$silver_m_qty."','".$silver_l_qty."','".$silver_xl_qty."','".$silver_xxl_qty."','".$silver_xxxl_qty."','".$silver_4xl_qty."') ");
}



        if (isset($_FILES["silver_imguploader1"])) {

            if(!empty($silver_d["product_img1"])){
                unlink($silver_d["product_img1"]); 
            }
    
            $silverimageFile1 = $_FILES["silver_imguploader1"];
            $silverfileNewName1 = $_FILES["silver_imguploader1"]["name"];
            $silverfile_extension1 = pathinfo($silverfileNewName1, PATHINFO_EXTENSION);
            
                $silverfileName1 = "assets/images/product_images//" . "silver_img1" . uniqid() . "." . $silverfile_extension1;
                move_uploaded_file($silverimageFile1["tmp_name"], $silverfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$silverfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '4'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["silver_imguploader2"])) {

            if(!empty($silver_d["product_img2"])){
                unlink($silver_d["product_img2"]); 
            }
        
            $silverimageFile2 = $_FILES["silver_imguploader2"];
            $silverfileNewName2 = $_FILES["silver_imguploader2"]["name"];
            $silverfile_extension2 = pathinfo($silverfileNewName2, PATHINFO_EXTENSION);
            
                $silverfileName2 = "assets/images/product_images//" . "silver_img2" . uniqid() . "." . $silverfile_extension2;
                move_uploaded_file($silverimageFile2["tmp_name"], $silverfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$silverfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '4'");
               
        } else {
        }
    
    }else{
        // not silver
    }



// brown color

if(!empty($brown_clr_variation) || !empty($brown_xs_qty) || !empty($brown_s_qty) || !empty($brown_m_qty) || !empty($brown_l_qty) || !empty($brown_xl_qty) || !empty($brown_xxl_qty) || !empty($brown_xxxl_qty) || !empty($brown_4xl_qty) ){

    if(empty($brown_clr_variation)){
        $brown_clr_variation = null;
    }else{}
    if(empty($brown_xs_qty)){
        $brown_xs_qty = 0;
    }else{}
    if(empty($brown_s_qty)){
        $brown_s_qty = 0;
    }else{}
    if(empty($brown_m_qty)){
        $brown_m_qty = 0;
    }else{}
    if(empty($brown_l_qty)){
        $brown_l_qty = 0;
    }else{}
    if(empty($brown_xl_qty)){
        $brown_xl_qty = 0;
    }else{}
    if(empty($brown_xxl_qty)){
        $brown_xxl_qty = 0;
    }else{}
    if(empty($brown_xxxl_qty)){
        $brown_xxxl_qty = 0;
    }else{}
    if(empty($brown_4xl_qty)){
        $brown_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','5','".$brown_clr_variation."','".$brown_xs_qty."','".$brown_s_qty."','".$brown_m_qty."','".$brown_l_qty."','".$brown_xl_qty."','".$brown_xxl_qty."','".$brown_xxxl_qty."','".$brown_4xl_qty."') ");
    

$brown = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '5' ");
$brown_n = $brown->num_rows;
$brown_d = $brown->fetch_assoc();
if($brown_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$brown_clr_variation."', 
    `XS` = '".$brown_xs_qty."', 
    `S` = '".$brown_s_qty."',
    `M` = '".$brown_m_qty."', 
    `L` = '".$brown_l_qty."',
    `XL` = '".$brown_xl_qty."', 
    `XXL` = '".$brown_xxl_qty."', 
    `XXXL` = '".$brown_xxxl_qty."', 
    `4XL` = '".$brown_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '5' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','5','".$brown_clr_variation."','".$brown_xs_qty."','".$brown_s_qty."','".$brown_m_qty."','".$brown_l_qty."','".$brown_xl_qty."','".$brown_xxl_qty."','".$brown_xxxl_qty."','".$brown_4xl_qty."') ");
}




        if (isset($_FILES["brown_imguploader1"])) {
            
            if(!empty($brown_d["product_img1"])){
                unlink($brown_d["product_img1"]); 
            }
    
            $brownimageFile1 = $_FILES["brown_imguploader1"];
            $brownfileNewName1 = $_FILES["brown_imguploader1"]["name"];
            $brownfile_extension1 = pathinfo($brownfileNewName1, PATHINFO_EXTENSION);
            
                $brownfileName1 = "assets/images/product_images//" . "brown_img1" . uniqid() . "." . $brownfile_extension1;
                move_uploaded_file($brownimageFile1["tmp_name"], $brownfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$brownfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '5'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["brown_imguploader2"])) {

            if(!empty($brown_d["product_img2"])){
                unlink($brown_d["product_img2"]); 
            }
        
            $brownimageFile2 = $_FILES["brown_imguploader2"];
            $brownfileNewName2 = $_FILES["brown_imguploader2"]["name"];
            $brownfile_extension2 = pathinfo($brownfileNewName2, PATHINFO_EXTENSION);
            
                $brownfileName2 = "assets/images/product_images//" . "brown_img2" . uniqid() . "." . $brownfile_extension2;
                move_uploaded_file($brownimageFile2["tmp_name"], $brownfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$brownfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '5'");
               
        } else {
        }
    
    }else{
        // not brown
    }





// black color

if(!empty($black_clr_variation) || !empty($black_xs_qty) || !empty($black_s_qty) || !empty($black_m_qty) || !empty($black_l_qty) || !empty($black_xl_qty) || !empty($black_xxl_qty) || !empty($black_xxxl_qty) || !empty($black_4xl_qty) ){

    if(empty($black_clr_variation)){
        $black_clr_variation = null;
    }else{}
    if(empty($black_xs_qty)){
        $black_xs_qty = 0;
    }else{}
    if(empty($black_s_qty)){
        $black_s_qty = 0;
    }else{}
    if(empty($black_m_qty)){
        $black_m_qty = 0;
    }else{}
    if(empty($black_l_qty)){
        $black_l_qty = 0;
    }else{}
    if(empty($black_xl_qty)){
        $black_xl_qty = 0;
    }else{}
    if(empty($black_xxl_qty)){
        $black_xxl_qty = 0;
    }else{}
    if(empty($black_xxxl_qty)){
        $black_xxxl_qty = 0;
    }else{}
    if(empty($black_4xl_qty)){
        $black_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','6','".$black_clr_variation."','".$black_xs_qty."','".$black_s_qty."','".$black_m_qty."','".$black_l_qty."','".$black_xl_qty."','".$black_xxl_qty."','".$black_xxxl_qty."','".$black_4xl_qty."') ");
    


$black = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '6' ");
$black_n = $black->num_rows;
$black_d = $black->fetch_assoc();
if($black_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$black_clr_variation."', 
    `XS` = '".$black_xs_qty."', 
    `S` = '".$black_s_qty."',
    `M` = '".$black_m_qty."', 
    `L` = '".$black_l_qty."',
    `XL` = '".$black_xl_qty."', 
    `XXL` = '".$black_xxl_qty."', 
    `XXXL` = '".$black_xxxl_qty."', 
    `4XL` = '".$black_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '6' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','6','".$black_clr_variation."','".$black_xs_qty."','".$black_s_qty."','".$black_m_qty."','".$black_l_qty."','".$black_xl_qty."','".$black_xxl_qty."','".$black_xxxl_qty."','".$black_4xl_qty."') ");
}



        if (isset($_FILES["black_imguploader1"])) {

            if(!empty($black_d["product_img1"])){
                unlink($black_d["product_img1"]); 
            }
    
            $blackimageFile1 = $_FILES["black_imguploader1"];
            $blackfileNewName1 = $_FILES["black_imguploader1"]["name"];
            $blackfile_extension1 = pathinfo($blackfileNewName1, PATHINFO_EXTENSION);
            
                $blackfileName1 = "assets/images/product_images//" . "black_img1" . uniqid() . "." . $blackfile_extension1;
                move_uploaded_file($blackimageFile1["tmp_name"], $blackfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$blackfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '6'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["black_imguploader2"])) {

            if(!empty($black_d["product_img2"])){
                unlink($black_d["product_img2"]); 
            }
        
            $blackimageFile2 = $_FILES["black_imguploader2"];
            $blackfileNewName2 = $_FILES["black_imguploader2"]["name"];
            $blackfile_extension2 = pathinfo($blackfileNewName2, PATHINFO_EXTENSION);
            
                $blackfileName2 = "assets/images/product_images//" . "black_img2" . uniqid() . "." . $blackfile_extension2;
                move_uploaded_file($blackimageFile2["tmp_name"], $blackfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$blackfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '6'");
               
        } else {
        }
    
    }else{
        // not black
    }




// yellow color

if(!empty($yellow_clr_variation) || !empty($yellow_xs_qty) || !empty($yellow_s_qty) || !empty($yellow_m_qty) || !empty($yellow_l_qty) || !empty($yellow_xl_qty) || !empty($yellow_xxl_qty) || !empty($yellow_xxxl_qty) || !empty($yellow_4xl_qty) ){

    if(empty($yellow_clr_variation)){
        $yellow_clr_variation = null;
    }else{}
    if(empty($yellow_xs_qty)){
        $yellow_xs_qty = 0;
    }else{}
    if(empty($yellow_s_qty)){
        $yellow_s_qty = 0;
    }else{}
    if(empty($yellow_m_qty)){
        $yellow_m_qty = 0;
    }else{}
    if(empty($yellow_l_qty)){
        $yellow_l_qty = 0;
    }else{}
    if(empty($yellow_xl_qty)){
        $yellow_xl_qty = 0;
    }else{}
    if(empty($yellow_xxl_qty)){
        $yellow_xxl_qty = 0;
    }else{}
    if(empty($yellow_xxxl_qty)){
        $yellow_xxxl_qty = 0;
    }else{}
    if(empty($yellow_4xl_qty)){
        $yellow_4xl_qty = 0;
    }else{}


    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','7','".$yellow_clr_variation."','".$yellow_xs_qty."','".$yellow_s_qty."','".$yellow_m_qty."','".$yellow_l_qty."','".$yellow_xl_qty."','".$yellow_xxl_qty."','".$yellow_xxxl_qty."','".$yellow_4xl_qty."') ");
    


$yellow = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '7' ");
$yellow_n = $yellow->num_rows;
$yellow_d = $yellow->fetch_assoc();
if($yellow_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$yellow_clr_variation."', 
    `XS` = '".$yellow_xs_qty."', 
    `S` = '".$yellow_s_qty."',
    `M` = '".$yellow_m_qty."', 
    `L` = '".$yellow_l_qty."',
    `XL` = '".$yellow_xl_qty."', 
    `XXL` = '".$yellow_xxl_qty."', 
    `XXXL` = '".$yellow_xxxl_qty."', 
    `4XL` = '".$yellow_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '7' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','7','".$yellow_clr_variation."','".$yellow_xs_qty."','".$yellow_s_qty."','".$yellow_m_qty."','".$yellow_l_qty."','".$yellow_xl_qty."','".$yellow_xxl_qty."','".$yellow_xxxl_qty."','".$yellow_4xl_qty."') ");
}


        if (isset($_FILES["yellow_imguploader1"])) {

            if(!empty($yellow_d["product_img1"])){
                unlink($yellow_d["product_img1"]); 
            }
    
            $yellowimageFile1 = $_FILES["yellow_imguploader1"];
            $yellowfileNewName1 = $_FILES["yellow_imguploader1"]["name"];
            $yellowfile_extension1 = pathinfo($yellowfileNewName1, PATHINFO_EXTENSION);
            
                $yellowfileName1 = "assets/images/product_images//" . "yellow_img1" . uniqid() . "." . $yellowfile_extension1;
                move_uploaded_file($yellowimageFile1["tmp_name"], $yellowfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$yellowfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '7'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["yellow_imguploader2"])) {

            if(!empty($yellow_d["product_img2"])){
                unlink($yellow_d["product_img2"]); 
            }
        
            $yellowimageFile2 = $_FILES["yellow_imguploader2"];
            $yellowfileNewName2 = $_FILES["yellow_imguploader2"]["name"];
            $yellowfile_extension2 = pathinfo($yellowfileNewName2, PATHINFO_EXTENSION);
            
                $yellowfileName2 = "assets/images/product_images//" . "yellow_img2" . uniqid() . "." . $yellowfile_extension2;
                move_uploaded_file($yellowimageFile2["tmp_name"], $yellowfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$yellowfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '7'");
               
        } else {
        }
    
    }else{
        // not yellow
    }




// red color

if(!empty($red_clr_variation) || !empty($red_xs_qty) || !empty($red_s_qty) || !empty($red_m_qty) || !empty($red_l_qty) || !empty($red_xl_qty) || !empty($red_xxl_qty) || !empty($red_xxxl_qty) || !empty($red_4xl_qty) ){

    if(empty($red_clr_variation)){
        $red_clr_variation = null;
    }else{}
    if(empty($red_xs_qty)){
        $red_xs_qty = 0;
    }else{}
    if(empty($red_s_qty)){
        $red_s_qty = 0;
    }else{}
    if(empty($red_m_qty)){
        $red_m_qty = 0;
    }else{}
    if(empty($red_l_qty)){
        $red_l_qty = 0;
    }else{}
    if(empty($red_xl_qty)){
        $red_xl_qty = 0;
    }else{}
    if(empty($red_xxl_qty)){
        $red_xxl_qty = 0;
    }else{}
    if(empty($red_xxxl_qty)){
        $red_xxxl_qty = 0;
    }else{}
    if(empty($red_4xl_qty)){
        $red_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','8','".$red_clr_variation."','".$red_xs_qty."','".$red_s_qty."','".$red_m_qty."','".$red_l_qty."','".$red_xl_qty."','".$red_xxl_qty."','".$red_xxxl_qty."','".$red_4xl_qty."') ");
    

$red = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '8' ");
$red_n = $red->num_rows;
$red_d = $red->fetch_assoc();
if($red_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$red_clr_variation."', 
    `XS` = '".$red_xs_qty."', 
    `S` = '".$red_s_qty."',
    `M` = '".$red_m_qty."', 
    `L` = '".$red_l_qty."',
    `XL` = '".$red_xl_qty."', 
    `XXL` = '".$red_xxl_qty."', 
    `XXXL` = '".$red_xxxl_qty."', 
    `4XL` = '".$red_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '8' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','8','".$red_clr_variation."','".$red_xs_qty."','".$red_s_qty."','".$red_m_qty."','".$red_l_qty."','".$red_xl_qty."','".$red_xxl_qty."','".$red_xxxl_qty."','".$red_4xl_qty."') ");
}


        if (isset($_FILES["red_imguploader1"])) {

            if(!empty($red_d["product_img1"])){
                unlink($red_d["product_img1"]); 
            }
    
            $redimageFile1 = $_FILES["red_imguploader1"];
            $redfileNewName1 = $_FILES["red_imguploader1"]["name"];
            $redfile_extension1 = pathinfo($redfileNewName1, PATHINFO_EXTENSION);
            
                $redfileName1 = "assets/images/product_images//" . "red_img1" . uniqid() . "." . $redfile_extension1;
                move_uploaded_file($redimageFile1["tmp_name"], $redfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$redfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '8'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["red_imguploader2"])) {

            if(!empty($red_d["product_img2"])){
                unlink($red_d["product_img2"]); 
            }
        
            $redimageFile2 = $_FILES["red_imguploader2"];
            $redfileNewName2 = $_FILES["red_imguploader2"]["name"];
            $redfile_extension2 = pathinfo($redfileNewName2, PATHINFO_EXTENSION);
            
                $redfileName2 = "assets/images/product_images//" . "red_img2" . uniqid() . "." . $redfile_extension2;
                move_uploaded_file($redimageFile2["tmp_name"], $redfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$redfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '8'");
               
        } else {
        }
    
    }else{
        // not red
    }



// purple color

if(!empty($purple_clr_variation) || !empty($purple_xs_qty) || !empty($purple_s_qty) || !empty($purple_m_qty) || !empty($purple_l_qty) || !empty($purple_xl_qty) || !empty($purple_xxl_qty) || !empty($purple_xxxl_qty) || !empty($purple_4xl_qty) ){

    if(empty($purple_clr_variation)){
        $purple_clr_variation = null;
    }else{}
    if(empty($purple_xs_qty)){
        $purple_xs_qty = 0;
    }else{}
    if(empty($purple_s_qty)){
        $purple_s_qty = 0;
    }else{}
    if(empty($purple_m_qty)){
        $purple_m_qty = 0;
    }else{}
    if(empty($purple_l_qty)){
        $purple_l_qty = 0;
    }else{}
    if(empty($purple_xl_qty)){
        $purple_xl_qty = 0;
    }else{}
    if(empty($purple_xxl_qty)){
        $purple_xxl_qty = 0;
    }else{}
    if(empty($purple_xxxl_qty)){
        $purple_xxxl_qty = 0;
    }else{}
    if(empty($purple_4xl_qty)){
        $purple_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','9','".$purple_clr_variation."','".$purple_xs_qty."','".$purple_s_qty."','".$purple_m_qty."','".$purple_l_qty."','".$purple_xl_qty."','".$purple_xxl_qty."','".$purple_xxxl_qty."','".$purple_4xl_qty."') ");
    

$purple = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '9' ");
$purple_n = $purple->num_rows;
$purple_d = $purple->fetch_assoc();
if($purple_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$purple_clr_variation."', 
    `XS` = '".$purple_xs_qty."', 
    `S` = '".$purple_s_qty."',
    `M` = '".$purple_m_qty."', 
    `L` = '".$purple_l_qty."',
    `XL` = '".$purple_xl_qty."', 
    `XXL` = '".$purple_xxl_qty."', 
    `XXXL` = '".$purple_xxxl_qty."', 
    `4XL` = '".$purple_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '9' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','9','".$purple_clr_variation."','".$purple_xs_qty."','".$purple_s_qty."','".$purple_m_qty."','".$purple_l_qty."','".$purple_xl_qty."','".$purple_xxl_qty."','".$purple_xxxl_qty."','".$purple_4xl_qty."') ");
}


        if (isset($_FILES["purple_imguploader1"])) {

            if(!empty($purple_d["product_img1"])){
                unlink($purple_d["product_img1"]); 
            }
    
            $purpleimageFile1 = $_FILES["purple_imguploader1"];
            $purplefileNewName1 = $_FILES["purple_imguploader1"]["name"];
            $purplefile_extension1 = pathinfo($purplefileNewName1, PATHINFO_EXTENSION);
            
                $purplefileName1 = "assets/images/product_images//" . "purple_img1" . uniqid() . "." . $purplefile_extension1;
                move_uploaded_file($purpleimageFile1["tmp_name"], $purplefileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$purplefileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '9'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["purple_imguploader2"])) {

            if(!empty($purple_d["product_img2"])){
                unlink($purple_d["product_img2"]); 
            }
        
            $purpleimageFile2 = $_FILES["purple_imguploader2"];
            $purplefileNewName2 = $_FILES["purple_imguploader2"]["name"];
            $purplefile_extension2 = pathinfo($purplefileNewName2, PATHINFO_EXTENSION);
            
                $purplefileName2 = "assets/images/product_images//" . "purple_img2" . uniqid() . "." . $purplefile_extension2;
                move_uploaded_file($purpleimageFile2["tmp_name"], $purplefileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$purplefileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '9'");
               
        } else {
        }
    
    }else{
        // not purple
    }



// pink color

if(!empty($pink_clr_variation) || !empty($pink_xs_qty) || !empty($pink_s_qty) || !empty($pink_m_qty) || !empty($pink_l_qty) || !empty($pink_xl_qty) || !empty($pink_xxl_qty) || !empty($pink_xxxl_qty) || !empty($pink_4xl_qty) ){

    if(empty($pink_clr_variation)){
        $pink_clr_variation = null;
    }else{}
    if(empty($pink_xs_qty)){
        $pink_xs_qty = 0;
    }else{}
    if(empty($pink_s_qty)){
        $pink_s_qty = 0;
    }else{}
    if(empty($pink_m_qty)){
        $pink_m_qty = 0;
    }else{}
    if(empty($pink_l_qty)){
        $pink_l_qty = 0;
    }else{}
    if(empty($pink_xl_qty)){
        $pink_xl_qty = 0;
    }else{}
    if(empty($pink_xxl_qty)){
        $pink_xxl_qty = 0;
    }else{}
    if(empty($pink_xxxl_qty)){
        $pink_xxxl_qty = 0;
    }else{}
    if(empty($pink_4xl_qty)){
        $pink_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','10','".$pink_clr_variation."','".$pink_xs_qty."','".$pink_s_qty."','".$pink_m_qty."','".$pink_l_qty."','".$pink_xl_qty."','".$pink_xxl_qty."','".$pink_xxxl_qty."','".$pink_4xl_qty."') ");
    

$pink = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '10' ");
$pink_n = $pink->num_rows;
$pink_d = $pink->fetch_assoc();
if($pink_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$pink_clr_variation."', 
    `XS` = '".$pink_xs_qty."', 
    `S` = '".$pink_s_qty."',
    `M` = '".$pink_m_qty."', 
    `L` = '".$pink_l_qty."',
    `XL` = '".$pink_xl_qty."', 
    `XXL` = '".$pink_xxl_qty."', 
    `XXXL` = '".$pink_xxxl_qty."', 
    `4XL` = '".$pink_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '10' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','10','".$pink_clr_variation."','".$pink_xs_qty."','".$pink_s_qty."','".$pink_m_qty."','".$pink_l_qty."','".$pink_xl_qty."','".$pink_xxl_qty."','".$pink_xxxl_qty."','".$pink_4xl_qty."') ");
}


        if (isset($_FILES["pink_imguploader1"])) {

            if(!empty($pink_d["product_img1"])){
                unlink($pink_d["product_img1"]); 
            }
    
            $pinkimageFile1 = $_FILES["pink_imguploader1"];
            $pinkfileNewName1 = $_FILES["pink_imguploader1"]["name"];
            $pinkfile_extension1 = pathinfo($pinkfileNewName1, PATHINFO_EXTENSION);
            
                $pinkfileName1 = "assets/images/product_images//" . "pink_img1" . uniqid() . "." . $pinkfile_extension1;
                move_uploaded_file($pinkimageFile1["tmp_name"], $pinkfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$pinkfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '10'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["pink_imguploader2"])) {

            if(!empty($pink_d["product_img2"])){
                unlink($pink_d["product_img2"]); 
            }
        
            $pinkimageFile2 = $_FILES["pink_imguploader2"];
            $pinkfileNewName2 = $_FILES["pink_imguploader2"]["name"];
            $pinkfile_extension2 = pathinfo($pinkfileNewName2, PATHINFO_EXTENSION);
            
                $pinkfileName2 = "assets/images/product_images//" . "pink_img2" . uniqid() . "." . $pinkfile_extension2;
                move_uploaded_file($pinkimageFile2["tmp_name"], $pinkfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$pinkfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '10'");
               
        } else {
        }
    
    }else{
        // not pink
    }




// orange color

if(!empty($orange_clr_variation) || !empty($orange_xs_qty) || !empty($orange_s_qty) || !empty($orange_m_qty) || !empty($orange_l_qty) || !empty($orange_xl_qty) || !empty($orange_xxl_qty) || !empty($orange_xxxl_qty) || !empty($orange_4xl_qty) ){

    if(empty($orange_clr_variation)){
        $orange_clr_variation = null;
    }else{}
    if(empty($orange_xs_qty)){
        $orange_xs_qty = 0;
    }else{}
    if(empty($orange_s_qty)){
        $orange_s_qty = 0;
    }else{}
    if(empty($orange_m_qty)){
        $orange_m_qty = 0;
    }else{}
    if(empty($orange_l_qty)){
        $orange_l_qty = 0;
    }else{}
    if(empty($orange_xl_qty)){
        $orange_xl_qty = 0;
    }else{}
    if(empty($orange_xxl_qty)){
        $orange_xxl_qty = 0;
    }else{}
    if(empty($orange_xxxl_qty)){
        $orange_xxxl_qty = 0;
    }else{}
    if(empty($orange_4xl_qty)){
        $orange_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','11','".$orange_clr_variation."','".$orange_xs_qty."','".$orange_s_qty."','".$orange_m_qty."','".$orange_l_qty."','".$orange_xl_qty."','".$orange_xxl_qty."','".$orange_xxxl_qty."','".$orange_4xl_qty."') ");
    

$orange = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '11' ");
$orange_n = $orange->num_rows;
$orange_d = $orange->fetch_assoc();
if($orange_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$orange_clr_variation."', 
    `XS` = '".$orange_xs_qty."', 
    `S` = '".$orange_s_qty."',
    `M` = '".$orange_m_qty."', 
    `L` = '".$orange_l_qty."',
    `XL` = '".$orange_xl_qty."', 
    `XXL` = '".$orange_xxl_qty."', 
    `XXXL` = '".$orange_xxxl_qty."', 
    `4XL` = '".$orange_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '11' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','11','".$orange_clr_variation."','".$orange_xs_qty."','".$orange_s_qty."','".$orange_m_qty."','".$orange_l_qty."','".$orange_xl_qty."','".$orange_xxl_qty."','".$orange_xxxl_qty."','".$orange_4xl_qty."') ");
}

    
        if (isset($_FILES["orange_imguploader1"])) {

            if(!empty($orange_d["product_img1"])){
                unlink($orange_d["product_img1"]); 
            }
    
            $orangeimageFile1 = $_FILES["orange_imguploader1"];
            $orangefileNewName1 = $_FILES["orange_imguploader1"]["name"];
            $orangefile_extension1 = pathinfo($orangefileNewName1, PATHINFO_EXTENSION);
            
                $orangefileName1 = "assets/images/product_images//" . "orange_img1" . uniqid() . "." . $orangefile_extension1;
                move_uploaded_file($orangeimageFile1["tmp_name"], $orangefileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$orangefileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '11'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["orange_imguploader2"])) {

            if(!empty($orange_d["product_img2"])){
                unlink($orange_d["product_img2"]); 
            }
        
            $orangeimageFile2 = $_FILES["orange_imguploader2"];
            $orangefileNewName2 = $_FILES["orange_imguploader2"]["name"];
            $orangefile_extension2 = pathinfo($orangefileNewName2, PATHINFO_EXTENSION);
            
                $orangefileName2 = "assets/images/product_images//" . "orange_img2" . uniqid() . "." . $orangefile_extension2;
                move_uploaded_file($orangeimageFile2["tmp_name"], $orangefileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$orangefileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '11'");
               
        } else {
        }
    
    }else{
        // not orange
    }



// gray color

if(!empty($gray_clr_variation) || !empty($gray_xs_qty) || !empty($gray_s_qty) || !empty($gray_m_qty) || !empty($gray_l_qty) || !empty($gray_xl_qty) || !empty($gray_xxl_qty) || !empty($gray_xxxl_qty) || !empty($gray_4xl_qty) ){

    if(empty($gray_clr_variation)){
        $gray_clr_variation = null;
    }else{}
    if(empty($gray_xs_qty)){
        $gray_xs_qty = 0;
    }else{}
    if(empty($gray_s_qty)){
        $gray_s_qty = 0;
    }else{}
    if(empty($gray_m_qty)){
        $gray_m_qty = 0;
    }else{}
    if(empty($gray_l_qty)){
        $gray_l_qty = 0;
    }else{}
    if(empty($gray_xl_qty)){
        $gray_xl_qty = 0;
    }else{}
    if(empty($gray_xxl_qty)){
        $gray_xxl_qty = 0;
    }else{}
    if(empty($gray_xxxl_qty)){
        $gray_xxxl_qty = 0;
    }else{}
    if(empty($gray_4xl_qty)){
        $gray_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','12','".$gray_clr_variation."','".$gray_xs_qty."','".$gray_s_qty."','".$gray_m_qty."','".$gray_l_qty."','".$gray_xl_qty."','".$gray_xxl_qty."','".$gray_xxxl_qty."','".$gray_4xl_qty."') ");
    

$gray = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '12' ");
$gray_n = $gray->num_rows;
$gray_d = $gray->fetch_assoc();
if($gray_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$gray_clr_variation."', 
    `XS` = '".$gray_xs_qty."', 
    `S` = '".$gray_s_qty."',
    `M` = '".$gray_m_qty."', 
    `L` = '".$gray_l_qty."',
    `XL` = '".$gray_xl_qty."', 
    `XXL` = '".$gray_xxl_qty."', 
    `XXXL` = '".$gray_xxxl_qty."', 
    `4XL` = '".$gray_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '12' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','12','".$gray_clr_variation."','".$gray_xs_qty."','".$gray_s_qty."','".$gray_m_qty."','".$gray_l_qty."','".$gray_xl_qty."','".$gray_xxl_qty."','".$gray_xxxl_qty."','".$gray_4xl_qty."') ");
}



        if (isset($_FILES["gray_imguploader1"])) {

            if(!empty($gray_d["product_img1"])){
                unlink($gray_d["product_img1"]); 
            }
    
            $grayimageFile1 = $_FILES["gray_imguploader1"];
            $grayfileNewName1 = $_FILES["gray_imguploader1"]["name"];
            $grayfile_extension1 = pathinfo($grayfileNewName1, PATHINFO_EXTENSION);
            
                $grayfileName1 = "assets/images/product_images//" . "gray_img1" . uniqid() . "." . $grayfile_extension1;
                move_uploaded_file($grayimageFile1["tmp_name"], $grayfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$grayfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '12'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["gray_imguploader2"])) {

            if(!empty($gray_d["product_img2"])){
                unlink($gray_d["product_img2"]); 
            }
        
            $grayimageFile2 = $_FILES["gray_imguploader2"];
            $grayfileNewName2 = $_FILES["gray_imguploader2"]["name"];
            $grayfile_extension2 = pathinfo($grayfileNewName2, PATHINFO_EXTENSION);
            
                $grayfileName2 = "assets/images/product_images//" . "gray_img2" . uniqid() . "." . $grayfile_extension2;
                move_uploaded_file($grayimageFile2["tmp_name"], $grayfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$grayfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '12'");
               
        } else {
        }
    
    }else{
        // not gray
    }





// black n white color

if(!empty($BnW_clr_variation) || !empty($BnW_xs_qty) || !empty($BnW_s_qty) || !empty($BnW_m_qty) || !empty($BnW_l_qty) || !empty($BnW_xl_qty) || !empty($BnW_xxl_qty) || !empty($BnW_xxxl_qty) || !empty($BnW_4xl_qty) ){

    if(empty($BnW_clr_variation)){
        $BnW_clr_variation = null;
    }else{}
    if(empty($BnW_xs_qty)){
        $BnW_xs_qty = 0;
    }else{}
    if(empty($BnW_s_qty)){
        $BnW_s_qty = 0;
    }else{}
    if(empty($BnW_m_qty)){
        $BnW_m_qty = 0;
    }else{}
    if(empty($BnW_l_qty)){
        $BnW_l_qty = 0;
    }else{}
    if(empty($BnW_xl_qty)){
        $BnW_xl_qty = 0;
    }else{}
    if(empty($BnW_xxl_qty)){
        $BnW_xxl_qty = 0;
    }else{}
    if(empty($BnW_xxxl_qty)){
        $BnW_xxxl_qty = 0;
    }else{}
    if(empty($BnW_4xl_qty)){
        $BnW_4xl_qty = 0;
    }else{}

    
    // Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','13','".$BnW_clr_variation."','".$BnW_xs_qty."','".$BnW_s_qty."','".$BnW_m_qty."','".$BnW_l_qty."','".$BnW_xl_qty."','".$BnW_xxl_qty."','".$BnW_xxxl_qty."','".$BnW_4xl_qty."') ");
    

$BnW = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '13' ");
$BnW_n = $BnW->num_rows;
$BnW_d = $BnW->fetch_assoc();
if($BnW_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$BnW_clr_variation."', 
    `XS` = '".$BnW_xs_qty."', 
    `S` = '".$BnW_s_qty."',
    `M` = '".$BnW_m_qty."', 
    `L` = '".$BnW_l_qty."',
    `XL` = '".$BnW_xl_qty."', 
    `XXL` = '".$BnW_xxl_qty."', 
    `XXXL` = '".$BnW_xxxl_qty."', 
    `4XL` = '".$BnW_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '13' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','13','".$BnW_clr_variation."','".$BnW_xs_qty."','".$BnW_s_qty."','".$BnW_m_qty."','".$BnW_l_qty."','".$BnW_xl_qty."','".$BnW_xxl_qty."','".$BnW_xxxl_qty."','".$BnW_4xl_qty."') ");
}



        if (isset($_FILES["BnW_imguploader1"])) {

            if(!empty($BnW_d["product_img1"])){
                unlink($BnW_d["product_img1"]); 
            }
    
            $BnWimageFile1 = $_FILES["BnW_imguploader1"];
            $BnWfileNewName1 = $_FILES["BnW_imguploader1"]["name"];
            $BnWfile_extension1 = pathinfo($BnWfileNewName1, PATHINFO_EXTENSION);
            
                $BnWfileName1 = "assets/images/product_images//" . "BnW_img1" . uniqid() . "." . $BnWfile_extension1;
                move_uploaded_file($BnWimageFile1["tmp_name"], $BnWfileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$BnWfileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '13'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["BnW_imguploader2"])) {

            if(!empty($BnW_d["product_img2"])){
                unlink($BnW_d["product_img2"]); 
            }
        
            $BnWimageFile2 = $_FILES["BnW_imguploader2"];
            $BnWfileNewName2 = $_FILES["BnW_imguploader2"]["name"];
            $BnWfile_extension2 = pathinfo($BnWfileNewName2, PATHINFO_EXTENSION);
            
                $BnWfileName2 = "assets/images/product_images//" . "BnW_img2" . uniqid() . "." . $BnWfile_extension2;
                move_uploaded_file($BnWimageFile2["tmp_name"], $BnWfileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$BnWfileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '13'");
               
        } else {
        }
    
    }else{
        // not black n white
    }



// white color

if(!empty($white_clr_variation) || !empty($white_xs_qty) || !empty($white_s_qty) || !empty($white_m_qty) || !empty($white_l_qty) || !empty($white_xl_qty) || !empty($white_xxl_qty) || !empty($white_xxxl_qty) || !empty($white_4xl_qty) ){

    if(empty($white_clr_variation)){
        $white_clr_variation = null;
    }else{}
    if(empty($white_xs_qty)){
        $white_xs_qty = 0;
    }else{}
    if(empty($white_s_qty)){
        $white_s_qty = 0;
    }else{}
    if(empty($white_m_qty)){
        $white_m_qty = 0;
    }else{}
    if(empty($white_l_qty)){
        $white_l_qty = 0;
    }else{}
    if(empty($white_xl_qty)){
        $white_xl_qty = 0;
    }else{}
    if(empty($white_xxl_qty)){
        $white_xxl_qty = 0;
    }else{}
    if(empty($white_xxxl_qty)){
        $white_xxxl_qty = 0;
    }else{}
    if(empty($white_4xl_qty)){
        $white_4xl_qty = 0;
    }else{}

    
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$last_id."','14','".$white_clr_variation."','".$white_xs_qty."','".$white_s_qty."','".$white_m_qty."','".$white_l_qty."','".$white_xl_qty."','".$white_xxl_qty."','".$white_xxxl_qty."','".$white_4xl_qty."') ");
    

$white = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product_id0."' AND `color_id` = '14' ");
$white_n = $white->num_rows;
$white_d = $white->fetch_assoc();
if($white_n == 1){
    
    Database::iud("UPDATE `stock` SET `color_variation` = '".$white_clr_variation."', 
    `XS` = '".$white_xs_qty."', 
    `S` = '".$white_s_qty."',
    `M` = '".$white_m_qty."', 
    `L` = '".$white_l_qty."',
    `XL` = '".$white_xl_qty."', 
    `XXL` = '".$white_xxl_qty."', 
    `XXXL` = '".$white_xxxl_qty."', 
    `4XL` = '".$white_4xl_qty."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '14' ");
    
}else{
    Database::iud("INSERT INTO `stock` (`product_id`,`color_id`,`color_variation`,`XS`,`S`,`M`,`L`,`XL`,`XXL`,`XXXL`,`4XL`) VALUES ('".$product_id0."','14','".$white_clr_variation."','".$white_xs_qty."','".$white_s_qty."','".$white_m_qty."','".$white_l_qty."','".$white_xl_qty."','".$white_xxl_qty."','".$white_xxxl_qty."','".$white_4xl_qty."') ");
}


        if (isset($_FILES["white_imguploader1"])) {

            if(!empty($white_d["product_img1"])){
                unlink($white_d["product_img1"]); 
            }
    
            $whiteimageFile1 = $_FILES["white_imguploader1"];
            $whitefileNewName1 = $_FILES["white_imguploader1"]["name"];
            $whitefile_extension1 = pathinfo($whitefileNewName1, PATHINFO_EXTENSION);
            
                $whitefileName1 = "assets/images/product_images//" . "white_img1" . uniqid() . "." . $whitefile_extension1;
                move_uploaded_file($whiteimageFile1["tmp_name"], $whitefileName1);
                
                Database::iud("UPDATE `stock` SET `product_img1` = '".$whitefileName1."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '14'");
                // echo "1";
        } else {

        }
        if (isset($_FILES["white_imguploader2"])) {

            if(!empty($white_d["product_img2"])){
                unlink($white_d["product_img2"]); 
            }
        
            $whiteimageFile2 = $_FILES["white_imguploader2"];
            $whitefileNewName2 = $_FILES["white_imguploader2"]["name"];
            $whitefile_extension2 = pathinfo($whitefileNewName2, PATHINFO_EXTENSION);
            
                $whitefileName2 = "assets/images/product_images//" . "white_img2" . uniqid() . "." . $whitefile_extension2;
                move_uploaded_file($whiteimageFile2["tmp_name"], $whitefileName2);
                Database::iud("UPDATE `stock` SET `product_img2` = '".$whitefileName2."' WHERE `product_id` = '".$product_id0."' AND `color_id` = '14'");
               
        } else {
        }
    
    }else{
        // not white
    }
















// Thumbnail
    if (isset($_FILES["thumbnail_imguploader"])) {

        $thumbnail_data = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '".$product_id0."'");
        $thumbnail_d = $thumbnail_data->fetch_assoc();

        if(!empty($thumbnail_d["code"])){
            unlink($thumbnail_d["code"]); 
        }

        $T_imageFile = $_FILES["thumbnail_imguploader"];
        $fileNewName3 = $_FILES["thumbnail_imguploader"]["name"];
        $T_file_extension = pathinfo($fileNewName3, PATHINFO_EXTENSION);

            $T_fileName = "assets/images/product_images//" . "thumbnail" . uniqid() . "." . $T_file_extension;
            move_uploaded_file($T_imageFile["tmp_name"], $T_fileName);
            Database::iud("UPDATE `product_img` SET `code` = '".$T_fileName."' WHERE `product_id` = '".$product_id0."'");
    } else {
    }


}else{
    echo "Please fill all details";
    Database::iud("DELETE FROM `product` WHERE `id` = '".$last_id."' ");
}







}
