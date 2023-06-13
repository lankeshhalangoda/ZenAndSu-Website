<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

  $uid = $_SESSION["u"]["id"];
  $cid = $_GET["id"];

  $cartrs = Database::search("SELECT `product_id` FROM `cart` WHERE `id`='" . $cid . "' AND `user_id`= '" . $uid . "'");
  $cf = $cartrs->fetch_assoc();
  $pid = $cf["product_id"];

  Database::iud("DELETE FROM `cart` WHERE `id`='" . $cid . "' AND `user_id` = '" . $uid . "'");

  echo "1";
}
