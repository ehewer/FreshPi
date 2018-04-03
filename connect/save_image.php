<?php

// This script retrieves an image from a post request and writes it to the /image/ directory
define("TAG_FILE","file");
define("TAG_NAME","name");
define("TAG_TMP","tmp_name");

if(isset($_FILES[TAG_FILE][TAG_NAME])) {

	$image = $_FILES[TAG_FILE];
	$name = $_FILES[TAG_FILE][TAG_NAME];
	
	if(move_uploaded_file($image[TAG_TMP],"images/$name")) {
		file_put_contents("images/upload_status.txt","success at uploading $name at \n");	
	}
	else file_put_contents("images/upload_status.txt","UPLOAD ATTACK $name at \n");
}

?>
    