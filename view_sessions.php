<!doctype html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/table.css">
<title>Sessions</title>
</head>

<body>
<?php
	include 'bond.php';
	include 'functions.php';
	if(!$con)
	{
		alert("Error! check whether server is on..","8");
	}
		
	else
	{
		$q  = "select * from session_details order by id desc";
		$res = mysqli_query($con,$q);
		$count = mysqli_num_rows($res);
		if($count==0)
		{
			mysqli_close($con);
			alert("Nothing to Show....","2");
		}
	}
?>	
<img id = "logo" src = "image/logo.png"/>

<table align = "center" width = "70%" border cellspacing = 2px >
		<tr>
		<th>SESSION ID</th> 
		<th>USER</th>
		<th>DATE</th>
		<th>TIME</th>
		</tr>
		
		<?php for($i=0;$i<$count;$i++) {?>	
				<?php $row = mysqli_fetch_array($res);?>
				<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['user'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['time'];?></td>
				</tr>
	<?php } ?>
	
</table>
 <div class="login-help">
	<a href = "adminportal.php">Back To Portal</a>
 </div>
</body>

</html>
