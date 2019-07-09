<?php
include 'bond.php';
	$item = $_POST['item'];
	$cost = $_POST['qty'];
	
	if($cost&&$item)
	{
			
	$q_dexp = "select * from dexp";
	$row_dexp = mysqli_query($con,$q_dexp);
	$n = mysqli_num_rows($r_dexp);
if($n==0)
{
	$id = 1;
	$q_dexp = "insert into dexp values('$id','$item','$cost')";
	mysqli_query($con,$q_dexp);
}
else
{
	$id = $n + 1;
	$q_dexp = "insert into dexp values('$id','$item','$cost')";
	mysqli_query($con,$q_dexp);
}
	}

?>