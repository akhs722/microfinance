<?php
session_start();
include 'functions.php';
include 'session.php';
		include 'bond.php';
			if(!$con)
			alert("Check whether server is switched on or not..","-1");
else
{
$q_abc = "select * from abc";            //abc is the table which holds the customer's general registration information.
$res_abc = mysqli_query($con,$q_abc);
$count_abc = mysqli_num_rows($res_abc);

$q_xyz = "select * from xyz";         //xyz is the table which holds the customer's account information.
$res_xyz = mysqli_query($con,$q_xyz);

$q_pqr = "select * from pqr";
$res_pqr = mysqli_query($con,$q_pqr );
$count_pqr = mysqli_num_rows($res_pqr);

date_default_timezone_set('Asia/Kolkata');
$current_date = date("y-m-d");

$q_acset = "select * from acset";            
$res_acset = mysqli_query($con,$q_acset);
$row_acset = mysqli_fetch_array($res_acset);    //The acset table holds the settings related to the accounts handled by the admin.
if($row_acset['switch']==1)                     //checking if the switch is turned on ; if it is then only interest will be given for all the accounts.
{ 
	$q_check1 = "select * from check1 where dates = '$current_date'";
	$res_check1 = mysqli_query($con,$q_check1);
	$count_check1 = mysqli_num_rows($res_check1);     //check1 table holds the count for daily minimum balance for the all the accounts. 
if($count_check1==0)
{		       
	//after this time the minimum balance will be set.
	if(time() >= strtotime($row_acset['time1']))        
	{
		minimum($con);   //function for setting minimum balance.
 	}
}

$q_check2 = "select * from check2 where dates = '$current_date'";
$res_check2 = mysqli_query($con,$q_check2);
$count_check2 = mysqli_num_rows($res_check2);

	// add the time after which the interest will be calculated
if($count_check2==0)
{
	if(time()>= strtotime($row_acset['time1']))      //check2 table holds the count for daily interest count for the all the accounts.
	{
	
		interest($con);   //to give interest on minimum balance.
	}
			
}

}
}
 ?>
<!doctype html>
<head>
<meta charset="utf-8" />
<title>Menu</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/admin_portal.css">
<link rel="stylesheet" href="css/footer.css" media="screen" type="text/css" >
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



         
</head>
<html lang="en" >
			<body>	
				<div id="container">

				<ul>
				
                    <li>Customer Actions
                        <ul class="subs">
                            <li><a href="customer_register.php">Add Customer</a></li>
                            <li><a href="ask.php">View Customer</a></li>
                            <li><a href="customer_update.php">Update Details</a></li>
                            <li><a href="#">Link 4</a></li>
                       </ul>
						</li>	
                    
                    
					<li>Banking
                       <ul>
                            <li><a href="update1.php">Deposit</a></li>
                            <li><a href="withdraw1.php">Withdraw</a></li>
                            <li><a href="passbook1.php">Print Passbook</a></li>
                            <li><a href="#"></a></li>
                      </ul>
                    </li>
					<li>Employee Actions
							<ul style="z-index:100;">
							<li><a href="employee_register.php">Add Employee</a></li>
							<li><a href="aske.php">View Employee</a></li>
                            <li><a href="update_employee.php">Update Details</a></li>
							</ul>
							</li>
					<li>Control Menu
                        <ul>
						<li><a href="accset.php">Banking Settings</a></li>
                        <li><a href="deletee.php">Remove Employee</a></li>
                        <li><a href="deletec.php">Remove Customer</a></li>
						<li><a href="view_sessions.php">Sessions</a></li>
                        </ul>
					</li>
					<li>Reports
						<ul style="z-index:100;">
						<li><a href="kharacha_pani.php">Expenses</a></li>
						<li><a href="esalary.php">Employee Salary</a></li>
						<li><a href="kharacha_pani.php">Assets</a></li>
						<li><a href="kharacha_pani.php">Liabilities</a></li>
						</ul>
					</li>	
					<li><a href="bahar.php">Logout</a></li>
                 </ul>
				</div>	
				
				
				
				<div id="tab">
				<table id = "scroll" align = "center">
				<tr>
				<td>
				
				<table   name="loans"  id = "loans1" border cellspacing = 1px >
				
				
				<tr>
				<th>MEM_ID</th>
				<th>ACC</th>
				<th>NAME</th>
				<th>MOB</th>
				</tr>
				<?php for($i=0;$i<$count_abc;$i++) {
					$row_abc = mysqli_fetch_array($res_abc);  //This table holds the general registration information related to customer.
				$row_xyz = mysqli_fetch_array($res_xyz);     //This table holds the account related information related to the customer. 
				
					?>
				<tr>
				<td><a id="lid" href = "cdetails.php?mem_id=<?php echo $row_abc['mem_id']?>"><?php echo $row_abc['mem_id']?></a></td>
				<td><?php echo $row_xyz['accno']?></td>
				<td><?php echo $row_abc['name']?></td>       <!--printing the details of the customer from the respective table-->
				<td><?php echo $row_abc['mob']?></td>
				</tr>
				<?php } ?>
				</table>
				
				</td>
				<td></td>
				
				<td>
				
				<table   id = "loans2" name="loans" border cellspacing = 1px >
				<tr>
				<th>Id</th>
				<th>EMAIL</th>
				<th>NAME</th>
				<th>MOB</th>
				</tr>
				<?php for($i=0;$i<$count_pqr;$i++) {
					$row_pqr = mysqli_fetch_array($res_pqr); //This table holds the general information of the employee.
				
					?>
				<tr>
				<td><a id="lid" href = "updatede_details.php?id=<?php echo $row_pqr['id']?>"><?php echo $row_pqr['id']?></a></td>
				<td><?php echo $row_pqr['name']?></td>
				<td><?php echo $row_pqr['email']?></td>  <!--printing the details of the employee from the respective table-->
				<td><?php echo $row_pqr['mob']?></td>
				</tr>
				<?php } ?>
				</table>
				
				</td>
				</tr>
				</table>
				</div>
				<div class="foot">
            <p id="a">Mudrashi Needhi Pvt. Ltd.</p>
			<p id="b">| Work by all members of <span id="c">Team Creator's.|</span></p>
			<p id="d">|For more information <span id="e">CREATOR'S.|</span><span id="f"><a href="mailto:teamcreators7@gmail.com" class="fa fa-google"></a></span></p>
			</div>
				</body>
			</html>
		
