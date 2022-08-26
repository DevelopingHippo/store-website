<?php
require_once "../php/databaseFunctions.php";
require_once "../php/websiteFunctions.php";

function printCustomerSearch()
{

    # Print Customer Search POST Form
    echo "<h3>Search</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Username:</td><td><input type="text" name="usernameSearch"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Search Customer"></td></tr>';
    echo "</form>";

    # Search Customer Action
    if ($_POST["action"] == "Search Customer")
    {
        if (!empty($_POST["usernameSearch"]))
        {
            $username = inputSanitize($_POST["usernameSearch"]);
            $sql = "SELECT username,firstname,lastname,email FROM users WHERE username LIKE '%" . $username . "%' AND type='customer';";
            $result = queryDatabase($sql);
            if ($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                echo "<div id='tdBorder'><table class='center'><tr><td><b>Username:</b></td><td>" . $row["username"] . "</td></tr><tr><td><b>Firstname:</b></td><td>" . $row["firstname"] . "</td></tr><tr><td><b>Lastname:</b></td><td>" . $row["lastname"] . "</td></tr><tr><td><b>Email:</b></td><td>" . $row["email"] . "</td></tr></table></div>";
            }
            else
            {
                $status = "custSearchFailNoExist";
            }
        }
        else
        {
            $status = "custSearchFail";
        }
    }

    # Print out Status Messages
    if ($status == "custSearchFailNoExist")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">User Does Not Exist!</span>';
    }
    else if ($status == "custSearchFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Search Failed!</span>';
    }
}


function printCustomerCreate()
{

    # Print out Customer Create POST Form
    echo "<h3>Create</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Username:</td><td><input type="text" name="usernameCreate"></td></tr>';
    echo '<tr><td>*First Name:</td><td><input type="text" name="firstnameCreate"></td></tr>';
    echo '<tr><td>*Last Name:</td><td><input type="text" name="lastnameCreate"></td></tr>';
    echo '<tr><td>*Email:</td><td><input type="text" name="emailCreate"></td></tr>';
    echo '<tr><td>*Password:</td><td><input type="password" name="password1Create"></td></tr>';
    echo '<tr><td>*Confirm Password:</td><td><input type="password" name="password2Create"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Create Customer"></td></tr>';
    echo "</form>";

    # Create Customer Action
    if ($_POST["action"] == "Create Customer")
    {
        if (!empty($_POST["usernameCreate"]) && !empty($_POST["firstnameCreate"]) && !empty($_POST["lastnameCreate"]) && !empty($_POST["emailCreate"]) && !empty($_POST["password1Create"]) && !empty($_POST["password2Create"]))
        {
            if ($_POST["password1Create"] == $_POST["password2Create"])
            {
                $username = inputSanitize($_POST["usernameCreate"]);
                $firstname = inputSanitize($_POST["firstnameCreate"]);
                $lastname = inputSanitize($_POST["lastnameCreate"]);
                $email = inputSanitize($_POST["emailCreate"]);
                $password = inputSanitize($_POST["password1Create"]);
                $sql = "SELECT username FROM users WHERE username='" . $username . "' AND type='customer';";
                $result = queryDatabase($sql);
                if ($result->num_rows == 0)
                {
                    $sql = "INSERT INTO users VALUES ('" . $username . "','" . $firstname . "','" . $lastname . "','" . $email . "','" . $password . "','customer',false);";
                    queryDatabase($sql);
                    $status = "custAddSuccess";
                }
                else
                {
                    $status = "custAddFailUsername";
                }
            }
            else
            {
                $status = "custAddFailPassword";
            }
        }
        else
        {
            $status = "custAddFail";
        }

        # Print out Status Messages
        if ($status == "custAddFail")
        {
            echo '<br><span style="color:#DE3737;text-align:center;">Customer Creation Failed!</span>';
        }
        else if ($status == "custAddFailUsername")
        {
            echo '<br><span style="color:#DE3737;text-align:center;">Username Already Exists!</span>';
        }
        else if ($status == "custAddFailPassword")
        {
            echo '<br><span style="color:#DE3737;text-align:center;">Password Does Not match!</span>';
        }
        else if ($status == "custAddSuccess")
        {
            echo '<br><span style="color:#00FF00;text-align:center;">Creation Success!</span>';
        }
    }
}


