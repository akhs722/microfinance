<?php
session_start();
		include 'functions.php';
		include 'session.php';
		include 'bond.php';
		if(!$con)
		alert("Check whether server is switched on or not..","-1");
		else
		{
	if(isset($_POST['login']))
	{	
		if(!empty($_POST['memid']))
		$x = $_POST['memid'];
	
		$q = "select * from abc where mem_id = '$x'";
		$result = mysqli_query($con,$q);
		if(mysqli_num_rows($result))
		{	
			$_SESSION['mem_id'] = $x;
			
			if(!empty($_POST['user']))
			{
				$name = strtoupper($_POST['user']);
				$q = "update abc set name = '$name' where mem_id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['sonof']))
			{
				$sonof = strtoupper($_POST['sonof']);
				$q = "update abc set sonof = '$sonof' where mem_id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['mob']))
			{
				$mob = $_POST['mob'];		
					$q = "update customer set mob = '$mob' where mem_id = '$x'";
					if(!mysqli_query($con,$q))
					{
						alert("This data belongs to another person","9");
					}
				}
			}
			if(!empty($_POST['email']))
			{
					$email = $_POST['email'];
					$q = "update abc set email = '$email' where mem_id = '$x'";
					if(!mysqli_query($con,$q))
					{
						alert("This data belongs to another person","9");
					}
			}
				if(!empty($_POST['dob']))
				{
				$dob = $_POST['dob']; 
				$q = "update abc set dob = '$dob' where mem_id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['state']))
			{	
				$state = strtoupper($_POST['state']); 
				$q = "update abc set state = '$state' where mem_id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['city']))
			{
				$city = strtoupper($_POST['city']);
				$q = "update abc set city = '$city' where mem_id = '$x'";
				mysqli_query($con,$q);			
			}
			if(!empty($_POST['add']))
			{
				$add= $_POST['add'];
				$q = "update abc set address = '$add' where mem_id = '$x'";
				mysqli_query($con,$q);			
			}
			if(!empty($_POST['uid']))
			{
				$adhar=	$_POST['uid'];
				$q = "update abc set aadhar = '$adhar' where mem_id = '$x'";
				if(!mysqli_query($con,$q))
					{
						alert("This data belongs to another person","9");
					}
			}
			if(!empty($_POST['gender']))
			{
				$gender = strtoupper($_POST['gender']);
				$q = "update abc set gender = '$gender' where mem_id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['pan']))
			{
				$pan = $_POST['pan'];
				$q = "update abc set pan = '$pan' where mem_id = '$x'";
				if(!mysqli_query($con,$q))
					{
						alert("This data belongs to another person","9");
					}
			}
			if(!empty($_POST['pin']))
			{
				$pin = $_POST['pin'];
				$q = "update abc set pin = '$pin' where mem_id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['occ']))
			{
				$occ = strtoupper($_POST['occ']);
				$q = "update abc set occ = '$occ' where mem_id = '$x'";
				mysqli_query($con,$q);
			}
			alert("Details Updated successfully...","1");
		}
		
		
		}
	
?>
<!doctype html>

<head>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
<title>Update Customer Details</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >

<script type = "text/javascript" src = "js/validate.js"></script>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css">
.login-card{
	padding:100px;
}
</style>
</head>
<body>


<div class="login-card">
<img id="logo" src = "image/logo.png"/>
<form name = "myform" method = "post" enctype = "multipart/form-data">
 
<input type="text" name="memid" placeholder="MEM_ID" required>
<input type="text" name="user" placeholder="Full Name">

<input type="radio" name="gender" value="male" checked> Male<br>
<input type="radio" name="gender" value="female"> Female<br>
<input type="radio" name="gender" value="other"> Other<br><br>

<input name="dob" type="text" pattern = "[0-9]{4}-[0-9]{2}-[0-9]{2}" title = "yyyy-mm-dd" placeholder="Birth date&nbsp(yyyy-mm-dd)">

<input name="sonof" type="text" placeholder="Father's Name/Husband's Name">
<input name="mob" type="text" pattern =  "[0-9]{10}" placeholder="Mobile Number">
<input name="email" type="email" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
<input type="text" name="occ" placeholder="Occupation">
<input name="state" type="text" placeholder="State">


<input name="city" type="text"placeholder="City">

<input name="add" type="text"placeholder="Address as Mentioned on Id">


<input name="pin" type="text" placeholder="Pin">
<input name="uid" type="text" pattern =  "[0-9]{12}" placeholder="AAdhar Number">
<input name="pan" type="text" placeholder= "PAN Number">
<input type="submit"  name="login" class="login login-submit" value="Update">

<div class="login-help">
 <a href="adminportal.php">Back to Portal</a>
 </div>

</form>
<div id="footer">
            
			</div>
</body>
</html>
