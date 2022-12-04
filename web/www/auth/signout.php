<?php
session_start();

# If uid is set, destroy session
if(isset($_SESSION['uid'])){
    session_destroy();
}

# Redirect to Home page
header("location: /index.php");
exit();