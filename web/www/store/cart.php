<?php
session_start();
if (!isset($_SESSION["type"]))
{
    $_SESSION["type"] = "";
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="cartStyle.css" />
</head>
<body>
<?php
# Load Dependencies and print Top Nav Bar
require_once "../php/databaseFunctions.php";
require_once "../php/websiteFunctions.php";
printTopMenu($_SESSION["type"], "Cart");

$username = $_SESSION["uid"];
echo "<h2>" . $username ."'s Cart</h2>";

$sql = "SELECT cart.productName,price FROM cart,store WHERE username = '".$username."' AND cart.productName=store.productName;";
$result = queryDatabase($sql);
if ($result->num_rows > 0)
{
    echo '<div id="cart">';
    echo '<table>';
    echo '<tr><td><b>Product</b></td><td><b>Price</b></td></tr>';
    while ($row = $result->fetch_assoc())
    {
        echo "<tr><td>" . $row["productName"] . "</td><td><i>$" . $row["price"] . "</i></td><td>". removeFromCartButton($row["productName"]) . "</td></tr>";
    }
    $sql = "SELECT SUM(price) AS total FROM cart,store WHERE username ='".$username."' AND cart.productName=store.productName;";
    $result = queryDatabase($sql);
    $row = $result->fetch_assoc();
    echo "<tr><td><b>Total:</b></td><td><u>$" . $row["total"] . "</u></td>";
    echo '<td><a href="checkout.php"><b>Checkout</b></a></td></tr>';
    echo '</table>';
    echo '</div>';
}
else
{
    echo 'Nothing in your cart!';
}
?>


<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>