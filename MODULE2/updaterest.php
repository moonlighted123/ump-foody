<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$restname = $location = $contact = $operation = "";
$restname_err = $location_err = $contact_err = $operation_err =  "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_restname = trim($_POST["restname"]);
    if(empty($input_restname)){
        $restnamee_err = "Please enter a name.";
    } elseif(!filter_var($input_restname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $restname_err = "Please enter a valid name.";
    } else{
        $restname = $input_restname;
    }
    
    // Validate location location
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter an address.";     
    } else{
        $location = $input_location;
    }

    $input_operation = trim($_POST["operation"]);
    if(empty($input_operation)){
        $operation_err = "Please enter an operation.";     
    } else{
        $operation = $input_operation;
    }
    
    // Validate phonenum
    $input_contact = trim($_POST["contact"]);
    if(empty($input_contact)){
        $contact_err = "Please enter the contact.";     
    } elseif(!ctype_digit($input_contact)){
        $contact_err = "Please enter a positive integer value.";
    } else{
        $contact = $input_contact;
    }
    
    // Check input errors before inserting in database
    if(empty($restname_err) && empty($location_err) && empty($contact_err) && empty($operation_err)){
        // Prepare an update statement
        $sql = "UPDATE restdetails SET restname=?, location=?, contact=?, operation=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_restname, $param_location, $param_contact, $param_operation, $param_id);
            
            // Set parameters
            $param_restname = $restname;
            $param_location = $location;
            $param_contact = $contact;
            $param_operation = $operation;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: restlist.php");
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
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM restdetails WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $restname = $row["restname"];
                    $location = $row["location"];
                    $contact = $row["contact"];
                    $operation = $row["operation"];
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
                            <label>Restaurant Name</label>
                            <input type="text" name="restname" class="form-control <?php echo (!empty($restname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $restname; ?>">
                            <span class="invalid-feedback"><?php echo $restname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="location" class="form-control <?php echo (!empty($location_err)) ? 'is-invalid' : ''; ?>"><?php echo $location; ?></textarea>
                            <span class="invalid-feedback"><?php echo $location_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="contact" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact; ?>">
                            <span class="invalid-feedback"><?php echo $contact_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Operation Hours</label>
                            <input type="text" name="operation" class="form-control <?php echo (!empty($operation_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $operation; ?>">
                            <span class="invalid-feedback"><?php echo $operation_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="restlist.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>