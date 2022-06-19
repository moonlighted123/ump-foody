<?php include ("config.php");
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
  background-color:white;
}

tr:nth-child(even) {
  background-color:white;
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
#kotakform4 {
    width: 25%;
    background-color:white ;
    padding: 25px 30px;
    border-radius: 25px;
    margin: auto;
    height: 400px;

}
#tajuk{
    font-size: 25px;
    font-weight: 500;
    text-align: center;
    color: white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
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
    <div class="kotakform5" style="margin-top: 2%;">
        <div id="tajuk">results</div>

       <center> <table id ="dataTable"> 
            <tr>
                <th>ComplaintID</th>
                <th>Name</th>
                <th>Complain Type</th>
                <th>Date & Time</th>
                <th>Complaint Status</th>
              </tr>
              <?php 
    $search = $_POST['name'];
    if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    
    $sql = "select * from complaint where Name like '%$search%'";
    
    $result = $conn->query($sql);
	
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
?>
      <tr>
				<td><?php echo $row["ComplaintID"];?> </td>
				<td><?php echo $row["Name"];?> </td>
				<td><?php echo $row["complaint_type"];?></td>
        <td><?php echo $row["datetime"];?></td>
        <td><?php echo $row["complaint_status"];?></td>

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
<button>
    <a href="complaint3.php">Done</a>
</button></center>

</div>

</body>

</html>