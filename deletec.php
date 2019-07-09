<?php
session_start();
include 'functions.php';
include 'session.php';

?>
<html>
<head>
<title>Give Details</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >

<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type = "text/javascript">
$(function(){
  $("#footer").load("footer.html"); 
});
 
function validate()
	{
		
		var accno = document.myform.accno.value;
		var n = document.myform.accno.value.length;
		if(isNaN(accno))
		{
			alert("Account Number Should Be Numeric Only");
			return false;
		}
			if(n < 7||m > 12)
		{
			alert("Overflow/Underflow");
			return false;
		}
		
		else
			return true;
	
	
	}

</script>
</head>
<body>
<div class="login-card">
<img id = "logo" src = "image/logo.png"/>

<form name = "myform" action = "delete.php" method = "POST" onsubmit = "return(validate());">

	<p color= "red">Alert!!Delete will Result in data loss...</p>
		<input type="text" name="mem_id" placeholder="MEM_ID">
    <input type="submit" name="login" class="login login-submit" value="Delete">
<div class="login-help">
    <a href="adminportal.php">Back to Portal</a>
  </div>
</form>
<div id="footer">
</div>
</body>
</html>