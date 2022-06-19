 <?php
require('config.php');
$userid=$_REQUEST['userid'];
$query = "DELETE FROM user WHERE userid=$userid"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: userlist.php"); 
?>
 <?php 