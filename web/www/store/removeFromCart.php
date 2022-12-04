<?php
session_start();

require_once "../php/databaseFunctions.php";
$productName = $_POST["productName"];
$username = $_SESSION["uid"];

# Removes 1 item from users cart
$sql = "DELETE FROM cart WHERE username='".$username."' AND productName='".$productName."' LIMIT 1;";
$result = queryDatabase($sql);
header("location: https://store.thadsander.com/store/cart.php");
exit();