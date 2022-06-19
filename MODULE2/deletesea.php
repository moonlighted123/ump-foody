<?php
require('config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM regsea WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: menusea.php"); 
?>
 <?php 