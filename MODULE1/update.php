<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $address = $phonenum = "";
$username_err = $address_err = $phonenum_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["userid"]) && !empty($_POST["userid"])){
    // Get hidden input value
    $userid = $_POST["userid"];
    
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
    if(empty($username_err) && empty($address_err) && empty($phonenum_err)){
        // Prepare an update statement
        $sql = "UPDATE user SET username=?, address=?, phonenum=? WHERE userid=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_username, $param_address, $param_phonenum, $param_userid);
            
            // Set parameters
            $param_username = $username;
            $param_address = $address;
            $param_phonenum = $phonenum;
            $param_userid = $userid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: userlist.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["userid"]) && !empty(trim($_GET["userid"]))){
        // Get URL parameter
        $userid =  trim($_GET["userid"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM user WHERE userid = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_userid);
            
            // Set parameters
            $param_userid = $userid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $username = $row["username"];
                    $address = $row["address"];
                    $phonenum = $row["phonenum"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <label>phonenum</label>
                            <input type="text" name="phonenum" class="form-control <?php echo (!empty($phonenum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phonenum; ?>">
                            <span class="invalid-feedback"><?php echo $phonenum_err;?></span>
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="userlist.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>