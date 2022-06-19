<html>  
<head>  

<link rel="stylesheet" href="css\style.css">
    <title>UMP FOODY</title>  

	<style>
	
	body {
  background-color: #D1D2D2;
} 
#frm{  
    border: solid gray 1px;  
    width:25%;  
    border-radius: 2px;  
    margin: 120px auto;  
    background: white;  
    padding: 50px;  
}  
#btn{  
    color: #fff;  
    background: #61DC40;  
    padding: 7px;  
    margin-left: 70%;  
}  </style>

</head>  
<body>  
    <div id = "frm">  
       <center> <h1>UMP-FOODY</h1>  
	   <h3>Login</h3>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">  
            <p>  
			
		 <br><br>
                <label> Username: </label>  
                <input type = "text" id ="username" name  = "username" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="password" name  = "password" />  
            </p>  
           
		   <p>     
                <input type =  "submit" id = "btn" value = "Login" />  

            </p>  
        </form>  
    </div>  </center>
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  