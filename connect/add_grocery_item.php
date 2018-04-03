<?php
    require_once __DIR__ . '/json_constant.php';
    $response = array();

    if(isset($_POST[TAG_NAME]) && isset($_POST[TAG_QTY])) {
        // Connect to the fridge database
        $db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
        $name = $_POST[TAG_NAME];
        $qty = $_POST[TAG_QTY];

        // Use the name as the key to the universal food table to fetch the unit_price, price = qty * unit_price
        $query = "SELECT FROM foodlist WHERE NAME = $name";
    

        // Construct the query
        $query = "INSERT INTO groceries (" . TAG_NAME . "," . TAG_QTY . "," . TAG_PRICE . ") VALUES ('" . $name . "','" . $qty . "','" . 1 ."')";
        // Pass the query to the sql database
        if(mysqli_query($db,$query) === TRUE) {
            $response[TAG_SUCCESS] = 1;
            $response[TAG_MESSAGE] = "insert was a success";
        }
        else {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "error with query";
        }
    }
    else {
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = "Missing fields";
    }
    echo json_encode($response);
?>