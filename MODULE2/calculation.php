<?php 
include ('config.php');

?> 


<!DOCTYPE html>
<html>
<head>

<style>
.button {
	
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<link rel="stylesheet" href="css\style.css">

</head>
<body>

<div class="header">
  <h1>UMP-FOODY</h1>
 
</div>


<div class="topnav">
  
    <a href="logout.php"style="float:right">LOGOUT</a>
  
</div>
	
	<div class="row">
  <div class="leftcolumn">
    <div class="card">
     <!-- <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>-->
 
    <ul>
  <li><a href="userprofile.php">USER LIST</a></li>
  <li><a href="calculation.php"> CALCULATION </a></li>
   <li><a href="report.php"> REPORT</a></li>
</ul>
  </div>
    </div>

<form action="editprofile.php" method="POST">
  <div class="rightcolumn">
    <div class="card">
      <h2>CALCULATION</h2>
	  
    <table border = "1" width = "100%">
	<tr>
		<td>ID</td>
		<td>USERLIST</td>
		<td>USER TYPE</td>
		<td>PHONE NUMBER</td>
	</tr>
	
	<tbody>
<?php
$count=1;
$sel_query="Select * from userlist ORDER BY id desc;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["usertype"]; ?></td>
<td align="center"><?php echo $row["phonenumber"]; ?></td>
</tr>
<?php $count++; } 
?>

<?php
$sql = "SELECT * FROM userlist";
if ($result=mysqli_query($conn,$sql)) {
    $rowcount=mysqli_num_rows($result);
    echo "The total number of rows are: ".$rowcount; 
}
?>


</tbody>

    </div>
</div>	
</table>


<div class="footer">
  <center>
                  <p>©2022 UMP-FOODY All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">UMP-FOODY</a></p>
               </center>   
</div>

</body>
</html>


