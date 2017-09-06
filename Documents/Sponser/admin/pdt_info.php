<?php
date_default_timezone_set('Asia/Dhaka');
include("../database/connection.php");

/*function make_id($table,$column,$prefix,$id_length)
{
	$query=mysql_query("SELECT MAX($column) FROM $table");
	$fetch_query=mysql_fetch_array($query);

	$max_id=$fetch_query[0];

	$prefix_length=strlen($prefix);

	$only_id=substr($max_id,$prefix_length);

	$id=(int) ($only_id);
	$id++;

	$number_of_zero=($id_length-$prefix_length-strlen($id));

	$zero=str_repeat("0",$number_of_zero);

	$made_id=$prefix.$zero.$id;

	return $made_id;
}
*/

function make_id($table,$column,$prefix,$length)
{
	$query=mysql_query("SELECT MAX($column) FROM $table");
	$fetch_query=mysql_fetch_array($query);
	
	$full_id=$fetch_query[0];
	$pref_length=strlen($prefix);
	$only_id=substr($full_id,$pref_length);
	
	$id=(int)($only_id);
	$id++;
	
	$dust_num=($length-$pref_length-strlen($id));
	$zero=str_repeat("0",$dust_num);

	$made_id=$prefix.$zero.$id;
	return $made_id;
}

$made_id=make_id('pdt_info','pdt_id','PDT--','12');
$up_id=make_id('upcoming_pdt','pdt_id','UPC--','12');

$id_name=$_POST['id_name']; // This variable for search.

$itm_slct=$_POST['itm_slct'];
$cate_slct=$_POST['cate_slct'];
$sub_slct=$_POST['sub_slct'];

$pdt_id=$_POST['pdt_id'];
$pdt_name=$_POST['pdt_name'];
$pdt_price=$_POST['pdt_price'];
$pdt_size=$_POST['pdt_size'];
$pdt_stock=$_POST['pdt_stock'];
$pdt_details=$_POST['pdt_details'];
$date=date('d-m-Y');
$time=date('h:m:s A');
$upcoming=$_POST['upcoming'];

$select_db=mysql_query("SELECT * FROM pdt_info");

/*____________________________________________**** SEARCH BUTTON ****_______________________________________*/


if(isset($_POST['search']))
{
print "$id_name<br><br><br>";
	$search_db=mysql_query("SELECT pdt_info.*, upcoming_pdt.* FROM pdt_info,upcoming_pdt WHERE itm_name LIKE '%$id_name%' OR cate_name LIKE '%$id_name%' OR pdt_id LIKE '%$id_name%' OR pdt_name LIKE '%$id_name%' ");
		print "<table>
	<thead>
		<tr>
			<th>Item Name</th>
			<th>Category Name</th>
			<th>ProductID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Size</th>
			<th>Stock</th>
			<th>Details</th>
		</tr>
	</thead>";
	while($fetch_db=mysql_fetch_array($search_db))
	{
		print "
		<tbody>
			<tr>
				<td>$fetch_db[0]</td>
				<td>$fetch_db[1]</td>
				<td style='text-align:center;'>$fetch_db[2]</td>
				<td>$fetch_db[3]</td>
				<td>$fetch_db[4]</td>
				<td>$fetch_db[5]</td>
				<td>$fetch_db[6]</td>
				<td>$fetch_db[7]</td>
			</tr>
		</tbody>";
	}
	print"</table>";
}



/*____________________________________________**** ADD BUTTON ****_________________________________________*/



