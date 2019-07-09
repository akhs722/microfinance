<?php
session_start();
include 'functions.php';
include 'session.php';
include 'bond.php';
		if(!$con)
		alert("Check whether server is switched on or not..","-1");
	
	if(isset($_POST['login']))
	{	
		$x = $_POST['id'];
		$q = "select * from pqr where id  = '$x'";
		$result = mysqli_query($con,$q);
		if(mysqli_num_rows($result))
		{	
			$_SESSION['eid'] = $x;
			
			if(!empty($_POST['mob']))
			{
				$mob = $_POST['mob'];
				$q = "select * from pqr where mob = '$mob'";
				$result = mysqli_query($con,$q);
				$q = "update pqr set mob = '$mob' where id = '$x'";
					if(!mysqli_query($con,$q))
					{
							alert("This data belongs to another person","-3");
					}
			}
			
			if(!empty($_POST['email']))
			{
				$mail = $_POST['email'];
				$q = "update tech set email = '$mail' where id = '$x'";
				if(!mysqli_query($con,$q))
					{
							alert("This data belongs to another person","-3");
					}
			}
			if(!empty($_POST['dob']))
			{
				$dob = $_POST['dob']; 
				$q = "update pqr set dob = '$dob' where id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['user']))
			{	
				$name = strtoupper($_POST['user']); 
				$q = "update pqr set name = '$name' where id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['state']))
			{	
				$state = strtoupper($_POST['state']); 
				$q = "update pqr set state = '$state' where id = '$x'";
				mysqli_query($con,$q);
			}
			if(!empty($_POST['city']))
			{
				$city = strtoupper($_POST['city']);
				$q = "update pqr set city = '$city' where id = '$x'";
				mysqli_query($con,$q);			
			}
			if(!empty($_POST['add']))
			{
				$add= $_POST['add'];
				$q = "update pqr set address = '$add' where id = '$x'";
				mysqli_query($con,$q);			
			}
			if(!empty($_POST['uid']))
			{
				$adhar=	$_POST['uid'];
				$q = "update pqr set aadhar = '$adhar' where id = '$x'";
				if(!mysqli_query($con,$q))
					{
							alert("This data belongs to another person","-3");
					}
			}
			if(!empty($_POST['gender']))
			{
				$gender = strtoupper($_POST['gender']);
				$q = "update pqr set gender = '$gender' where id = '$x'";
				mysqli_query($con,$q);
			}
			$uid = $_POST['uid'];	
			$q = "select * from abc where aadhar = '$uid'";
			$res = mysqli_query($con,$q);
			$n = mysqli_num_rows($res);
			if($n)
			alert("Redirecting you to customer update page Admin please update the details there also...","9");
			else
			alert("update successful","2");
		}
		else
		{
			alert("Wrong Employee Id...","-3");
		}
	}
	?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes"/>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<title>Update Employee Details</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<div class="login-card">
<img id="logo" src = "image/logo.png"/>
<form name = "myform" method = "post" enctype = "multipart/form-data">


<input type="text" name="id" placeholder="User Id" required>
<input type="text" name="user" placeholder="Update Full Name" >
<input type="radio" name="gender" value="male" checked> Male<br>
 <input type="radio" name="gender" value="female"> Female<br>
 <input type="radio" name="gender" value="other"> Other<br><br>

<input name="dob" type="text" pattern = "[0-9]{4}-[0-9]{2}-[0-9]{2}" title = "yyyy-mm-dd" placeholder="Update Birth date&nbsp(yyyy-mm-dd)">
<input name="mob" type="text" pattern =  "[0-9]{10}" placeholder="Update Mobile Number" >
<input name="email" type="email" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
<input name="state" type="text" placeholder="Update State" >
<input name="city" type="text"placeholder="Update City">

<input name="add" type="text"placeholder="Update Address as Mentioned on Id" >
<input name="uid" type="text" pattern =  "[0-9]{12}" placeholder="Update AAdhar Number" required >
<input type="submit"  name="login" class="login login-submit" value="update">


<div class="login-help">
 <a href="adminportal.php">Back to Portal</a>
 </div>
</form>
<div id= "footer">

</div>
</body>
</html>