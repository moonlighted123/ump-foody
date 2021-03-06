<?php      
    include_once('config.php');  
?>
<!DOCTYPE html>
<html>

<head>
    <title>user complain</title>
    <link rel="stylesheet" href="complaintcss1.css">
</head>

<!--
<style>
    .navbar {
        display: flex;
        align-items: center;
        background-color: #2E86C1;
        padding: 5px;
        font-size: larger;
        height: 50px;
    }

    nav {
        flex: 1;
        text-align: right;
    }

    nav ul {
        display: inline-block;
        list-style-type: none;
    }

    nav ul li {
        display: inline-block;
        margin-right: 20px;
    }

    .menu-icon {
        width: 28px;
        margin-left: 20px;
        display: none;
    }

    .container {
        max-width: 1300px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(120deg, #2980b9, #8e44ad);
        height: 100vh;
        overflow: hidden;
    }

    .kotakform {
        max-width: 700px;
        width: 100%;
        background-color: white;
        padding: 25px 30px;
        border-radius: 5px;
        margin: auto;

    }

    .kotakform .tajuk {
        font-size: 25px;
        font-weight: 500;
        text-align: center;
        color: #9051e8;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .butang input{
        color: #fff;
        border: none;
        font-size: 20px;
        font-weight: 100;
        border-radius: 8px;
        text-align: center;
        background: linear-gradient(10deg, #2980b9, #8e44ad);
    }

    .kotak input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
    }

    .kotak label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
    }

    .kotak span::before {
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #2691d9;
        transition: .5s;
    }

    .kotak input:focus~label,
    .kotak input:valid~label {
        top: -5px;
        color: #2691d9;
    }

    .kotak input:focus~span::before,
    .kotak input:valid~span::before {
        width: 100%;
    }

    form .kotak {
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
    }

    .desclabel {
        left: 6px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
    }

    /*---------footer-------*/
    .footer {
        background: #2E86C1;
        color: aliceblue;
        font-size: 14px;
        padding: 10px 0 10px;
    }
</style>-->

<body>
    <div class="sidenav">
        <a href="ownerMenu.php">Menu</a>
        <a href="ownerOrderlist.php">Order List</a>
        <a href="ownerReport.php">Report</a>
        <a href="ownerCalc.php">Calculation</a>
    </div>
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
    <div class="kotakform" style="margin-top: 5%;">
        <div class="tajuk">Complaint</div>

        <form action="comp.php" method="post" name="insert_data">
            <div class="kotak">
                <input type="text" required name="name" id="name">
                <span></span>
                <label>Name</label>
            </div>
            <div>
                <p><label class="desclabel"> Enter Brief Description</label></p>
                <textarea id="desc" name="desc" rows="4" cols="50">

                    </textarea>
            </div>

            <div>
                <label for="type" style="font: size 16px;color: #adadad;">Choose Complaint Type:</label>
                <select name="type" id="type">
                    <option value="Late Delivery">Late Delivery</option>
                    <option value="Damaged Food">Damaged Food</option>
                    <option value="Wrong Item">Wrong Items</option>
                </select>
                <br><br>
            </div>
<!----
            <div>
                <label for="type" style="font: size 16px;color: #adadad;">Choose Complaint Type:</label>
                <select name="CompType" id="type">
                    <option value="LB">Late Delivery</option>
                    <option value="DF">Damaged Food</option>
                    <option value="WI">Wrong Item</option>
                </select>
                <br><br>
            </div>
-->
                <div class="butang">
                    
                        <input type="submit" value="Cancel">
                        <input type="submit" value="INSERT">
                </div>   
            
    
    </form>
    </div>
    



    <div class="footer" style="margin-top:8%;">
        <div class="container">
            <p>Why Us ? | Contact Us </p>
        </div>
    </div>

</body>

</html>