<?php
session_start();
require_once "databaseFunctions.php";

function filterProduct($productType): string
{
    if($productType == "cpu")
    {
        $sql = "SELECT DISTINCT productName,price,manufacturer,coreCount,coreClock,coreClockBoost,socket FROM store NATURAL JOIN cpu";
    }
    else if($productType == "gpu")
    {
        $sql = "SELECT DISTINCT productName,price,manufacturer,memory,color,coreClock FROM store NATURAL JOIN gpu";
    }
    else if($productType == "psu")
    {
        $sql = "SELECT DISTINCT productName,price,manufacturer,wattage,modular,efficiency FROM store NATURAL JOIN psu";
    }
    else if($productType == "ram")
    {
        $sql = "SELECT DISTINCT productName,price,manufacturer,speed,size,amount,color FROM store NATURAL JOIN ram";
    }
    else if($productType == "motherboard")
    {
        $sql = "SELECT DISTINCT productName,price,manufacturer,socket,memoryMax,memorySlots,color FROM store NATURAL JOIN motherboard";
    }
    else {
        $sql = "SELECT * FROM store";
    }
    return $sql;
}

function filterSearch($sql, $search)
{
    if(!empty($search))
    {
        $sql = $sql . " WHERE productName LIKE '%" . $search . "%'";
    }
    return $sql;
}
function filterOrderBy($sql, $orderBy) : String
{
    if(!empty($orderBy))
    {
        $sql = $sql . " ORDER BY " . $orderBy;
    }
    return $sql;
}

function formatPrintResults($sql, $productType)
{
    $result = queryDatabase($sql);

    if($productType == "cpu")
    {
        echo "<th><b>Product</b></th><th><b>Manufacturer</b></th><th><b>Socket</b></th><th><b>Core Count</b></th><th><b>Core Clock</b></th><th><b>Core Clock Boost</b></th><th><b>Price</b></th>";
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo    "<tr>
                        <td>".$row["productName"]."</td>
                        <td>".$row["manufacturer"]."</td>
                        <td>".$row["socket"]."</td>
                        <td>".$row["coreCount"]." Cores</td>
                        <td>".$row["coreClock"]."GHz</td>
                        <td>".$row["coreClockBoost"]."GHz</td>
                        <td>$".$row["price"]."</td>
                        <td>".addToCartButton($row["productName"]).'</td>
                        </tr>';
            }
        }
    }
    else if($productType == "gpu")
    {
        echo "<th><b>Product</b></th><th><b>Manufacturer</b></th><th><b>Memory</b></th><th><b>Core Clock</b></th><th><b>Color</b></th><th><b>Price</b></th>";
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo    "<tr>
                        <td>".$row["productName"]."</td>
                        <td>".$row["manufacturer"]."</td>
                        <td>".$row["memory"]."GB</td>
                        <td>".$row["coreClock"]."MHz</td>
                        <td>".$row["color"]."</td>
                        <td>$".$row["price"]."</td>
                        <td>".addToCartButton($row["productName"]).'</td>
                        </tr>';
            }
        }
    }
    else if($productType == "ram")
    {
        echo "<th><b>Product</b></th><th><b>Manufacturer</b></th><th><b>Speed</b></th><th><b>Size</b></th><th><b>Amount</b></th><th><b>Color</b></th><th><b>Price</b></th>";
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo    "<tr>
                        <td>".$row["productName"]."</td>
                        <td>".$row["manufacturer"]."</td>
                        <td>".$row["speed"]."Mhz</td>
                        <td>".$row["size"]."GB</td>
                        <td>x".$row["amount"]."</td>
                        <td>".$row["color"]."</td>
                        <td>$".$row["price"]."</td>
                        <td>".addToCartButton($row["productName"]).'</td>
                        </tr>';
            }
        }
    }
    else if($productType == "psu")
    {
        echo "<th><b>Product</b></th><th><b>Manufacturer</b></th><th><b>Wattage</b></th><th><b>Efficiency</b></th><th><b>Modular</b></th><th><b>Price</b></th>";
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo    "<tr>
                        <td>".$row["productName"]."</td>
                        <td>".$row["manufacturer"]."</td>
                        <td>".$row["wattage"]." Watts</td>
                        <td>".$row["efficiency"]." Rating</td>
                        <td>".$row["modular"]."</td>
                        <td>$".$row["price"]."</td>
                        <td>".addToCartButton($row["productName"]).'</td>
                        </tr>';
            }
        }
    }
    else if($productType == "motherboard")
    {
        echo "<tr><th><b>Product</b></th><th><b>Manufacturer</b></th><th><b>Socket</b></th><th><b>Memory Slots</b></th><th><b>Max Memory</b></th><th><b>Price</b></th></tr>";
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo    "<tr>
                        <td>".$row["productName"]."</td>
                        <td>".$row["manufacturer"]."</td>
                        <td>".$row["socket"]."</td>
                        <td>".$row["memorySlots"]."</td>
                        <td>".$row["memoryMax"]."GB</td>
                        <td>$".$row["price"]."</td>
                        <td>".addToCartButton($row["productName"]).'</td>
                        </tr>';
            }
        }
    }
    else
    {
        echo "<th><b>Product</b></th><th><b>Price</b></th>";
        # Print out items on the page, with AddToCart buttons
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                echo '<tr>';
                echo "<tr><td>" . $row["productName"] . "</td>" . "<td>$" . $row["price"] . "</td><td>" . addToCartButton($row["productName"]) . '</td></tr>';
            }
        }
    }
}

function searchStoreQuery($search, $productType, $orderBy)
{
    $search = inputSanitize($search);
    $productType = inputSanitize($productType);
    $orderBy = inputSanitize($orderBy);
    $sql = filterProduct($productType);
    $sql = filterSearch($sql, $search);
    $sql = filterOrderBy($sql, $orderBy);
    $sql = $sql . ";";
    formatPrintResults($sql, $productType);
}