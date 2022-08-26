
<?php
# Check if User is an Admin
session_start();
if($_SESSION["admin"] != "true")
{
    header("Location: https://store.thadsander.com/");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="adminStyle.css"/>
</head>
<body>

<?php
# Load Dependencies and Top Menu Nav Bar
require_once "../php/websiteFunctions.php";
require_once "../php/databaseFunctions.php";
require_once "adminFunctions.php";
printTopMenu($_SESSION["type"], "none");
?>

<div class="wrapper">
    <div class="employeePanel">
        <?php
        #Build Employee Panel from adminFunctions.php Functions
        echo '<h2>Employee Panel</h2>';
        echo "<br>Required (*)";
        printAdminEmployeeSearch();
        printAdminEmployeeCreate();
        printAdminEmployeeUpdate();
        printAdminEmployeeDelete();
        ?>
    </div>
    <div class="sqlPanel">
        <?php
        # Build SQL Panel from adminFunctions.php Functions
        echo '<h2>SQL Panel</h2>';
        printAdminSQLPrompt();
        ?>
    </div>
</div>


<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>
</body>
</html>
