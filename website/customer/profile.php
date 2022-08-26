<?php
session_start();

# If user is not a customer then redirect them to Login page
if(empty($_SESSION["uid"]) || ($_SESSION["type"] != "customer"))
{
    header("location: https://store.thadsander.com/auth/login.php");
    exit();
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer</title>
    <link rel="stylesheet" type="text/css" href="customerStyle.css" />
</head>
<body>

<?php
# Load dependencies and Top Nav Bar
require_once "../php/databaseFunctions.php";
require_once "../php/websiteFunctions.php";
printTopMenu($_SESSION["type"], "Profile");

$username = $_SESSION["uid"];
echo '<h1 style="text-align:left;">This is ' . $username . '\'s Profile</h1>';

# Print out Customer Information
$sql = "SELECT username,firstname,lastname,email FROM users WHERE username='" . $username . "';";
$result = queryDatabase($sql);
if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    echo "Username: " . $row["username"] . "<br>";
    echo "Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
}
?>

<a href="update.php">Update Account</a>
<a href="deleteAcc.php">Delete Account</a>

<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>
