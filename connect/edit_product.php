<?php

// Include the JSON constants
require_once __DIR__ . '/json_constant.php';

// Instantiate the repsonse array
$response = array();

if(isset($_POST[TAG_NAME]) && isset($_POST[TAG_QTY]) && isset($_POST[TAG_ID])) {
    // Connect to the fridge database
    $db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');

    // Retrieve params
    $id = $_POST[TAG_ID];
    $name = $_POST[TAG_NAME];
    $qty = $_POST[TAG_QTY];

    $query_end = " WHERE " . TAG_ID . "= '$id'";
    // Set the base of the query
    $query_base = "UPDATE groceries SET ";

    // Create the query
    $query  = $query_base . TAG_NAME . "='$name', " . TAG_QTY . "='$qty'" . $query_end;
    
    // Send it to the database
    if(mysqli_query($db,$query) == FALSE) {
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSGAE] = "query was unsuccessful, check the syntax maybe?";
        echo json_encode($response);
        return;
    }

    $response[TAG_SUCCESS] = 1;
    $response[TAG_MESSAGE] = "object updated correctly";
}
else {
    $response[TAG_SUCCESS] = 0;
    $response[TAG_MESSAGE] = "nothing has been updated, missing fields";
}
// Send the response
echo json_encode($response);
?>