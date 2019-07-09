<?php
session_start();
include 'functions.php';
include 'session.php';
		include 'bond.php';
		if(!$con)
		alert("Check whether your server is switched on or not...","1");
		else
		{	
				if(!empty($_POST['id']))
				{
					$x = $_POST['id'];
					$q = "delete from pqr where id = '$x'";
					$n = mysqli_query($con,$q);
					if($n)
					{
							mysqli_close($con);
							alert("Deleted Successfully Employee Account...","2");
					}
					else
					{
						alert("Error Retry....","-8");
					}
				}
				else if(isset($_POST['mem_id']))
				{
					
					$x = $_POST['mem_id'];
					$q = "select * from xyz where mem_id = '$x'";
							if(mysqli_query($con,$q))
							{
								$result = mysqli_query($con,$q);
								$row = mysqli_fetch_array($result);
								$y = $row['accno'];
								$q = "delete from mno where accno = '$y'";
								if(mysqli_query($con,$q))
								{
									$q = "delete from xyz where accno = '$y'";
									if(mysqli_query($con,$q))
									{
										$q = "delete from abc where mem_id = '$x'";
										if(mysqli_query($con,$q))
										{
											mysqli_close($con);
											alert("Deleted Successfully Customer Account...","2");
										}	
									}
								}
							}	
							else
							{
								alert("Error Retry1111...","-7");
							}
				}
							
				
				else
				{
						alert("Error Retry....","2");
				}
		}
	
?>