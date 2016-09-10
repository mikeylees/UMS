<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
    if (isset($_SESSION['error'])== FALSE)
    {
        $_SESSION['error']=" ";
    }
    if(isset($_SESSION['UserID']))
    {
        header("Location:profile.php");
    }
?>
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
                    <li><a href="index.php">Login</a></li>
                    <li><a href="Register.php">Register</a></li>
                    <li><a href="ForgotPassword.php">Forgot password </a></li>
                </ul>
            </nav>
        </div>
        <div id="Content">
            <div id="PageHeader">
                <h1>Page Heading </h1>
            </div>
            <div id="contentLeft"> 
                <h2>Your Message here</h2><br/>
                <h6>Your Message</h6>
            </div>
            <div id="contentRight">
                <form id="LoginForm" method="post" action="PHP/findUser.php">
                    <table style="width:400px; ">
                        <tr>
                            <td><h6>Username: </h6> <br/> <input type="text" name="username" autofocus="true"class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><h6>Password:</h6><br/>
                                <input type="password" name="password" class="styleTextField"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Login"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="textarea" name="errorMsg" readonly="true" disabled="true" multiple="true" value="<?php echo $_SESSION['error'];?>" style="width: 400px; height: 100px;color: red;"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="Footer"></div>
    </body>
</html>
