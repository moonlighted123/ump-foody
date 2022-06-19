<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$foodname = $Address = $orderstatus = "";
$foodname_err = $Address_err = $orderstatus_err =  "";
 
// Processing form data when form is submitted
if(isset($_POST["Orderid"]) && !empty($_POST["Orderid"])){
    // Get hidden input value
    $Orderid = $_POST["Orderid"];
    
    // Validate name
    $input_foodname = trim($_POST["foodname"]);
    if(empty($input_foodname)){
        $foodnamee_err = "Please enter a name.";
    } elseif(!filter_var($input_foodname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $foodname_err = "Please enter a valid name.";
    } else{
        $foodname = $input_foodname;
    }
    
    // Validate address address
    $input_Address = trim($_POST["Address"]);
    if(empty($input_Address)){
        $Address_err = "Please enter an address.";     
    } else{
        $Address = $input_Address;
    }

    $input_orderstatus = trim($_POST["orderstatus"]);
    if(empty($input_orderstatus)){
        $orderstatus_err = "Please enter an order status.";     
    } else{
        $orderstatus = $input_orderstatus;
    }
    
   
    
    // Check input errors before inserting in database
    if(empty($foodname_err) && empty($Address_err) &&  empty($orderstatus_err)){
        // Prepare an update statement
        $sql = "UPDATE orderlist SET foodname=?, Address=?, orderstatus=? WHERE Orderid=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_foodname, $param_Address,  $param_orderstatus, $param_Orderid);
            
            // Set parameters
            $param_foodname = $foodname;
            $param_Address = $Address;
            $param_orderstatus = $orderstatus;
            $param_Orderid = $Orderid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ownerOrderlist.php");
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
    if(isset($_GET["Orderid"]) && !empty(trim($_GET["Orderid"]))){
        // Get URL parameter
        $Orderid =  trim($_GET["Orderid"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM orderlist WHERE Orderid = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_Orderid);
            
            // Set parameters
            $param_Orderid = $Orderid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $foodname = $row["foodname"];
                    $Address = $row["Address"];
                    $orderstatus = $row["orderstatus"];
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
                            <label>Food Name</label>
                            <input type="text" name="foodname" class="form-control <?php echo (!empty($foodname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $foodname; ?>">
                            <span class="invalid-feedback"><?php echo $foodname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="Address" class="form-control <?php echo (!empty($Address_err)) ? 'is-invalid' : ''; ?>"><?php echo $Address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $Address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Order Status</label>
                            <input type="text" name="orderstatus" class="form-control <?php echo (!empty($orderstatus_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $orderstatus; ?>">
                            <span class="invalid-feedback"><?php echo $orderstatus_err;?></span>
                        </div>
                        <input type="hidden" name="Orderid" value="<?php echo $Orderid; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="ownerOrderList.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>