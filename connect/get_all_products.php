<?php

// Include the JSON constants
require_once __DIR__ . '/json_constant.php';

// Instantiate the repsonse array
$response = array();

// Connect to the fridge database
$db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');

// Fetch form the inventory table
$query = "SELECT * FROM inventory";
$result = mysqli_query($db, $query) or die ('Error querying database.');

if($result->num_rows != 0) {
      $response[TAG_PRODUCTS] = array();
      // While the result table has entries left, add them to the product array
      while ($row = mysqli_fetch_array($result)) { 
            $product = array();
            $product[TAG_ID] = $row[TAG_ID];
            $product[TAG_NAME] = $row[TAG_NAME];
            $product[TAG_QTY] = $row[TAG_QTY];
            $product[TAG_BOUGHT_DATE] = $row[TAG_BOUGHT_DATE];
            $product[TAG_EXPIRY_DATE] = $row[TAG_EXPIRY_DATE];
            array_push($response[TAG_PRODUCTS], $product);
      }
      $response[TAG_SUCCESS] = 1;
      $response[TAG_MESSAGE] = "Query was a success";
}
else {
      $response[TAG_SUCCESS] = 0;
      $response[TAG_MESSAGE] = "Database was empty";
}
// Send the response
echo json_encode($response);
?>