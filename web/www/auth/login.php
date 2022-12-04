<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css"/>
</head>
<body>
<?php
# Load Required Dependencies and print Top Nav Bar
require_once "../php/websiteFunctions.php";
printTopMenu($_SESSION["type"], "Login");
?>
<div id="login">
<h4>Login</h4>
<form action="loginAuth.php" method="POST">
    <label>
        <table class="center">
            <tr>
                <td>Username:</td>
                <td>
                    <label>
                        <input type="text" name="username">
                    </label>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <label>
                        <input type="password" name="password">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/auth/register.php">Register</a>
                </td>
                <td>
                    <input type="submit" name="submit" value="Login">
                </td>
            </tr>
        </table>
</form>
<?php
# Print out Status Message
$loginStatus = $_GET["status"];
if($loginStatus == "loginfail")
{
    echo '<span style="color:#DE3737;text-align:center;">Login Failed!</span>';
}
?>
</div>

<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>
