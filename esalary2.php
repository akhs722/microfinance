<?php
include 'functions.php';
include 'bond.php';
		if(!$con)
		alert("Check whether server is switched on or not..","-1");

date_default_timezone_set('Asia/Kolkata');
$current_date = date("y-m-d");
$eid = strtoupper($_POST['eid']);
$ename = strtoupper($_POST['ename']);
$salary = $_POST['salary'];
$salary = (float)$salary;
$q_esalary = "insert into esalary(id,ename,salary,date) values('$eid','$ename','$salary','$current_date')";
mysqli_query($con,$q_esalary);
?>