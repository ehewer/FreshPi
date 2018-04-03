<!DOCTYPE html>
<?php
  require_once __DIR__ . '/json_constant.php';
  $response = array();

  if(isset($_POST[TAG_NAME]) && isset($_POST[TAG_PRICE]) && isset($_POST[TAG_EXP])) {
  // Connect to the fridge database
  $db = mysqli_connect('localhost', 'root', '291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
  $name = $_POST[TAG_NAME];
  $unit_price =$_POST[TAG_PRICE];
  $exp_time =$_POST[TAG_EXP];
  // Construct the query
  $query = "INSERT INTO foodlist (" . NAME . "," . unit_price . "," . exp_time . ") VALUES ('" . $name . "','" . $unit_price . "','" . $exp_time ."')";
  // Pass the query to the sql database
  if(mysqli_query($db,$query) === TRUE) {
  $response[TAG_SUCCESS] = 1;
  $response[TAG_MESSAGE] = "insert was a success";
  } else {
  $response[TAG_SUCCESS] = 0;
  $response[TAG_MESSAGE] = "error with query";
  }
  } else {
  $response[TAG_SUCCESS] = 0;
  $response[TAG_MESSAGE] = "Missing fields";
  }
  echo json_encode($response);
?>
