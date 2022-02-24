<?php
session_start();
if (!$_SESSION['email']) {

    header("Location: login.php"); //redirect to the login page to secure the welcome page without login access.  
}
?>
<html>
<head>
    <title>
        Login Success
    </title>
    <style>
        h1,h2,center{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Login Successful</h1><br>
    <h2><a href="logout.php">Logout here</a> </h2>
</body>
</html>