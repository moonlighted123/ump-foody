<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "foody");  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Owner Menu</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
           <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
           <link rel="preconnect" href="https://fonts.googleapis.com">
           <link rel="stylesheet" href="OwnerMenu.css?v=<?php echo time(); ?>">
      </head>  
      </head>  
      <body>  
      <div class="sidenav">
        <a href="restlist.php">Restaurant List</a>
        <a href="seafood.php">Menu List</a>
        <a href="Expenses.php">Expenses</a>
        <a href="orderlist.php">orderlist</a>
        <a href="complaint1.php">Complaint</a>
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
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
    </head>

    <body>
        <div style="margin-top: 3%;" class="header">
            <div class="container-1">
                >
                <h1 style="text-align:center;">Order List</h1>
                <div class="container-1">
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Food Name</th>
                            <th>price</th>
                           
                        </tr>
                        <?php 

	$sql = "SELECT * FROM regsea;";
	$result = mysqli_query($connect, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck>0){
		while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["price"];?></td>
                            
                            </tr>
                            <?php
              }
            }
            ?>  
                <div style="clear:both"></div>   
                     <table class="table table-bordered">  
                          <tr>  
                               <p><th>Delivery Address</th></p>  
                          </tr>  
                          <?php   
                          $sql = "SELECT * FROM rider;";
                          $result = mysqli_query($connect, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          
                          if ($resultCheck>0){
                              while($row = $result->fetch_assoc()) {
                                  ?>
                                  <tr>
                                                  <td><?php echo $row["addcust"];?></td>
                                                  </tr>
                                                  <?php
                                    }
                                  }
                                  ?>  
                <div style="clear:both"></div>   
                     <table class="table table-bordered">  
                          <tr>  
                               <p><th>Payment Method</th></p> 
                                
                          </tr>  
                          <tr>
                          <td> Cash</td> 
                          </tr> 
                          
                                
                                  
          </table>
<!--
<div class="row">

<div >
  <img src="images/mamak.jpg" alt="HTML5 Icon" width="128" height="128">

</div>

<div >

  <h4>Nasi Lemak </h4>
  <p>RM 15.00</p>
  <p>Nasi Lemak, 2 pcs Chicken, Egg</p>
</div>

<div >

<h4>Availability</h4>
<img src="images/correct.png" alt="HTML5 Icon" width="30" height="30">
<img src="images/remove (1).png" alt="HTML5 Icon" width="30" height="30">

</div>

</div>
<div style="margin-top: 5%;" class="row">

<div class="">
  <img src="images/mamak.jpg" alt="HTML5 Icon" width="128" height="128">

</div>

<div  >

  <h4>Nasi Ayam </h4>
  <p>RM 15.00</p>
  <p>Nasi, 2 pcs Chicken, Egg</p>
</div>

<div >

  <h4>Availability</h4>
  <img src="images/correct.png" alt="HTML5 Icon" width="30" height="30">
  <img src="images/remove (1).png" alt="HTML5 Icon" width="30" height="30">
  
</div>

</div>
<div  style="margin-top: 5%;" class="row">

<div class="">
  <img src="images/mamak.jpg" alt="HTML5 Icon" width="128" height="128">

</div>

<div  >

  <h4>Nasi Goreng </h4>
  <p>RM 15.00</p>
  <p>Nasi, 2 pcs Chicken, Egg</p>
</div>

<div >

<h4>Availability</h4>
<img src="images/correct.png" alt="HTML5 Icon" width="30" height="30">
<img src="images/remove (1).png" alt="HTML5 Icon" width="30" height="30">

</div>

</div>



-->

</div>

</div>


<!---------footer------->
<div style="margin-top: 5%;" class="footer">
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