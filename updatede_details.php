<?php
session_start();
include 'functions.php';
include 'session.php';
include 'bond.php';
if(!$con)
alert("Check whether server is switched on or not...","-1");

?>
<!DOCTYPE html>
<meta charset="utf-8" />
<head>
<title> Employee Details</title>
<link rel="stylesheet" href="css/table.css">
<script>
	function myFunction()
	{
		window.print();
	}
</script>
</head>

<body>
<img id = "logo" src = "image/logo.png"/>
<form action = "adminportal.php" method = "post">
<?php
	if(isset($_POST['user']))
	{
		$emp_id = $_POST['user'];
		$q_pqr = "select * from pqr where id = '$emp_id'";
		$res_pqr = mysqli_query($con,$q_pqr);
			$count_pqr = mysqli_num_rows($res_pqr);
			if($count_pqr)	
				$row_pqr = mysqli_fetch_array($res_pqr);
			else
			alert("Employee Not Registered","-5");

	}
	elseif(isset($_GET['id']))
	{
		$emp_id = $_GET['id'];
		$q_pqr = "select * from pqr where id = '$emp_id'";
		$res_pqr = mysqli_query($con,$q_pqr);
		$count_pqr = mysqli_num_rows($res_pqr);
			$row_pqr = mysqli_fetch_array($res_pqr);
	}
	else
	{
			$emp_id = $_SESSION['eid'];
			$q_pqr = "select * from pqr where id = '$emp_id'";
			$res_pqr = mysqli_query($con,$q_pqr);
			$count_pqr = mysql_num_rows($res_pqr);
		if($count_pqr)
		{
				$row_pqr = mysqli_fetch_array($res_pqr); 		
				}
			else
			alert("Employee Not Registered","-5");
			
		
	}	
 ?>
<table align = "center" border="1" cellspacing="4" cellpadding="2">
<tr>
<td><img  id = "img" src="<?php echo "employee_image/".$emp_id.".png";?>"/></td>
<th>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['name']; ?></font>
</th>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">ID</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $emp_id; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Gender</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['gender'];  ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Mobile Number</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['mob']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Birth Date</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['dob']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">State</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['state']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">City</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['city']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Address</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['address']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Adhar Number</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_pqr['aadhar']; ?></font>
</td>
</tr>

</table>


<button id = "print" onclick="myFunction()">Print</button>
 <div class="login-help">
   
    <a href="adminportal.php">Back to Portal</a>
  </div>
  

 </form>
</body>	  
</html>