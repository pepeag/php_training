<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP CRUD TUTORIAL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }

        .btn-info {
            margin-right: 20px;
        }

        thead {
            background-color: #ccc;
        }

        th,
        td {
            text-align: center;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>PHP CRUD Tutorial</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left float-left mb-4">Users</h2>
                        <a href="create.php" class="btn btn-primary pull-right float-right mb-4">Add New User</a>
                    </div>
                    <?php
                    // include config file
                    require_once "config.php";

                    // select all users
                    $data = "SELECT * FROM users";
                    //if user table has in db
                    if ($users = mysqli_query($conn, $data)) {
                        if (mysqli_num_rows($users) > 0) {
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Age</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                            while ($user = mysqli_fetch_array($users)) {
                                echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['first_name'] . "</td>
                                            <td>" . $user['last_name'] . "</td>
                                            <td>" . $user['age'] . "</td>
                                            <td>" . $user['email'] . "</td>
                                            <td>" . $user['phone_number'] . "</td>
                                            <td>" . $user['address'] . "</td>
                                            <td>
                                              <a href='edit.php?id=" . $user['id'] . "' title='Edit User'><button class='btn btn-info btn-sm'>edit</button></a>
                                              <a href='delete.php?id=" . $user['id'] . "' title='Delete User' ><button class='btn btn-danger btn-sm'>delete</button></a>
                                            </td>
                                          </tr>";
                            }
                            echo "</tbody>
                                </table>";
                            mysqli_free_result($users);
                        } else {
                            echo "<p class='lead'>There is no data.</p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>