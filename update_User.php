<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS/Layout.css" rel="stylesheet" type="text/css">
        <link href="CSS/Menu.css" rel="stylesheet" type="text/css">
        <title>User Management System</title>
    </head>
    <body>
        <div id="Holder"></div>
        <div id="Header">
            <img src="resources/logo.png"/>
        </div>
        <div id="NavBar">
            <nav>
                <ul>
                    <?php 
                        session_start();
                        if (isset($_SESSION['UserID']))
                        {
                            echo "<li><a href='".$_SESSION['prevPage']."'>Back</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </div>
        <div id="Content">
            <div id="PageHeader">
                <h1>Page Heading </h1>
            </div>
            <div id="contentLeft"> 
                
            </div>
            <div id="contentRight">
                <form method="post" action="PHP/userEdit.php">
                    <table style="width:400px; ">
                        <tr>
                            <td><h6>Select Username:</h6></td>
                            <td><select name="selectedUsername">
                                    <?php
                                    $dataLink = new mysqli("localhost", "admin", "mysql", "users");
                                    if ($dataLink->errno) {
                                        die("Could not connect because" . $dataLink->error);
                                    }
                                    $query = "SELECT * FROM user where ActiveUser = 1";
                                    $result = $dataLink->query($query);
                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row['UserID']."'>" . $row['Username'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><h6>First Name:</h6></td>
                            <td><input type="text" name="fName" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td><h6>Last Name:</h6></td>
                            <td><input type="text" name="lName" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td><h6>Email:</h6></td>
                            <td><input type="email" name="email" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td><h6>Username:</h6></td>
                            <td><input type="text" name="username" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td><h6>Password</h6></td>
                            <td><input type="password" name="password" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td><h6>User Permission Level:</h6></td>
                            <td><select name="UserLevel">
                                    <option value="CV">Current Profile</option>
                                    <option value="0">Standard User</option>
                                    <option value="1">Administrator</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submit" value="Update User"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="Footer"></div>
    </body>
</html>
