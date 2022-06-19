<?php 
include ('config.php');

?> 


<!DOCTYPE html>
<html lang="en">

<style>
    table, 
    tr,
    td {
        border-style: hidden;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Calculation</title>
    <link rel="stylesheet" href="OwnerCalc.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    
    
    <script type="text/javascript">
                            
                            function calcComm() {
                        var payment = parseFloat(document.getElementById('payment').value);
                        var commission = parseFloat(document.getElementById('commission').value);
                        var commissionfoody = parseFloat(document.getElementById('commissionfoody').value);
                        var calculaterider = payment * commission / 100 ;
                        var calculatefoody = payment * commissionfoody / 100 ;

                       
                        document.getElementById("rider").innerHTML =  calculaterider
                        document.getElementById("foody").innerHTML =  calculatefoody
        }
                </script>
 
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

    <h1 style="text-align: center;">Calculation</h1>
    <div style="margin-top: 3%;" class="header">
        <h1 style="text-align: center;">Restaurant Calculation</h1>
        <div class="container-1">
        
        <form action="calc.php" method="post" name="insert_data">
            <h3 style="text-align:center"> 
             <?php
                $sql = "SELECT * FROM orderlist";
                if ($result=mysqli_query($conn,$sql)) {
                    $rowcount=mysqli_num_rows($result);
                    echo "The total number of orders are : ".$rowcount; 
                }
                ?>
                </h3>
            <table class="table">
                <tr>
                    <td>Enter Recieve Payment</td>
                    <td><input  id="payment" name="payment"  ></td>

                </tr>
                <tr>
                    <td>Enter Rider Commission Percentage :</td>
                    <td><input  id="commission" name="commission"  >%</td>

                </tr>
                <tr>
                    <td>Enter Foody Commission Percentage :</td>
                    <td><input  id="commissionfoody" name="commissionfoody"  >%</td>

                </tr>

                <tr>
                    <td>Rider Commission</td>
                    <td><textarea  id="rider" name="rider" height: 100px; width: 300px;></textarea></td>

                </tr>
                <tr>
                    <td>Foody Commission</td>
                    <td><textarea  id="foody" name="foody" height: 100px; width: 300px;></textarea></td>

                </tr>

                </tr>
            </table>

            <div style="margin-top: 5%;text-align: center;" >
                <button class="btn-1" id="calculate" onclick="calcComm()">Calculate </button>
                <button class="btn-1" type="reset">Reset</button>
            </div>
            </form>
           
        </div>
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
   

<div style="margin-top: 23%;" class="footer">
    <div class="container">
        <p>Why Us ? | Contact Us </p>
    </div>
</div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/gh/akjpro/form-anticlear/base.js"></script>