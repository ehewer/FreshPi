<!DOCTYPE html>

<?php
  $db = mysqli_connect('localhost','root','291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
  ?>

<html lang="en-ca">
<html>
  <head>
    
    <title>Tables - FreshPi</title>
    <link rel="icon" href="/images/pi.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    
  </head>
  <body id="body">
    
    <div>
      <div id="title">
	<h3 id="title">The World's Best Fridge<br>Vancouver, BC</h3>
      </div>
      <div id="pi">
	<a href="https://www.raspberrypi.org/">
	  <img src="/images/pi.png" alt="Raspberry Pi" id="pi">
	</a>
      </div>
    </div>

    <div id="navbar-spacer">
      <div id="navbar">
	<a href="http://38.88.74.80/" class="tab">home</a>
	<a href="#title" class="tab active">tables</a>
	<a href="http://38.88.74.80/edit.php" class="tab">edit</a>
	<a href="#about" class="tab">about</a>
      </div>
    </div>

    <div class="content">
     <?php
        $query = "SELECT * FROM foodlist";
        mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $total_price = 0.0;

        echo '<table id="database" class="arial">
	<tr id="header">
	  <th onclick="sortFoodlist(0)">ID</th>
	  <th onclick="sortFoodlist(1)">Name</th>
	  <th onclick="sortFoodlist(2)">Unit Price</th>
	  <th onclick="sortFoodlist(3)">Expiry Time</th>
	</tr>';

	// iterate through items and print
	while ($row = mysqli_fetch_array($result)) {
	echo '<tr>
	  <td>'.$row['id'].'</td>
	  <td>'.$row['NAME'].'</td>
	  <td>$'.$row['unit_price'].'</td>
	  <td>'.$row['exp_time'].' days</td>
	</tr>';
	$total_price += floatval($row['unit_price']);
	}
	echo '</table>';
      // close connection
      mysqli_close($db);
     ?>

     <form id="excel" method="post" action="export.php">
       <input type="submit" name="export" class="btn btn-success" value="Export to Excel (.csv)" />
     </form>
    </div>

    <div id="foot">
      <hr>
      <p>Group 4<br>UBC, Vancouver, Canada<p>
    </div>
    
    <script src="mainScript.js"></script>
  </body>
</html>
