<?php
	session_start();
	include 'functions.php';
	include 'session.php';
	
?>

<!DOCTYPE html>

<head>
<title>Details</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >

<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type = "text/javascript">
 	 $(function(){
  $("#footer").load("footer.html"); 
});
	function validate()
	{
		var n = document.myform.user.value.length;
		var id = document.myform.user.value;
	
			return true;
	
	
	}

</script>
</head>
<body>
<div class="login-card">
    
<img id = "logo" src = "image/logo.png"/>
<form name = "myform" action = "updatede_details.php" method = "post" onsubmit = "return(validate());">

<input type="text" name="user" placeholder="User-Id" required>
<input type="submit" name="login" class="login login-submit" value="Search">
<div class="login-help">

    <a href="adminportal.php">Back to Portal</a>
  </div>

</form>
<div id="footer">
	</div>
</body>
</html>




