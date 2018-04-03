<?php
    // Intialize the response array
    $response = array();

    // Import the needed constants
    require_once __DIR__ . "/json_constant.php";

    if(isset($_POST[TAG_URL])) {
        // Format the url 
        $url = $_POST[TAG_URL];
        $url = str_replace("%20"," ",$url);
    
        // Attempt to delete the corresponding image
        if(unlink($url) === TRUE) {
            $response[TAG_SUCCESS] = 1;
            $response[TAG_MESSAGE] = "delete was successful";
        }
        else {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "could not delete";
        }
    }
    else {
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = "missing fields";
    }

    // Send the response
    echo json_encode($response);
?>