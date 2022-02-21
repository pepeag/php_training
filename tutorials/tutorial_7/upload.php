<?php
include "phpqrcode/qrlib.php";

if (isset($_POST['submit'])) {
	$path = 'image/';
	$file = $path . $_POST['name'] . '.png';
	$input_text = $_POST['input_text'];
	echo "<center><h2>Your Qr Code</h2></center>";
	if($file!=='' && $input_text !==''){
?>
	<center><img style="width: 200px;" src='image/<?php echo $_POST['name'] ?>.png'></center>
<?php
	}
  else{
    echo "<center>Name or Data Field is required!</center>";
  }
	QRcode::png($input_text, $file);
}

?>