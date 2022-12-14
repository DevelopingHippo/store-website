<?php
session_start();
if (!isset($_SESSION["type"]))
{
    $_SESSION["type"] = "";
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="indexStyle.css" />
</head>

<body>

<?php
# Load Dependencies and print Top Nav Bar
require_once "php/websiteFunctions.php";
printTopMenu($_SESSION["type"], "Home");
?>

<div id="main">
    <h2>Store Info</h2>
    <div id="mainBody">
        <p>This site is a PC Parts Store that has:</p>
        <p><b>Store:</b> Product Searching, Shopping Cart, Checkout, Receipts, and Purchase History</p>
        <p><b>Customer:</b> Customer Registration, Customer Login, Account Updating & Deleting</p>
        <p><b>Employee Management Panel:</b></p>
        <p>Customer(Search, Create, Update, Delete)</p>
        <p>Product(Search, Update, Low Stock Alerts, Restock)</p>
        <p>Order(Search, Update, Refund)</p>
    </div>
</div>

<div id="footer">
   | Welcome to Generic Computer Parts Store |
</div>

</body>
</html>