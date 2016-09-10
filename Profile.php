<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'PHP/DBConnect.php';
if ($Log_Data_Connection->errno) {
    die("Could not connect to the blog database please contact systems for details");
}
$query = "SELECT * FROM topics";
$results = $Log_Data_Connection->query($query);
if (mysqli_num_rows($results) > 0) {
    session_start();
    $_SESSION['topics'] = $results;
}
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS/Layout.css" rel="stylesheet" type="text/css">
        <link href="CSS/Menu.css" rel="stylesheet" type="text/css">
        <link href="CSS/UserTableLayout.css" rel="stylesheet" type="text/css">
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
                    <li><a href="#">View Info</a></li>
                    <li><a href="Blog/addTopic.php">Add Topic</a></li>
                    <li><a href="PHP/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div id="Content">
            <div id="PageHeader">
                <?php
                echo '<h1> Welcome ' . $_SESSION['username'] . '</h1>';
                ?>

            </div>
            <div id="contentLeft"> 
                <h2>Current Topics:</h2><br/>
                <table>
                    <tr>
                        <th>Topics</th>
                        <th>Description</th>
                        <th>Created By</th>
                    </tr>
                    <?php
                    $data = $_SESSION['topics'];

                    while ($row = $data->fetch_assoc()) {
                        echo '<tr>';
                        echo "<td><h6>" . $row['TOPIC_TITTLE'] . "</h6></td>";
                        echo "<td><h6>" . $row['TOPIC_DESC'] . "</h6></td>";
                        $query = "select Username from user where UserID ='" . $row['CREATED_BY'] . "'";
                        $result = $dataLink_userDB->query($query);
                        echo "<td><h6>";
                        while ($rows = $result->fetch_assoc()) {
                            echo $rows['Username'];
                        }
                        echo "</h6></td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>
            <div id="contentRight">
                <form action="Blog/viewInfo.php" method="post">
                    <input type="submit" name="View_submit" value="View Profile Details" style="width: auto;height: 50px;"/>                    
                </form>
            </div>
        </div>
        <div id="Footer">
            <h6>If you are an administrator <a href="Account.php">click here </a>to navigate to your control panel</h6>
        </div>
    </body>
</html>
