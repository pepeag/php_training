<?php
require_once "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

require '../mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

if (isset($_POST['password-reset-token']) && $_POST['email']) {
	$emailId = $_POST['email'];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $emailId . "'");
	$row = mysqli_fetch_array($result);

	if ($row) {
		$token = md5($emailId) . rand(10, 9999);
		$expFormat = mktime(
			date("H"),
			date("i"),
			date("s"),
			date("m"),
			date("d") + 1,
			date("Y")
		);

		$expDate = date("Y-m-d H:i:s", $expFormat);

		$update = mysqli_query($conn, "UPDATE users set  user_password='" . $user_password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

		$link = "<a href='http://localhost:8000/reset-password.php?key=" . $emailId . "&token=" . $token . "'>Click To Reset password</a>";

		try {
			$mail = new PHPMailer;
			//$mail->CharSet =  "utf-8";
			$mail->isSMTP();
			// enable SMTP authentication
			$mail->SMTPAuth = true;
			// GMAIL username
			$mail->Username = "pepeag.1995@gmail.com";
			// GMAIL password
			$mail->Password = "your password";
			$mail->SMTPSecure = "ssl";
			$mail->SMTPDebug = 0;
			// sets GMAIL as the SMTP server
			$mail->Host = "smtp.gmail.com";
			// set the SMTP port for the GMAIL server
			$mail->Port = 465;
			$mail->From = 'pepeag.1995@gmail.com';
			$mail->FromName = 'Phyoe Phyoe Aung';
			$mail->addAddress($row['email']);
			//$mail->addCC("cc@example.com");
			$mail->Subject  =  'Testing by PePeAg';
			$mail->isHTML(true);
			$mail->Body    = 'Click On This Link to Reset Password ' . $link . '';
			$mail->Send();

			//var_dump($mail->Send());

			echo "Check Your Email and Click on the link sent to your email";
		} catch (\Exception $e) {
			echo "Mail Error - >" . $e->getMessage();
		}
	} else {
		echo "Invalid Email Address. Go back";
	}
}
