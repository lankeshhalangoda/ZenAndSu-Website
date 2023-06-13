<?php
require "connection.php";
$cat_id = $_GET["id"];
// echo $cat_id;


$type_rs = Database::search("SELECT DISTINCT `type`.id,`type`.name FROM category_has_type INNER JOIN `type` ON type.id=category_has_type.type_id INNER JOIN category ON category.id=category_has_type.category_id 
WHERE category_has_type.category_id = '" . $cat_id . "';");
$type_rows = $type_rs->num_rows;
?>
<select class="form-control" id="typeid">
<option value="0">Select product type</option>
    <?php

    for ($x = 0; $x < $type_rows; $x++) {
        $type_d = $type_rs->fetch_assoc();
        $type_id = $type_d["id"];
        $type_name = $type_d["name"];

    ?>
        <option value="<?php echo $type_id; ?>"><?php echo $type_name; ?></option>
    <?php
    }
    ?>

</select>
<?php


?>