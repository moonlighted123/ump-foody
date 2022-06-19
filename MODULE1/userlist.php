<?php 
include ('config.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>table</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>owner</title>
        <link rel="stylesheet" href="owner.css">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          background-color: white;
          text-align: left;
          padding-left: 50px;
          padding-right: 50px;
          padding-top:3px;
          padding-bottom: 3px;
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
    <body style="background-color: white;">
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
            <div class="logo" style="margin-left:10%">
                <a href="adminhome.php"> <img src="images/home.png" width="30%"> </a>
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

      <div style="margin: auto;  
                /* background-color: #A9A9A9; */
                width: 900px;
                height: 450px;   
                position: absolute;
                top: 50%;
                left: 50%;
                -moz-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);"
                >
                <H3 style="text-align: center;">USER LIST</H3>

                <div class="search-container" style="  position:absolute; left:5%; top:25%; width:30%;">
                    <form action="/action_page.php">
                      <input type="text"name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>

                    <form style="margin: 20px 0; white-space: nowrap;" >
                    <tbody>
                        <table>
                           <tr>
                           <th>User ID</th>
                              <th>Name</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>Action</th>
                            </tr>
                            
                            <?php
                            $count=1;
                            $sel_query="Select * from user ORDER BY userid desc;";
                            $result = mysqli_query($conn,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr><td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["username"]; ?></td>
                            <td align="center"><?php echo $row["phonenum"]; ?></td>
                            <td align="center"><?php echo $row["address"]; ?></td>
                            <td align="center">
                             <a href="update.php?userid=<?php echo $row["userid"]; ?>">Update  |</a>
                             <a href="delete.php?userid=<?php echo $row["userid"]; ?>">Delete</a>
                            </td>
                            </tr>
                            
                            <?php $count++; } 
                            ?>
                           
                           
                          </table>
                         </tbody>
                    </form>
                    <div style="display:flex; margin-left: 200%; white-space: nowrap;">
                        <button onclick="document.location='createuserprofile.php'" style="margin-left: auto; padding: 5px;border-radius: 5px;">create profile</button>
                        <button onclick="document.location='report.php'" style="margin-left: auto; padding: 5px;border-radius: 5px;">view report</button>
                    </div>
                  </div>
                 
      </div> 
      <div class="footer" style="margin-top:40%;">
        <div class="container">
            <p> Why Us ? | Contact Us </p>
        </div>
    </div>
    </body>
   
</html>