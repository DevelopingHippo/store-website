<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Store</title>
    <link rel="stylesheet" type="text/css" href="storeStyle.css" />
</head>
<body>

<?php
# Load dependencies and print Top Nav Bar
require_once "../php/websiteFunctions.php";
require_once "../php/databaseFunctions.php";
require_once "../php/storeFunctions.php";
printTopMenu($_SESSION["type"], "Store");
?>
<div id="store">
    <div id="searchbar">
        <table class="center">
        <form action="store.php" method="POST">
            <tr>
                <td>
                    <label>
                        <input size="30" type="text" name="search">
                    </label>
                </td>
                <td>
                    <input type="submit" value="Search">
                </td>
            </tr>
        </table>
    </div>
    <div id="filter">
        <table class="center">
            <tr>
                <td>
                    <label><input type="radio" name="productType" value="cpu">CPU</label>
                </td>
                <td>
                    <label><input type="radio" name="productType" value="gpu">GPU</label>
                </td>
                <td>
                    <label><input type="radio" name="productType" value="ram">RAM</label>
                </td>
                <td>
                    <label><input type="radio" name="productType" value="psu">PSU</label>

                </td>
                <td>
                    <label><input type="radio" name="productType" value="motherboard">Motherboard</label>
                </td>
            </tr>
        </table>
        </form>
    </div>
    <div id="results">
        <table class="center">
            <?php
            if(!isset($_POST["search"])) {
                $_POST["search"] = "";
            }
            if(!isset($_POST["productType"]))
            {
                $_POST["productType"] = "";
            }
            if(!isset($_POST["orderBy"]))
            {
                $_POST["orderBy"] = "";
            }
            searchStoreQuery($_POST["search"], $_POST["productType"], $_POST["orderBy"]);
            ?>
        </table>
    </div>
</div>

<div id="footer">
    | Ethan B. | Thad S. | Brad S. | Andrew M. | Ewan B. | SAT3210 Project Site |
</div>

</body>
</html>