function printCustomerUpdate()
{

    # Print out Customer Update POST Form
    echo "<h3>Update</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Username:</td><td><input type="text" name="usernameUpdate"></td></tr>';
    echo '<tr><td>New Username:</td><td><input type="text" name="newusernameUpdate"></td></tr>';
    echo '<tr><td>First Name:</td><td><input type="text" name="firstnameUpdate"></td></tr>';
    echo '<tr><td>Last Name:</td><td><input type="text" name="lastnameUpdate"></td></tr>';
    echo '<tr><td>Email:</td><td><input type="text" name="emailUpdate"></td></tr>';
    echo '<tr><td>Password:</td><td><input type="password" name="password1Update"></td></tr>';
    echo '<tr><td>Confirm Password:</td><td><input type="password" name="password2Update"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Update Customer"></td></tr>';
    echo "</form>";

    # Update Customer Action
    if ($_POST["action"] == "Update Customer")
    {
        if (!empty($_POST["usernameUpdate"]))
        {
            $username = inputSanitize($_POST["usernameUpdate"]);
            $sql = "SELECT username FROM users WHERE username='" . $username . "';";
            $result = queryDatabase($sql);
            if ($result->num_rows > 0)
            {
                if (!empty($_POST["newusernameUpdate"]))
                {
                    $newusername = inputSanitize($_POST["newusernameUpdate"]);
                    $sql = "SELECT username FROM users WHERE username='" . $newusername . "';";
                    $result = queryDatabase($sql);
                    if ($result->num_rows != 0)
                    {
                        $status = "custUpdateFailUsername";
                    }
                    $sql = "UPDATE users SET username='" . $newusername . "' WHERE username='" . $username . "' AND type='customer';";
                    queryDatabase($sql);
                    $username = $newusername;
                }
                if (!empty($_POST["firstnameUpdate"]))
                {
                    $firstname = inputSanitize($_POST["firstnameUpdate"]);
                    $sql = "UPDATE users SET firstname='" . $firstname . "' WHERE username='" . $username . "' AND type='customer';";
                    queryDatabase($sql);
                }
                if (!empty($_POST["lastnameUpdate"]))
                {
                    $lastname = inputSanitize($_POST["lastnameUpdate"]);
                    $sql = "UPDATE users SET lastname='" . $lastname . "' WHERE username='" . $username . "' AND type='customer';";
                    queryDatabase($sql);
                }
                if (!empty($_POST["emailUpdate"]))
                {
                    $email = inputSanitize($_POST["emailUpdate"]);
                    $sql = "UPDATE users SET email='" . $email . "' WHERE username='" . $username . "' AND type='customer';";
                    queryDatabase($sql);
                }
                if (!empty($_POST["password1Update"]))
                {
                    if ($_POST["password1Update"] != $_POST["password2Update"])
                    {
                        $status = "custUpdateFailPassword";
                    }
                    else
                    {
                        $password = inputSanitize($_POST["password1Update"]);
                        $sql = "UPDATE users SET password='" . $password . "' WHERE username='" . $username . "' AND type='customer';";
                        queryDatabase($sql);
                    }
                }
                $status = "custUpdateSuccess";
            }
            else
            {
                $status = "custUpdateFailNotExist";
            }
        }
        else
        {
            $status = "custUpdateFail";
        }
    }

    # Print out Status Messages
    if ($status == "custUpdateFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Update Failed!</span>';
    }
    if ($status == "custUpdateFailNotExist")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">User Does Not Exist!</span>';
    } else if ($status == "custUpdateFailUsernameExist")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Username Already Exists!</span>';
    } else if ($status == "custUpdateFailPassword")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Password Does Not Match!</span>';
    } else if ($status == "custUpdateSuccess")
    {
        echo '<br><span style="color:#00FF00;text-align:center;">Update Success!</span>';
    }
}


