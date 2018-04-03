<?php
    // Initialize the reponse array
    $response = array();

    // Include the constants
    require_once __DIR__ . "/json_constant.php";

    if(isset($_POST[TAG_ID]) && isset($_POST[TAG_TABLE])) {
        $db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
        // Store params in variables
        $id = $_POST[TAG_ID];
        $table = $_POST[TAG_TABLE];

        // If table param is invalid, then fail
        if($table !== INSIDE_MY_FRIDGE && $table !== GROCERY) {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "invalid database";
            echo json_encode($response);
            return;
        }

        $query = "DELETE FROM $table WHERE id=$id";

        if(mysqli_query($db,$query) == FALSE) {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "query unsuccessful, check syntax";
        }
        else {
            $response[TAG_SUCCESS] = 1;
            $response[TAG_MESSAGE] = "product was a deleted successfully";
        }
    }
    else {
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = "missing fields";
    }
    echo json_encode($response);
?>