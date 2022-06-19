
<?php 
include ('config.php');

?> 

	  
<?php 
$query = "SELECT usertype, count(*) as number FROM user GROUP BY usertype";  
$result = mysqli_query($conn, $query);  
?>  
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
                        
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  

<!DOCTYPE html>
<html>
    <head>
        <title>table</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="owner.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>
    <style>
       
        .column {
          float: left;
          width: 50%;
          padding: 10px;
          height: 300px;
        }

        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        .navbar{
            display: flex;
            align-items: center;
            background-color: #2E86C1  ;
            padding: 5px;
            font-size:larger;
             }

        nav{
            flex: 1;
            text-align: right;
        }
        nav ul{
            display: inline-block;
            list-style-type: none;
        }
        nav ul li{
            display: inline-block;
            margin-right: 20px;
        }

        /*---------footer-------*/
        .footer {
            background: #2E86C1;
            color:aliceblue;
            font-size: 14px;
            padding: 10px 0 10px;
        }
        .footer p{
            color: aliceblue;
        }

        #footer {
  position: fixed;
  margin-top: 15px;
  height: 50; width: 100%;
  text-align: center;
  font-size: 0.8em;
  bottom: 0;
}
#footer ul {
  list-style-type: none;
}
#footer ul li {
  display: inline;
  margin: 0 15px;
}

        .menu-icon{
            width: 28px;
            margin-left: 20px;
            display: none;
        }

        .container{
            max-width: 1300px;
            margin: auto;
            padding-left: 25px;
            padding-right: 25px;
        }

        .container-1{
            max-width: 1000px;
            padding-left: 25px;
            padding-right: 25px;
        }
                    
        </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <body style="background-color: white;">
    <div class="sidenav">
        <a href="adminhome.php">Home</a>
        <a href="userprofile.php">User Profile</a>
        <a href="userlist.php">User List</a>
        <a href="createuserprofile.php">Create User Profile</a>
        <a href="calculation.php">Calculation</a>
        <a href="report.php">Report</a>
        <a href="logout.php">Log Out</a>
    </div>
        <div class="navbar">
            <div class="logo" style="margin-left:10%">
              <img src="images/home.png" width="30%">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a style="color: aliceblue;" href="">EN</a></li>
                    <li><a style="color: aliceblue;">|</a></li>
                </ul>
            </nav>
            <a href=""> <img src="images/shoppingcart.png"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>

      <div style="margin: auto;  
                /* background-color: #A9A9A9; */
                width: 900px;
                height: 450px;   
                position: absolute;
                top: 50%;
                left: 50%;
                -moz-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);"
                
                >
                <H3 style="text-align: center;">Report</H3>    
                  <div style="margin: auto;  
                  
                  width: 700px;
                  height: 300px;   
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  -moz-transform: translateX(-50%) translateY(-50%);
                  -webkit-transform: translateX(-50%) translateY(-50%);
                  transform: translateX(-50%) translateY(-50%);"
                  >
                    <H3 style="text-align: center;">Total User</H3> 
                    <div id="piechart" style="width: 800px; height: 400px;text-align:center"></div>  
                    <!--
                    <canvas id="myChart" style="width:90%;max-width:500px; margin-left: auto;
                    margin-right: auto;"></canvas>  
  
                    <script>
                      var xValues = ["Restaurant Owner", "General user", "Rider"];
                      var yValues = [55, 49, 44];
                      var barColors = [
                        "#b91d47",
                        "#00aba9",
                        "#2b5797",
                      ];
                      
                      new Chart("myChart", {
                        type: "pie",
                        data: {
                          labels: xValues,
                          datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                          }]
                        },
                        options: {
                          title: {
                            display: true,
                            
                          }
                        }
                      });
                      </script>
                    -->
                 </div> 
                
      </div> 

      <div class="footer" style="margin-top:41%;">
        <div class="container">
            <p>Why Us ? | Contact Us </p>
        </div>
    </div>
    </body>
   
</html>