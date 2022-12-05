<?php
session_start();
if (!isset($_SESSION["type"]))
{
    $_SESSION["type"] = "";
}

if(($_POST["password1"] !=  $_POST["password2"])) # If Passwords don't match
{
    # Redirect with back with Status Message
    header("location: /customer/update.php?status=badinput");
    exit();
}

require_once "../php/databaseFunctions.php";
$username = $_SESSION["uid"];
$firstname = inputSanitize($_POST["firstname"]);
$lastname = inputSanitize($_POST["lastname"]);
$password = inputSanitize($_POST["password1"]);
$oldpassword = inputSanitize($_POST["oldpassword"]);

# this updates the user's first name
if(!empty($firstname))
{
    $sql = "UPDATE users SET firstname = '" . $firstname ."' WHERE username = '". $username . "';";
    $result = queryDatabase($sql);
}

# this updates the user's last name
if(!empty($lastname))
{
    $sql = "UPDATE users SET lastname = '" . $lastname ."' WHERE username = '". $username . "';";
    $result = queryDatabase($sql);
}

# this updates the user's password if the old password matches the previous password on record
if(!empty($password))
{
    $sql = "SELECT username FROM users WHERE username ='" . $username . "' AND password = '" . $oldpassword . "';";
    $result = queryDatabase($sql);
    if($result->num_rows != 1)
    {
        header("location: /customer/update.php?status=badinput");
        exit();
    }
    $sql = "UPDATE users SET password = '" . $password ."' WHERE username = '". $username . "';";
    $result = queryDatabase($sql);
}

# redirect the user back to the customer profile page
header("location: /customer/profile.php");
exit();