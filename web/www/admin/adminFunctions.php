<?php
require_once "../php/databaseFunctions.php";
require_once "../php/websiteFunctions.php";


# Employee Search Function used for printing out HTML and handling POST requests
function printAdminEmployeeSearch()
{

    # Print Employee Search POST Form
    echo "<h3>Search</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Username:</td><td><input type="text" name="usernameSearch"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Search Employee"></td></tr>';
    echo "</form>";

    # Search for Employee Action
    if ($_POST["action"] == "Search Employee")
    {
        if (!empty($_POST["usernameSearch"]))
        {
            $username = inputSanitize($_POST["usernameSearch"]);
            $sql = "SELECT username,firstname,lastname,email FROM users WHERE username LIKE '%" . $username . "%' AND type='employee';";
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

    # Print out Status Message
    if ($status == "custSearchFailNoExist")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">User Does Not Exist!</span>';
    }
    else if ($status == "custSearchFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Search Failed!</span>';
    }
}

# Employee Create Function used for printing out HTML and handling POST requests
function printAdminEmployeeCreate()
{

    # Print out Employee Create POST Form
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
    echo '<tr><td></td><td><input type="submit" name="action" value="Create Employee"></td></tr>';
    echo "</form>";

    # Create an Employee Action
    if ($_POST["action"] == "Create Employee")
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
                $sql = "SELECT username FROM users WHERE username='" . $username . "' AND type = 'employee';";
                $result = queryDatabase($sql);
                if ($result->num_rows == 0)
                {
                    $sql = "INSERT INTO users VALUES ('" . $username . "','" . $firstname . "','" . $lastname . "','" . $email . "','" . $password . "','employee',false);";
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

        # Print out Status Message
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

# Update Employee Information Function used for printing out HTML and handling POST requests
function printAdminEmployeeUpdate()
{

    # Print out Employee Update POST Form
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
    echo '<tr><td></td><td><input type="submit" name="action" value="Update Employee"></td></tr>';
    echo "</form>";

    # Update Employee Information Action
    if ($_POST["action"] == "Update Employee")
    {
        if (!empty($_POST["usernameUpdate"]))
        {
            $username = inputSanitize($_POST["usernameUpdate"]);
            $sql = "SELECT username FROM users WHERE username='" . $username . "' AND type = 'employee';";
            $result = queryDatabase($sql);
            if ($result->num_rows > 0)
            {
                if (!empty($_POST["newusernameUpdate"]))
                {
                    $newusername = inputSanitize($_POST["newusernameUpdate"]);
                    $sql = "SELECT username FROM users WHERE username='" . $newusername . "' AND type = 'employee';";
                    $result = queryDatabase($sql);
                    if ($result->num_rows != 0)
                    {
                        $status = "custUpdateFailUsername";
                    }
                    $sql = "UPDATE users SET username='" . $newusername . "' WHERE username='" . $username . "' AND type = 'employee';";
                    queryDatabase($sql);
                    $username = $newusername;
                }
                if (!empty($_POST["firstnameUpdate"]))
                {
                    $firstname = inputSanitize($_POST["firstnameUpdate"]);
                    $sql = "UPDATE users SET firstname='" . $firstname . "' WHERE username='" . $username . "' AND type = 'employee';";
                    queryDatabase($sql);
                }
                if (!empty($_POST["lastnameUpdate"]))
                {
                    $lastname = inputSanitize($_POST["lastnameUpdate"]);
                    $sql = "UPDATE users SET lastname='" . $lastname . "' WHERE username='" . $username . "' AND type = 'employee';";
                    queryDatabase($sql);
                }
                if (!empty($_POST["emailUpdate"]))
                {
                    $email = inputSanitize($_POST["emailUpdate"]);
                    $sql = "UPDATE users SET email='" . $email . "' WHERE username='" . $username . "' AND type = 'employee';";
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
                        $sql = "UPDATE users SET password='" . $password . "' WHERE username='" . $username . "' AND type = 'employee';";
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

    # Print out Status Message
    if ($status == "custUpdateFail")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Update Failed!</span>';
    }
    if ($status == "custUpdateFailNotExist")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">User Does Not Exist!</span>';
    }
    else if ($status == "custUpdateFailUsernameExist")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Username Already Exists!</span>';
    }
    else if ($status == "custUpdateFailPassword")
    {
        echo '<br><span style="color:#DE3737;text-align:center;">Password Does Not Match!</span>';
    }
    else if ($status == "custUpdateSuccess")
    {
        echo '<br><span style="color:#00FF00;text-align:center;">Update Success!</span>';
    }
}

# Delete an Employee Function used for printing out HTML and handling POST requests
function printAdminEmployeeDelete()
{

    # Print out Employee Delete POST Form
    echo "<h3>Delete</h3>";
    echo "<div id='tdBorder'><table class='center'>";
    echo "<form action='panel.php' method='POST'>";
    echo '<tr><td>*Username:</td><td><input type="text" name="username1Delete"></td></tr>';
    echo '<tr><td>*Confirm Username:</td><td><input type="text" name="username2Delete"></td></tr>';
    echo "</table></div>";
    echo '<tr><td></td><td><input type="submit" name="action" value="Delete Employee"></td></tr>';
    echo "</form>";

    # Delete an Employee Action
    if ($_POST["action"] == "Delete Employee")
    {
        if (!empty($_POST["username1Delete"]) && !empty($_POST["username2Delete"]))
        {
            if ($_POST["username1Delete"] == $_POST["username2Delete"])
            {
                $username = inputSanitize($_POST["username1Delete"]);
                $sql = "SELECT username FROM users WHERE username='" . $username . "' AND type = 'employee';";
                $result = queryDatabase($sql);
                if ($result->num_rows == 1)
                {
                    $sql = "DELETE FROM users WHERE username='" . $username . "' AND type = 'employee';";
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

# Admin SQL Prompt used for printing out HTML page and handling POST requests
function printAdminSQLPrompt()
{

    # Print out SQL Prompt POST Form
    echo '<table class="center"><form action="panel.php" method="POST">';
    echo '<tr><td><input size="50" type="text" name="sqlQuery"></td>';
    echo '<td><input type="submit" name="action" value="Query" ></td></tr>';
    echo '</table></form>';

    # Execute SQL Query
    if($_POST["action"] == "Query")
    {
        queryDatabase($_POST["sqlQuery"]);
    }
}