function printCustomerDelete()
{

    # Print out Customer Delete POST Form
    echo "<h3>Delete</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Username:</td><td><input type="text" name="username1Delete"></td></tr>';
    echo '<tr><td>*Confirm Username:</td><td><input type="text" name="username2Delete"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Delete Customer"></td></tr>';
    echo "</form>";

    # Customer Delete Action
    if ($_POST["action"] == "Delete Customer")
    {
        if (!empty($_POST["username1Delete"]) && !empty($_POST["username2Delete"]))
        {
            if ($_POST["username1Delete"] == $_POST["username2Delete"])
            {
                $username = inputSanitize($_POST["username1Delete"]);
                $sql = "SELECT username FROM users WHERE username='" . $username . "' AND type='customer';";
                $result = queryDatabase($sql);
                if ($result->num_rows == 1)
                {
                    $sql = "DELETE FROM users WHERE username='" . $username . "' AND type='customer';";
                    queryDatabase($sql);
                    $status = "custDeleteSuccess";
                }
                else
                {
                    $status = "custDeleteFailUsernameNoExist";
                }
            }
            else
            {
                $status = "custDeleteFailUsernameMatch";
            }
        }
        else
        {
            $status = "custDeleteFail";
        }
    }

    # Print out Status Messages
    if ($status == "custDeleteFailUsernameNoExist")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Username Does Not Exist!</span>';
    }
    else if ($status == "custDeleteFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Delete Failed!</span>';
    }
    else if ($status == "custDeleteFailUsernameMatch")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Usernames Do Not match!</span>';
    }
    else if ($status == "custDeleteSuccess")
    {
        echo '<br><span style="color:#00FF00;text-align:center;">Delete Success!</span>';
    }
}


function printProductRestock()
{

    # Print Restock Product POST Form
    echo "<h3>Restock</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Product Name:</td><td><input type="text" name="productNameRestock"></td></tr>';
    echo '<tr><td>*Amount:</td><td><input type="number" name="amountRestock" min="1" max="25"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Restock"></td></tr>';
    echo "</form>";

    # Product Restock Action
    if ($_POST["action"] == "Restock")
    {
        if (!empty($_POST["productNameRestock"]) && !empty($_POST["amountRestock"]))
        {
            $productName = inputSanitize($_POST["productNameRestock"]);
            $itemSQL = "SELECT productName,productType FROM store WHERE productName='" . $productName . "';";
            $itemResult = queryDatabase($itemSQL);
            if ($itemResult->num_rows > 0)
            {
                $itemRow = $itemResult->fetch_assoc();
                $productType = $itemRow["productType"];
                $serialNumSQL = "SELECT MAX(serialNum) AS serialNum FROM " . $productType . " WHERE productName='" . $productName . "';";
                $serialNumResult = queryDatabase($serialNumSQL);
                $serialNumRow = $serialNumResult->fetch_assoc();
                $serialNumBase = intval($serialNumRow["serialNum"]);
                if (intval($_POST["amountRestock"]) <= 25 && intval($_POST["amountRestock"]) > 0)
                {
                    for ($x = 0; $x < intval($_POST["amountRestock"]); $x++)
                    {
                        $serialNumBase = $serialNumBase + 1;
                        addNewProduct($productName, $serialNumBase);
                    }
                    $status = "productRestockSuccess";
                }
            }
            else
            {
                $status = "productRestockNameFail";
            }
        }
        else
        {
            $status = "productRestockFail";
        }
    }

    # Print out Status Messages
    if ($status == "productRestockFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Product Restock Fail!</span>';
    }
    else if ($status == "productRestockNameFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Product Does Not Exist!</span>';
    }
    else if ($status == "productRestockSuccess")
    {
        echo '<br><span style="color:#00FF00;text-align:center;">Product Restock Success!</span>';
    }
}

