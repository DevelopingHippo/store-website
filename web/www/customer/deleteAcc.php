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
    <title>Delete Account</title>
    <link rel="stylesheet" type="text/css" href="customerStyle.css" />
</head>
<body>

<?php
    # If user is not a customer then redirect them to login
    if(empty($_SESSION["uid"]) || ($_SESSION["type"] != "customer"))
    {
        header("location: /auth/login.php");
        exit();
    }
    require_once "../php/databaseFunctions.php";
    require_once "../php/websiteFunctions.php";
    printTopMenu("customer","none");
?>

<form action="deleteAcc.php" method="POST">
<table>
    <tr>
        <td>Username:</td>
        <td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type="password" name="password1"></td>
    </tr>
    <tr>
        <td>Confirm Password:</td>
        <td><input type="password" name="password2"></td>
    </tr>
    <tr><td></td><td><input type="submit" name="action" value="Confirm Delete"></td></tr>
</table>
</form>

<?php

    # Delete Account Action
    if($_POST["action"] == "Confirm Delete")
    {
        if(!empty($_POST["username"]) && !empty($_POST["password1"]) && !empty($_POST["password2"]) && ($_POST["password1"] == $_POST["password2"]) && ($_POST["username"] == $_SESSION["uid"])) # If Input form is complete
        {
            $username = inputSanitize($_SESSION["uid"]);
            $password = inputSanitize($_POST["password1"]);

            $checkPasswordSQL = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."';";
            $result = queryDatabase($checkPasswordSQL);
            if($result->num_rows == 1) # Check if SQL worked, redirect to Signout
            {
                $deleteSQL = "DELETE FROM users WHERE username='".$username."' AND password='".$password."';";
                queryDatabase($deleteSQL);
                header("Location: /auth/signout.php");
                exit();
            }
        }
        else # Print Status Message
        {
            echo '<span style="color:#DE3737;text-align:center;">Account Delete Failed!</span>';
        }
    }
?>


<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>
