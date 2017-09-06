
<!DOCTYPE html>
<html>
<head>
	<title>blaalf</title>
</head>
<body>

<table>
	<tbody>
	<?php 
	for ($i=0; $i < 3; $i++) 
	{ 
		if($i==0)
		{
	?>
		<tr>
			<td>
			    <img src="../images/products/<?php print $fetch_db[5]."($i)";?>.jpg" width="200" height="250">
			</td>
		</tr>
	<?php 
	}
	 } 
	 ?>

		<tr>
			<td>
				<p><?php print $fetch_db[6]; ?></p>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>
<?php 
    }
?>