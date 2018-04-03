<?php
    $directory = "images/";
    $images = glob($directory . "*.jpg");
    $result = "";
    foreach($images as $image) {
        $image = str_replace(" ","%20",$image);
        $result .= $image . " ";
    }

    echo $result;
?>