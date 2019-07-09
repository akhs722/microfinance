<?php
session_start();
include 'bond.php';
include 'session.php';

?>	
<!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
	<title>Daily Expenditure </title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="footer.css" media="screen" type="text/css" >
	<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type = "text/javascript">
	
$(document).ready(function()
	{		
		$('#table').load('load.php');
		refresh();
	});

	function refresh()
	{
		setTimeout(function()
		{
			$('#table').load('load.php');
			refresh();
		},2000); 
	}


$(document).ready(function(){

	$('#save').click(function(){
		$.post("new.php", 
			{item: $('#item').val(), qty: $('#qty').val()} 
		
		);
		
	});
});	
	
	
	</script>
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
		display: inline-table;
		overflow-y:scroll;
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
	<table id="buttonTab" width="510px" align="center">
		
	</table>
	<br/>
	<form method="post">
	<table id="dataTable" width="360px" border="1" align="center">
		<tr>
			<th align="center">Items</th>
			<th align="center">Cost</th>
		</tr>
		<tr>
			<td> <input type="text" size="40"  id = "item" name="item"/> </td>
			<td> <input type="text" style="text-align:right;" id = "qty" name="qty"/> </td>
		</tr>
	</table>
	
	<br/>
	<table id="buttonTab" width="510px" align="center">
		<tr>
			<td align="left"><input type="reset" name="reset" value="Reset"/></td>
			<td align="right"><input type="submit" name="save" id = "save" style="float: left; display: inline-block; vertical-align: bottom;" value="Save"/></td>
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
	<a href="adminportal.php"  style = "text-decoration:none;color:black;">Back to Portal</a>
  </div>
	<div id="footer">
           
			</div>
</body>
</html>