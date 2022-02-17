<?php 
session_start();
//check strong password
 function checkStrongPassword($password)
{
     //default flag false
    $upperStatus = false;
    $lowerStatus = false;
    $numberStatus = false;
    $specialStatus = false;
    if (preg_match('/[A-Z]/', $password)) {
        $upperStatus = true;
    }
    if (preg_match('/[a-z]/', $password)) {
        $lowerStatus = true;
    }
    if (preg_match('/[0-9]/', $password)) {
        $numberStatus = true;
    }
    if (preg_match('/[!@#$%^&*]/', $password)) {
        $specialStatus = true;
    }
    //if all contain $status show true or $status show false
    if ($upperStatus == true && $lowerStatus == true && $numberStatus == true && $specialStatus == true) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['registerBtn'])) { //click registerButtton
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($name != "" && $email != "" && $password != "" && $confirmPassword != "") { //input field must fill
        if (strlen($password) >= 6 && strlen($confirmPassword) >= 6) { // must greater than 6
                if ($password == $confirmPassword) {
                    $status = checkStrongPassword($password); // add checkstrongpassword function with user password to $status
                        if ($status) {
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = password_hash($password, PASSWORD_BCRYPT); // password hashing
                            echo "<h1 class=\"center\">Register Success</h1>";
                        } else {
                        echo "<h1 class=\"center\">your password is not strong password!(eg. must contain A-Z,a-z,0-9,!@#$%^&*</h1>";
                        }
                } else {
                echo "<h1 class=\"center\">password not match</h1>";
            }
        } else {
        echo "<h1 class=\"center\">password must be greater then 6</h1>";
    }
} else {
echo "<h1 class=\"center\">need to fill</h1>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <style>
    .center{
        text-align:center;
    }
</style>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row mt-3">
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
                <div class="card">
                    Register
                    <div class="card-body">
                        <form method="POST">
                            <label for="">Name</label>
                            <input class="form-control mb-3" type="text" name="name" required>
                            <label for="">Email</label>
                            <input class="form-control mb-3" type="email" name="email" required>
                            <label for="">Password</label>
                            <input class="form-control mb-3" type="password" name="password" required>
                            <label for="">Confirm Password</label>
                            <input class="form-control mb-3" type="password" name="confirmPassword" required>
                            <button type="submit" class="btn btn-dark text-white float-end mb-3" name="registerBtn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>