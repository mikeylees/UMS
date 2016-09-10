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
                            echo "<li><a href='".$_SESSION['prevPage']."'>Back</li>";
                        } else {
                            echo "<li><a href='index.php'>Login</a></li>";
                            echo "<li><a href='Register.php'>Register</a></li>";
                            echo "<li><a href='ForgotPassword.php'>Forgot password </a></li>";
                        }
                    ?>
                    
                </ul>
            </nav>
        </div>
        <div id="Content">
            <div id="PageHeader">
                <h1>Sign Up Users</h1>
            </div>
            <div id="contentLeft"> 
                <h2>Types of users</h2><br/>
                <h6>Admin users <br/> 
                    - Create Update and Delete users <br/>
                    - Access to content
                </h6><br/>
                <h6>Standard Users <br/>
                    - Access to contents</h6>
            </div>
            <div id="contentRight">
                <form id="RegisterForm" method="POST" action="PHP/addUser.php">
                    <table style="width: 400px;">
                        <tr>
                            <td><h6>First Name</h6> <br/> <input type="text" name="FName" class="styleTextField"/></td>
                            <td><h6>Last Name </h6><br/><input type="text" name="LName" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><h6>Email:</h6><br/><input type="email" name="email" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><h6>Username</h6> <br/> <input type="text" name="username" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><h6>Password</h6><br/><input type="password" name="user_password" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submit" value="Register" class="button_Submit"/></td>
                        </tr>
                </form>
            </div>
        </div>
        <div id="Footer"></div>
    </body>
</html>