if(isset($_POST['add']))
{
	if(isset($_POST['upcoming']))
	{
		if(!empty($itm_slct) && !empty($cate_slct) && !empty($sub_slct) && !empty($pdt_id) && !empty($pdt_name) && !empty($pdt_price) && !empty($pdt_stock) && !empty($pdt_details))
		{
			$tmp_name=$_FILES['img']['tmp_name'];
			for($i=0;$i<count($tmp_name);$i++)
			{
				$img_name=$pdt_id."($i)";
				$path="../images/upcoming/$img_name.jpg";
				move_uploaded_file($tmp_name[$i],$path);
			}
			mysql_query("INSERT INTO upcoming_pdt(`itm_name`,`cate_name`,`sub_cate`,`pdt_id`,`pdt_name`,`pdt_price`,`pdt_size`,`pdt_stock`,`pdt_details`,`date`,`time`)VALUE('$itm_slct','$cate_slct','$sub_slct','$up_id','$pdt_name','$pdt_price','$pdt_size','$pdt_stock','$pdt_details','$date','$time')");
			if (mysql_affected_rows()>0) 
			{
				print "Upcoming Product Success";
			}
			else
			{
				print "Something wrong with upcoming product";
			}

		}
		else
		{

		}
	}
	else
	{	
		if(!empty($itm_slct) && !empty($cate_slct) && !empty($sub_slct) && !empty($pdt_id) && !empty($pdt_name) && !empty($pdt_price) && !empty($pdt_stock) && !empty($pdt_details))
		{
			$tmp_name=$_FILES['img']['tmp_name'];
			for ($i=0; $i < count($tmp_name); $i++) 
			{
				$img_name=$pdt_id."($i)";
				$path="../images/products/$img_name.jpg";
				move_uploaded_file($tmp_name[$i],$path);
			}
	
			mysql_query("INSERT INTO pdt_info(`itm_name`,`cate_name`,`sub_cate`,`pdt_id`,`pdt_name`,`pdt_price`,`pdt_size`,`pdt_stock`,`pdt_details`,`date`,`time`)VALUE('$itm_slct','$cate_slct','$sub_slct','$pdt_id','$pdt_name','$pdt_price','$pdt_size','$pdt_stock','$pdt_details','$date','$time')");
	
			if(mysql_affected_rows()>0)
				print "Successful";
			else
				print "Unsuccessful";
		}
		else
		{
			print "please input something";
		}
	}
}

/*__________________________________________**** VIEW BUTTON ****___________________________________________*/


if(isset($_POST['view']))
{
	if(isset($_POST['upcoming']))
	{	
		$select_upcoming=mysql_query("SELECT * FROM upcoming_pdt");
		print "<table style='border-collapse:collapse;width:100%;'>
		<thead>
			<tr style='padding:0.25rem;text-align:left;border-bottom:1px solid #FFD460'>
				<th>Item Name</th>
				<th>Category Name</th>
				<th>Sub Category Name</th>
				<th>ProductID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Size</th>
				<th>Stock</th>
				<th>Details</th>
			</tr>
		</thead>";
		while($fetch_array=mysql_fetch_array($select_upcoming))
		{
			print "
			<tbody>
				<tr style='padding:0.25rem;text-align:left;border-bottom:1px solid #FFD460'>
					<td>$fetch_array[0]</td>
					<td>$fetch_array[1]</td>
					<td>$fetch_array[2]</td>
					<td>$fetch_array[3]</td>
					<td>$fetch_array[4]</td>
					<td>$fetch_array[5]</td>
					<td>$fetch_array[6]</td>
					<td>$fetch_array[7]</td>
					<td>$fetch_array[8]</td>
				</tr>
			</tbody>";
		}
		print"</table>";
	}
	else
	{	
		print "<table style='border-collapse:collapse;width:100%;'>
		<thead>
			<tr style='padding:0.25rem;text-align:left;border-bottom:1px solid #FFD460'>
				<th>Item Name</th>
				<th>Category Name</th>
				<th>ProductID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Size</th>
				<th>Stock</th>
				<th>Details</th>
			</tr>
		</thead>";
		while($fetch_array=mysql_fetch_array($select_db))
		{
			print "
			<tbody>
				<tr style='padding:0.25rem;text-align:left;border-bottom:1px solid #FFD460'>
					<td>$fetch_array[0]</td>
					<td>$fetch_array[1]</td>
					<td>$fetch_array[2]</td>
					<td>$fetch_array[3]</td>
					<td>$fetch_array[4]</td>
					<td>$fetch_array[5]</td>
					<td>$fetch_array[6]</td>
					<td>$fetch_array[7]</td>
				</tr>
			</tbody>";
		}
		print"</table>";
	}
}


/*__________________________________________**** EDIT BUTTON ****___________________________________________*/

if(isset($_POST['edit']))
{
	if(isset($_POST['upcoming']))
	{	
		mysql_query("UPDATE upcoming_pdt SET itm_name='$itm_slct', cate_name='$cate_slct', pdt_id='$pdt_id', pdt_name='$pdt_name', pdt_price='$pdt_price', pdt_size='$pdt_size', pdt_stock='$pdt_stock', pdt_details='$pdt_details' WHERE pdt_id='$pdt_id'");
	
		if(mysql_affected_rows()>0)
		{
			print"Upcoming product edit successful";
		}
		else
		{
			print"Upcoming product edit unsuccessful";
		}
	}
	else
	{
		mysql_query("UPDATE pdt_info SET itm_name='$itm_slct', cate_name='$cate_slct', pdt_id='$pdt_id', pdt_name='$pdt_name', pdt_price='$pdt_price', pdt_size='$pdt_size', pdt_stock='$pdt_stock', pdt_details='$pdt_details' WHERE pdt_id='$pdt_id'");
	
		if(mysql_affected_rows()>0)
		{
			print"Edit Successful";
		}
		else
		{
			print"Edit Unsuccessful";
		}
	}
}


