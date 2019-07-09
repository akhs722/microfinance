<?php
session_start();
include 'functions.php';
include 'session.php'; 
 
if(!isset($_POST['user']))
{
	alert("Error...","7");
}


 $acc =    $_POST['user'];
 $amount = $_POST['pass'];
$_SESSION['accno'] = $acc;
	include 'bond.php';
	if(!$con)
	{
		alert("Error! check whether server is on..","7");
	}
 
 $q = "select * from xyz where accno = '$acc'";
 $result = mysqli_query($con,$q);
 $n = mysqli_num_rows($result);
		
		if($n==0)
		{
			alert("Account Number Not Registered","7");
		}
	else
	{	
	 $row = mysqli_fetch_array($result);
	 $min = $row['min'];
	 $bal = $row['balance'];

			if($bal < $amount)
		  alert("Insufficient Funds","7");
			
		else
		{
		
		$newbal = $bal - $amount;
		if($min <= $newbal)
		{
			$flag=0;	
		}
		else
		{
			$min = $newbal;
			$p = "update xyz set min = '$min' where accno = '$acc'"; 
			if(!mysqli_query($con,$p))
			{
				alert("Error 1...","7");
			}
		}

	 
	 $p = "update xyz set balance = '$newbal' where accno = '$acc' ";
	 if(mysqli_query($con,$p))
	 {			
			date_default_timezone_set('Asia/Kolkata');
			$d = date("y-m-d");
			$user = $_SESSION['username'];
			$t = date("H:i:s");
			$p = "insert into mno(accno,date,time,debit,credit,endamont,medium) values ('$acc','$d','$t','$amount','0','$newbal','$user')";	
		 	$n = mysqli_query($con,$p);
			if($n)
			{
				mysqli_close($con);
				alert("Success your updated Balance is INR$newbal",4);
			}
			else
			{
				mysqli_close($con); 
				alert("Unsuccessful...","7");
			}
			
	 }
	 else
	 {
		 	mysqli_close($con); 
			alert("Unsuccessful...","7");
	 }
		}
	}	
?>