<form enctype="multipart/form-data" action="upload.php" method="POST">
    <h1>Image Upload</h1>
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    <div class="input-group">
    <label>Upload this file:</lable>
    <input name="userfile" type="file" required/>
    </div>  
    <div class="input-group">
    <label>Folder Name :</lable>
    <input type="text" name="idtest" required>
    </div>
    <div class="input-btn">
    <input type="submit" value="Send File" multiple/>
    </div>
</form>
<style>
form{
    width: 400px;
    margin: 0 auto;
}
.input-group{
    margin: 20px 0;
}
.input-btn{
    margin-top: 30px;
    margin-left: 100px;
}
</style>    