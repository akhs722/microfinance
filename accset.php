<?php
include 'functions.php';
session_start();
include 'session.php';
		include 'bond.php';
			if(!$con)
			alert("Check whether server is switched on or not..","-1");
error_reporting(0);
$q = "select * from acset";
$result = mysqli_query($con,$q);
$row = mysqli_fetch_array($result);

$switch = $_POST['switch'];
$time = $_POST['time'];
$minbal = $_POST['minamt'];
$savings = $_POST['savact'];
$fixed = $_POST['fdact'];
$recurring = $_POST['rdact'];
$after = $_POST['after'];
$loan = $_POST['lnact'];
$time1 = $_POST['time1'];
$time2 = $_POST['time2'];
																			
//Below is the query for updating the values in the corresponding table.		
$query = "UPDATE acset set min_bal = '$minbal', inte_sav = '$savings',  
  inte_rd = '$recurring',inte_fd = '$fixed',interest_after = '$after',loan_int = '$loan',time1 = '$time1',time2 = '$time2',switch = '$switch' ";

	if(isset($_POST['minamt']) && isset($_POST['savact']) && isset($_POST['fdact']) && 
	isset($_POST['rdact']) && isset($_POST['lnact'])&&isset($_POST['time1'])&&isset($_POST['time2'])&&isset($_POST['switch']))
	{	
		mysqli_query($con,$query);
		$check = mysqli_affected_rows($con);
		mysqli_close($con);
		if($check == 1)
		{
			alert("Update Successful", "2");
		}
	}
?>
<!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >

<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

</script>
<title>Account Settings</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="footer.css" media="screen" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
<div class="login-card">
<img id="logo" src = "image/logo.png"/>
<form name="accset" action="accset.php" method="post" enctype = "multipart/form-data">
Start Giving Interest (1/0): 
<input type="text" name="switch" value=<?php echo $row['switch']; ?>>
<br/>
Minimum Balance for Saving Account: 
<input type="text" name="minamt" value=<?php echo $row['min_bal']; ?>>            <!-- Showing the current stored values in the table for refernce -->
<br/>																		
Saving Account Interest Rate:		
<input type="text" name="savact" value=<?php echo $row['inte_sav']; ?>>
<br/>
Fixed Deposit Interest Rate:
<input type="text" name="fdact" value=<?php echo $row['inte_rd']; ?>>
<br/>
Recurring Deposit Interest Rate:
<input type="text" name="rdact" value=<?php echo $row['inte_fd']; ?>>
<br/>
Interest-Period:
<input type="text" name="after" value=<?php echo $row['interest_after']; ?>>
<br/>
Loan Interest Rate:
<input type="text" name="lnact" value=<?php echo $row['loan_int']; ?>>
<br/>
Time 1(24 hr format):
<input type="text" name="time1" value=<?php echo $row['time1']; ?>>
<br/>
Time 2(24 hr format):
<input type="text" name="time2" value=<?php echo $row['time2']; ?>>
<br/>
<input type="submit"  name="update" class="login login-submit" value="Update">
<div class="login-help">
<?php
if(isset($_SESSION['admin']))
	$y = 1;
	else
		$y = 0;
 ?>                                                         <!--Conditional selection to switch between employee portal or adminportal -->
    <a href=<?php 
	if($y==1)                                
		echo "adminportal.php";
	else 
		echo "portal.php";?> >Back to Portal</a>
	</div>

</form>
</div>

</body>
</html>