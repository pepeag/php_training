<?php

$uploaddir = 'C:/httpd-2.4.52-win64-VS16/Apache24/htdocs/php_training/tutorials/tutorial_6/tutorial_img/' . $_POST['idtest'];
if (!is_dir($uploaddir)) {
    mkdir($uploaddir);
}
$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['name']);

echo "<center>Image Upload Successfully.</center>";
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
