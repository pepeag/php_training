<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-3 ">
        <div class="col-3 text-center">

        <a href="index.php">
            <button class="btn btn-primary text-white mb-3" style="width:200px">Login</button>
        </a>
        <a href="register.php">
            <button class="btn btn-success text-white mb-3" style="width:200px">Register</button>
        </a>
        <a href="logout.php">
            <button class="btn btn-danger text-white mb-3" style="width:200px">Logout</button>
        </a>
        </div>
        <div class="col-6">
            <b class="bg-success form-control text-center">Logout success!</b>
        </div>
        </div>
    </div>
   
</body>
</html>