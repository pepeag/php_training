<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once "config.php";

$first_name = $last_name = $age = $email = $user_password = $confirm_password = $phone_number = $address = "";
$first_name_error = $last_name_error = $age_error = $email_error = $password_error = $confirm_password_error = $phone_number_error = $address_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["first_name"]);
    if (empty($firstName)) {
        $first_name_error = "First Name is required.";
    } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $first_name_error = "First Name is invalid.";
    } else {
        $firstName = $firstName;
    }
    $lastName = trim($_POST["last_name"]);
    if (empty($lastName)) {
        $last_name_error = "Last Name is required.";
    } elseif (!filter_var($lastName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $last_name_error = "Last Name is invalid.";
    } else {
        $lastName = $lastName;
    }
    $age = trim($_POST["age"]);
    if (empty($age)) {
        $age_error = "Age is required.";
    } else {
        $age = $age;
    }
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $email_error = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please enter a valid email.";
    } else {
        $email = $email;
    }
    $user_password = trim($_POST["user_password"]);
    if (empty($user_password)) {
        $password_error = "Password is required.";
    } elseif (!filter_var($user_password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $password_error = "Please enter a valid password.";
    } else {
        $user_password = $user_password;
    }
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($confrim_password)) {
        $$confirm_password_error = "Password is required.";
    } elseif (!filter_var($confrim_password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $$confirm_password_error = "Please enter a valid password.";
    } else {
        $confirm_password = $confirm_password;
    }
    if ($user_password !== $confirm_password) {
        echo "<h2 style='color:red'>Retype password again!</h2>";
    }
    $phoneNumber = trim($_POST["phone_number"]);
    if (empty($phoneNumber)) {
        $phone_number_error = "Phone Number is required.";
    } elseif (!filter_var($phoneNumber, FILTER_SANITIZE_NUMBER_INT, array("options" => array("regexp" => "/^[1-9][0-9]{10}$/")))) {
        $phone_number_error_error = "Please enter a valid phone number.";
    } else {
        $phoneNumber = $phoneNumber;
    }

    $address = trim($_POST["address"]);
    if (empty($address)) {
        $address_error = "Address is required.";
    } else {
        $address = $address;
    }
    if (empty($first_name_error) && empty($last_name_error) && empty($email_error) && empty($phone_number_error) && empty($address_error)) {
        $user_password = md5($user_password);
        $sql = "INSERT INTO `users`(`first_name`, `last_name`,`age`, `email`,`user_password`,`phone_number`, `address`) VALUES ('$firstName','$lastName','$age','$email','$user_password','$phoneNumber','$address')";
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something Wrong.Try Again!";
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP CRUD TUTORIAL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Create User</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">

                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($first_name_error)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="">
                            <span class="help-block text-danger"><?php echo $first_name_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($last_name_error)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="">
                            <span class="help-block text-danger"><?php echo $last_name_error; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($age_error)) ? 'has-error' : ''; ?>">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" value="">
                            <span class="help-block text-danger"><?php echo $age_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="">
                            <span class="help-block text-danger"><?php echo $email_error; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                            <label>User Password</label>
                            <input type="password" name="user_password" class="form-control" value="">
                            <span class="help-block text-danger"><?php echo $password_error; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_error)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" value="">
                            <span class="help-block text-danger"><?php echo $confirm_password_error; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_number_error)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="number" name="phone_number" class="form-control" value="">
                            <span class="help-block text-danger"><?php echo $phone_number_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($address_error)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"></textarea>
                            <span class="help-block text-danger"><?php echo $address_error; ?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>