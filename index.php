<!DOCTYPE html>

<?php
  $db = mysqli_connect('localhost','root','291#4NienGGCol5', 'fridge') or die('Error connecting to MySQL server.');
  ?>

<html lang="en-ca">
<html>
  <head>
    
    <title>FreshPi</title>
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
      <a href="#title" class="tab active">home</a>
      <a href="http://38.88.74.80/tables.php" class="tab">tables</a>
      <a href="http://38.88.74.80/edit.php" class="tab">edit</a>
      <a href="#about" class="tab">about</a>
    </div>
    </div>

    <div class="content">
      
      <div id="kitchen">
	<img src="/images/kitchen.jpeg" alt="Kitchen" id="kitchen_image">
	<div id="kitchen_text" class="center">Welcome to FreshPi</div>
      </div>

      <div id="intro">
	<h2>FreshPi is a food management system for your home using a Raspberry Pi and a LAMP server</h2>
	<p>Using a revolutionary item scanning system, state-of-the-art sensors, and easy-to-manage data tables, you can make the most out of your kitchen. Check your fridge inventory while at the grocery store, add a new favourite food to your list, and budget your spending using unit pricing tools. It's all here.</p>
      </div>
    </div>

    <div id="foot">
      <hr>
      <p>Group 4<br>UBC, Vancouver, Canada<p>
    </div>
    
    <script src="mainScript.js"></script>
  </body>
</html>
