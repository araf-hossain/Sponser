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

$made_id=make_id('item_info','item_id','ID--','6');

$id_name=$_POST['id_name']; // This is for search.

$item_id=$_POST['item_id'];

$item_name=$_POST['item_name'];

$select_db=mysql_query("SELECT * FROM item_info");

/*____________________________________________**** SEARCH BUTTON ****_______________________________________*/


if(isset($_POST['search']))
{
	$search_db=mysql_query("SELECT * FROM item_info WHERE item_id LIKE '%$id_name%' OR item_name LIKE '%$id_name%'");

	print "<table>
	<thead>
		<tr>
			<th>Item ID</th>
			<th>Item Name</th>
		</tr>
	</thead>";
	while($fetch_db=mysql_fetch_array($search_db))
	{
		print "
		<tbody>
			<tr>
				<td>$fetch_db[0]</td>
				<td style='text-align:center;'>$fetch_db[1]</td>
			</tr>
		</tbody>";
	}
	print"</table>";
}



/*____________________________________________**** ADD BUTTON ****_________________________________________*/



if(isset($_POST['add']))
{
	if(!empty($item_id) && !empty($item_name))
	{
		mysql_query("INSERT INTO item_info(`item_id`,`item_name`)VALUE('$item_id','$item_name')");
				
		if(mysql_affected_rows()>0)
		{
			print "Successful";
		}
		else
		{
			print "unsuccessful";
		}
		
		
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
				<th>Item ID</th>
				<th>Item Name</th>
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
			</tr>
		</tbody>";
	}
	print"</table>";
}


/*__________________________________________**** EDIT BUTTON ****___________________________________________*/

if(isset($_POST['edit']))
{
	mysql_query("UPDATE item_info SET item_name='$item_name' WHERE item_id='$item_id'");

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
	<title>ADD ITEM INFORMATION</title>
<style type="text/css">

.itm_container
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
	border:2px solid #fff;
	vertical-align: middle;
	width: 500px;
	/*background-color: #F9ED69;*/
	margin: 0 auto;
	overflow: hidden;
	padding:35px 0 40px;
}
.form .items
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
input[type=text] {
    width: 50%;
    font-weight: 600;
    padding: 10px 20px;
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
.form input 
{
	float: right;
}
label
{
	float: left;
	font-size: 15px;
	font-weight:bold;
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
<div class="itm_container">
<h2>Item Information</h2>
	<form class="form" method="post" enctype="multipart/form-data">
	<div class="items">
		<div class="search">
			<input type="text" name="id_name" placeholder="Item ID or Name">
			<div>
				<button type="submit" name="search">Search</button>
			</div>
		</div>
		<div style="margin-top: 20px;">
			<label style="margin-top: 17px;">Item ID</label>
			<input type="text" name="item_id" value="<?php print $made_id; ?>">
		</div>
		<div>
			<label style="margin-top: 35px;">Item Name</label>
			<input type="text" name="item_name" placeholder="Item Name">
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