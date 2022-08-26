<?php

function printOverallStats()
{
    # Create Statistic Queries
    $topSellingProductSQL = "SELECT productName, COUNT(productName) topSellerCount FROM purchaseHistory GROUP BY productName ORDER BY topSellerCount DESC LIMIT 1;";
    $topSellingTypeSQL = "SELECT productType, COUNT(productType) topSellerCount FROM purchaseHistory GROUP BY productType ORDER BY topSellerCount DESC LIMIT 1;";
    $topSellingManufacturerSQL = "SELECT manufacturer, COUNT(manufacturer) topSellerCount FROM purchaseHistory GROUP BY manufacturer ORDER BY topSellerCount DESC LIMIT 1;";
    $totalProductsSoldSQL = "SELECT count(serialNum) as totalProductsSold FROM purchaseHistory;";
    $totalSalesSQL = "SELECT sum(price) as totalSales FROM purchaseHistory;";

    # Query Database with Statistic Queries
    $topSellingProductResult = queryDatabase($topSellingProductSQL);
    $topSellingTypeResult = queryDatabase($topSellingTypeSQL);
    $topSellingManufacturerResult = queryDatabase($topSellingManufacturerSQL);
    $totalProductsSoldResult = queryDatabase($totalProductsSoldSQL);
    $totalSalesResult = queryDatabase($totalSalesSQL);

    # Store Results in Variables
    $topSellingProduct = $topSellingProductResult->fetch_assoc();
    $topSellingType = $topSellingTypeResult->fetch_assoc();
    $topSellingManufacturer = $topSellingManufacturerResult->fetch_assoc();
    $totalProductsSold = $totalProductsSoldResult->fetch_assoc();
    $totalSales = $totalSalesResult->fetch_assoc();

    # Print Stats
    echo "<h2>Overall Stats<h2/>";
    echo "<div id='tdBorder'><table class='center'>";
    echo '<tr><td><b>Top Selling Product:</b></td><td>'.$topSellingProduct["productName"].'</td></tr>';
    echo '<tr><td><b>Top Selling Product Type:</b></td><td>'.$topSellingType["productType"].'</td></tr>';
    echo '<tr><td><b>Top Selling Manufacturer:</b></td><td>'.$topSellingManufacturer["manufacturer"].'</td></tr>';
    echo '<tr><td><b>Total Products Sold:</b></td><td>'.$totalProductsSold["totalProductsSold"].'</td></tr>';
    echo '<tr><td><b>Total Sales:</b></td><td>$'.$totalSales["totalSales"].'</td></tr>';
    echo "</table></div>";
}


function printCpuStats()
{
    # Create Statistic Queries
    $topSellingProductSQL = "SELECT productName, COUNT(productName) topSellerCount FROM purchaseHistory WHERE productType = 'cpu' GROUP BY productName ORDER BY topSellerCount DESC LIMIT 1;";
    $topSellingManufacturerSQL = "SELECT manufacturer, COUNT(manufacturer) topSellerCount FROM purchaseHistory WHERE productType = 'cpu'  GROUP BY manufacturer ORDER BY topSellerCount DESC LIMIT 1;";
    $totalProductsSoldSQL = "SELECT count(serialNum) as totalProductsSold FROM purchaseHistory WHERE productType = 'cpu' ;";
    $totalSalesSQL = "SELECT sum(price) as totalSales FROM purchaseHistory WHERE productType = 'cpu' ;";

    # Query Database with Statistic Queries
    $topSellingProductResult = queryDatabase($topSellingProductSQL);
    $topSellingManufacturerResult = queryDatabase($topSellingManufacturerSQL);
    $totalProductsSoldResult = queryDatabase($totalProductsSoldSQL);
    $totalSalesResult = queryDatabase($totalSalesSQL);

    # Store Results in Variables
    $topSellingProduct = $topSellingProductResult->fetch_assoc();
    $topSellingManufacturer = $topSellingManufacturerResult->fetch_assoc();
    $totalProductsSold = $totalProductsSoldResult->fetch_assoc();
    $totalSales = $totalSalesResult->fetch_assoc();

    # Print Stats
    echo "<h2>CPU Stats<h2/>";
    echo "<div id='tdBorder'><table class='center'>";
    echo '<tr><td><b>Top Selling Product:</b></td><td>'.$topSellingProduct["productName"].'</td></tr>';
    echo '<tr><td><b>Top Selling Manufacturer:</b></td><td>'.$topSellingManufacturer["manufacturer"].'</td></tr>';
    echo '<tr><td><b>Total Products Sold:</b></td><td>'.$totalProductsSold["totalProductsSold"].'</td></tr>';
    echo '<tr><td><b>Total Sales:</b></td><td>$'.$totalSales["totalSales"].'</td></tr>';
    echo "</table></div>";
}


