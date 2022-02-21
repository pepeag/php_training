<form method="post">
	<h1>QR Code</h1>
	<input type="text" name="name" placeholder="Enter your name">
	<input type="text" name="input_text" placeholder="Enter your text">
	<input class="btn" type="submit" name="submit" value="Generate Qr">
</form>
<style>
	h1 {
		text-align: center;
	}

	form {
		width: 300px;
		margin: 0 auto;
	}

	input {
		width: 100%;
		display: inline-block;
		margin: 10px 0px;
		padding: 10px 0 10px 10px;
	}

	.btn {
		display: inline-block;
		padding: 10px;
	}

	img {
		width: 200px;
	}
</style>
<?php
include "phpqrcode/qrlib.php";
if (isset($_POST['submit'])) {
	$path = 'C:/httpd-2.4.52-win64-VS16/Apache24/htdocs/php_training/tutorials/tutorial_7/image/';
	$file = $path . $_POST['name'] . '.png';
	$input_text = $_POST['input_text'];
	echo "<center><h2>Your Qr Code</h2></center>";
?>
	<center><img src='image/<?php echo $_POST['name'] ?>.png' alt="qrcode"></center>
<?php
	QRcode::png($input_text, $file);
}
?>