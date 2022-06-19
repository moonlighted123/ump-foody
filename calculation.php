<?php 
include ('config.php');

?> 

<!DOCTYPE html>
<html>
<head>
<title>UMP-FOODY</title>

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

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="userprofile.php" class="w3-bar-item w3-button"><b>UMP</b> Foody</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="userprofile.php" class="w3-bar-item w3-button">USER LIST</a>
      <a href="calculation.php" class="w3-bar-item w3-button">CALCULATION</a>
      <a href="report.php" class="w3-bar-item w3-button">REPORT</a>
	  <a href="logout.php" class="w3-bar-item w3-button">LOGOUT</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <center><img class="w3-image" src="images/ump.png" alt="ump" width="300px" height="300px"></center>
  <div class="w3-display-middle w3-margin-top w3-center">
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <table border = "1" width = "100%">
	<tr>
		<td>ID</td>
		<td>USERLIST</td>
		<td>USER TYPE</td>
		<td>PHONE NUMBER</td>
	</tr>
	
	<tbody>
	
	<?php
$sql = "SELECT * FROM userlist";
if ($result=mysqli_query($conn,$sql)) {
    $rowcount=mysqli_num_rows($result);
    echo "The total number of user are: ".$rowcount; 
}
?>
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

<br>
<br>
</tbody>
</table>
  
<!-- End page content -->
</div>
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="UMP-FOODY" target="_blank" class="w3-hover-text-green">UMP-FOODY</a></p>
</footer>

</body>
</html>
