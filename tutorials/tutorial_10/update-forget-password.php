<?php
require_once "config.php";
if (isset($_POST['user_password']) && $_POST['reset_link_token'] && $_POST['email']) {
	$emailId = $_POST['email'];
	$token = $_POST['reset_link_token'];
	$user_password = $_POST['user_password'];
	$user_password = md5($user_password);
	//$query = "UPDATE `users` set  `user_password`='" . $user_password . "', `reset_link_token`='" . NULL . "' ,`exp_date`='" . NULL . "' WHERE `email`='" . $emailId . "'";
	//die(var_dump($query));
	$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `reset_link_token`='" . $token . "' and `email`='" . $emailId . "'");
	$row = mysqli_num_rows($query);
	if ($row) {
		$update_query = "UPDATE `users` set `user_password`='{$user_password}', `reset_link_token`=NULL, `exp_date`=NULL WHERE `email`='{$emailId}'";
		mysqli_query($conn, $update_query);
		header('location:index.php');
	} else {
		echo "<p>Something goes wrong. Please try again</p>";
	}
	mysqli_close($conn);
}
