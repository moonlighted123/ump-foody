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

<link rel="stylesheet" href="owner3.css">
<div class="header">
   <img src="images/ump.png" alt="logo" width=300px height=130px>  
</div>
</head>
<body>
</head>
<body>

<style>
body {
  background-color: #80bfff;
}  
</style>


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

  <div class="rightcolumn">
    <div class="card">
      <h2>REPORT</h2>
	  
    
<?php
 
 
$dataPoints = array( 
	array("label"=>"Rider", "y"=>20),
	array("label"=>"Owner", "y"=>10),
	array("label"=>"User", "y"=>70),

)
 
?>

<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Report User of Foody"
	},
	subtitles: [{
		text: "June 2022"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



<div class="footer">
  <center>
                  <p>©2022 UMP-FOODY All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">UMP-FOODY</a></p>
               </center>   
</div>

</body>
</html>


