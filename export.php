<?php
  $db = mysqli_connect('localhost','root','291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');

  if(isset($_POST["export"])){
  $delimiter = ",";
  $query = "SELECT * FROM foodlist";
  $filename = "freshpi_" . date('Y-m-d') . ".csv";
  
  $f = fopen('php://memory', 'w'); // create file pointer

  // set column headers
  $fields = array('I.D.', 'Name', 'Unit Price', 'Expiry Time');
  fputcsv($f, $fields, $delimiter);

  // write rows as .csv format
  $result = mysqli_query($db, $query);
  while($row = mysqli_fetch_array($result)) {
  $lineData = array($row['id'], $row['NAME'], $row['unit_price'], $row['exp_time']);
  fputcsv($f, $lineData, $delimiter);
  }

  fseek($f, 0);
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="' . $filename . '";');
  fpassthru($f);
  }
  exit;
  ?>
