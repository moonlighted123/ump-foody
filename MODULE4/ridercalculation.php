



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
                                <h1 style="color: black;">COMMISSION</h1>
                                <form action="processcalc.php" method="post" name="insert_data">
                                
		HOUR : <input type="number" name="hour" id="hour" placeholder="0.00"><br>
		WAGE: <input type="number" name="wage" id="wage"placeholder="0.00" /><br>
        The Result is : RM <textarea type="number" name="total" id="total"placeholder="0.00"></textarea><br>
        <button class="btn-1" id="calculate" onclick="multiplyBy()">Calculate </button>
		


	
	</form>
<script>

function multiplyBy()
{
        num1 = document.getElementById("hour").value;
        num2 = document.getElementById("wage").value;
        document.getElementById("total").innerHTML = num1 * num2;
}

</script>
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