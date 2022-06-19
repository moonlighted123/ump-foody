<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $usertype = "";
$username_err = $password_err = $usertype_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid username.";
    } else{
        $username = $input_username;
    }
    
    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter an password.";     
    } else{
        $password = $input_password;
    }
    
    // Validate usertype
    $input_usertype = trim($_POST["usertype"]);
    if(empty($input_usertype)){
        $usertype_err = "Please enter the usertype.";     
    }  else{
        $usertype = $input_usertype;
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($usertype_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO userlist (username, password, usertype) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_usertype);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            $param_usertype = $usertype;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: userprofile.php");
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
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create User</h2>
                    <p></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>USERNAME:</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>PASSWORD:</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"><?php echo $password; ?></textarea>
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group"
						<label>USERTYPE:</label>
						<select name="usertype" class="form-control <?php echo (!empty($usertype_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $usertype; ?>">
							
							<option value=""></option>
							<option value="owner">OWNER</option>
							<option value="rider">RIDER</option>
							<option value="customer">CUSTOMER</option>
						</select>
                            
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="userprofile.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>