function printGpuStats()
{
    # Create Statistic Queries
    $topSellingProductSQL = "SELECT productName, COUNT(productName) topSellerCount FROM purchaseHistory WHERE productType = 'gpu' GROUP BY productName ORDER BY topSellerCount DESC LIMIT 1;";
    $topSellingManufacturerSQL = "SELECT manufacturer, COUNT(manufacturer) topSellerCount FROM purchaseHistory WHERE productType = 'gpu'  GROUP BY manufacturer ORDER BY topSellerCount DESC LIMIT 1;";
    $totalProductsSoldSQL = "SELECT count(serialNum) as totalProductsSold FROM purchaseHistory WHERE productType = 'gpu' ;";
    $totalSalesSQL = "SELECT sum(price) as totalSales FROM purchaseHistory WHERE productType = 'gpu' ;";

    # Query Database with Statistic Queries
    $topSellingProductResult = queryDatabase($topSellingProductSQL);
    $topSellingManufacturerResult = queryDatabase($topSellingManufacturerSQL);
    $totalProductsSoldResult = queryDatabase($totalProductsSoldSQL);
    $totalSalesResult = queryDatabase($totalSalesSQL);

    # Store Results in Variables
    $topSellingProduct = $topSellingProductResult->fetch_assoc();
    $topSellingManufacturer = $topSellingManufacturerResult->fetch_assoc();
    $totalProductsSold = $totalProductsSoldResult->fetch_assoc();
    $totalSales = $totalSalesResult->fetch_assoc();

    # Print Stats
    echo "<h2>GPU Stats<h2/>";
    echo "<div id='tdBorder'><table class='center'>";
    echo '<tr><td><b>Top Selling Product:</b></td><td>'.$topSellingProduct["productName"].'</td></tr>';
    echo '<tr><td><b>Top Selling Manufacturer:</b></td><td>'.$topSellingManufacturer["manufacturer"].'</td></tr>';
    echo '<tr><td><b>Total Products Sold:</b></td><td>'.$totalProductsSold["totalProductsSold"].'</td></tr>';
    echo '<tr><td><b>Total Sales:</b></td><td>$'.$totalSales["totalSales"].'</td></tr>';
    echo "</table></div>";
}

function printPsuStats()
{
    # Create Statistic Queries
    $topSellingProductSQL = "SELECT productName, COUNT(productName) topSellerCount FROM purchaseHistory WHERE productType = 'psu' GROUP BY productName ORDER BY topSellerCount DESC LIMIT 1;";
    $topSellingManufacturerSQL = "SELECT manufacturer, COUNT(manufacturer) topSellerCount FROM purchaseHistory WHERE productType = 'psu'  GROUP BY manufacturer ORDER BY topSellerCount DESC LIMIT 1;";
    $totalProductsSoldSQL = "SELECT count(serialNum) as totalProductsSold FROM purchaseHistory WHERE productType = 'psu' ;";
    $totalSalesSQL = "SELECT sum(price) as totalSales FROM purchaseHistory WHERE productType = 'psu' ;";

    # Query Database with Statistic Queries
    $topSellingProductResult = queryDatabase($topSellingProductSQL);
    $topSellingManufacturerResult = queryDatabase($topSellingManufacturerSQL);
    $totalProductsSoldResult = queryDatabase($totalProductsSoldSQL);
    $totalSalesResult = queryDatabase($totalSalesSQL);

    # Store Results in Variables
    $topSellingProduct = $topSellingProductResult->fetch_assoc();
    $topSellingManufacturer = $topSellingManufacturerResult->fetch_assoc();
    $totalProductsSold = $totalProductsSoldResult->fetch_assoc();
    $totalSales = $totalSalesResult->fetch_assoc();

    # Print Stats
    echo "<h2>PSU Stats<h2/>";
    echo "<div id='tdBorder'><table class='center'>";
    echo '<tr><td><b>Top Selling Product:</b></td><td>'.$topSellingProduct["productName"].'</td></tr>';
    echo '<tr><td><b>Top Selling Manufacturer:</b></td><td>'.$topSellingManufacturer["manufacturer"].'</td></tr>';
    echo '<tr><td><b>Total Products Sold:</b></td><td>'.$totalProductsSold["totalProductsSold"].'</td></tr>';
    echo '<tr><td><b>Total Sales:</b></td><td>$'.$totalSales["totalSales"].'</td></tr>';
    echo "</table></div>";
}

