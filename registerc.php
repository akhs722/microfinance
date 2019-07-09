<?php
session_start();

include 'functions.php';
 include 'session.php';
	if(!isset($_POST['user']))
	{
		alert("Error...","0");
	}
$name = strtoupper($_POST['user']);
$gender= strtoupper($_POST['gender']);
$mob= $_POST['mob'];
$mail = $_POST['email'];
$dob= $_POST['dob'];
$sonofs= strtoupper($_POST['sonof']);
$state= strtoupper($_POST['state']);
$city= strtoupper($_POST['city']);
$pin=	$_POST['pin']; 
$add= $_POST['add'];
$occ =	strtoupper($_POST['occ']);
$adhar =	$_POST['uid'];

$pan = $_POST['pan'];   //This thing is creating a problem.

$acctype = $_POST['type'];
$f = $_FILES['photo'];
 include 'bond.php';
 if(!$con)
	{
		alert("Error !! Check whether server is on","0");
	}
else
{
		$q = "select * from pqr where aadhar = '$adhar' or mob = '$mob' or email = '$mail'";
		$result1 = mysqli_query($con,$q);
		$flag=0;
				if(mysqli_num_rows($result1))
				{
					$row = mysqli_fetch_array($result1);
					if(strcmp($row['name'],$name)!=0)
					{
						$flag=1;
						alert("Check Name..","0"); 
					}
					else if(strcmp($row['gender'],$gender)!=0)
					{
						$flag=1;
						alert("Check Gender..","0");
					}
					else if(strcmp($row['dob'],$dob)!=0)
					{
						$flag=1;
						alert("Check Birth Date..","0");
					}
					else if(strcmp($row['mob'],$mob)!=0)
					{
						$flag=1;
						alert("Check Mobile Number..","0");
					}
					else if(strcmp($row['email'],$mail)!=0)
					{
						$flag=1;
						alert("Check Email id..","0");
					}
					else if(strcmp($row['state'],$state)!=0)
					{
						$flag=1;
						alert("Check State..","0");
					}
					else if(strcmp($row['city'],$city)!=0)
					{
						$flag=1;
						alert("Check City..","0");
					}
					else if(strcmp($row['address'],$add)!=0)
					{
						$flag=1;
						alert("Check Residential Address..","0");
					}
					else if(strcmp($row['aadhar'],$adhar)!=0)
					{
						$flag=1;
						alert("Check AAdhar Number..","0");
					}
					else
					$flag=2;
				}
				if($flag==2||$flag==0)
				{
					date_default_timezone_set('Asia/Kolkata');
						$d = date("y-m-d");
						$t = date("h:i:sa");
						
						$q = "select * from abc";
						$result = mysqli_query($con,$q);
						$n = mysqli_num_rows($result);
						if($n==0)
						{
							$x = '00'.(1032010001);						
						}
						else
						{
							$x = '00'.(1032010001 + $n);
						}
					
						$_SESSION['mem_id'] = $x;
						
					$p = "insert into abc(mem_id,issue_date,issue_time,name,gender,mob,email,dob,sonof
				 ,state,city,pin,address,occupation,aadhar,pan) values('$x','$d','$t','$name','$gender','$mob','$mail'
				 ,'$dob','$sonofs','$state','$city','$pin','$add','$occ','$adhar',$pan)";
					
							if(mysqli_query($con,$p))
							{	
							
							if(strcmp($acctype,'SAVINGS')==0)
							{
								$q = "select * from xyz where acctype = 'SAVINGS'";
								$result = mysqli_query($con,$q);
								$n = mysqli_num_rows($result);
								if($n==0)
								$y = '00'.(1032020001);
								else
								{
									$y = '00'.(1032020001 + $n);
								}
							}
							else if(strcmp($acctype,'RD')==0)
							{
								$q = "select * from xyz where acctype = 'RD'";
								$result = mysqli_query($con,$q);
								$n = mysqli_num_rows($result);
								if($n==0)
								$y = '00'.(1032030001);
								else
								{
									$y = '00'.(1032020001 + $n);
								}
							}
							else
							{
								$q = "select * from xyz where acctype = 'FD'";
								$result = mysqli_query($con,$q);
								$n = mysqli_num_rows($result);
								if($n==0)
								$y = '00'.(1032040001);
								else
								{
									$y = '00'.(1032040001 + $n);
								}
			
							}
							$q = "select * from acset";
							$result = mysqli_query($con,$q);
							$row = mysqli_fetch_array($result);
							if(strcmp(acctype,"SAVINGS")==0)
							{
									$interest_after = $row['interest_after'];
							}
							else if(strcmp(acctype,"FD")==0)
							{
									$interest_after = 365;
							}								
							$i = $row['min_bal'];
							$q = "insert into xyz (accno,mem_id,avg,acctype,min,balance,count,add_after_days) values ('$y','$x',0,'$acctype','$i','$i',0,$interest_after)"; 
							mysqli_query($con,$q);
							
							
							$q =  "insert into interest_record values('$y','$d')";
							mysqli_query($con,$q);
							
							move_uploaded_file($f["tmp_name"],"customer_image/".$x.'a.png');
							mysqli_close($con);
							alert("Successfully Registered..","1");	
						}
						else
						{
							mysqli_close($con);
							alert("Error reccuring data..","0");
						}
				
					}
					
					
				}
?>
	