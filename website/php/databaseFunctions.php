<?php
session_start();
require_once "websiteFunctions.php";

# Return results of SQL query
function queryDatabase($sql)
{
    $conn = mysqli_connect("IP ADDRESS FOR DATABASE","DATABASE User","DATABASE PASSWORD", "DATABASE NAME");
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

# Sanitize input before being added to SQL query
function inputSanitize($input): string
{
    $conn = mysqli_connect("IP ADDRESS FOR DATABASE","DATABASE User","DATABASE PASSWORD", "DATABASE NAME");
    return mysqli_real_escape_string($conn, $input);
}

function addNewProduct($productName, $serialNum)
{

    $productTypeSearch = "SELECT productType FROM store WHERE productName='".$productName."';";
    $typeSearchResult = queryDatabase($productTypeSearch);
    $typeSearchRow = $typeSearchResult->fetch_assoc();
    $productType = $typeSearchRow["productType"];

    $productInfoSQL = "SELECT * FROM ".$productType." WHERE productName='".$productName."';";
    $productInfoResult = queryDatabase($productInfoSQL);
    $productInfoRow = $productInfoResult->fetch_assoc();

    if($productType == "cpu")
    {
        $addProductSQL = "INSERT INTO ".$productType." VALUES ('".$productName."',".$serialNum.",'".$productInfoRow["manufacturer"]."', '".$productInfoRow["socket"]."', ".$productInfoRow["coreCount"].", ".$productInfoRow["coreClock"].", ".$productInfoRow["coreClockBoost"].");";
    }
    else if($productType == "gpu")
    {
        $addProductSQL = "INSERT INTO ".$productType." VALUES ('".$productName."',".$serialNum.",'".$productInfoRow["manufacturer"]."', ".$productInfoRow["coreClock"].", ".$productInfoRow["memory"].", '".$productInfoRow["color"]."');";
    }
    else if($productType == "psu")
    {
        $addProductSQL = "INSERT INTO ".$productType." VALUES ('".$productName."',".$serialNum.",'".$productInfoRow["manufacturer"]."', ".$productInfoRow["wattage"].", '".$productInfoRow["modular"]."', '".$productInfoRow["efficiency"]."');";
    }
    else if($productType == "ram")
    {
        $addProductSQL = "INSERT INTO ".$productType." VALUES ('".$productName."',".$serialNum.",'".$productInfoRow["manufacturer"]."', ".$productInfoRow["speed"].", ".$productInfoRow["size"].", ".$productInfoRow["amount"].", '".$productInfoRow["color"]."');";
    }
    else if($productType == "motherboard")
    {
        $addProductSQL = "INSERT INTO ".$productType." VALUES ('".$productName."',".$serialNum.",'".$productInfoRow["manufacturer"]."', '".$productInfoRow["socket"]."', ".$productInfoRow["memoryMax"].", ".$productInfoRow["memorySlots"].", '".$productInfoRow["color"]."');";
    }
    queryDatabase($addProductSQL);
}

function productSearch($productName): string
{
    $productName = inputSanitize($productName);
    if(!empty($productName))
    {
        $productTypeSQL = "SELECT productType,price FROM store WHERE productName = '".$productName."';";
        $productTypeResult = queryDatabase($productTypeSQL);
        if($productTypeResult->num_rows > 0)
        {
            $productTypeRow = $productTypeResult->fetch_assoc();
            $productType = $productTypeRow["productType"];
            $price = $productTypeRow["price"];
            $productInfoSQL = "SELECT * FROM ".$productType." WHERE productName = '".$productName."';";
            $productInfoResult = queryDatabase($productInfoSQL);
            $productInfoRow = $productInfoResult->fetch_assoc();
            $stockSQL = "SELECT stockCount FROM storeStock WHERE productName = '".$productName."';";
            $stockResult = queryDatabase($stockSQL);
            $stockRow = $stockResult->fetch_assoc();
            $stock = $stockRow["stockCount"];

            if($productType == "cpu")
            {
                echo "<table class='center'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productInfoRow["productName"].'</td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productInfoRow["manufacturer"].'</td></tr>';
                echo '<tr><td><b>Socket:</b></td><td>'.$productInfoRow["socket"].'</td></tr>';
                echo '<tr><td><b>Core Count:</b></td><td>'.$productInfoRow["coreCount"].'</td></tr>';
                echo '<tr><td><b>Core Clock:</b></td><td>'.$productInfoRow["coreClock"].'</td></tr>';
                echo '<tr><td><b>Core Clock Boost:</b></td><td>'.$productInfoRow["coreClockBoost"].'</td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td></tr>';
                echo '<tr><td><b>Stock:</b></td><td>'.$stock.'</td></tr>';
                echo "</table>";
            }
            else if($productType == "gpu")
            {
                echo "<table class='center'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productInfoRow["productName"].'</td></tr>';
                echo '<tr><td><b>Manufacturer</b>:</td><td>'.$productInfoRow["manufacturer"].'</td></tr>';
                echo '<tr><td><b>Core Clock:</b></td><td>'.$productInfoRow["coreClock"].'</td></tr>';
                echo '<tr><td><b>Memory:</b></td><td>'.$productInfoRow["memory"].'</td></tr>';
                echo '<tr><td><b>Color:</b></td><td>'.$productInfoRow["color"].'</td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td></tr>';
                echo '<tr><td><b>Stock:</b></td><td>'.$stock.'</td></tr>';
                echo "</table>";
            }
            else if($productType == "psu")
            {
                echo "<table class='center'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productInfoRow["productName"].'</td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productInfoRow["manufacturer"].'</td></tr>';
                echo '<tr><td><b>Wattage:</b></td><td>'.$productInfoRow["wattage"].'</td></tr>';
                echo '<tr><td><b>Modular:</b></td><td>'.$productInfoRow["modular"].'</td></tr>';
                echo '<tr><td><b>Efficiency:</b></td><td>'.$productInfoRow["efficiency"].'</td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td></tr>';
                echo '<tr><td><b>Stock:</b></td><td>'.$stock.'</td></tr>';
                echo "</table>";
            }
            else if($productType == "ram")
            {
                echo "<table class='center'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productInfoRow["productName"].'</td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productInfoRow["manufacturer"].'</td></tr>';
                echo '<tr><td><b>Speed:</b></td><td>'.$productInfoRow["speed"].'</td></tr>';
                echo '<tr><td><b>Size:</b></td><td>'.$productInfoRow["modular"].'</td></tr>';
                echo '<tr><td><b>Amount:</b></td><td>'.$productInfoRow["amount"].'</td></tr>';
                echo '<tr><td><b>Color:</b></td><td>'.$productInfoRow["color"].'</td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td></tr>';
                echo '<tr><td><b>Stock:</b></td><td>'.$stock.'</td></tr>';
                echo "</table>";
            }
            else if($productType == "motherboard")
            {
                echo "<table class='center'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productInfoRow["productName"].'</td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productInfoRow["manufacturer"].'</td></tr>';
                echo '<tr><td><b>Socket:</b></td><td>'.$productInfoRow["socket"].'</td></tr>';
                echo '<tr><td><b>Memory Max:</b></td><td>'.$productInfoRow["memoryMax"].'</td></tr>';
                echo '<tr><td><b>Memory Slots:</b></td><td>'.$productInfoRow["memorySlots"].'</td></tr>';
                echo '<tr><td><b>Color:</b></td><td>'.$productInfoRow["color"].'</td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td></tr>';
                echo '<tr><td><b>Stock:</b></td><td>'.$stock.'</td></tr>';
                echo "</table>";
            }
            return "productSearchSuccess";
        }
        else
        {
            return "productNotFound";
        }
    }
    return "productSearchFail";
}


function updateProductPrice($productName, $price)
{
    inputSanitize($productName);
    inputSanitize($price);
    if(!empty($productName) && !empty($price))
    {
        $sql = "UPDATE store SET price = ".$price." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
}

function updateProductName($productName, $newProductName): string
{
    $productName = inputSanitize($productName);
    $newProductName = inputSanitize($newProductName);
    if(!empty($productName) && !empty($newProductName))
    {
        $sql = "UPDATE store SET productName = '".$newProductName."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
        return $newProductName;
    }
    return $productName;
}

function updateCpu($productName, $manufacturer, $socket, $coreCount, $coreClock, $coreClockBoost)
{
    inputSanitize($productName);
    inputSanitize($manufacturer);
    inputSanitize($socket);
    inputSanitize($coreCount);
    inputSanitize($coreClock);
    inputSanitize($coreClockBoost);

    if(!empty($manufacturer))
    {
        $sql = "UPDATE cpu SET manufacturer = '".$manufacturer."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($socket))
    {
        $sql = "UPDATE cpu SET socket = '".$socket."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($coreCount))
    {
        $sql = "UPDATE cpu SET coreCount = ".$coreCount." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($coreClock))
    {
        $sql = "UPDATE cpu SET coreClock = ".$coreClock." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($coreClockBoost))
    {
        $sql = "UPDATE cpu SET coreClockBoost = ".$coreClockBoost." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
}

function updateGpu($productName, $manufacturer, $coreClock, $memory, $color)
{
    inputSanitize($productName);
    inputSanitize($manufacturer);
    inputSanitize($coreClock);
    inputSanitize($memory);
    inputSanitize($color);

    if(!empty($manufacturer))
    {
        $sql = "UPDATE gpu SET manufacturer = '".$manufacturer."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($coreClock))
    {
        $sql = "UPDATE gpu SET coreClock = ".$coreClock." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($memory))
    {
        $sql = "UPDATE gpu SET memory = ".$memory." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($color))
    {
        $sql = "UPDATE gpu SET color = '".$color."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
}

function updatePsu($productName, $manufacturer, $wattage, $modular, $efficiency)
{
    inputSanitize($productName);
    inputSanitize($manufacturer);
    inputSanitize($wattage);
    inputSanitize($modular);
    inputSanitize($efficiency);

    if(!empty($manufacturer))
    {
        $sql = "UPDATE psu SET manufacturer = '".$manufacturer."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($wattage))
    {
        $sql = "UPDATE psu SET wattage = ".$wattage." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($modular))
    {
        $sql = "UPDATE psu SET modular = '".$modular."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($efficiency))
    {
        $sql = "UPDATE psu SET efficiency = '".$efficiency."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
}

function updateRam($productName, $manufacturer, $speed, $size, $amount, $color)
{
    inputSanitize($productName);
    inputSanitize($manufacturer);
    inputSanitize($speed);
    inputSanitize($size);
    inputSanitize($amount);
    inputSanitize($color);

    if(!empty($manufacturer))
    {
        $sql = "UPDATE ram SET manufacturer = '".$manufacturer."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($speed))
    {
        $sql = "UPDATE ram SET speed = ".$speed." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($size))
    {
        $sql = "UPDATE ram SET size = ".$size." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($amount))
    {
        $sql = "UPDATE ram SET amount = ".$amount." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($color))
    {
        $sql = "UPDATE ram SET color = '".$color."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
}

function updateMotherboard($productName, $manufacturer, $socket, $memoryMax, $memorySlots, $color)
{
    inputSanitize($productName);
    inputSanitize($manufacturer);
    inputSanitize($socket);
    inputSanitize($memoryMax);
    inputSanitize($memorySlots);
    inputSanitize($color);

    if(!empty($manufacturer))
    {
        $sql = "UPDATE motherboard SET manufacturer = '".$manufacturer."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($socket))
    {
        $sql = "UPDATE motherboard SET socket = '".$socket."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($memoryMax))
    {
        $sql = "UPDATE motherboard SET memoryMax = ".$memoryMax." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($memorySlots))
    {
        $sql = "UPDATE motherboard SET memorySlots = ".$memorySlots." WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
    if(!empty($color))
    {
        $sql = "UPDATE motherboard SET color = '".$color."' WHERE productName = '".$productName."';";
        queryDatabase($sql);
    }
}