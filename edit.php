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
<?php
  $db = mysqli_connect('localhost','root','291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
  ?>

<html lang="en-ca">
<html>
  <head>
    
    <title>Edit - FreshPi</title>
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
	 <a href="http://38.88.74.80/tables.php" class="tab">tables</a>
	 <a href="#title" class="tab active">edit</a>
	 <a href="#about" class="tab">about</a>
       </div>
    </div>

    <div class="content">
      <div id="edit">
	<h3>Add Item To Groceries:</h3>
	<form action="connect/add_grocery_item.php" method="post" class="arial">
	  Name<br>
	  <input type="text" name="name"><br>
	  Quantity<br>
	  <input type="text" name="qty"><br>
	  <input type="submit">
	</form>
	
	<br>
	
	<h3>Add Item To Universal Food List:</h3>
	<form action="connect/add_foodlist.php" method="post" class="arial">
	  Name<br>
	  <input type="text" name="name"><br>
	  Unit Price<br>
	  <input type="text" name="price"><br>
	  Expiry Time<br>
	  <input type="text" name="exp"><br>
	  <input type="submit">
	</form>
      </div>
      
      <div id="foot">
	<hr>
	<p>Group 4<br>UBC, Vancouver, Canada<p>
      </div>
      
    </div>
    <script src="mainScript.js"></script>
  </body>
</html>
