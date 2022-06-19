<?php include ("config.php");
$nameErr = $emailErr = $genderErr = $typeErr = "";
?>
<!DOCTYPE html>
<html>

<head>
    <title>user complain</title>
    <link rel="stylesheet" href="complaintcss1.css">
</head>
<script>
    function myFunction() {
      alert("Your Complaint has been submitted!");
    }
    </script>
    <style>
        button{
    color: white;
    border: none;
    font-size: 20px;
    font-weight: 100;
    border-radius: 8px;
    text-align: center;
    background: linear-gradient(10deg, #2980b9, #8e44ad);
    margin-left:400px;
    
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
    </style>
    

<body>
    <div class="navbar">
        <div class="logo" >
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
        <a href="restlist.php">Restaurant List</a>
        <a href="seafood.php">Menu List</a>
        <a href="Expenses.php">Expenses</a>
        <a href="orderlist.php">orderlist</a>
        <a href="complaint1.php">Complaint</a>
        <a href="logout.php">Log Out</a>
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
                <option value = 0 >Please Select Type</option>
                    <option value="Late Delivery">Late Delivery</option>
                    <option value="Damage Food">Damaged Food</option>
                    <option value="Wrong Item">Wrong Item</option>
                </select>
                <br><br>
            </div>
            
                <div class="butang">
                    
                        <input type="submit" value="Cancel">
                        <input type="submit" value="Submit" onclick="myFunction()">
                        
                        </button>
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