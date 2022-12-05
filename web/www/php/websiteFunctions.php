<?php
# Print out Site Navigation Menu
function printTopMenu($type, $selected)
{
    echo '<div id="nav">';
    echo "\n";
    if($selected == "Home")
    {
        echo '<a class="selected" href="/index.php">Home</a>';
    }
    else
    {
        echo '<a href="/index.php">Home</a>';
    }
    echo "\n";
    if($selected == "Store")
    {
        echo '<a class="selected" href="/store/store.php">Store</a>';
    }
    else
    {
        echo '<a href="/store/store.php">Store</a>';
    }

    if(!empty($type))
    {
        echo "\n";
        if($selected == "Cart")
        {
            echo '<a class="selected" href="/store/cart.php">&#128722</a>';
        }
        else
        {
            echo '<a href="/store/cart.php">&#128722</a>';
        }
    }

    echo "\n";
    if($type == "customer")
    {
        if($selected == "Profile")
        {
            echo '<a class="selected" href="/customer/profile.php">Profile</a>';
        }
        else
        {
            echo '<a href="/customer/profile.php">Profile</a>';
        }
    }
    else if($type == "employee")
    {
        if($selected == "Profile")
        {
            echo '<a class="selected" href="/employee/panel.php">Employee</a>';
        }
        else
        {
            echo '<a href="/employee/panel.php">Employee</a>';
        }
    }
    else
    {
        if($selected == "Login")
        {
            echo '<a class="selected" href="/auth/login.php">Login&#128272</a>';
        }
        else
        {
            echo '<a href="/auth/login.php">Login&#128272</a>';
        }
    }
    echo "\n";
    if(!empty($type))
    {
        echo '<a href="/auth/signout.php">Signout&#128275</a>';
        echo "\n";
    }
    echo '</div>';
}

# Return HTML formatted POST form for adding item to cart
function addToCartButton($productName): string
{
    return '<form action="../store/addToCart.php" method="POST">
            <input type="hidden" name="productName" value="' .$productName.'">
            <input type="submit" name="submit" value="&#9989">
            </form>';
}

# Return HTML formatted POST form for removing item from cart
function removeFromCartButton($productName): string
{
    return '<form action="../store/removeFromCart.php" method="POST">
            <input type="hidden" name="productName" value="' .$productName.'">
            <input type="submit" name="submit" value="&#10060">
            </form>';
}