function printProductSearch()
{
    # Print Product Search POST Form
    echo "<h3>Search</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Product Name:</td><td><input type="text" name="searchProductName"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Search Product"></td></tr>';
    echo "</form>";

    # Product Search Action
    if($_POST["action"] == "Search Product")
    {
        $productName = inputSanitize($_POST["searchProductName"]);
        if(!empty($productName)){
            echo "<div id='tdBorder'>";
            $status = productSearch($productName);
            echo "</div>";
        }
        else
        {
            $status = "productSearchFail";
        }
    }

    # Print out Status Messages
    if ($status == "productSearchFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Product Search Failed!</span>';
    }
    else if ($status == "productNotFound")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Product Not Found!</span>';
    }
}

function printProductUpdate()
{
    echo "<h3>Update</h3>";
    echo "<i>2-Step Process</i>";

    # Update Product Action Step 1
    if ($_POST["action"] == "Step 1")
    {
        if (!empty($_POST["updateProductName"]))
        {
            $productName = inputSanitize($_POST["updateProductName"]);
            $productStep1SQL = "SELECT productType FROM store WHERE productName='".$productName."';";
            $step1Result = queryDatabase($productStep1SQL);
            if($step1Result->num_rows > 0)
            {
                $step1Row = $step1Result->fetch_assoc();
                $productType = $step1Row["productType"];
                echo "<div id='tdborder'>";
                printProductUpdateForm($productName, $productType);
                echo "</div>";
            }
            else
            {
                $status = "productNotFound";
            }
        }
        else
        {
            $status = "productNotFound";
        }
    }

    # Update Product Action Step 2
    else if($_POST["action"] == "Update Product")
    {
        $productName = $_POST["productNameUpdate"];
        if(!empty($_POST["newProductNameUpdate"]))
        {
            $productName = updateProductName($_POST["productNameUpdate"], $_POST["newProductNameUpdate"]);
        }
        if(!empty($_POST["priceUpdate"]))
        {
            $price = inputSanitize($_POST["priceUpdate"]);
            updateProductPrice($productName, $price);
        }
        if($_POST["productTypeUpdate"] == "cpu")
        {
            updateCpu($productName, $_POST["manufacturerUpdate"], $_POST["socketUpdate"], $_POST["coreCountUpdate"], $_POST["coreClockUpdate"], $_POST["coreClockBoostUpdate"]);
        }
        else if($_POST["productTypeUpdate"] == "gpu")
        {
            updateGpu($productName, $_POST["manufacturerUpdate"],  $_POST["coreClockUpdate"], $_POST["memoryUpdate"], $_POST["colorUpdate"]);
        }
        else if($_POST["productTypeUpdate"] == "psu")
        {
            updatePsu($productName, $_POST["manufacturerUpdate"], $_POST["wattageUpdate"], $_POST["modularUpdate"], $_POST["efficiencyUpdate"]);
        }
        else if($_POST["productTypeUpdate"] == "ram")
        {
            updateRam($productName, $_POST["manufacturerUpdate"], $_POST["speedUpdate"], $_POST["sizeUpdate"], $_POST["amountUpdate"], $_POST["colorUpdate"]);
        }
        else if($_POST["productTypeUpdate"] == "motherboard")
        {
            updateMotherboard($productName, $_POST["manufacturerUpdate"], $_POST["socketUpdate"], $_POST["memoryMaxUpdate"], $_POST["memorySlotsUpdate"],  $_POST["colorUpdate"]);
        }
        $status = "productUpdateSuccess";
    }

    # Print Update Product Step 1 POST Form
    if($_POST["action"] != "Step 1" || $status == "productNotFound")
    {
        echo "<div id='tdBorder'><table class='center'>";
        echo "<form action='panel.php' method='POST'>";
        echo '<tr><td>*Product Name:</td><td><input type="text" name="updateProductName"></td></tr>';
        echo "</table></div>";
        echo '<tr><td></td><td><input type="submit" name="action" value="Step 1"></td></tr>';
        echo "</form>";
    }

    # Print out Status Messages
    if ($status == "productNotFound")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Product Not Found!</span>';
    }
    else if ($status == "productUpdateSuccess")
    {
        echo '<br><span style="color:#00FF00;text-align:center;">Update Success!</span>';
    }
}

