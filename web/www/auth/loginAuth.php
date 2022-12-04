<?php
session_start();
require_once "../php/databaseFunctions.php";


if(!empty($_POST["username"]) && !empty($_POST["password"])) # If Username and Password NOT empty
{
    $username = inputSanitize($_POST["username"]);
    $password = inputSanitize($_POST["password"]);
}
else # redirect the user to Login page with status message
{
    header("location: /auth/login.php?status=loginfail");
    exit();
}

$sql = "SELECT type,admin FROM users WHERE username='".$username."' AND password='".$password."';";
$result = queryDatabase($sql);

if ($result->num_rows == 1) # If query comes back with results
{
    $row = $result->fetch_assoc();
    if($row["type"] == "customer") # If user is a Customer set SESSION values and redirect to Customer Profile page
    {
        $_SESSION["uid"] = $username;
        $_SESSION["type"] = "customer";
        header("location: /customer/profile.php");
    }
    else if($row["type"] == "employee") # If user is an Employee set SESSION values and redirect to Employee Panel page
    {
        $_SESSION["uid"] = $username;
        $_SESSION["type"] = "employee";
        if($row["admin"] == "1")
        {
            $_SESSION["admin"] = "true";
        }
        header("location: /employee/panel.php");
    }
}
else # redirect the user to Login page with status message
{
    header("location: /auth/login.php?status=loginfail");
}
exit();