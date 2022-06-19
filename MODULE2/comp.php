<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','foody');

// get the post records
$txtName = $_POST['name'];
$txtDesc = $_POST['desc'];
$txtCompType = $_POST['type'];

// database insert SQL code
$sql = "INSERT INTO `complaint` ( `Name`, `Desc`, `CompType`, `datetime`,`complaint_status`) VALUES ( '$txtName', '$txtDesc', '$txtCompType', current_timestamp(), 'In Investigation')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>