function printProductAlerts()
{
    # Print Product Alerts
    echo "<br><h3>Product Alerts</h3>";
    $sqlStock = "SELECT * FROM storeStock WHERE stockCount < 5 ORDER BY stockCount asc;";
    $stockResults = queryDatabase($sqlStock);
    if ($stockResults->num_rows > 0)
    {
        echo "<div id='productAlerts'><div id='tableBorder'><div id='thBorder'>";
        echo "<table class='center'><th><b>Product</b></th><th><b>Stock</b></th>";

        while ($stockRow = $stockResults->fetch_assoc())
        {
            echo "<tr><td>" . $stockRow["productName"] . "</td><td>" . $stockRow["stockCount"] . "</td></tr>";
        }
        echo "</table>";
        echo "</div></div></div>";
    }
    else
    {
        echo "No Alerts!";
    }
}

function printOrderSearch()
{
    # Print Order Search POST Form
    echo "<h3>Search</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>Username:</td><td><input type="text" name="usernameOrderSearch"></td></tr>';
    echo '<tr><td>Receipt ID:</td><td><input type="number" name="receiptIDOrderSearch" min="0"></td></tr>';
    echo '<tr><td>Serial # :</td><td><input type="number" name="serialNumOrderSearch" min="0"></td></tr>';
    echo '<tr><td>Product Name:</td><td><input type="text" name="productNameOrderSearch"></td></tr>';
    echo '<tr><td>Product Type:</td><td><input type="text" name="productTypeOrderSearch"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Search Order"></td></tr>';
    echo "</form>";

    # Search Order Action
    if ($_POST["action"] == "Search Order")
    {
        $usernameSearch = inputSanitize($_POST["usernameOrderSearch"]);
        $receiptID = inputSanitize($_POST["receiptIDOrderSearch"]);
        $serialNum = inputSanitize($_POST["serialNumOrderSearch"]);
        $productName = inputSanitize($_POST["productNameOrderSearch"]);
        $productType = inputSanitize($_POST["productTypeOrderSearch"]);

        $searchOrderSQL = "SELECT * FROM purchaseHistory WHERE username LIKE '%" . $usernameSearch . "%' AND receiptID LIKE '%" . $receiptID . "%' AND productName LIKE '%" . $productName . "%' AND serialNum LIKE '%" . $serialNum . "%' AND productType LIKE '%" . $productType . "%' ORDER BY receiptID LIMIT 30;";
        $orderSearchResult = queryDatabase($searchOrderSQL);
        if ($orderSearchResult->num_rows > 0)
        {
            echo "<div id='orderTable'><div id='thBorder'><table class='center'><th>Receipt ID</th><th>Username</th><th>Product</th><th>Type</th><th>Serial #</th><th>Price</th>";
            while ($orderSearchRow = $orderSearchResult->fetch_assoc())
            {
                echo "<tr><td>" . $orderSearchRow["receiptID"] . "</td><td>" . $orderSearchRow["username"] . "</td><td>" . $orderSearchRow["productName"] . "</td><td>" . $orderSearchRow["productType"] . "</td><td>" . $orderSearchRow["serialNum"] . "</td><td>$" . $orderSearchRow["price"] . "</td></tr>";
            }
            echo "</table></div></div>";
        }
        else
        {
            $status = "orderSearchFailNothingFound";
        }
    }

    # Print out Status Messages
    if ($status == "orderSearchFailNothingFound")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Nothing Found!</span>';
    }
}


