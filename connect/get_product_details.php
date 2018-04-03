<?php
    
// Initialize response array that will be sent back
$response = array();

// Include the constants
require_once __DIR__ . "/json_constant.php";
    
    if(isset($_POST[TAG_ID]) && isset($_POST[TAG_TABLE])) {
        $db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');

        // Retrieve the id
        $id = $_POST[TAG_ID];
        $table = $_POST[TAG_TABLE];

        // If table param is invalid, then fail
        if($table !== INSIDE_MY_FRIDGE && $table !== GROCERY) {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "invalid database";
            echo json_encode($response);
            return;
        }
        
        // Create the query, and call it to the database
        $query = "SELECT * FROM $table WHERE id = '$id'";
        //echo $query;
        $result = mysqli_query($db,$query);

        if($result == FALSE) {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "query failed for some reason";
            echo json_encode($response);
            return;
        }

        $result = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $response[TAG_SUCCESS] = 1;
        $response[TAG_MESSAGE] = "query was a success, returned product details";
        $response[TAG_NAME] = $result[TAG_NAME];
        $response[TAG_QTY] = $result[TAG_QTY];
        $response[TAG_ID] = $id;
    }
    else {
        // If one of the fields is missing
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = "missing fields";
    }
    echo json_encode($response);
    
?>