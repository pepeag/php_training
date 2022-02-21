<form method="post" action="upload.php">
	<h1>QR Code</h1>
	<input type="text" name="name" placeholder="Enter your name" required>
	<input type="text" name="input_text" placeholder="Enter your data" required>
	<input class="btn" type="submit" name="submit" value="Generate Qr Code">
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
</style>
