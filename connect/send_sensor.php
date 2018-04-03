<?php
    // get all the images in the folder as an array
    /*
    $directory = "images/";
    $images = glob($directory . "*.jpg");
    
    foreach($images as $image) {
        echo $image;
    }
    */
    if(isset($_POST["data"]) && isset($_POST["name"]))
        file_put_contents("images/".$_POST["name"],$_POST["data"]);
?>