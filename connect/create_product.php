<?php
$response = array();
if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['quantity'])
		       && isset($_POST['price']) && isset($_POST['last_bought'])
		       && isset($_POST['rebuy'])) {
$id = $_POST['id'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$last_bought = $_POST['last_bought'];
$rebuy = $_POST['rebuy'];

require_once __DIR__ . 'db_connect.php';
$db = new DB_CONNECT();
$result = mysql_query("INSERT INTO inventory(id, name, quantity, price, last_bought, rebuy)
	VALUES('$id', '$name', '$quantity', '$price', '$last_bought', '$rebuy')");
if ($result) {
$response["success"] = 1;
$response["message"] = "Product successfully created.";
echo json_encode($response);
} else {
$response["success"] = 0;
$response["message"] = "An error occurred.";
echo json_encode($response);
}
} else {
$response["success"] = 0;
$response["message"] = "Required field(s) is missing.";
echo json_encode($response);
}
?>
