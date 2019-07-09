<?php
session_start();
include 'functions.php';
include 'session.php';

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" > 

<title>Give Details</title>

</head>
<body>
<div class="login-card">
<img id = "logo" src = "image/logo.png"/>

<form name = "myform" action = "update2.php" method = "POST" enctype = "multipart/form-data">
	<input type="text" name="user" placeholder="Account Number" pattern = "[0-9]{12}" required>
	<input type="text" name="pass" placeholder="Amount" required>
    <input type="submit" name="login" class="login login-submit" value="Add">

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

</body>
</html>