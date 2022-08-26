<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="registerStyle.css" />
</head>
<body>
<?php
require_once "../php/websiteFunctions.php";
printTopMenu($_SESSION["type"], "none");
?>
<h2 class="center">Customer Registration</h2>
<form action="register_post.php" method="POST">
    <label>
        <table class="center">
            <tr>
                <td>First Name:</td>
                <td>
                    <label>
                        <input type="text" name="firstname">
                    </label>
                </td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td>
                    <label>
                        <input type="text" name="lastname">
                    </label>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                   <label>
                        <input type="text" name="email">
                   </label>
                </td>
            </tr>
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
                        <input type="password" name="password1">
                   </label>
                </td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td>
                    <label>
                        <input type="password" name="password2">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Register">
                </td>
            </tr>
        </table>
</form>
<?php

# Print out Status Message
$status = $_GET["status"];
if($status == "badinput")
{
	echo '<span style="color:#DE3737;text-align:center;">Registeration Failed!</span>';
}
else if($status == "userexists")
{
	echo '<span style="color:#DE3737;text-align:center;">Username already exists!</span>';
}
?>

<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>

