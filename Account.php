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
        <link href="CSS/UserTableLayout.css" rel="stylesheet" type="text/css">
        <title>User Management System</title>
    </head>
    <body>
        <?php
        session_start();
        $_SESSION['prevPage']= "Account.php";
        if (!isset($_SESSION['UserID'])&& !isset($_SESSION['usertype'])||$_SESSION['usertype']==0) {
            header("Location:./access_denied.php");
        }
        $dataLink = new mysqli("localhost", "admin", "mysql", "users");
        if ($dataLink->errno) {
            die("Could not connect because" . $dataLink->error);
        }
        $query = "SELECT * From requesttoadmintable where ActiveReq = 1";
        $result = $dataLink->query($query);
        $_SESSION['AdminReqNo'] = $result->num_rows;
        ?>
        <div id="Holder"></div>
        <div id="Header">
            <img src="resources/logo.png"/>
        </div>
        <div id="NavBar">
            <nav>
                <ul>
                    <li><a href="Register.php">Add Users</a></li>
                    <li><a href="update_User.php">Update User</a></li>
                    <li><a href="deactivateUser.php">Delete User </a></li>
                    <li><a href="Request.php">
                            <?php
                            if ($_SESSION['AdminReqNo'] > 0) {
                                echo 'Admin Request (' . $_SESSION['AdminReqNo'] . ')';
                            } else {
                                echo 'Admin Request';
                            }
                            ?>
                        </a></li>
                    <li><a href="PHP/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div id="Content">
            <div id="PageHeader">

            </div>
            <div id="contentLeft">
                <h1><?php
                    $username = $_SESSION['username'];
                    echo 'Welcome, ' . $_SESSION['username'];
                    ?>
                </h1>
                <h6> <?php echo 'You have ' . $_SESSION['AdminReqNo'] . " Admin Requests"; ?></h6>
            </div>
            <div id="contentRight">

                <form>
                    <table>
                        <tr>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                        <?php
                        $dataLink = new mysqli("localhost", "admin", "mysql", "users");
                        if ($dataLink->errno) {
                            die("Could not connect" . $dataLink->error);
                        }
                        $query = "SELECT * From user WHERE ActiveUser = 1";
                        $result = $dataLink->query($query);
                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><h6>" . $row['Username'] . "</h6></td>";
                                echo "<td><h6>" . $row['Fname'] . "</h6></td>";
                                echo "<td><h6>" . $row['Lname'] . "</h6></td>";
                                echo "<td><h6>" . $row['Email'] . "</h6> <input type='hidden' value='" . $row['UserID'] . "'name='userID'/></td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
                </form>
            </div>
        </div>
        <div id="Footer"></div>
    </body>
</html>
