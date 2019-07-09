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
$q = "select * from dexp order by id desc";

$r = mysqli_query($con,$q);
$n = mysqli_num_rows($r);

for($i=0;$i<$n;$i++)
{   $result = mysqli_fetch_array($r); ?>
		
		<tr>
		<td>
		<?php echo $result['id'];?>
		</td>
		<td>
		<?php echo $result['item'];?>
		</td>
		<td>
		<?php echo $result['cost'];?>
		</td>
		</tr>
		<?php
		
			$total = $total + $result['cost'];
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