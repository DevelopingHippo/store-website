<?php
session_start();
if(empty($_SESSION["uid"]))
{
    header("location: https://store.thadsander.com/auth/login.php");
    exit();
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt</title>
    <link rel="stylesheet" type="text/css" href="receiptStyle.css" />
</head>
<body>

<?php
# Load Dependencies and print Top Nav Bar
require_once "../php/databaseFunctions.php";
require_once "../php/websiteFunctions.php";
printTopMenu($_SESSION["type"], "none");

# GET CUSTOMER INFORMATION
$username = inputSanitize($_SESSION["uid"]);
$sql = "SELECT firstname,lastname FROM users WHERE username='".$username."';";
$result = queryDatabase($sql);
$row = $result->fetch_assoc();
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$message = "<br>Thank You For Your Purchase ".$firstname." ".$lastname."!<br>";


# GET RECEIPT ID
$receiptSQL = "SELECT MAX(receiptID) AS receiptID FROM purchaseHistory;";
$receiptResult = queryDatabase($receiptSQL);
$receiptRow = $receiptResult->fetch_assoc();
$receiptID = intval($receiptRow["receiptID"]) + 1;

# CHECK USERS CART
$cartSQL = "SELECT productType,cart.productName,price from store,cart WHERE username='".$username."' AND cart.productName=store.productName;";
$cartResult = queryDatabase($cartSQL);
if($cartResult->num_rows > 0)
{
    while ($cartRow = $cartResult->fetch_assoc())
    {
        $productType = $cartRow["productType"];
        $productName = $cartRow["productName"];
        $price = $cartRow["price"];

        # CHECK STOCK AVAILABILITY
        $stockCheckSQL = "SELECT COUNT(productName) AS stock FROM " . $productType . " WHERE productName='" . $productName . "';";
        $stockCheckResult = queryDatabase($stockCheckSQL);
        $stockRow = $stockCheckResult->fetch_assoc();
        $stockCount = intval($stockRow["stock"]);

        if ($stockCount < 2) # If not enough in Stock, print Sorry Message
        {
            echo 'NO MORE ' . $productName . ' SORRY!<br>';
        }
        else
        {
            # GET ITEM SERIAL NUMBER
            $purchaseSerialNumSQL = "SELECT MIN(serialNum) AS serialNum FROM " . $productType . " WHERE productName='" . $productName . "';";
            $serialResult = queryDatabase($purchaseSerialNumSQL);
            $purchaseSerialRow = $serialResult->fetch_assoc();
            $purchaseSerialNum = intval($purchaseSerialRow["serialNum"]);
            $manufacturerSQL = "SELECT manufacturer FROM ".$productType." WHERE productName = '".$productName."';";
            $manufacturerResult = queryDatabase($manufacturerSQL);
            $manufacturerRow = $manufacturerResult->fetch_assoc();
            $manufacturer = $manufacturerRow["manufacturer"];
            # Log Purchase in purchaseHistory
            $deleteProductSQL = "DELETE FROM ".$productType." WHERE serialNum=".$purchaseSerialNum.";";
            queryDatabase($deleteProductSQL);
            $logPurchaseSQL = "INSERT INTO purchaseHistory VALUES (" . $receiptID . ",'" . $username . "','" . $productName . "','".$productType."','" .$manufacturer. "'," . $purchaseSerialNum . "," . $price . ");";
            queryDatabase($logPurchaseSQL);

            if ($productType == "cpu")
            {
                $infoSQL = "SELECT DISTINCT productName,manufacturer,socket,coreCount,coreClock,coreClockBoost FROM " . $productType . " WHERE productName='" . $productName . "';";
                $infoResult = queryDatabase($infoSQL);
                $productInfoRow = $infoResult->fetch_assoc();

                $message = $message . "<br>Product: " . $productName;
                $message = $message . "<br>Manufacturer: " . $productInfoRow["manufacturer"];
                $message = $message . "<br>Socket: " . $productInfoRow["socket"];
                $message = $message . "<br>Core Count: " . $productInfoRow["coreCount"];
                $message = $message . "<br>Core Clock: " . $productInfoRow["coreClock"];
                $message = $message . "<br>Core Clock Boost: " . $productInfoRow["coreClockBoost"];
                $message = $message . "<br>Serial Number: " . $purchaseSerialNum;
                $message = $message . "<br>Price: $" . $price . "<br>";

            }
            else if ($productType == "gpu")
            {
                $infoSQL = "SELECT DISTINCT productName,manufacturer,coreClock,memory,color FROM " . $productType . " WHERE productName='" . $productName . "';";
                $infoResult = queryDatabase($infoSQL);
                $productInfoRow = $infoResult->fetch_assoc();

                $message = $message . "<br>Product: " . $productName;
                $message = $message . "<br>Manufacturer: " . $productInfoRow["manufacturer"];
                $message = $message . "<br>Core Clock: " . $productInfoRow["coreClock"];
                $message = $message . "<br>Memory: " . $productInfoRow["memory"];
                $message = $message . "<br>Color: " . $productInfoRow["color"];
                $message = $message . "<br>Serial Number: " . $purchaseSerialNum;
                $message = $message . "<br>Price: $" . $price . "<br>";
            }
            else if ($productType == "psu")
            {
                $infoSQL = "SELECT DISTINCT productName,manufacturer,wattage,modular,efficiency FROM " . $productType . " WHERE productName='" . $productName . "';";
                $infoResult = queryDatabase($infoSQL);
                $productInfoRow = $infoResult->fetch_assoc();

                $message = $message . "<br>Product: " . $productName;
                $message = $message . "<br>Manufacturer: " . $productInfoRow["manufacturer"];
                $message = $message . "<br>Wattage: " . $productInfoRow["wattage"];
                $message = $message . "<br>Modular: " . $productInfoRow["modular"];
                $message = $message . "<br>Efficiency: " . $productInfoRow["efficiency"] . " Rating";
                $message = $message . "<br>Serial Number: " . $purchaseSerialNum;
                $message = $message . "<br>Price: $" . $price . "<br>";
            }
            else if ($productType == "ram")
            {
                $infoSQL = "SELECT DISTINCT productName,manufacturer,speed,size,amount,color FROM " . $productType . " WHERE productName='" . $productName . "';";
                $infoResult = queryDatabase($infoSQL);
                $productInfoRow = $infoResult->fetch_assoc();

                $message = $message . "<br>Product: " . $productName;
                $message = $message . "<br>Manufacturer: " . $productInfoRow["manufacturer"];
                $message = $message . "<br>Speed: " . $productInfoRow["speed"];
                $message = $message . "<br>Size: " . $productInfoRow["size"];
                $message = $message . "<br>Amount: " . $productInfoRow["amount"];
                $message = $message . "<br>Color: " . $productInfoRow["color"];
                $message = $message . "<br>Serial Number: " . $purchaseSerialNum;
                $message = $message . "<br>Price: $" . $price . "<br>";
            }
            else if ($productType == "motherboard")
            {
                $infoSQL = "SELECT DISTINCT productName,manufacturer,socket,memoryMax,memorySlots,color FROM " . $productType . " WHERE productName='" . $productName . "';";
                $infoResult = queryDatabase($infoSQL);
                $productInfoRow = $infoResult->fetch_assoc();

                $message = $message . "<br>Product: " . $productName;
                $message = $message . "<br>Manufacturer: " . $productInfoRow["manufacturer"];
                $message = $message . "<br>Socket: " . $productInfoRow["socket"];
                $message = $message . "<br>Memory Max: " . $productInfoRow["memoryMax"];
                $message = $message . "<br>Memory Slots: " . $productInfoRow["memorySlots"];
                $message = $message . "<br>Color: " . $productInfoRow["color"];
                $message = $message . "<br>Serial Number: " . $purchaseSerialNum;
                $message = $message . "<br>Price: " . $price . "<br>";
            }
        }
    }
    $purchaseTotalSQL = "SELECT SUM(price) AS total FROM purchaseHistory WHERE receiptID=".$receiptID.";";
    $totalResult = queryDatabase($purchaseTotalSQL);
    $totalRow = $totalResult->fetch_assoc();
    $message = $message . "<br>Total: $" . $totalRow["total"];
    echo $message;

    $clearCart = "DELETE FROM cart WHERE username='".$username."';";
    queryDatabase($clearCart);
}
else
{
    echo "NO ITEMS IN CART TO CHECKOUT";
}
echo '<br><br>';
echo '<a href="store.php">Back To Store</a>';
?>
<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>