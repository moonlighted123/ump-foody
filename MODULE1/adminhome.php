<!DOCTYPE html>
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
    <link rel="stylesheet" href="owner3.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">



</head>

<body>
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
        <h1 style="text-align: center;">UMP food delivery system (Foody).</h1>
        <div class="container-1">
            <div class="row">
                <div class="offer">
                    <div class="small-container">
                        <div class="row">
                            <div class="col-2">
                                <img src="images/home.png" class="offer-img">
                            </div>
                            <div class="col-2">
                                <h1 style="color: black;">All Kind Of Cuisine Ready For You!</h1>
                                <p style="color: black;">Ready to deliver your meal right in front of your door!</p>

                                <small>Foody allows users to conveniently discover food around their neighbourhood and
                                    directly order their favourite meals online or via mobile.Also, Foody aims to
                                    connect local restaurants and eateries with everyone. Just place an order of your
                                    favorite dish, from your favorite restaurant on Foody, and a delicious meal will be
                                    delivered straight to you.
                                </small>
                                <p></p>
                            </div>
                        </div>

                    </div>

                </div>
                <h1 class="title">Restaurants</h1>
                <div class="row" >
                    <div class="col-4">
                        <img src="images/kedai1.jpeg" width="200px" height="200px" >
                        <h4>RESTORAN SELERA KAMPUNG</h4>
                        
                    </div>
                    <div class="col-4">
                        <img src="images/kedai2.jpeg" width="200px" height="200px">
                        <h4>A4 CAFE</h4>
                        
                    </div>
                    <div class="col-4">
                        <img src="images/kedai3.jpeg" width="200px" height="200px">
                        <h4>MC DONALDS</h4>
                        
                    </div>
                    <div class="col-4">
                        <img src="images/kedai4.jpeg" width="200px" height="200px">
                        <h4>MY MAMA</h4>
                       
                    </div>
                </div>
                <div class="row" >
                    <div class="col-4">
                        <img src="images/kedai5.jpeg" width="200px" height="200px">
                        <h4>MY WARUNG</h4>
                        
                    </div>
                    <div class="col-4">
                        <img src="images/kedai6.jpeg" width="200px" height="200px">
                        <h4>WARUNG PEKAN LAMA</h4>
                       
                    </div>
                    <div class="col-4">
                        <img src="images/kedai7.jpeg" width="200px" height="200px">
                        <h4>PIZZA HUT</h4>
                        
                    </div>
                    <div class="col-4">
                        <img src="images/kedai8.jpeg" width="200px" height="200px">
                        <h4>KOPI SINGGET</h4>
                        
                    </div>
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