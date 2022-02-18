<form enctype="multipart/form-data" action="upload.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    Upload this file: <input name="userfile" type="file" required/>
    <input type="text" name="idtest" required value=<?php echo $idtest; ?>>
    <input type="submit" value="Send File" multiple/>
</form>
