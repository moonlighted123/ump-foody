<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="navbar">
      <div class="logo">
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

    <div class="center">
      <div style="text-align:center; margin-top:5%">
        <h3>UMP FOODY</h3>
        <h2>WELCOME</h2>
    </div>
      <form name="f1" action = "auth.php" method="POST">
        <div class="txt_field">
          <input type = "text" id ="username" name  = "username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type = "password" id ="password" name  = "password" required>
          <span></span>
          <label>Password</label>
        </div>
        <select style="margin: 2px 0;  border-radius: 5px; text-align: center;padding: inherit;display: block; margin: 0 auto;">
          <option name="usertype" id="usertype">user type</option>
          <option value="admin">Admin</option>
          <option value="owner">Restaurant Owner</option>
          <option value="user">General user</option>
          <option value="rider">Rider</option>
      </select>  
      <div style="display: flex; margin-top: 30px;">
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="margin-top: 7px;">
        <label for="vehicle1"> remember me</label><br>
        <text style="margin-left: auto;">forgot password</text>
      </div>
      <br>
        <input type="submit" value="Login">
            
        <div class="signup_link" style="display: grid;">
          don't have any account
          <a href="../signup.php">Signup</a>
        </div>
      </form>
    </div>

     <!---------footer------->
     <div class="footer" style="margin-top:41%;">
      <div class="container">
          <p> Why Us ? | Contact Us </p>
      </div>
  </div>

  </body>
</html>
