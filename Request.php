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
                <h2>Your Message here</h2><br/>
                <h6>Your Message</h6>
            </div>
            <div id="contentRight"></div>
        </div>
        <div id="Footer"></div>
    </body>
</html>
