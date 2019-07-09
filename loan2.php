<?php
$con = mysqli_connect("localhost","root","","mudrashi");
if($con)
{
function alert($w,$e)
{
	echo "<script>alert('$w');";
	if($e==0)
	echo "location = 'loan.php'</script>";
	else if($e==1)
	echo "location = 'adminportal.php'</script>";
	else if($e==-1)
	echo "location = 'login.php'</script>";
	else if($e==-2)
	echo "location = 'bahar.php'</script>";
}
$acc = $_POST['accno'];
$name = $_POST['name'];
$pri = $_POST['pri'];
$time = $_POST['time'];
$rate = $_POST['rate'];
$pur = $_POST['pur'];
$sec1 = $_POST['sec1'];
$sec2 = $_POST['sec2'];
$g1 = $_POST['g1'];
$g2 = $_POST['g2'];
$g3 = $_POST['g3'];
$emi = $_POST['emi'];
$repay = $_POST['total'];
$date = $_POST['date'];
$type = $_POST['type'];

$q = "select * from active_Loans";
$result = mysqli_query($con,$q);

$n = mysqli_num_rows($result);
$a = 1 + $n;

$x = 'L527_'.$a;
$q = "select * from customer where accno = '$acc' and name = '$name'";
if(mysqli_query($con,$q))	
{
						date_default_timezone_set('Asia/Kolkata');
						//$d = date("d/m/y");
						$t = date("h:i:sa");
	$dd = date('Y-m-d', strtotime("+31 days"));

	$q = "insert into active_Loans(loan_id,accno,name,issue_date,issue_time,loan_type,
	principle_amount,tenure,
	interest,emi,due_date,repay_total,purpose,security_1,security_2,gurantor_1,
	gurantor_2,gurantor_3) values('$x','$acc','$name','$date','$t','$type','$pri','$time',
	'$rate','$emi','$dd','$dd','$repay','$pur','$sec1','$sec2','$g1','$g2','$g3')";
	
	if(mysqli_query($con,$q))
	{
		alert("Successful in adding details","1");
	}
	else
	{
		alert("Error in adding details...","0");
	}
}
else
{
	alert("Wrong Associated details...","0");
}

}
else
{
	alert("Cannot connect switch on the server..","0");
}




?>