function printProductUpdateForm($productName, $productType)
{
    if(!empty($productName) || !empty($productType))
    {
        $productSQL = "SELECT * FROM ".$productType." WHERE productName = '".$productName."';";
        $productResults = queryDatabase($productSQL);
        if($productResults->num_rows > 0)
        {
            $productRow = $productResults->fetch_assoc();
            $priceSQL = "SELECT price FROM store WHERE productName = '".$productName."';";
            $priceResults = queryDatabase($priceSQL);
            $priceRow = $priceResults->fetch_assoc();
            $price = $priceRow["price"];
            if($productType == "cpu")
            {
                echo "<table class='center'>";
                echo "<form action='panel.php' method='POST'>";
                echo '<tr><td><b>Product Name:</b></b></td><td>'.$productRow["productName"].'</td><td><input type="text" name="productNameUpdate"></td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productRow["manufacturer"].'</td><td><input type="text" name="manufacturerUpdate"></td></tr>';
                echo '<tr><td><b>Socket:</b></td><td>'.$productRow["socket"].'</td><td><input type="text" name="socketUpdate"></td></tr>';
                echo '<tr><td><b>Core Count:</b></td><td>'.$productRow["coreCount"].'</td><td><input type="number" name="coreCountUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Core Clock:</b></td><td>'.$productRow["coreClock"].'</td><td><input type="number" name="coreClockUpdate" min="1" step="0.1"></td></tr>';
                echo '<tr><td><b>Core Clock Boost:</b></td><td>'.$productRow["coreClockBoost"].'</td><td><input type="number" name="coreClockBoostUpdate" min="0" step=".1"></td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td><td><input type="number" name="priceUpdate" min="0" step="0.01"></td></tr>';
                echo "</table>";
                echo '<input type="hidden" name="productTypeUpdate" value="cpu">';
                echo '<input type="hidden" name="productNameUpdate" value="'.$productName.'">';
                echo '<tr><td></td><td><input type="submit" name="action" value="Update Product"></td></tr>';
                echo "</form>";
            }
            else if($productType == "gpu")
            {
                echo "<table class='center'>";
                echo "<form action='panel.php' method='POST'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productRow["productName"].'</td><td><input type="text" name="newProductNameUpdate"></td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productRow["manufacturer"].'</td><td><input type="text" name="manufacturerUpdate"></td></tr>';
                echo '<tr><td><b>Core Clock:</b></td><td>'.$productRow["coreClock"].'</td><td><input type="number" name="coreClockUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Memory:</b></td><td>'.$productRow["memory"].'</td><td><input type="number" name="memoryUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Color:</b></td><td>'.$productRow["color"].'</td><td><input type="text" name="colorUpdate"></td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td><td><input type="number" name="priceUpdate" min="0" step="0.01"></td></tr>';
                echo "</table>";
                echo '<input type="hidden" name="productTypeUpdate" value="gpu">';
                echo '<input type="hidden" name="productNameUpdate" value="'.$productName.'">';
                echo '<tr><td></td><td><input type="submit" name="action" value="Update Product"></td></tr>';
                echo "</form>";
            }
            else if($productType == "psu")
            {
                echo "<table class='center'>";
                echo "<form action='panel.php' method='POST'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productRow["productName"].'</td><td><input type="text" name="productNameUpdate"></td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productRow["manufacturer"].'</td><td><input type="text" name="manufacturerUpdate"></td></tr>';
                echo '<tr><td><b>Wattage:</b></td><td>'.$productRow["wattage"].'</td><td><input type="number" name="wattageUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Modular:</b></td><td>'.$productRow["modular"].'</td><td><input type="text" name="modularUpdate"></td></tr>';
                echo '<tr><td><b>Efficiency:</b></td><td>'.$productRow["efficiency"].'</td><td><input type="text" name="efficiencyUpdate"></td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td><td><input type="number" name="priceUpdate" min="0" step="0.01"></td></tr>';
                echo "</table>";
                echo '<input type="hidden" name="productTypeUpdate" value="psu">';
                echo '<input type="hidden" name="productNameUpdate" value="'.$productName.'">';
                echo '<tr><td></td><td><input type="submit" name="action" value="Update Product"></td></tr>';
                echo "</form>";
            }
            else if($productType == "ram")
            {
                echo "<table class='center'>";
                echo "<form action='panel.php' method='POST'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productRow["productName"].'</td><td><input type="text" name="productNameUpdate"></td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productRow["manufacturer"].'</td><td><input type="text" name="manufacturerUpdate"></td></tr>';
                echo '<tr><td><b>Speed:</b></td><td>'.$productRow["speed"].'</td><td><input type="text" name="speedUpdate"></td></tr>';
                echo '<tr><td><b>Size:</b></td><td>'.$productRow["size"].'</td><td><input type="number" name="sizeUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Amount:</b></td><td>'.$productRow["amount"].'</td><td><input type="number" name="amountUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Color:</b></td><td>'.$productRow["color"].'</td><td><input type="text" name="colorUpdate"></td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td><td><input type="number" name="priceUpdate" min="0" step="0.01"></td></tr>';
                echo "</table>";
                echo '<input type="hidden" name="productTypeUpdate" value="ram">';
                echo '<input type="hidden" name="productNameUpdate" value="'.$productName.'">';
                echo '<input type="submit" name="action" value="Update Product">';
                echo "</form>";
            }
            else if($productType == "motherboard")
            {
                echo "<table class='center'>";
                echo "<form action='panel.php' method='POST'>";
                echo '<tr><td><b>Product Name:</b></td><td>'.$productRow["productName"].'</td><td><input type="text" name="productNameUpdate"></td></tr>';
                echo '<tr><td><b>Manufacturer:</b></td><td>'.$productRow["manufacturer"].'</td><td><input type="text" name="manufacturerUpdate"></td></tr>';
                echo '<tr><td><b>Socket:</b></td><td>'.$productRow["socket"].'</td><td><input type="text" name="socketUpdate"></td></tr>';
                echo '<tr><td><b>Memory Max:</b></td><td>'.$productRow["memoryMax"].'</td><td><input type="number" name="memoryMaxUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Memory Slots:</b></td><td>'.$productRow["memorySlots"].'</td><td><input type="number" name="memorySlotsUpdate" min="1"></td></tr>';
                echo '<tr><td><b>Color:</b></td><td>'.$productRow["color"].'</td><td><input type="text" name="colorUpdate"></td></tr>';
                echo '<tr><td><b>Price:</b></td><td>$'.$price.'</td><td><input type="number" name="priceUpdate" min="0" step="0.01"></td></tr>';
                echo "</table>";
                echo '<input type="hidden" name="productTypeUpdate" value="motherboard">';
                echo '<input type="hidden" name="productNameUpdate" value="'.$productName.'">';
                echo '<tr><td></td><td><input type="submit" name="action" value="Update Product"></td></tr>';
                echo "</form>";
            }
        }
    }
}