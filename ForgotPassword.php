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
        <script type="text/javascript">
            function ModeSelected()
            {
                var select = document.getElementById("modeChanger");
                var label = document.getElementById("LabelMode");
                if (select === 1)
                {
                    label.innerHTML("<h6>Email</h6>");
                }
            }
        </script>
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
                <h1>Password Recovery Page </h1>
            </div>
            <div id="contentLeft"> 
                <h2>Directions</h2><br/>
                <h6>&diamondsuit; Firstly select the mode of recovery i.e. (Email or Username)</h6><br/>
                <h6>&diamondsuit; Then type the necessary information </h6><br/>
                <h6>&diamondsuit; Then click the submit button  </h6><br/>
            </div>
            <div id="contentRight">
                <form id="LoginForm" method="post" action="PHP/pwdRecovery.php">   
                    <table style="width: 300px;">
                        <tr>
                            <td>
                                <h6>Mode of recovery</h6>
                            </td>
                            <td>
                                <select name="mode" onchange="ModeSelected" id="modeChanger">
                                    <option value="1">Email</option>
                                    <option value="2">Username</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><div id="LabelMode">
                                    <h6>Information:</h6>
                                </div></td>
                                <td><input type="text" name="information" class="styleTextField"/></td>    
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submit" value="Submit" class="button_Submit" style="width: 300px;"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="Footer"></div>
    </body>
</html>