function printOrderUpdate()
{
    # Print Order Update POST Form
    echo "<h3>Update</h3>";
    echo "<i>2-Step Process</i>";

    # Update Order Action
    if ($_POST["action"] == "Find Order")
    {
        $receiptID = inputSanitize($_POST["receiptIDUpdateOrder"]);
        if (!empty($_POST["receiptIDUpdateOrder"]))
        {
            $receiptSQL = "SELECT * FROM purchaseHistory WHERE receiptID = ".$receiptID.";";
            $receiptResult = queryDatabase($receiptSQL);
            if($receiptResult->num_rows > 0)
            {
                $count = 0;
                while($receiptRow = $receiptResult->fetch_assoc())
                {
                    $count = $count + 1;
                    echo "<div id='tableBorder'><table class='center'>";
                    echo "<form action='panel.php' method='POST'>";
                    echo "<tr><td><b>Username:</b></td><td>".$receiptRow["username"]."</td><td><input type='text' name='updateOrderUsername".$count."'></td></tr>";
                    echo "<tr><td><b>Product:</b></td><td>".$receiptRow["productName"]."</td><td><input type='text' name='updateOrderProduct".$count."'></td></tr>";
                    echo "<tr><td><b>Price:</b></td><td>$".$receiptRow["price"]."</td><td><input type='number' name='updateOrderPrice".$count."' min='0' step='0.01'></td></tr>";
                    echo "<input type='hidden' name='serialNum".$count."' value='".$receiptRow["serialNum"]."'>";
                    echo "</table></div>";
                }
                echo "<input type='hidden' name='orderCount' value='".$count."'>";
                echo "<input type='submit' name='action' value='Update Order'><form>";
            }
            else
            {
                $status = "orderUpdateFailNoReceipt";
            }
        }
        else
        {
            $status = "orderUpdateFail";
        }
    }
    else if($_POST["action"] == "Update Order")
    {
        $count = intval($_POST["orderCount"]);
        $statusArray = array();

        for($x = 1; $x <= $count; $x++)
        {
            $serialNum = inputSanitize($_POST["serialNum".$x]);
            $username = inputSanitize($_POST["updateOrderUsername".$x]);
            $productName = inputSanitize($_POST["updateOrderProduct".$x]);
            $price = inputSanitize($_POST["updateOrderPrice".$x]);

            if(!empty($username))
            {
                $checkUsernameSQL = "SELECT username FROM users WHERE username='".$username."';";
                $checkResults = queryDatabase($checkUsernameSQL);
                if($checkResults->num_rows == 1)
                {
                    $updateSQL = "UPDATE purchaseHistory SET username = '" . $username . "' WHERE serialNum =" . $serialNum . ";";
                    queryDatabase($updateSQL);
                    array_push($statusArray, "usernameChangeSuccess");
                }
                else
                {
                    array_push($statusArray, "usernameChangeFail");
                }
            }
            if(!empty($price))
            {
                $priceUpdateSQL = "UPDATE purchaseHistory SET price = ".$price." WHERE serialNum = ".$serialNum.";";
                queryDatabase($priceUpdateSQL);
                array_push($statusArray, "priceChangeSuccess");
            }
            if(!empty($productName))
            {
                $checkProductNameSQL = "SELECT productType FROM store WHERE productName = '".$productName."';";
                $checkProductResult = queryDatabase($checkProductNameSQL);
                if($checkProductResult->num_rows == 1)
                {
                    $checkProductRow = $checkProductResult->fetch_assoc();
                    $productType = $checkProductRow["productType"];

                    $getManufacturerSQL = "SELECT manufacturer FROM ".$productType." WHERE productName = '".$productName."';";
                    $manufacturerResult = queryDatabase($getManufacturerSQL);
                    $manufacturerRow = $manufacturerResult->fetch_assoc();
                    $manufacturer = $manufacturerRow["manufacturer"];

                    $newSerialSQL = "SELECT min(serialNum) AS serialNum FROM ".$productType." WHERE productName = '".$productName."';";
                    $newSerialResult = queryDatabase($newSerialSQL);
                    $newSerialRow = $newSerialResult->fetch_assoc();
                    $newSerialNum = $newSerialRow["serialNum"];

                    $oldProductNameSQL = "SELECT productName from purchaseHistory WHERE serialNum = ".$serialNum.";";
                    $oldProductResult = queryDatabase($oldProductNameSQL);
                    $oldProductNameRow = $oldProductResult->fetch_assoc();

                    addNewProduct($oldProductNameRow["productName"], $serialNum);

                    $updateProductNameSQL = "UPDATE purchaseHistory SET productName = '".$productName."', productType = '".$productType."', manufacturer = '".$manufacturer."', serialNum = ".$newSerialNum." WHERE serialNum = ".$serialNum.";";
                    queryDatabase($updateProductNameSQL);
                    array_push($statusArray, "productChangeSuccess");
                }
                else
                {
                    array_push($statusArray, "productChangeFail");
                }
            }
        }
    }

    # Print out first step if it hasn't been activated or there is an error message
    if($_POST["action"] != "Find Order" || $status == "orderUpdateFail" || $status == "orderUpdateFailNoReceipt")
    {
        echo "<div id='tdBorder'><table class='center'>";
        echo "<form action='panel.php' method='POST'>";
        echo '<tr><td>*Receipt ID:</td><td><input type="number" name="receiptIDUpdateOrder" min="1"></td></tr>';
        echo "</table></div>";
        echo '<tr><td></td><td><input type="submit" name="action" value="Find Order"></td></tr>';
        echo "</form>";
    }

    # Print out Status Messages
    if ($status == "orderUpdateFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Update Failed!</span>';
    }
    else if ($status == "orderUpdateFailNoReceipt")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Receipt ID Not Found!</span>';
    }
    else if ($status == "orderUpdateSuccess")
    {
        echo '<br><span style="color:#00FF00;text-align:center;">Order Update Success!</span>';
    }
    if(!empty($statusArray))
    {
        for($x = 0; $x < count($statusArray); $x++)
        {
            echo "<br>";
            if ($statusArray[$x]  == "productChangeFail")
            {
                echo '<br><span style="color:#DE3737;text-align:center;">Product Change Fail!</span>';
            }
            else if ($statusArray[$x]  == "usernameChangeFail")
            {
                echo '<br><span style="color:#DE3737;text-align:center;">Username Not Found!</span>';
            }
            else if ($statusArray[$x]  == "usernameChangeSuccess")
            {
                echo '<br><span style="color:#00FF00;text-align:center;">Username Update Success!</span>';
            }
            else if ($statusArray[$x]  == "priceChangeSuccess")
            {
                echo '<br><span style="color:#00FF00;text-align:center;">Price Update Success!</span>';
            }
            else if ($statusArray[$x]  == "orderUpdateSuccess")
            {
                echo '<br><span style="color:#00FF00;text-align:center;">Order Update Success!</span>';
            }
            else if ($statusArray[$x] == "productChangeSuccess")
            {
                echo '<br><span style="color:#00FF00;text-align:center;">Product Change Success!</span>';
            }
        }
    }
}

