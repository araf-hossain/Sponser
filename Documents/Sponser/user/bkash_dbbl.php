<?php 
date_default_timezone_set('Asia/Dhaka');
$page=$_GET['page'];
print $page;
include("../database/connection.php");
session_start();
$email=$_SESSION['lg_email'];
$session_id=session_id();
$slct_wallet=mysql_query("SELECT * FROM user_auto_wallet WHERE email='$email'");
$fetch_wallet=mysql_fetch_array($slct_wallet);

$slct_details=mysql_query("SELECT * FROM delivery_details WHERE email='$email' AND session_id='$session_id' ");
$fetch_details=mysql_fetch_array($slct_details);


$card_name=$_POST['card_name'];
$phn_num=$_POST['phone_number'];
$amount=$_POST['amount'];
$date=date('d-m-Y');
$time=date('h:i:s A');

if (isset($_POST['pay'])) 
{
	if ($_SESSION['login_info']==true) 
	{
		if (!empty($card_name) && !empty($phn_num) && !empty($amount)) 
		{
			$total_amount=0;
			// if amount is less then user auto wallet;
			if ($fetch_details[8]<=$fetch_wallet[2]) 
			{
				$total_amount=$fetch_wallet[2]-$fetch_details[8];
				mysql_query("UPDATE user_auto_wallet SET amount='$total_amount' WHERE email='$email'");
				mysql_query("INSERT INTO payment_details(`email`,`card_name`,`number`,`amount`,`date`,`time`)VALUE('$email','$card_name','$phn_num','$fetch_details[8]','$date','$time')");
				print "<script>window.parent.location.href='allinhome.php?page=checkout4'</script>";
			}
			else
			{
				$message="You don't have enougn money in your wallet";
			}
		}
		else
		{
			$message="Please input correctly";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

</head>
<body>
<style type="text/css">

.payment_card
{
float: left;
width: 50%;
max-width: 90%;
height: auto;
padding: 10px;
margin: -2% 22%;
position: absolute;
}
.payment_card label
{
	font-size: 20px;
	font-weight: 300;
	color: #555;
	margin-bottom: 5px;
}
.payment_card input
{
	float: left;
	width: 100%;
	border: 1px solid #ccc;
	height: 41px;
	padding: 0px 12px;
	margin-top: 5px;
border-radius: 5px;
	margin-bottom: 8px;
}
.payment_card select
{
	float: left;
	width: 106.33%;
	border: 1px solid #ccc;
	height: 41px;
	padding: 0px 12px;
border-radius: 5px;
	margin-top: 5px;
	margin-bottom: 8px;
}
.amount[readonly]
{
	cursor: not-allowed;
	background-color: #eee;
	opacity: 1;
}
button
{
float: left;
clear: left;
width: 50%;
border: 1px solid #ddd;
margin: 2% 28.3%;
height: 10%;
padding: 2% 4%;
color: #fff;
font-size: 140%;
background-color: #47c0ef;
border-radius: 5px;
cursor: pointer;
}
div.hr {
width: 190%;
height: 3px;
margin-bottom: 10%;
margin-left: -46%;
background: #7F7F7F;
}
div.hr:after {
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 35px 148px 0px;
    border-color: #FFFFFF transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 9px;
    left: -45%;
}
div.hr:before {
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 35px 148px 0px;
    border-color: #7F7F7F transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 12px;
    left: -45%;
}

</style>

	<div class="payment_card">
		<div class="hr"></div>
		<form method="post">
		<h4 style="color: red;"><?php print $message; ?></h4>
			<div>
				<label>Mobile Bank Name</label>
				<select style="width: 106.33%" name="card_name">
					<option value="">Select name</option>
					<option>bKash</option>
					<option>DBBL</option>
				</select>
			</div>
			<div>
				<label>Phone Number</label>
				<input type="text" name="phone_number" placeholder="Enter phone number" />
			</div>
			<div>
				<label>Amount</label>

				<input type="text" class="amount" readonly name="amount" value="&#2547;<?php print $fetch_details[8]; ?>"  />
			</div>
			<div>
				<button type="submit" name="pay">Pay Now</button>
			</div>
		</form>
	</div>
</body>
</html>