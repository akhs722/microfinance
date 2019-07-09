<html>
<body>

<table id="dataTable" width="360px" border="1" align="center">
		<tr>
			<th align="center">EID</th>
			<th align="center">ENAME</th>
			<th align="center">SALARY</th>
		</tr>
		<tr>
			<td> <input type="text" size="40"  id = "eid" name="id"readonly/> </td>
			<td> <input type="text" size="40"  id = "ename" name="ename"readonly/> </td>
			<td> <input type="text" style="text-align:right;" id = "salary" name="salary" readonly/> </td>
		</tr>
	
<?php
$total = 0;
include 'bond.php';
$q_esalary = "select * from esalary order by sno";

$row_esalary = mysqli_query($con,$q_esalary);
$count_esalary = mysqli_num_rows($row_esalary);

for($i=0;$i<$count_esalary;$i++)
{   $res_esalary = mysqli_fetch_array($row_esalary); ?>
		
		<tr>
		<td>
		<?php echo $res_esalary['id'];?>
		</td>
		<td>
		<?php echo $res_esalary['ename'];?>
		</td>
		<td>
		<?php echo $res_esalary['salary'];?>
		</td>
		</tr>
	<?php } ?>


</table>
<?php 
	
?>
</br>
<!--<table align = "center">
		<tr>
			<td>Total:  <input width="30" type="text"  value = "<?php //echo $total; ?>"readonly></td>
		</tr>
	</table>
--></body>
</html>