


<?php 
include ('config.php');

?> 

<html lang="en">
<style>
    table,
    th,
    td {
        border: 1px;

    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="owner3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">


</head>

<body>
<div class="sidenav">
		<a href="ridernotes.php">DELIVERY NOTES</a>
        <a href="orderstatus.php">ORDER STATUS</a>
        <a href="riderrecord.php">RECORD</a>
        <a href="ComplaintModule/complaint3.php">COMPLAIN</a>
		<a href="ridercalculation.php">COMMISSION</a>
		<a href="riderReport.php">REPORT</a>
        <a href="logout.php">Log Out</a>
    </div>
    <div class="navbar">
        <div class="logo">
            <img src="images/home.png" width="20%">
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


    <div style="margin-top: 3%;margin-bottom: 3%;" class="header">
        <h1 style="text-align: center;">UMP food delivery system (Foody)</h1>
        <div class="container-1">
            <div class="row">
                <div class="offer">
                    <div class="small-container">
                        <div class="row">
                            <div class="col-2">
                                <h1 align="center"style="color: black;">PICK UP</h1>
								 <div style="width:900px;">  
               
                <br />  
                <?php 
            $con = new mysqli('localhost','root','','foody');
                $query = $con->query("
                SELECT COUNT(total) AS NumberOfProducts,
                    total
                FROM commision
                GROUP BY total
                ");

                foreach($query as $data)
                {
                $NumberOfProduct[] = $data['NumberOfProducts'];
                $total[] = $data['total'];
                }
                $conn->close();
                ?>
                </center>
                <center><div style="width: 400px; text-align:center;">
                <h2>Number of orders</h2>
                <canvas id="myChart" style="text-align:center;"></canvas>
                </div></center>
                
                <script>
                // === include 'setup' then 'config' above ===
                const labels = <?php echo json_encode($total) ?>;
                const data = {
                    labels: labels,
                    datasets: [{
                    label: 'Amount of Commission',
                    data: <?php echo json_encode($NumberOfProduct) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                    }]
                };

                const config = {
                    type: 'bar',
                    data: data,
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    },
                };

                var myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
                </script>
           </div> 
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="title"></h1>
                <div class="row" >
                    <div class="col-4">
                    </div>
                </div>
            </div>
        </div>
		
<!--		
<title>Percentage of User</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['comission', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["comission"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Commission for this month',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 
        --> 

    <!---------footer------->
    <div class="footer">
        <div class="container">
            <p>Why Us ? | Contact Us </p>
        </div>
    </div>

    <!---------js for toggle menu------->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

</body>

</html>