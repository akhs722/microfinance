<?php
	session_start();
include 'session.php';
		
?>

<html>
<head>
	<title>Employee Salary Register</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script type = "text/javascript">
	
	$(document).ready(function()
	{		
		$('#table').load('load2.php');
		refresh();
	});

	function refresh()
	{
		setTimeout(function()
		{
			$('#table').load('load2.php');
			refresh();
		},2000); 
	}
	
	
	$(document).ready(function(){

	$('#save1').click(function(){
		$.post("esalary2.php", 
			{ename: $('#ename').val(), eid: $('#eid').val(), salary : $('#salary').val()} 
		
		);
		
	});
});	
	
		

	</script>
	<style type="text/css">
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
		display: inline-table;
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
</head>
<body>
	<img id = "logo" src = "image/logo.png"/>
	<br/>
		<p align="center" style="font-size:26; font-weight:bold;">Employee Salary Register </p>
	<hr/>
	
	<br/>
	
	<table id="dataTable" width="360px" border="1" align="center">
		<tr>
			
			<th align="center">Employee Name</th>
			<th align="center">Employee ID</th>
			<!--<th align="center">Attending</th>
			<th align="center">Absent/Leave</th>
			<th align="center">TA</th>
			<th align="center">DA</th>
			<th align="center">Grade Pay</th>-->
			<th align="center">Salary</th>
			
			
		</tr>
		<form method = "post">
		<tr>
			
			
			<td> <input type="text" name = "ename" id="ename" style="text-align:right;" /> </td>
			<td> <input type="text" name = "eid" id = "eid" style="text-align:right;" /> </td>
			<!--<td> <input type="text" name = "attend" style="text-align:right;" /> </td>
			<td> <input type="text" name = "leave" style="text-align:right;" /> </td>
			<td> <input type="text" name = "ta" style="text-align:right;" /> </td>
			<td> <input type="text" name = "da" style="text-align:right;" /> </td>
			<td> <input type="text" name="pay" style="text-align:right;" /> </td> -->
			<td> <input type="text" name="salary" id = "salary" style="text-align:right;" /> </td>
		</tr>
	</table>
	
	<br/>
	<hr/>
	
	<table id="buttonTab" width="510px" align="center">
		<tr>
			<td align="right"><input type="submit" name="calc" style="float: left; display: inline-block; vertical-align: bottom;" id="save1" value="Save"/>
		</tr>
	</table>
	</form>
	<br/>
	<hr/>
	<br/>
	<div id = "table">
	</div>
	<div class="login-help">
	<a href="http://localhost/phpmyadmin/tbl_export.php?db=mudrashi&table=esalary&single_table=true" target="_blank"  style = "text-decoration:none;color:black;">Export as CSV</a>
    </br></br>
<?php
if(isset($_SESSION['admin']))
	$y = 1;                                   // Switching between admin and user control 
		else
		$y = 0;
?>
    <a style = "text-decoration:none;"href=<?php if($y==1)
		echo "adminportal.php";else echo "portal.php";?> >Back to Portal</a>
  </div>
	<div id="footer">
	</div>
</body>
</html>