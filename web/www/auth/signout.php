<?php
session_start();
if (!isset($_SESSION["type"]))
{
    $_SESSION["type"] = "";
}

# If uid is set, destroy session
if(isset($_SESSION['uid'])){
    session_destroy();
}

# Redirect to Home page
header("location: /index.php");
exit();