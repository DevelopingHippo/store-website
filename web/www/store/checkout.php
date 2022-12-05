<?php
session_start();
if (!isset($_SESSION["type"]))
{
    $_SESSION["type"] = "";
}

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
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="checkoutStyle.css" />
</head>
<body>
<?php
# Load Dependencies and print Top Nav Bar
require_once "../php/websiteFunctions.php";
require_once "../php/databaseFunctions.php";
printTopMenu($_SESSION["type"], "none");


$username = $_SESSION["uid"];
$sql = "SELECT cart.productName,price FROM cart,store WHERE username = '".$username."' AND cart.productName=store.productName;";
$result = queryDatabase($sql);

if ($result->num_rows == 0)
{
    echo "Nothing in your cart!";
}
else
{
    while ($row = $result->fetch_assoc())
    {
        echo "Product: " . $row["productName"] . " | $" . $row["price"] . "<br>";
    }
    $sql = "SELECT SUM(price) AS total FROM cart,store WHERE username ='".$username."' AND cart.productName=store.productName;";
    $result = queryDatabase($sql);
    $row = $result->fetch_assoc();
    echo "<br>Total: $" . $row["total"];

    $sql = "SELECT firstname,lastname,email FROM users WHERE username='".$username."';";
    $result = queryDatabase($sql);
    $row = $result->fetch_assoc();
    echo '<br><br>Name: '.$row["firstname"]. " " . $row["lastname"] . "<br>Email: " . $row["email"] . "<br>Shipping Address: Fake Address 1234, Houghton, Michigan, United States<br>Payment Method: **** **** **** 1234";
    echo '<br><a href="receipt.php">Checkout</a>';
}
?>


<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>