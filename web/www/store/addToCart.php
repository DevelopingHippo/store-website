<?php
session_start();
if (!isset($_SESSION["type"]))
{
    $_SESSION["type"] = "";
}
require_once "../php/databaseFunctions.php";

if(empty($_SESSION["type"]))
{
    header("location: https://store.thadsander.com/auth/login.php");
    exit();
}

$productName = $_POST["productName"];
$username = $_SESSION["uid"];

# Add entry to cart table with values of username and item
$sql = "INSERT INTO cart VALUES ('".$username."','".$productName."');";
$result = queryDatabase($sql);
header("location: javascript://history.go(-1)");
exit();