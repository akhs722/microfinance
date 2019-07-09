<?php
session_start();
include 'functions.php';
 include 'session.php';
	if(!isset($_POST['user']))
	{
		alert("Error....","6");
	}
$acc =    $_POST['user'];
$amount = $_POST['pass'];
$_SESSION['accno'] = $acc;



	include 'bond.php';
	if(!$con)
	alert("Error! check whether server is on..","6");
		
		$d = date("y-m-d");
		
		$q1 = "select * from xyz where accno = '$acc'";
		$result1 = mysqli_query($con,$q1);
		
		$row1 = mysqli_fetch_array($result1);
		$bal = $row1['balance'];
		$min = $row1['min'];
		$newbal = $bal + $amount;	
		$q2	= "select * from mno where accno = '$acc'";
		$result2 = mysqli_query($con,$q2);
	
		if(!mysqli_num_rows($result2))
		{
			$min = $bal;
			$q1a = "update xyz set min = '$min' where accno = '$accno'";
			if(!mysqli_query($con,$q1a))
			alert("Error! Contact admin1..","6");
		}
		else
		{
			$q2 = "select * from mno where date = '$d' and accno = '$accno'";
			if(mysqli_query($con,$q2))
			{
				$min = $bal;
				$q1a = "update xyz set min = '$min' where accno = '$accno'";
				if(!mysqli_query($con,$q1a))
				alert("Error! Contact admin2..","6");
			}
			else
			{
				$min = $amount + $bal;
				$q1a = "update xyz set min = '$min' where accno = '$accno'";
				if(!mysqli_query($con,$q1a))
				alert("Error! Contact admin3..","6");
			}	
			
		}
		
		$q1a = "update xyz set balance = '$newbal' where accno = '$acc'";
		if(mysqli_query($con,$q1a))
		{			
			date_default_timezone_set('Asia/Kolkata');
			$user = $_SESSION['username']; 
			$t = date("H:i:s");
			$q2 = "insert into mno(accno,date,time,debit,credit,endamont,medium) values ('$acc','$d','$t','0','$amount','$newbal','$user')";	
			if(mysqli_query($con,$q2))
			{
				mysqli_close($con);
				alert("Success your updated Balance is INR.$newbal",4);
			}
		else
			{
				mysqli_close($con); 
				alert("Unsuccessful1...","6");
			}
			
	 }
	 else
	 {
		 	mysqli_close($con); 
			alert("Unsuccessful2...","6");
	 }
			 
	
	
?>