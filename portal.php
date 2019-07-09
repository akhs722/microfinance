<?php
session_start();
include 'functions.php';
include 'session.php';
?>
<?php

 include 'bond.php';
 if(!$con)
	{
		alert("Error !! Check whether server is on","0");
	}
	else
	{
$q_abc = "select * from abc";                          //abc table consists of customer details.
$res_abc = mysqli_query($con,$q_abc);
$count_abc = mysqli_num_rows($res_abc);
$q_xyz = "select * from xyz";                               //xyz consists of the account related information. 
$res_xyz = mysqli_query($con,$q_xyz);

	}
?>

<!doctype html>

    <head>
	<meta charset="utf-8" />
	<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/portal.css">
       
        <title>Menu</title>

        <link rel="stylesheet" href="portal/css/layout.css" type="text/css">
        <link rel="stylesheet" href="portal/css/menu.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">

                <ul id="nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#" class="current">Customer Details</a>
                        <ul class="subs">
                            <li><a href="customer_register.php">Add Customer</a></li>
                            <li><a href="ask.php">Show Details</a></li>
                            <li><a href="#">Link 3</a></li>
                            <li><a href="#">Link 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Update digits</a>
                        <ul class="subs">
                            <li><a href="update1.php">Add Money</a></li>
                            <li><a href="withdraw1.php">Withdraw</a></li>
                            <li><a href="passbook1.php">Print passbook</a></li>
                            <li><a href="#">Link 4</a></li>
                        </ul>
                    </li>
                    <li><a href="bahar.php">Logout</a></li>
                    <li><a href="#">option 2</a></li>
                    <li><a href="#">option 3</a></li>
                </ul>

            </div>
        </div>
		<div id="tab">
				<input type="text" id="search" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
				<table  id ="myTable"align="center" name="loans" border cellspacing = 2px >
				
				<tr>
				<th>MEM_ID</th>
				<th>ACC</th>
				<th>NAME</th>
				<th>MOB</th>
				</tr>
				<?php for($i=0;$i<$count_abc;$i++)  { $row_abc = mysqli_fetch_array($res_abc);
				$row_xyz = mysqli_fetch_array($res_xyz);
				?>
				<tr>
				<td><a id="lid" href = "cdetails.php?mem_id=<?php echo $row_abc['mem_id']?>"><?php echo $row_abc['mem_id']?></a></td>
				
				<td><?php echo $row_xyz['accno']?></td>                                   <!--looping through customer details-->
				<td><?php echo $row_abc['name']?></td>
				<td><?php echo $row_abc['mob']?></td>
				</tr>
				<?php } ?>
				</table>
			</div>
				

			<div class="foot">
            <p id="a">Mudrashi Needhi Pvt. Ltd.</p>
			<p id="b">| Work by all members of <span id="c">Team Creator's.|</span></p>
			<p id="d">|For more information <span id="e">CREATOR'S.|</span><span id="f"><a href="mailto:teamcreators7@gmail.com" class="fa fa-google"></a></span></p>
			</div>
    </body>
</html>
		
