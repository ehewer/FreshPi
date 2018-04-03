<?php
    require_once __DIR__ . '/json_constant.php';
    $response = array();

    if(isset($_POST[TAG_NAME]) && isset($_POST[TAG_QTY]) && isset($_POST[TAG_URL])) {
        // Connect to the fridge database
        $db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
        $name = $_POST[TAG_NAME];
        $qty = $_POST[TAG_QTY];
        $url = $_POST[TAG_URL];

        // Construct the query
        $query = "INSERT INTO inventory (" . TAG_NAME . "," . TAG_QTY . ") VALUES ('" . $name . "','" . $qty . "')";
        // Pass the query to the sql database
        if(mysqli_query($db,$query) === TRUE) {
            $url = str_replace("%20"," ");
            if(unlink($url) === TRUE) {
                $response[TAG_SUCCESS] = 1;
                $response[TAG_MESSAGE] = "all gucci";
            }
            else {
                $response[TAG_SUCCESS] = 0;
                $response[TAG_MESSAGE] = "could not delete image";
            }

        }
        else {
            // The query was unsuccessful
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "error with query";
        }
    }
    else {
        // If not every entry is set
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = "Missing fields";
    }

    // Send the reponse
    echo json_encode($response);
?>