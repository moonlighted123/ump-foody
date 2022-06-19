<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root','','foody');
$nameErr = $emailErr = $genderErr = $typeErr = "";
$txtName = $txtDesc = $txtType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $txtName = test_input($_POST["name"]);
  }

  if (empty($_POST["desc"])) {
    $emailErr = "Email is required";
  } else {
    $txtDesc = test_input($_POST["desc"]);
  }

  if (empty($_POST["type"])) {
    $typeErr = "type is required";
  } else {
    $txtType = test_input($_POST["type"]);
  }

}

// get the post records
//validate the data
/*$txtName = test_input( $_POST['name']);
$txtDesc = test_input($_POST['desc']);
$txtType = test_input($_POST['type']);*/

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }

// database insert SQL code
$sql = "INSERT INTO `complaint` (`ComplaintID`, `Name`, `description`, `complaint_type`, `datetime`,`complaint_status`) VALUES ('0', '$txtName', '$txtDesc', '$txtType', current_timestamp(), 'In Investigation')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>

