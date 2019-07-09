<?php
session_start();
include 'functions.php';
include 'session.php';
?>
<!DOCTYPE html>
<head>
<title>Reciept</title>

<style>
	#logo {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
	}
	table {
		border-collapse:collapse;
		width:100%;
		overflow-x:auto;
	}
	th{
		height:25px;
		background-color: #4CAF50;
    color: white;
	}
	td
	{
		text-align:center;
		height:25px;
	}
	#print
	{
		margin-left:737px;
		margin-top:30px;
	}
	.login-help {
					width: 100%;
					text-align: center;
					font-size: 12px;
					margin-top :20px;
				}
</style>
<script>
	function myFunction()
	{
		window.print();
	}
</script>

</head>
<body>
<?php
$account = $_SESSION['accno'];
include 'bond.php';
	if(!$con)
	alert("Error !! Check whether server is on","-1");
	
	else
	{
	$q  = "select * from mno order by tid desc";
	$result = mysqli_query($con,$q);
	
	$n = mysqli_num_rows($result);
	if($n==0)
	{
		mysqli_close($con);
		alert("Nothing to Show....","8");
	}
	}
?>	
<img id = "logo" src = "image/logo.png"/>
<div style="overflow-x:auto;">
<table align = "center" width = "100%" border cellspacing = 2px >
		<tr>
		<th>TID</th> 
		<th>Acc No</th>
		<th>DATE</th>
		<th>TIME</th>
		<th>DEBIT</th>
		<th>CREDIT</th>
		<th>BALANCE</th>
		</tr>
		<?php $row = mysqli_fetch_array($result);?>
				<tr>
				<td><?php echo $row['tid'];?></td>
				<td><?php echo $row['accno'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['time'];?></td>
				<td><?php echo $row['debit'].'.De';?></td>
				<td><?php echo $row['credit'].'.Cr';?></td>
				<td><?php echo 'INR'.$row['endamont'];?></td>
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
 
  </div>
</body>
</html>