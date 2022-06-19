
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','foody');

// get the post records
$total = $_POST['total'];
$date = $_POST['date'];
$average = $_POST['average'];

// database insert SQL code
$sql = "INSERT INTO `amounts` (`id`, `date`, `total`, `average`  ) VALUES ('0', current_timestamp(), '$total', '$average' )";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>
