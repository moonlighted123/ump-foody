<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','foody');

// get the post records
$payment = $_POST['payment'];
$commission = $_POST['commission'];
$commissionfoody = $_POST['commissionfoody'];
$rider = $_POST['rider'];
$foody = $_POST['foody'];

// database insert SQL code
$sql = "INSERT INTO `calc` ( `payment`, `commission`, `commissionfoody`, `rider`,`foody`) VALUES ( '$payment', '$commission', '$commissionfoody','$rider','$foody')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>