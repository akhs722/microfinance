<html>
<body>

<table id="dataTable" width="360px" border="1" align="center">
		<tr>
			<th align="center">ID</th>
			<th align="center">Items</th>
			<th align="center">Cost</th>
		</tr>
		<tr>
			<td> <input type="text" size="40"  id = "id" name="id"readonly/> </td>
			<td> <input type="text" size="40"  id = "item" name="item"readonly/> </td>
			<td> <input type="text" style="text-align:right;" id = "qty" name="qty"readonly/> </td>
		</tr>
	
<?php
$total = 0;
include 'bond.php';
$q_dexp = "select * from dexp order by id desc";

$row_dexp = mysqli_query($con,$q_dexp);
$n = mysqli_num_rows($row_dexp);

for($i=0;$i<$n;$i++)
{   $res_dexp = mysqli_fetch_array($row_dexp); ?>
		
		<tr>
		<td>
		<?php echo $res_dexp['id'];?>
		</td>
		<td>
		<?php echo $res_dexp['item'];?>
		</td>
		<td>
		<?php echo $res_dexp['cost'];?>
		</td>
		</tr>
		<?php
		
			$total = $total + $res_dexp['cost'];
		?>
		
<?php } ?>


</table>
<?php 
	
?>
</br>
<table align = "center">
		<tr>
			<td>Total:  <input width="30" type="text"  value = "<?php echo $total; ?>"readonly></td>
		</tr>
	</table>
</body>
</html>