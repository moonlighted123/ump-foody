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
    <link rel="stylesheet" href="OwnerCalc.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    

</head>

<body>
    <div class="sidenav">
        <a href="ownerMenu.php">Menu</a>
        <a href="ownerOrderlist.php">Order List</a>
        <a href="ownerReport.php">Report</a>
        <a href="ownerCalc.php">Calculation</a>
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
<!--
    <h1 style="text-align: center;">REPORT</h1>
    <div style="margin-top: 3%;" class="header">
        <h1 style="text-align: center;">Restaurant Report</h1>
        <div class="container-1">

            <table class="table">
                <tr>
                    <td>Enter Number of Order :</td>
                    <td><input type="text" id="quantity1" name="quantity1" ></td>

                </tr>

                <tr>
                    <td>Enter Payment</td>
                    <td><input type="text" id="quantity2" name="quantity2" ></td>

                </tr>

                                    <script type="text/javascript">
                            
                            function calcSalary() {
                    var wage = parseFloat(document.getElementById('txt_wage').value);
                    var hours = parseFloat(document.getElementById('txt_hours').value);
                    var calculate = wage * hours ;
                    
                    document.getElementById('salary').innerHTML = calculate;
                    }
                            </script>


                </tr>
            </table>
            <div style="margin-top: 5%;text-align: center;" >
                <a href="" class="btn-1">Edit </a>
            </div>
        
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
