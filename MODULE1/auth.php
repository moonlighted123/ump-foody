<?php      
    include_once('config.php');  
	
    $username = $_POST['username'];  
    $password = $_POST['password'];  
	$usertype = $_POST[''];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
		$usertype = stripcslashes($usertype);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);
		$password = mysqli_real_escape_string($conn, $password); 		
      
        $sql_login_staff = "SELECT * FROM user WHERE username = '$username' and password = '$password' and usertype = 'admin'";  
		$sql_login_staff1 = "SELECT * FROM user WHERE username = '$username' and password = '$password' and usertype = 'owner'";
		$sql_login_staff2 = "SELECT * FROM user WHERE username = '$username' and password = '$password' and usertype = 'user'";
		$sql_login_staff3 = "SELECT * FROM user WHERE username = '$username' and password = '$password' and usertype = 'rider'";
		
		
        if($result_login_staff = $conn->query($sql_login_staff))
    {
        $rows_login_staff = $result_login_staff->fetch_array();
        if($total_login_staff = $result_login_staff->num_rows)
        {
        	

            $_SESSION['id'] = $rows_login_staff['id'];
            header('Location:../MODULE1/adminhome.php');
      
        }
		
            if($result_login_staff = $conn->query($sql_login_staff1))
    {
        $rows_login_staff = $result_login_staff->fetch_array();
        if($total_login_staff = $result_login_staff->num_rows)
        {
            

            $_SESSION['id'] = $rows_login_staff['id'];
            header('Location:../MODULE2/OwnerHome.php');
      
        }
		
		if($result_login_staff = $conn->query($sql_login_staff2))
    {
        $rows_login_staff = $result_login_staff->fetch_array();
        if($total_login_staff = $result_login_staff->num_rows)
        {
            

            $_SESSION['id'] = $rows_login_staff['id'];
            header('Location:../MODULE3/restlist.php');
      
        }
        
    }
		
    if($result_login_staff = $conn->query($sql_login_staff3))
{
    $rows_login_staff = $result_login_staff->fetch_array();
    if($total_login_staff = $result_login_staff->num_rows)
    {
        

        $_SESSION['id'] = $rows_login_staff['id'];
        header('Location:../MODULE4/ridernotes.php');
  
    }
		
		
        else
        {
            echo "Login failed";

        }
    }
}
	}
?>  