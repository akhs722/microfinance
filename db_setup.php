<?php
include 'bond.php';
include 'functions.php';
if(!$con)
	alert("Check whether xampp server is switched on or not","-10");
	$q = "create table abc ( 
						mem_id varchar(14) primary key,
						issue_date date ,
						issue_time varchar(15),
						name varchar(100),
						gender varchar(10),
						mob varchar(10) unique,
						email varchar(300) unique,
						dob date,
						sonof varchar(100),
						state varchar(100),
						city varchar(100),
						pin int(11),
						address varchar(2000),
						occupation varchar(100),
						aadhar varchar(12) unique,
						pan varchar(11))";

	if(mysqli_query($con,$q_abc))
	{
	$q = "create table pqr ( 
						id varchar(15) primary key,
						name varchar(100) ,
						gender varchar(10),
						dob date,
						mob varchar(12) unique,
						email varchar(300) unique,
						password blob,
						state varchar(20),
						
						city varchar(20),
						address varchar(2000),
						aadhar varchar(12) unique)";

		if(mysqli_query($con,$q))
		{
						$q = "create table mno ( 
						tid int(11) primary key auto_increment,
						accno varchar(15) ,
						date date,
						time varchar(15) ,
						debit float,
						credit float,
						endamont float,
						medium varchar(15))";
						
		if(mysqli_query($con,$q))
		{
						$q = "create table xyz ( 
						accno   varchar(15) primary key,
						mem_id   varchar(14) references abc(mem_id),
						avg float,
						acctype varchar(8),
						min float,
						balance float,
						count int)";

	if(mysqli_query($con,$q))
	{
						$q = "create table xyz ( 
						accno   varchar(15) primary key,
						mem_id   varchar(14) references abc(mem_id),
						avg float,
						acctype varchar(8),
						min float,
						balance float,
						count int)";

	if(mysqli_query($con,$q))
		
		{
						$q = "create table acset ( 
						min_bal   float,
						inte_sav   float,
						inte_rd    float,
						inte_fd    float,
						interest_after    int,
						loan_int float,
						time1  varchar(15),
						time2 varchar(15),
						switch int)";
		if(mysqli_query($con,$q))
		{
			$q = "create table check1 ( 
						dates   date,
						count int)";

			
			
		}
		
		}
	
	}
		}
		}
	}
	
?>