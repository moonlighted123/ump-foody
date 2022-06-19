<?php      
    include_once('config.php');  
?>
<!DOCTYPE html>
<html>

<head>
    <title>user complain</title>
    <link rel="stylesheet" href="complaintcss1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<style>
    table {
        margin-top: 15px;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: fit-content;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color:#6c99b7;
}
input{
    border: none;
    background: none;
}


input[type=text] {
  width: 60x;
  height: 40px
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid black;
  border-radius: 4px;
  margin-left: 650px
}
.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #2E86C1;
    overflow-x: hidden;
    padding-top: 20px;
}
  
.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
}
.sidenav a:hover {
    color: #48C9B0;
}
.logo{
    margin-left:12%;
}
.kotakform3{
  overflow:auto;
}
</style>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="images/home.png" alt="" width="30%">
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
    <div class="sidenav">
        <a href="OwnerHome.php">Home</a>
        <a href="restlist.php">Restaurants</a>
        <a href="ownerMenu.php">Menu</a>
        <a href="menureg.php">Menu Reg</a>
        <a href="ownerOrderlist.php">Order List</a>
        <a href="ownerReport.php">Report</a>
        <a href="ownerCalc.php">Calculation</a>
        <a href="">Log Out</a>
    </div>
    <div class="kotakform3" style="margin-top: 2%;overflow:auto;">
        <div class="tajuk">Complain List</div>
        <div>
          <form action="searchcomplaint.php" method="post">
              <input type="text" name="name">
              <button>search</button>
          </form>
        </div>
       <center> <table id ="dataTable">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Complain Type</th>
                <th>Date & Time</th>
                <th>Complaint Status</th>
                <th>Action</th>
              </tr>
              <?php 
	$sql = "SELECT * FROM complaint;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck>0){
		while($row = $result->fetch_assoc()) {
?>
<?php
//display data
?>
      <tr>
				<td><?php echo $row["ComplaintID"];?> </td>
				<td><?php echo $row["Name"];?> </td>
				<td><?php echo $row["description"];?> </td>
				<td><?php echo $row["complaint_type"];?></td>
        <td><?php echo $row["datetime"];?></td>
        <td><?php echo $row["complaint_status"];?></td>
        <td align="center">
        <a href="deletelist.php?ComplaintID=<?php echo $row["ComplaintID"]; ?>">delete</a>
        <a href="update.php?ComplaintID=<?php echo $row["ComplaintID"]; ?>">update</a>
        </td>
      </tr>
      <?php
}
}
 else 
 { 
echo "0 results";
 }
 ?>
 </table>
 <?php
 $con = new mysqli('localhost','root','','foody');
 $query = $con->query("
 SELECT COUNT(complaint_type) AS NumberOfProducts,
    complaint_type
 FROM complaint
 GROUP BY complaint_type
");

foreach($query as $data)
{
 $NumberOfProduct[] = $data['NumberOfProducts'];
 $complaint[] = $data['complaint_type'];
}
$conn->close();
?>
</table></center>
<center><div style="width: 400px; text-align:center;">
  <canvas id="myChart" style="text-align:center;"></canvas>
</div></center>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($complaint) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Complaint Report',
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

    <div class="footer" style="margin-top:2%;">
        <div class="container">
            <p>Why Us ? | Contact Us </p>
        </div>
    </div>
</body>

</html>