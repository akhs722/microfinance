<?php
session_start();
include 'functions.php';
include 'session.php';
include 'bond.php';
	if(!$con)
	alert("Check whether server is switched on or not...","3");
?>
<!doctype html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/table.css">
<title> Customer Details</title>
<script>
	function myFunction()
	{
		window.print();
	}
</script>
</head>

<body>
<img id = "logo" src = "image/logo.png"/>
<form action = "portal.php" method = "post">
<?php
	

	if(isset($_POST['user']))
	{
		$mem_id = $_POST['user'];
		$q_abc = "select * from abc where mem_id = '$mem_id'";
	}
	else if(isset($_SESSION['mem_id']))
	{
		$mem_id = $_SESSION['mem_id'];             
		$q_abc = "select * from abc where mem_id = '$mem_id'";
	}                                                                //getting the membership id of the customer from the either way.
	else if(isset($_GET['mem_id']))
	{
		$mem_id = $_GET['mem_id'];
		$q_abc = "select * from abc where mem_id = '$mem_id'";
	}
	else
	{                 
		alert("Error....");
	}
	
	$res_abc = mysqli_query($con,$q_abc);
	$count_abc = mysqli_num_rows($res_abc);         //table abc holds the general information related to customer.
	if($count_abc)
	{
			$row_abc = mysqli_fetch_array($res_abc);
			
		}
		else
		{
			alert("Account Number Not Registered","3");
		}
		
 ?>
 <div id="tab">
<table align = "center" border="1" cellspacing="4" cellpadding="2">
<tr>
<td><img  id = "img" src="<?php echo "customer_image/".$mem_id."a.png";?>"/></td>
<th>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['name']; ?></font>
</th>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">CRN</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $mem_id; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Account Number</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php 

$q_xyz = "select * from xyz where mem_id = '$mem_id'";           
 $res_xyz = mysqli_query($con,$q_xyz);      //table xyz holds the account related information.
 $row_xyz = mysqli_fetch_array($res_xyz);
$r = $row_xyz['balance'];
echo $row_xyz['accno']; ?>
</font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Gender</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['gender']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Mobile Number</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['mob']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Birth Date</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['dob']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">S/O</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['sonof']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">State</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['state']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">City</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['city']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Pin</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['pin']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Address</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['address']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Occupation</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['occupation']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Adhar Number</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['aadhar']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Pan</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['pan']; ?></font>
</td>
</tr>

<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Account Balance</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo 'INR.'.$row_xyz['balance']; ?></font>
</td>
</tr>
<tr>
<th>
<font face="Arial, Helvetica, sans-serif">Issue Date and Time</font>
</th>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row_abc['issue_date'].'   '.$row_abc['issue_time'] ; ?></font>
</td>
</tr>
</table>


<button id = "print" onclick="myFunction()">Print</button>
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
</div>
 
 </body>	  
</html>