# Order Refund function used for printing out HTML and handling POST requests
function printOrderRefund()
{
    # Print Product Refund POST Form
    echo "<h3>Refund</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Serial # :</td><td><input type="number" name="serialNumOrderRefund" min="0"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Refund Order"></td></tr>';
    echo "</form>";

    # Refund Order Action
    if ($_POST["action"] == "Refund Order")
    {
        if (!empty($_POST["serialNumOrderRefund"]))
        {
            $serialNumRefund = intval(inputSanitize($_POST["serialNumOrderRefund"]));
            $findRefundSQL = "SELECT * FROM purchaseHistory WHERE serialNum=" . $serialNumRefund . ";";
            $resultFindRefund = queryDatabase($findRefundSQL);
            if ($resultFindRefund->num_rows == 1)
            {
                $refundProductRow = $resultFindRefund->fetch_assoc();
                $productName = $refundProductRow["productName"];
                addNewProduct($productName, $serialNumRefund);
                $refundSQL = "DELETE FROM purchaseHistory WHERE serialNum=" . $serialNumRefund . ";";
                queryDatabase($refundSQL);
                $status = "orderRefundSuccess";
            }
            else
            {
                $status = "orderRefundFailNoSerial";
            }
        }
        else
        {
            $status = "orderRefundFail";
        }
    }

    # Print out Status Messages
    if ($status == "orderRefundFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Delete Failed!</span>';
    }
    else if ($status == "orderRefundFailNoSerial")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Serial # Not Found!</span>';
    }
    else if ($status == "orderRefundSuccess")
    {
        echo '<br><span style="color:#00FF00;text-align:center;">Product Refund Success!</span>';
    }
}