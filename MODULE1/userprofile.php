<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style>
.card {
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
  </style>
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
      <div class="logo"  style="margin-left:10%">
          <img src="images/home.png" width="30%">
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

    <div class="center" style="height: 60%; margin-top:2%";>
      <div style="text-align:center; margin-top:5%">
        <h2>USER PROFILE</h2>
    </div>
     
    <div class="card">
      <img src="images/profile.png" alt="" style="width:50%">
      <div style="text-align: start; margin-top: 10%;">
          <p>Name : Muhammad Ikhmal Bin Ishak</p>
          <p>Phone : 0134567890</p>
          <p>Address : KKS, UMP Pekan</p>
          <p>Gender : Male</p>
      </div>
      <div style="display:flex; white-space: nowrap; margin-top: 10%;">
        <button onclick="document.location='adminhome.php'" style="margin-left: auto; border-radius: 5px;margin-right: 20px;">Back</button>
        <button onclick="document.location='adminhome.php'" style="margin-left: auto; border-radius: 5px;">Done</button>
    </div>
    </div>
    </div>

     <!---------footer------->
     <div>
      <div style="margin-top: 40%; background: #2E86C1; color:aliceblue; font-size: 14px; padding: 10px 0 10px;">
          <p>Why Us ? | Contact Us </p>
      </div>
  </div>

  </body>
</html>
