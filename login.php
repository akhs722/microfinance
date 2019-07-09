<?php
session_start();
include 'functions.php';
include 'bond.php';
			if(!$con)
			alert("Check whether server is switched on or not..","-1");
	
else
{		
	if(isset($_POST['login']))
	{			
			$user_name = mysqli_real_escape_string($con, $_POST['user']); 
			$password = mysqli_real_escape_string($con, $_POST['pass']);    
			$usertype = $_POST['usertype'];   //checking which user is trying to login.
			
			if(strcmp("admin",$usertype)==0)  //For admin.
			{
				$q = "select * from efg where username = '$user_name' and aes_decrypt(password,6) = '$password'";  //efg is a table which stores critical infromation. 
				$res_efg = mysqli_query($con,$q);
				$count_efg = mysqli_num_rows($res_efg);
				if($count_efg==1)
				{
					$_SESSION['admin'] = $user_name;          //For admin logging. 
							date_default_timezone_set('Asia/Kolkata');
							$current_date = date("y-m-d");	
							$current_time = date("h:i:sa");
					$q = "insert into session_details(user,date,time) values ('$user_name','$current_date','$current_time')"; 
					if(mysqli_query($con,$q))	//Updating session details in the session table.
						alert("Welcome Admin","2");
					else
						alert("Error contact Akhil","-1");	
				}
				else
				{
					alert("Wrong Credentials.....","-1");
				}	
			}
			else
			{
				$q = "select * from pqr where id = '$user_name' and aes_decrypt(password,5) = '$password'";
				if(!mysqli_query($con,$q))
				{
					alert("Wrong Credentials....","-1");	
				}
				else
					{                    						//For employee logging.
						$res_pqr = mysqli_query($con,$q);
						$count_pqr = mysqli_num_rows($res_pqr);
						if($count_pqr==1)
						{
							$_SESSION['username'] = $user_name;
							date_default_timezone_set('Asia/Kolkata');
							$current_date = date("y-m-d");	
							$current_time = date("h:i:sa");
							$q = "insert into session_details(user,date,time) values ('$user_name','$current_date','$current_time')";
							if(mysqli_query($con,$q))	  //Updating session details in the session table.
							header('location:portal.php');
							else
							alert("Error contact Akhil","-1");
						}
						else
						{
							alert("Wrong Credentials.....","-1");
						}		
					} 
			}
		}
}
?>
<!doctype html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >

  <meta charset="UTF-8">

  <title>Log-in</title>
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
</head>

<body>

  <div class="login-card">
    <img id ="logo" src="image/logo.png"/>
	
<form  method="post"enctype = "multipart/form-data"> 
  
    <input type="text" name="user" placeholder="Username" required>
	<input type="password" name="pass" placeholder="Password" required>
	</br></br>
	<input type="radio" name="usertype" value="admin"checked> Admin
	<input type="radio" name="usertype" value="employee" > Employee
	</br></br>
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>
<div id="footer">

</div>

</body>

</html>