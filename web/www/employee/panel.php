<?php
session_start();
if (!isset($_SESSION["type"]))
{
    $_SESSION["type"] = "";
}
if($_SESSION["type"] != 'employee')
{
    header("Location: /");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee</title>
    <link rel="stylesheet" type="text/css" href="employeeStyle.css" />
</head>
<body>
<?php
# Load Dependencies and print Top Nav Bar
require_once "../php/websiteFunctions.php";
require_once "../php/databaseFunctions.php";
require_once "employeeFunctions.php";
require_once "statisticFunctions.php";
printTopMenu($_SESSION["type"], "Profile");

$username = $_SESSION["uid"];
echo '<h2 style="text-align:left;">Currently Logged in as: ' . $username . '  ';

if($_SESSION["admin"] == "true")
{
    echo '<a href="../admin/panel.php">Admin Panel</a>';
}
echo "</h2>";
?>
<div class="wrapper">

    <div class="customerPanel">
        <?php
        echo '<h2>Customer Panel</h2>';
        echo "<br>Required (*)";
        printCustomerSearch();
        printCustomerCreate();
        printCustomerUpdate();
        printCustomerDelete();
        ?>
    </div>

    <div class="ordersPanel">
        <?php
        echo '<h2>Customer Orders</h2>';
        echo "<br>Required (*)";
        printOrderUpdate();
        printOrderRefund();
        printOrderSearch();
        ?>
    </div>

    <div class="productPanel">
        <?php
        echo '<h2>Product Panel</h2>';
        echo "<br>Required (*)";
        printProductSearch();
        printProductUpdate();
        printProductRestock();
        printProductAlerts();
        ?>
    </div>
</div>

<div class="statwrapper">
    <div class="overallStatPanel">
        <?php
        printOverallStats();
        ?>
    </div>
    <div class="cpuStatPanel">
        <?php
        printCpuStats();
        ?>
    </div>
    <div class="gpuStatPanel">
        <?php
        printGpuStats();
        ?>
    </div>
    <div class="psuStatPanel">
        <?php
        printPsuStats();
        ?>
    </div>
    <div class="ramStatPanel">
        <?php
        printRamStats();
        ?>
    </div>
    <div class="motherboardStatPanel">
        <?php
        printMotherboardStats();
        ?>
    </div>
</div>

<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>