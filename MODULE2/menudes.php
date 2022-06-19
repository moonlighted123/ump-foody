<?php

include_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Menu</title>
    <link rel="stylesheet" href="menudes.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width:100%
    }

    td,
    th {
        border: 1px solid #dddddd;
        background-color: white;
        text-align: left;
        padding-left: 50px;
        padding-right: 50px;
        padding-top: 3px;
        padding-bottom: 3px;
    }
    image{
        width:150px;
        height:150px;
    }
</style>

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
    <div class="flex-container">
        <p><a href="ownerMenu.php" class="btn">Malaysian Food </a> </p>
        <p style="margin-right: 5%;margin-left:5%;"> <a href="" class="btn active">Dessert</a></p>
        <a href="menusea.php" class="btn">Seafood</a>
    </div>

    <div style="margin-top: 3%;" class="header">
        <h1 style="text-align:center;">Menu List</h1>
        <div class="container-1">
        <table>
                    <tr>
                        <th>Image</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
     
	<?php 
	$sql = "SELECT * FROM regdes;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck>0){
		while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                            <td><img src ="<?php echo $row["picture"];?>" width="150px" height="150px" ></td>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["price"];?></td>
                            <td align="center">
                             <a href="deletedes.php?id=<?php echo $row["id"]; ?>"><img src ="images/remove (1).png" width="30px" height="30px" ></a>
                            </td>
                            </tr>
                            <?php
              }
            }
          
          //$conn->close();
          ?>
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
    <div style="margin-top: 5%;text-align: center;" >
                <a href="updatedes.php" class="btn-1">Update </a>
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