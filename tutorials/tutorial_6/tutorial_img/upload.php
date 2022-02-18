<?php
if(isset($_FILES['image']))
                {
                    $img_name = $_FILES['image']['name'];      //getting user uploaded name
                    $img_type = $_FILES['image']['type'];       //getting user uploaded img type
                    $tmp_name = $_FILES['image']['tmp_name'];   //this temporary name is used to save/move file in our folder.
                    
                    // let's explode image and get the last name(extension) like jpg, png
                    $img_explode = explode(".",$img_name);
                    $img_ext = end($img_explode);   //here we get the extension of an user uploaded img file

                    $extension= ['png','jpeg','jpg','gif']; //these are some valid img extension and we are store them in array.
                }?>             