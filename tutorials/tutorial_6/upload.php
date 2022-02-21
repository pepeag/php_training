<?php

$upload_dir = '' . $_POST['idtest'];
if (!is_dir($upload_dir)) {
    mkdir($upload_dir);
}

if ($_FILES['userfile']['error'] !== UPLOAD_ERR_OK) {
    die('<center><h2 style="color:red">Upload failed with error code! </h2></center>' . $_FILES['userfile']['error']);
}

$info = getimagesize($_FILES['userfile']['tmp_name']);
if ($info === FALSE) {
    die('<center><h2 style="color:red">Unable to determine image type of uploaded file!</h2></center>');
}
if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
    die('<center><h2 style="color:red">Not a gif/jpeg/png!</h2></center>');
}
$upload_file = $upload_dir . "/" . basename($_FILES['userfile']['name']);
echo "<center><h2>Image Upload Successfully.</h2></center>";
move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file);
