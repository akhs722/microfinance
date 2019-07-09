<?php
function alert($w,$e)
{
	echo "<script>alert('$w');";
	if($e==0)
	echo "location = 'customer_register.php'</script>";
	else if($e==1)
	echo "location = 'cdetails.php'</script>";
	else if($e==-1)
	echo "location = 'login.php'</script>";
	else if($e==-2)
	echo "location = 'bahar.php'</script>";
	else if($e==2)
	echo "location = 'adminportal.php'</script>";
	else if($e==3)
	echo "location = 'ask.php'</script>";
	else if($e == 4)
	echo "location = 'reciept.php'</script>";	
	else if($e == 5)                                                 //Each page corresponds to a particular code.
																	/*Call to this function will pass the message and the page code as an 
																	argument to redirect to the desired page and show the message to the user.*/ 								
	echo "location = 'portal.php'</script>";
	else if($e == 6)
	echo "location = 'update1.php'</script>";
	else if($e == 7)
	echo "location = 'withdraw1.php'</script>";
	else if($e == 8)
	echo "location = 'passbook1.php'</script>";
	else if($e == 9)
	echo "location = 'customer_update.php'</script>";
	else if($e == -4)
	echo "location = 'updatede_details.php'</script>";
	else if($e == -3)
	echo "location = 'update_employee.php'</script>";
	else if($e == -5)
	echo "location = 'aske.php'</script>";
	else if($e == -6)
	echo "location = 'employee_register.php'</script>";
	else if($e == -7)
	echo "location = 'deletec.php'</script>";
	else if($e == -8)
	echo "location = 'deletee.php'</script>";
	else if($e == -9)
	echo "location = 'esalary.php'</script>";
	else if($e == -10)
	echo "location = 'db_setup.php'</script>";
}
function interest($con)
{
		
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date("y-m-d");                                             
		$current_date_obj = date_create($current_date);         //converted to date_object to use the methods.     

		$current_date_obj1 =  date_format($current_date_obj,"Y-m-d");  
		
		$q_acset = "select * from acset";
		$res_acset = mysqli_query($con,$q_acset); 
		$row_acset = mysqli_fetch_array($res_acset);

		$q_interest_record = "select * from interest_record";
		$res_interest_record = mysqli_query($con,$q_interest_record);
		$count_interest_record = mysqli_num_rows($res_interest_record);
		
		for($i=0;$i<$count_interest_record;$i++)               //looping through the number of accounts we have in our database.
		{

			$row_interest_record = mysqli_fetch_array($res_interest_record);
			if(strcmp($current_date_obj1,$row_interest_record['date'])!=0)             //checking the last date when the interest was calculated.
			{
				$accno = $row_interest_record['accno'];                
				
				$q_xyz =  "select * from xyz where accno = '$accno'";    //xyz is the table name.
				$res_xyz = mysqli_query($con,$q_xyz);
				
				$row_xyz = mysqli_fetch_array($res_xyz);               
				
				$acctype = $row_xyz['acctype'];
				
				$avg = $row_xyz['avg'];
				$accbal = $row_xyz['balance'];
				
				//$date3 = date_create($row_interest_record['date']);
				
					if(strcmp($acctype,"SAVINGS")==0)
					{
							$avg += (($row_acset['inte_sav']/365)*$row_xyz['min'])/100;           //interest calculation taking the minimum balance into account.
							$count = $row_xyz['count'] + 1;
								
					}	
					else if(strcmp($acctype,"FD")==0)
					{
							$avg += (($row_acset['inte_fd']/365)*$row_xyz['balance'])/100;
							$count = $row_xyz['count'] + 1;
					}		
						
					if($count == $row_xyz['add_after_days'])   //checking ; assume 84 days from the acset table
					{
							
						$newbal = $accbal + $avg;       //after say 84 days adding the interest to the main balance.
						$q_xyz = "update xyz set avg = 0,count = 0,balance = '$newbal' where accno = '$accno'";
						mysqli_query($con,$q_avg);

					}
					else
					{
							$q_avg = "update xyz set avg = '$avg' where accno = '$accno'";
							if(mysqli_query($con,$q_avg))
							{	
								$q_avg = "update xyz set count = '$count' where accno = '$accno'";   //updating the count and interest_record table with current date.
								mysqli_query($con,$q_avg);
								
								$q_interest_record = "update interest_record set date = '$current_date' where accno = '$accno'";
								mysqli_query($con,$q_interest_record);								
							}
							else
							{
								alert("Problem in interest function contact Akhil","-1");
								exit(0);
							}
							
					}
					//} //acctype = savings
					
						
						//Further add conditions for fd and rd accounts respectively.		
					}
			}
		
	$q_check2 = "update check2 set dates = '$current_date' where count = 1";    //For table information read the read me file.
	mysqli_query($con,$q_check2);	
}	

	
function minimum($con)
{
	date_default_timezone_set('Asia/Kolkata');
	$current_date = date("y-m-d");
	$q = "select * from xyz";
	$res_xyz = mysqli_query($con,$q);
	
	$count_xyz = mysqli_num_rows($res_xyz);
	
	for($i=0;$i<$count_xyz;$i++)
	{                                                  //This function sets the minimumbalance correspond to each account.
		$row_xyz = mysqli_fetch_array($res_xyz);
		$acc = $row_xyz['accno'];
		$min = $row_xyz['balance'];
		
		$q = "update xyz set min = '$min' where accno = '$acc'";
		mysqli_query($con,$q);
		$q = "update check1 set dates = '$current_date' where count = 1";
		mysqli_query($con,$q);
	}
}	
?>