<?php

$input_value = $_GET["v"];
echo $input_value;

if(empty($input_value)){
    echo "1";
}else if($input_value == 0){
    echo "2";
}else{
    echo "3";
}
?>