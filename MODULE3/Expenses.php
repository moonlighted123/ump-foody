<?php

include_once 'config.php';

?>


<!DOCTYPE html>
<html>
    <head>
        <title>table</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <title>Expenses</title>
        <link rel="stylesheet" href="module 3-4.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="OwnerMenu.css?v=<?php echo time(); ?>">
      </head>  
        </head>
    <style>
       /* Create two equal columns that floats next to each other */
        .column {
          float: left;
          width: 50%;
          padding: 10px;
          height: 300px; /* Should be removed. Only for demonstration */
        }

/* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        .navbar{
            display: flex;
            align-items: center;
            background-color: #2E86C1  ;
            padding: 5px;
            font-size:larger;
             }

        nav{
            flex: 1;
            text-align: right;
        }
        nav ul{
            display: inline-block;
            list-style-type: none;
        }
        nav ul li{
            display: inline-block;
            margin-right: 20px;
        }

        /*---------footer-------*/
        .footer {
            background: #2E86C1;
            color:aliceblue;
            font-size: 14px;
            padding: 10px 0 10px;
        }
        .footer p{
            color: aliceblue;
        }

        #footer {
  position: fixed;
  margin-top: 15px;
  height: 50; width: 100%;
  text-align: center;
  font-size: 0.8em;
  bottom: 0;
}
#footer ul {
  list-style-type: none;
}
#footer ul li {
  display: inline;
  margin: 0 15px;
}

        .menu-icon{
            width: 28px;
            margin-left: 20px;
            display: none;
        }

        .container{
            max-width: 1300px;
            margin: auto;
            padding-left: 25px;
            padding-right: 25px;
        }

        .container-1{
            max-width: 1000px;
            padding-left: 25px;
            padding-right: 25px;
        }
                    
        </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
      
    <body style="overflow: scroll;">
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
              <img src="home.png" width="30%">
             
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a style="color: aliceblue;" href="">EN</a></li>
                    <li><a style="color: aliceblue;">|</a></li>
                </ul>
            </nav>
            <a href=""> <img src="shoppingcart.png"></a>
    </div>
    <div class="container" style="width:700px;">  
                <h3 align="center">Amount of Expenses</h3><br />  



    <div class="clearfix">
    <form action="calc.php" method="post">
    <div class="box" style="background-color: #48C9B0">
      <p> Calculate Expenses</p>
      <tr>
        <td> Total spend :</td>
        <td><textarea  id="total" name="total" height: 100px; width: 300px;></textarea> </td>
      </tr>
      <tr>
        <td><p> Total day :</p> </td>
        <td><textarea  id="day" name="day" height: 100px; width: 300px;></textarea></td>
      </tr>
        <p>
          <label for="Date">Date:</label>
      
        <input type="date" id="date" name="date">
        <td>
        </p>
        <button value="calculate" onclick="calcSalary()">Calculate</button>
        </td>

        <script type="text/javascript">
		
		function calcSalary() {
 var total = parseFloat(document.getElementById('total').value);
 var day = parseFloat(document.getElementById('day').value);
 var calculate = total / day ;
 
 document.getElementById('average').innerHTML = calculate;
}
		</script>
    </div>

        <div class="box" style="background-color: #48C9B0">
           <p>Avarage Expenses</p>
           <center>RM  <textarea name="average" id="average" ></textarea></center>
        </div>
       
  </div>
   </form>
  
        
      <div class="footer" style="margin-top:41%;">
        <div class="container">
            <p>Why Us ? | Contact Us </p>
        </div>
    </div>
    </body>
   
</html>
        

            
           