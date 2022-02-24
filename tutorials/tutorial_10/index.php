<?php
session_start(); //session starts here
require_once "config.php";
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$user_password = $_POST['user_password'];
	$user_password = md5($user_password);
	if ((!empty($email)) && (!empty($user_password))) {
		$result = "SELECT * FROM users WHERE email='$email'AND user_password='$user_password'";
		$users = mysqli_query($conn, $result);

		if (mysqli_num_rows($users) > 0) {
			header("location: welcome.php");
		} else {
			echo "Something Wrong.Try Again!";
		}
	} else {
		echo "need to fill email or password";
	}
	$_SESSION['email'] = $email;
	mysqli_close($conn);
}
?>

<html>

<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Login</title>
</head>
<style>
	.login-panel {
		text-align: center;
		margin: 0 auto;

	}
</style>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Sign In</h3>
					</div>
					<div class="panel-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" value="" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="user_password" type="password" value="">
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">
							</fieldset>
						</form>
						<a href="reset-pass.php">Reset Password</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>