<?php 
include ('config.php');

?> 

	  <?php 
    $query = "SELECT usertype, count(*) as number FROM userlist GROUP BY usertype";  
 $result = mysqli_query($conn, $query);  
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

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <center><img class="w3-image" src="images/ump.png" alt="ump" width="300px" height="300px"></center>
  <div class="w3-display-middle w3-margin-top w3-center">
  </div>
</header>

<title>Percentage of User</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Usertype', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["usertype"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of User',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
</head>
<body>

<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><b>UMP</b> Foody</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="userprofile.php" class="w3-bar-item w3-button">USER LIST</a>
      <a href="calculation.php" class="w3-bar-item w3-button">CALCULATION</a>
      <a href="report.php" class="w3-bar-item w3-button">REPORT</a>
	  <a href="logout.php" class="w3-bar-item w3-button">LOGOUT</a>
    </div>
  </div>
</div>



<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Contact Section -->
  <center><div class="w3-container w3-padding-32" id="contact">
           <div style="width:900px;">  
                <h3 align="center">REPORT USER</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  </center>
           </div>    

<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="UMP-FOODY" target="_blank" class="w3-hover-text-green">UMP-FOODY</a></p>
</footer>

</body>
</html>



