<?php
$price = $_POST["p"];
$discount = $_POST["d"];

if(empty($price)){
    echo "1";
}else if(empty($discount)){
    echo $price;
}else{
    $selling_price = $price - ($price * ($discount/100));
    echo $selling_price;
}
?>