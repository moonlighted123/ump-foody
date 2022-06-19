<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Edit User</title>
  <link rel="stylesheet" href="style.css">
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

  button:hover,
  a:hover {
    opacity: 0.7;
  }
</style>

<body style="font-size:small">
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

  <div class="center" style="height: 70%; margin-top:2%" ;>
    <div style="text-align:center; margin-top:5%">
      <h2> EDIT USER PROFILE</h2>
    </div>

    <div style="  max-width: 300px;
    margin: auto;   text-align: center;
  font-family: arial;">
      <img src="images/profile.png" alt="" style="width:50%">
      <div style=" margin-top: 10%;">
        <form class="txt_field">
          <div class="txt_field">
            <input type="text" required>
            <label>Name: </label>
          </div>
          <div class="txt_field">
            <input type="password" required>
            <label>Phone: </label>
          </div>
          <div class="txt_field">
            <input type="text" required>
            <label>Address: </label>
          </div>
          <div class="txt_field">
            <input type="text" required>
            <label>Gender: </label>
          </div>
        </form>

      </div>
      <div style="display:flex; white-space: nowrap; margin-top: 10%;">
        <button onclick="document.location='adminhome.php'" style="margin-left: auto; border-radius: 5px;margin-right: 20px;">Back</button>
        <button onclick="document.location='adminhome.php'" style="margin-left: auto; border-radius: 5px;">Done</button>
      </div>
    </div>
  </div>

<div style="margin-top: 40%; background: #2E86C1; color:aliceblue; font-size: 14px;">
  <div>Why Us ? | Contact Us </div>
</div>

</body>



</html>