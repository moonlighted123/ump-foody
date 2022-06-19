<?php      
    include_once('config.php');  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Report</title>
    <link rel="stylesheet" href="OwnerReport.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>

<body>
<div class="sidenav">
        <a href="OwnerHome.php">Home</a>
        <a href="restlist.php">Restaurants</a>
        <a href="ownerMenu.php">Menu</a>
        <a href="menureg.php">Menu Reg</a>
        <a href="ownerOrderlist.php">Order List</a>
        <a href="ownerReport.php">Report</a>
        <a href="ownerCalc.php">Calculation</a>
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

    <h1 style="text-align: center;">REPORT</h1>
    <div style="margin-top: 3%;" class="header">
        <h1 style="text-align: center;">Restaurant Report</h1>
        <div class="container-1">
            <h3 style="text-align:center;">
        <?php
                $sql = "SELECT * FROM orderlist";
                if ($result=mysqli_query($conn,$sql)) {
                    $rowcount=mysqli_num_rows($result);
                    echo "The total number of orders are : ".$rowcount; 
                }
                ?>
                </h3>
            <div class="small-container">

                <div class="row">
                    <div style="text-align: center;" class="col-4">
                        <div class="btn-1">
                            <h4>Total Sales</h4>
                            <?php 
                            $sql = "SELECT `payment` FROM  `calc`";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            
                            if ($resultCheck>0){
                                while($row = $result->fetch_assoc()) {
                                ?>
                                                    <h1>RM <?php echo $highestprice = $row['payment'];?></h1>
                                                    <?php
                                }
                                }
                            
                            //$conn->close();
                            ?>
                        </div>
                        <div class="btn-1">
                            <h4>Highest Order</h4>
                            <?php 
                            $sql = "SELECT MIN(  `price` ) AS  `lowest` , MAX(  `price` ) AS  `highest` FROM  `menureg`";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            
                            if ($resultCheck>0){
                                while($row = $result->fetch_assoc()) {
                                ?>
                                                    <h1>RM <?php echo $highestprice = $row['highest'];?></h1>
                                                    <?php
                                }
                                }
                            
                            //$conn->close();
                            ?>
                        </div>
                    </div>
                    <div style="text-align: center;" class="col-4">
                    <div class="btn-1">
                            <h4>Foody Commission</h4>
                            <?php 
                            $sql = "SELECT `foody` FROM  `calc`";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            
                            if ($resultCheck>0){
                                while($row = $result->fetch_assoc()) {
                                ?>
                                                    <h1>RM <?php echo $highestprice = $row['foody'];?></h1>
                                                    <?php
                                }
                                }
                            
                            //$conn->close();
                            ?>
                        </div>
                        <div class="btn-1">
                            <h4>Lowest Order</h4>
                            <?php 
                            $sql = "SELECT MIN(  `price` ) AS  `lowest` , MAX(  `price` ) AS  `highest` FROM  `menureg`";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            
                            if ($resultCheck>0){
                                while($row = $result->fetch_assoc()) {
                                ?>
                                                    <h1>RM <?php echo $lowestprice = $row['lowest'];?></h1>
                                                    <?php
                                }
                                }
                            
                            //$conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $con = new mysqli('localhost','root','','foody');
                $query = $con->query("
                SELECT COUNT(price) AS NumberOfProducts,
                    price
                FROM menureg
                GROUP BY price
                ");

                foreach($query as $data)
                {
                $NumberOfProduct[] = $data['NumberOfProducts'];
                $price[] = $data['price'];
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
                const labels = <?php echo json_encode($price) ?>;
                const data = {
                    labels: labels,
                    datasets: [{
                    label: 'Number of orders',
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


        <!---------footer------->


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
    </div>
    

    <div style="margin-top: 3.5%;" class="footer">
        <div class="container">
            <p>Why Us ? | Contact Us </p>
        </div>
    </div>

</body>

</html>