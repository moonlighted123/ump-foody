
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','foody');

// get the post records
$hour = $_POST['hour'];
$wage = $_POST['wage'];
$total = $_POST['total'];



// database insert SQL code
$sql = "INSERT INTO `commision` ( `id`,`hour`, `wage`, `total`) VALUES ('0', '$hour', '$wage', '$total')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>