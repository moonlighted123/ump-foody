<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $address = $usertype = $password =  $phonenum = "";
$username_err = $address_err = $usertype_err = $password_err = $phonenum_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    // Validate name
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a name.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid name.";
    } else{
        $username = $input_username;
    }
    
    // Validate address address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }

    $input_usertype = trim($_POST["usertype"]);
    if(empty($input_usertype)){
        $usertype_err = "Please enter an usertype.";     
    } else{
        $usertype = $input_usertype;
    }

    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter an password.";     
    } else{
        $password = $input_password;
    }
    
    
    // Validate phonenum
    $input_phonenum = trim($_POST["phonenum"]);
    if(empty($input_phonenum)){
        $phonenum_err = "Please enter the phonenum amount.";     
    } elseif(!ctype_digit($input_phonenum)){
        $phonenum_err = "Please enter a positive integer value.";
    } else{
        $phonenum = $input_phonenum;
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($address_err) && empty($usertype_err) && empty($password_err) && empty($phonenum_err)){
        // Prepare an update statement
        $sql = "INSERT INTO user (username, address, usertype, password, phonenum) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_address, $param_usertype, $param_password, $param_phonenum);
            
            // Set parameters
            $param_username = $username;
            $param_address = $address;
            $param_usertype = $usertype;
            $param_password = $password;
            $param_phonenum = $phonenum;
            $param_userid = $userid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        

    </style>
</head>
<body style="background:linear-gradient(120deg, #2980b9, #8e44ad);">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <input name="usertype" class="form-control <?php echo (!empty($usertype_err)) ? 'is-invalid' : ''; ?>"><?php echo $usertype; ?></input>
                            <span class="invalid-feedback"><?php echo $usertype_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"><?php echo $password; ?></input>
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>phonenum</label>
                            <input type="text" name="phonenum" class="form-control <?php echo (!empty($phonenum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phonenum; ?>">
                            <span class="invalid-feedback"><?php echo $phonenum_err;?></span>
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>