function printRamStats()
{
    # Create Statistic Queries
    $topSellingProductSQL = "SELECT productName, COUNT(productName) topSellerCount FROM purchaseHistory WHERE productType = 'ram' GROUP BY productName ORDER BY topSellerCount DESC LIMIT 1;";
    $topSellingManufacturerSQL = "SELECT manufacturer, COUNT(manufacturer) topSellerCount FROM purchaseHistory WHERE productType = 'ram'  GROUP BY manufacturer ORDER BY topSellerCount DESC LIMIT 1;";
    $totalProductsSoldSQL = "SELECT count(serialNum) as totalProductsSold FROM purchaseHistory WHERE productType = 'ram' ;";
    $totalSalesSQL = "SELECT sum(price) as totalSales FROM purchaseHistory WHERE productType = 'ram' ;";

    # Query Database with Statistic Queries
    $topSellingProductResult = queryDatabase($topSellingProductSQL);
    $topSellingManufacturerResult = queryDatabase($topSellingManufacturerSQL);
    $totalProductsSoldResult = queryDatabase($totalProductsSoldSQL);
    $totalSalesResult = queryDatabase($totalSalesSQL);

    # Store Results in Variables
    $topSellingProduct = $topSellingProductResult->fetch_assoc();
    $topSellingManufacturer = $topSellingManufacturerResult->fetch_assoc();
    $totalProductsSold = $totalProductsSoldResult->fetch_assoc();
    $totalSales = $totalSalesResult->fetch_assoc();

    # Print Stats
    echo "<h2>RAM Stats<h2/>";
    echo "<div id='tdBorder'><table class='center'>";
    echo '<tr><td><b>Top Selling Product:</b></td><td>'.$topSellingProduct["productName"].'</td></tr>';
    echo '<tr><td><b>Top Selling Manufacturer:</b></td><td>'.$topSellingManufacturer["manufacturer"].'</td></tr>';
    echo '<tr><td><b>Total Products Sold:</b></td><td>'.$totalProductsSold["totalProductsSold"].'</td></tr>';
    echo '<tr><td><b>Total Sales:</b></td><td>$'.$totalSales["totalSales"].'</td></tr>';
    echo "</table></div>";
}

function printMotherboardStats()
{
    # Create Statistic Queries
    $topSellingProductSQL = "SELECT productName, COUNT(productName) topSellerCount FROM purchaseHistory WHERE productType = 'motherboard' GROUP BY productName ORDER BY topSellerCount DESC LIMIT 1;";
    $topSellingManufacturerSQL = "SELECT manufacturer, COUNT(manufacturer) topSellerCount FROM purchaseHistory WHERE productType = 'motherboard'  GROUP BY manufacturer ORDER BY topSellerCount DESC LIMIT 1;";
    $totalProductsSoldSQL = "SELECT count(serialNum) as totalProductsSold FROM purchaseHistory WHERE productType = 'motherboard' ;";
    $totalSalesSQL = "SELECT sum(price) as totalSales FROM purchaseHistory WHERE productType = 'motherboard' ;";

    # Query Database with Statistic Queries
    $topSellingProductResult = queryDatabase($topSellingProductSQL);
    $topSellingManufacturerResult = queryDatabase($topSellingManufacturerSQL);
    $totalProductsSoldResult = queryDatabase($totalProductsSoldSQL);
    $totalSalesResult = queryDatabase($totalSalesSQL);

    # Store Results in Variables
    $topSellingProduct = $topSellingProductResult->fetch_assoc();
    $topSellingManufacturer = $topSellingManufacturerResult->fetch_assoc();
    $totalProductsSold = $totalProductsSoldResult->fetch_assoc();
    $totalSales = $totalSalesResult->fetch_assoc();

    # Print Stats
    echo "<h2>Motherboard Stats<h2/>";
    echo "<div id='tdBorder'><table class='center'>";
    echo '<tr><td><b>Top Selling Product:</b></td><td>'.$topSellingProduct["productName"].'</td></tr>';
    echo '<tr><td><b>Top Selling Manufacturer:</b></td><td>'.$topSellingManufacturer["manufacturer"].'</td></tr>';
    echo '<tr><td><b>Total Products Sold:</b></td><td>'.$totalProductsSold["totalProductsSold"].'</td></tr>';
    echo '<tr><td><b>Total Sales:</b></td><td>$'.$totalSales["totalSales"].'</td></tr>';
    echo "</table></div></div>";
}