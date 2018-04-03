<?php
    $response = array();
    require_once __DIR__ . "/json_constant.php";

    // Use this file send through a POST request the name of the table to delete
    // It can be either "inventory" or "groceries", and send the param with the tag "table"

    if(isset($_POST[TAG_TABLE])) {
        $table = $_POST[TAG_TABLE];

        // Connect to the database
        $db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
        $query = "DELETE FROM $table";

        // Check if the query was successful
        if(mysqli_query($db,$query)) {
            $response[TAG_SUCCESS] = 1;
            $response[TAG_MESSAGE] = "the query was a great success boy";
        }
        else {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "query syntax error prob, derin change the query variable";
        }
    }
    else {
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = "missing fields";
    }
    
    echo json_encode($response);
?>