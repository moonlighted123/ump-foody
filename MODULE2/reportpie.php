<?php 
include ('config.php');

?> 

	  
	  <?php 
    $query = "SELECT price, count(*) as number FROM menureg GROUP BY price";  
 $result = mysqli_query($conn, $query);  
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
<div class="header">
   <img src="images/ump.png" alt="logo" width=300px height=130px>  
</div>

<title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Price', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["price"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Male and Female Employee',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  



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
	  

 <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>    

<div class="footer">
  <center>
                  <p>©2022 UMP-FOODY All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">UMP-FOODY</a></p>
               </center>   
</div>

</body>
</html>


