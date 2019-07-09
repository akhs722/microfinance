<?php
session_start();
include 'functions.php';
include 'session.php';
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/table.css">
<title>Passbook Print</title>
<script>
	function myFunction()
	{
		window.print();
	}
</script>

</head>
<body>
<?php

if(!isset($_POST['user']))
{
	alert("Error...","8");
}
$account = $_POST['user'];

	include 'bond.php';
	if(!$con)
	{
		alert("Error! check whether server is on..","8");
	}
		
	else
	{
		$q  = "select * from mno where accno = '$account' order by tid desc";
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

<table align = "center" width = "70%" border cellspacing = 2px >
		<tr>
		<th>TID</th> 
		<th>DATE</th>
		<th>TIME</th>
		<th>DEBIT</th>
		<th>CREDIT</th>
		<th>BALANCE</th>
		</tr>
		
		<?php for($i=0;$i<$n;$i++) {?>	
				<?php $row = mysqli_fetch_array($result);?>
				<tr>
				<td><?php echo $row['tid'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['time'];?></td>
				<td><?php echo $row['debit'];?></td>
				<td><?php echo $row['credit'];?></td>
				<td><?php echo $row['endamont'];?></td>
				</tr>
	<?php } ?>
		
		
	
	
	

		
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
 
 </body>
</html>