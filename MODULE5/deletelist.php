<?php
require('config.php');
$ComplaintID=$_REQUEST['ComplaintID'];
$sql = "DELETE FROM complaint WHERE ComplaintID='" . $_GET["ComplaintID"] . "'"; 
$result = mysqli_query($conn,$sql) or die ( mysqli_error());
header("Location: complaint3.php"); 
?>