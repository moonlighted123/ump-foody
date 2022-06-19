<?php

if (isset($_POST['create'])){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "foody";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $name = $_POST['name'];
  $price = $_POST['price'];
  
  
  //$picture = $_POST['picture'];
  
  $currentDirectory = getcwd();
  $uploadDirectory = "/images/";

  $errors = []; // Store errors here

  $fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed 

  $fileName = $_FILES['the_file']['name'];
  $fileSize = $_FILES['the_file']['size'];
  $fileTmpName  = $_FILES['the_file']['tmp_name'];
  $fileType = $_FILES['the_file']['type'];
  $fileNameCmps = explode(".", $fileName);
  $fileExtension = strtolower(end($fileNameCmps));

  $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

  if (!in_array($fileExtension,$fileExtensionsAllowed)) {
    $errors[] = "This file extension is not allowed. Please upload a JPEG, JPG, PNG file";
  }

  if ($fileSize > 4000000) {
    $errors[] = "File exceeds maximum size (4MB)";
  }

  if (empty($errors)) {
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    $picture = "http://localhost/ump-foody/MODULE2/images/" . basename($fileName);

    if ($didUpload) {
      //echo "The file " . basename($fileName) . " has been uploaded";
    } else {
      //echo "An error occurred. Please contact the administrator.";
    }
  } else {
    foreach ($errors as $error) {
      //echo $error . "These are the errors" . "\n";
    }
  }

  $sql = "INSERT INTO menureg (name, price, picture)
  VALUES ('$name', '$price', '$picture')";
  
  if ($conn->query($sql) === TRUE) {
    header("Location: ownerMenu.php", true, 301);
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
  
    .wrapper{
            width: 600px;
            margin: 0 auto;
        }
</style>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Home</title>
    <link rel="stylesheet" href="menureg.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    

</head>

<body>
<div class="sidenav">
        <a href="OwnerHome.php">Home</a>
        <a href="restlist.php">Restaurants</a>
        <a href="ownerMenu.php">Menu</a>
        <a href="menureg.php">Menu Reg</a>
        <a href="ownerOrderlist.php">Order List</a>
        <a href="ownerReport.php">Report</a>
        <a href="ownerCalc.php">Calculation</a>
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
   
    <div style="margin-top: 3%;" class="header">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Input Your Menu</h2>
                    
                    <form  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Menu Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file"> Upload Picture: </label>
                            <input type="file" name="the_file" id="fileToUpload">
                        </div>
                        
                        
                        <input type="submit"  name="create" class="btn btn-primary" value="Submit">
                        <a href="OwnerHome.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    </div>
    -->
    
    <!---------footer------->
    <div  style="margin-top: 5%;"  class="footer">
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