/*__________________________________________**** DELETE BUTTON ****_________________________________________*/


if(isset($_POST['delete']))
{
	if(isset($_POST['upcoming']))
	{	
		$select_id=mysql_query("SELECT * FROM upcoming_pdt WHERE pdt_id='$pdt_id'");
		$fetch_id=mysql_fetch_array($select_id);
	
		if($pdt_id==$fetch_id[2])
		{
			mysql_query("DELETE FROM upcoming_pdt WHERE pdt_id='$pdt_id'");
	
			if(mysql_affected_rows()>0)
			{
				print "Successfully deleted from Upcoming product";
			}
			else
			{
				print "Unsuccessfully deleted from Upcoming product";
			}
		}
		else
		{
			print "Enter valid ID";
		}
	}
	else
	{
		$select_id=mysql_query("SELECT * FROM pdt_info WHERE pdt_id='$pdt_id'");
		$fetch_id=mysql_fetch_array($select_id);
	
		if($pdt_id==$fetch_id[2])
		{
			mysql_query("DELETE FROM pdt_info WHERE pdt_id='$pdt_id'");
	
			if(mysql_affected_rows()>0)
			{
				print "Successfully deleted";
			}
			else
			{
				print "Unsuccessfully deleted";
			}
		}
		else
		{
			print "Enter valid ID";
		}
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUCT INFORMATION</title>
<style type="text/css">
* {
  box-sizing: border-box;
}
html 
{
    font-family: sans-serif;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}
body 
{
    font-size: 14px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    background-color: #f6f6f6;
    min-height: 100vh;
    padding: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    line-height: 1.4em;
    position: relative;
    margin: 0;
}
.pdt_container
{
    width: 960px;
    margin: 0 auto;
}

h2
{
	font-family: "Comic Sans MS", cursive, sans-serif;
	color:#222831;
	text-align: center;
	font-size:2em;
}
.form
{
	border:3px solid #c3c3c3;
	vertical-align: middle;
	width: 500px;
	/*background-color: #F9ED69;*/
	margin: 9px auto;
	overflow: hidden;
	padding:20px 0 25px;
}
.form .info
{
	width: 400px;
	margin:0 auto;
}
.form .search
{
	width: 315px;
    margin: 0 auto;
    overflow: hidden;
}
.form .search input
{
	float: left;
	width: 200px;
}
.search button
{
	background-color:#3EC8AC;
	color:white;
	padding: 10px 25px;
	font-size: 16px;
	margin:7px 0px 0px 7px;
	cursor: pointer;
	border: none;
	outline:none;
}
.form select
{
    float: right;
    background-image: url(images/icons/down_arrow.png);
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    font-weight: 600;
    border-bottom: 3px solid #FFD460;
    outline: none;
    background-color: transparent;
    -webkit-appearance: none;
    -moz-appearance:none;
    background-repeat: no-repeat;
    background-position: 162px;
    background-size: 20px;
    cursor: pointer;
}
.form select:focus
{
	-webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
	border-bottom:3px solid #3EC8AC;
	background-color: #fff;
	transform-origin:left;
    outline:none;
}
input[type=text]{
	float: right;
    width: 50%;
    padding: 10px 20px;
    font-weight: 600;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 3px solid #FFD460;
    outline:none;
    background-color: transparent;
}
input:focus
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
	border-bottom:3px solid #3EC8AC;
	background-color: #fff;
	transform-origin:left;
    outline:none;
}
input[type=file]
{
	float: right;
	clear:right;
	width: 50%;
	font-weight:600;
	margin-top:5px;
	padding:0px ;
	box-sizing:border-box;
	border:none;
	-webkit-appearance:none;
	-moz-appearance:none;
}
label
{
	float: left;
	font-size: 15px;
	font-weight: bold;
	margin-top: 34px;
	color:#2D4059;
	clear: left;
}
.info:before,info:after
{
	display: table;
	content:" ";
}
.info:after
{
	clear: both;
}
.button_div
{
	clear: left;
	float: left;
	margin-top: 15px;
	margin-left: 51px;
}
.button_div button
{
	background-color:#3EC8AC;
	color:white;
	padding: 11px 25px;
	font-size: 16px;
	margin:7px 0px 0px 7px;
	cursor: pointer;
	border: none;
}
.form textarea
{
	clear: left;
	float: left;
    min-width: 100%;
    padding: 8px 10px;
    font-size:15px;
    font-weight: 700;
    margin:8px 0;
    box-sizing: border-box;
    border:none;
    border-bottom: 3px solid #FFD460;
    outline:none;
    resize:vertical;
    min-height: 100px;
    max-height: 150px;
    background-color: transparent;
}
.form textarea:focus
{
	-webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
	border-bottom:3px solid #3EC8AC;
	background-color: #fff;
	transform-origin:left;
    outline:none;
}
.div_style
{
	margin-top:20px;
}
.checkbox
{
/*	float: right;
	clear:right;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    outline:none;
    background-color: transparent;*/
    clear: right;
	float: right;
    min-width: 50%;
    margin:20px 0 8px;
    outline:none;
    min-height: 20px;
    max-height: 20px;
    background-color: transparent;
}

</style>
</head>
<body>
<div class="pdt_container">
<h2>Product Information</h2>
	<form method="post" class="form" enctype="multipart/form-data">
	<div class="info">
		<div class="search">
			<input type="text" name="id_name" placeholder="Search...">
			<div>
				<button type="submit" name="search">Search</button>
			</div>
		</div>
		<div style="margin-top: 15px;">
			<label style="margin-top: 17px;">Item Name</label>
			<select name="itm_slct">
				<option value="" disabled selected>Select Item</option>
				<?php 
				$select_itm=mysql_query("SELECT * FROM item_info");
				while($fetch_itm=mysql_fetch_array($select_itm))
				{
				 ?>
				<option><?php print $fetch_itm[1]; ?></option>
				<?php
				} 
				?>
			</select>
		</div>
		<div style="margin-top: 20px;">
			<label style="margin-top: 42px;">Category Name</label>
			<select name="cate_slct">
				<option value="" disabled selected>Select Category</option>
				<?php 
				$select_cate=mysql_query("SELECT * FROM cate_info");
				while($fetch_cate=mysql_fetch_array($select_cate))
				{
				 ?>
				<option><?php print $fetch_cate[2]; ?></option>
				<?php
				} 
				?>
			</select>
		</div>
		<div style="margin-top: 20px;">
			<label style="margin-top: 42px;">Sub Category Name</label>
			<select name="sub_slct">
				<option value="" disabled selected>Select Sub Category</option>
				<?php 
				$select_cate=mysql_query("SELECT * FROM sub_cate");
				while($fetch_cate=mysql_fetch_array($select_cate))
				{
				 ?>
				<option><?php print $fetch_cate[3]; ?></option>
				<?php
				} 
				?>
			</select>
		</div>
		<div class="div_style">
			<label style="margin-top: 38px;">Product ID</label>
			<input type="text" name="pdt_id" value="<?php print $made_id ?>">
		</div>
		<div class="div_style">
			<label >Product Name</label>
			<input type="text" name="pdt_name" placeholder="Product Name">
		</div class="div_style">
		<div>
			<label >Product Price</label>
			<input type="text" name="pdt_price" placeholder="Product Price">
		</div>
		<div class="div_style">
			<label >Product Size</label>
			<input type="text" name="pdt_size" placeholder="Product Size">
		</div>
		<div class="div_style">
			<label >Product Stock</label>
			<input type="text" name="pdt_stock" placeholder="Product Stock">
		</div>
		<div class="div_style">
			<label>Product Details(200 words)</label>
			<textarea name="pdt_details" placeholder="Enter product details......"></textarea>
		</div>
		<div class="div_style">
			<label>Product Images</label>
			<input style="margin-top:20px;" type="file" name="img[]">
			<input type="file" name="img[]">
			<input type="file" name="img[]">
		</div>
		<div class="div_style">
			<label style="margin-top:46px;">Upcoming Product<p style="text-align: left;font-size: 13px;margin: 0;padding: 0;">ID: <?php print $up_id ?> (New)</p></label>
			<input class="checkbox" type="checkbox" name="upcoming">
		</div>
	</div>
	<div class="button_div div_style">
		<button type="submit" name="add">Add</button>
		<button type="submit" name="view">View</button>
		<button type="submit" name="edit">Edit</button>
		<button type="submit" name="delete">Delete</button>
	</div>
	</form>
</div>

</body>
</html>