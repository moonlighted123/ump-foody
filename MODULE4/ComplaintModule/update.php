<?php
include_once 'config.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE complaint set ComplaintID ='" . $_POST['ComplaintID'] . "', Name='" . $_POST['name'] . "', description='" . $_POST['desc'] . "', complaint_type='" . $_POST['type'] . "' , complaint_status='" . $_POST['status'] . "' WHERE ComplaintID='" . $_POST['ComplaintID'] . "'");
    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT * FROM complaint WHERE ComplaintID ='" . $_GET['ComplaintID'] . "'");
$row = mysqli_fetch_array($result);
?>
<html>
    <head>
    <link rel="stylesheet" href="complaintcss1.css">
    </head>
    <style>
    #kotakform4 {
    width: 25%;
    background-color:white ;
    padding: 25px 30px;
    border-radius: 25px;
    margin: auto;
    height: 400px;

}
    </style>

<body>
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

    <center>
        <h2 style="margin-left:20px ; color:white;">Update Record</h2>
    </center>
    <center>
            <div id="kotakform4" style="overflow:auto;">
            <form name="frmUser" method="post" action="">
                <div><?php if (isset($message)) {
                            echo $message;
                        } ?>

                    <br>
                    Commission ID: <br>
                    <input type="hidden" name="ComplaintID" class="txtField" value="<?php echo $row['ComplaintID']; ?>">
                    <input  disabled type="text" name="ComplaintID" value="<?php echo $row['ComplaintID']; ?>">
                    <br><br><br>
                    Description: <br><br>
                    <input type="text" name="desc" class="txtField" value="<?php echo $row['description']; ?>">
                    <br><br><br>
                    Complaint Type :<br><br>
                    <input type="text" name="type" class="txtField" value="<?php echo $row['complaint_type']; ?>">
                    <br><br><br>
                    Complaint Status :<br><br>
                    <input type="text" name="status" class="txtField" value="<?php echo $row['complaint_status']; ?>">
                    <br><br><br>
                    Name:<br><br>
                    <input type="text" name="name" class="txtField" value="<?php echo $row['Name']; ?>">
                    <br><br><br>

                    <button>Submit</button>
                    <button><a href="complaint3.php">Done</a> </button>

            </form>
            </div>
    </center>

</body>

</html>

