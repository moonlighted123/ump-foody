<?php
require('config.php');
$Orderid=$_REQUEST['Orderid'];
$query = "DELETE FROM orderlist WHERE Orderid=$Orderid"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: ownerOrderlist.php"); 
?>
 <?php 