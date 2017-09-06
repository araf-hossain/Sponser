<?php

include("../database/connection.php");

function make_id($table,$column,$prefix,$id_length)
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

$made_id=make_id('sub_cate','sub_id','Sub--','8');

$itm_slct=$_POST['itm_slct'];
$cate_slct=$_POST['cate_slct'];

$sub_id=$_POST['sub_id'];
$sub_name=$_POST['sub_name'];


$id_name=$_POST['id_name']; // This is for search.


$select_db=mysql_query("SELECT * FROM sub_cate");

/*____________________________________________**** SEARCH BUTTON ****_______________________________________*/


if(isset($_POST['search']))
{
// print "$id_name<br><br><br>";
	$search_db=mysql_query("SELECT * FROM sub_cate WHERE sub_id LIKE '%$id_name%' OR sub_name LIKE '%$id_name%'");
	while($fetch_db=mysql_fetch_array($search_db))
	{
		print "$fetch_db[0],$fetch_db[1]";
	}
	
}



/*____________________________________________**** ADD BUTTON ****_________________________________________*/



if(isset($_POST['add']))
{

	if(!empty($itm_slct) && !empty($cate_slct) && !empty($sub_id) && !empty($sub_name))
	{
		mysql_query("INSERT INTO sub_cate(`item_name`,`cate_name`,`sub_id`,`sub_name`)VALUE('$itm_slct','$cate_slct','$made_id','$sub_name')");

		if(mysql_affected_rows()>0)
			print "Successful";
		else
			print "unsuccessful";
	}
	else
	{
		print "please input something";
	}
}

/*__________________________________________**** VIEW BUTTON ****___________________________________________*/


if(isset($_POST['view']))
{
	print"<table>
		<thead>
			<tr>
				<th>Item Name</th>
				<th>Category Name</th>
				<th>Sub ID</th>
				<th>Sub Name</th>
			</tr>
		</thead>
		";
	while($fetch_array=mysql_fetch_array($select_db))
	{
		print "
		<tbody>
			<tr>
				<td>$fetch_array[0]</td>
				<td style='text-align:center;'>$fetch_array[1]</td>
				<td style='text-align:center;'>$fetch_array[2]</td>
				<td style='text-align:center;'>$fetch_array[3]</td>
			</tr>
		</tbody>";
	}
	print"</table>";
}


/*__________________________________________**** EDIT BUTTON ****___________________________________________*/

if(isset($_POST['edit']))
{
	mysql_query("UPDATE cate_info SET item_name='$itm_slct',cate_name='$cate_name' WHERE cate_id='$cate_id'");

	if(mysql_affected_rows()>0)
	{
		print"Edit Successful";
	}
	else
	{
		print"Edit Unsuccessful";
	}
}


/*__________________________________________**** DELETE BUTTON ****_________________________________________*/


if(isset($_POST['delete']))
{
	$select_id=mysql_query("SELECT * FROM item_info WHERE item_id='$item_id'");
	$fetch_id=mysql_fetch_array($select_id);

	if($item_id==$fetch_id[0])
	{
		mysql_query("DELETE FROM item_info WHERE item_id='$item_id'");

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


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD SUB CATEGORY INFO</title>
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
.container
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
form
{
	border:2px solid #fff;
	vertical-align: middle;
	width: 500px;
	/*background-color: #F9ED69;*/
	margin: 0 auto;
	overflow: hidden;
	padding:35px 0 40px;
}
form .items
{
	width: 400px;
	margin:0 auto;
}
form .search
{
	width: 315px;
    margin: 0 auto;
    overflow: hidden;
}
form .search input
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
select
{
    float: right;
    background-image: url(images/icons/down_arrow.png);
    width: 50%;
    padding: 9px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    font-weight: 600;
    border-bottom: 3px solid #FFD460;
    outline: none;
    background-color: transparent;
    -webkit-appearance: none;
    background-repeat: no-repeat;
    background-position: 162px;
    background-size: 20px;
    cursor: pointer;
}
select:focus
{
	-webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
	border-bottom:3px solid #3EC8AC;
	background-color: #fff;
	transform-origin:left;
    outline:none;
}
input[type=text] {
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
form input 
{
	float: right;
}
label
{
	float: left;
	font-size: 15px;
	font-weight: bold;
	margin-top: 35px;
	color:#2D4059;
	clear: left;
}
.items:before,items:after
{
	display: table;
	content:" ";
}
.items:after
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
	padding: 10px 25px;
	font-size: 16px;
	margin:7px 0px 0px 7px;
	cursor: pointer;
	border: none;
}
</style>
</head>
<body>
<div class="container">
<h2>Sub Category Information</h2>
	<form method="post" enctype="multipart/form-data">
	<div class="items">
		<div class="search">
			<input type="text" name="id_name" placeholder="Sub Category ID or Name">
			<div>
				<button type="submit" name="search">Search</button>
			</div>
		</div>
		<div style="margin-top: 20px;">
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
			<label style="margin-top: 30px;">Category Name</label>
			<select name="cate_slct">
				<option value="" disabled selected>Select Category</option>
				<?php 
				$select_itm=mysql_query("SELECT * FROM cate_info");
				while($fetch_itm=mysql_fetch_array($select_itm))
				{
				 ?>
				<option><?php print $fetch_itm[2]; ?></option>
				<?php
				} 
				?>
			</select>
		</div>
		<div>
			<label>Sub Category ID</label>
			<input type="text" name="sub_id" value="<?php print $made_id ?>">
		</div>
		<div>
			<label>Sub Category Name</label>
			<input type="text" name="sub_name" placeholder="Sub Category Name">
		</div>
	</div>
	<div class="button_div">
		<button type="submit" name="add">Add</button>
		<button type="submit" name="view">View</button>
		<button type="submit" name="edit">Edit</button>
		<button type="submit" name="delete">Delete</button>
	</div>
	</form>
</div>

</body>
</html>