<?php
require "connection.php";

$id = $_GET["id"];

$watch_rs = Database::search("SELECT * FROM `wishlist` WHERE `id`='".$id."'");
$watch_row = $watch_rs->fetch_assoc();

// Delete from watchlist Tbl
Database::iud("DELETE FROM `wishlist` WHERE `id`='".$id."'");

echo "1";

?>