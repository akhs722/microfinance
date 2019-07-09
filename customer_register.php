<?php
session_start();
include 'functions.php';
include 'session.php';
 ?>
<!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
<title>Register Customer</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >

<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type = "text/javascript" src = "js/validate.js"></script>
<style type = "text/css">

.login-card{
	padding:100px;
}
</style>
</head>
<body>
<div class="login-card">
<img id="logo" src = "image/logo.png"/>

<form name = "myform" action = "registerc.php" method = "post"  enctype = "multipart/form-data">

<input type="text" name="user" placeholder="Full Name" required>
<input type="radio" name="gender" value="male" checked> Male<br>
<input type="radio" name="gender" value="female"> Female<br>
<input type="radio" name="gender" value="other"> Other<br><br>

<input name="dob" type="text" placeholder="Birth date&nbsp(yyyy-mm-dd)" pattern = "[0-9]{4}-[0-9]{2}-[0-9]{2}" title = "yyyy-mm-dd" required >

<input name="sonof" type="text" placeholder="Father's Name/Husband's Name" required >
<input name="mob" type="text" placeholder="Mobile Number" pattern =  "[0-9]{10}" required >
<input name="email" type="email" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >

<input name="state" type="text" placeholder="State" required >


<input name="city" type="text"placeholder="City" required >

<input name="add" type="text"placeholder="Address as Mentioned on Id" required>


<input name="pin" type="text" placeholder="Pin" required >

<input name="occ" type="text" placeholder="Occupation" required >
<input name="uid" type="text" placeholder="AAdhar Number" pattern = "[0-9]{12}" required >
<input name="pan" type="text" placeholder= "PAN Number">

<select name ="type">
<option>SAVINGS</option>
<option>RD</option>
<option>FD</option>
</select>
<input accept="image/*" id= "image" name="photo" type="file"required>
<input type="submit"  name="login" class="login login-submit" value="register">

<div class="login-help">
<?php
if(isset($_SESSION['admin']))
	$y = 1;
	else
		$y = 0;
?>
    <a href=<?php if($y==1)
		echo "adminportal.php";else echo "portal.php";?> >Back to Portal</a>
  </div>

</form>
<div id="footer">
         </div>
</body>
</html>
