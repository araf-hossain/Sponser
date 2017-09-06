<?php
date_default_timezone_set('Asia/Dhaka');

include("../database/connection.php");
session_start();
$email=$_SESSION['lg_email'];
$session_id=session_id();
$slct_wallet=mysql_query("SELECT * FROM user_auto_wallet WHERE email='$email'");
$fetch_wallet=mysql_fetch_array($slct_wallet);

$slct_details=mysql_query("SELECT * FROM delivery_details WHERE email='$email' AND session_id='$session_id' ");
$fetch_details=mysql_fetch_array($slct_details);

$card_name=$_POST['card_name'];
$card_number=$_POST['card_number'];
$amount=$_POST['amount'];
$cvv=$_POST['cvv'];
$date=date('d-m-Y');
$time=date('h:i:s A');

if (isset($_POST['pay'])) 
{
	if ($_SESSION['login_info']==true) 
	{
		$cvv_len=strlen($cvv);
		if (!empty($card_name) && !empty($card_number) && !empty($amount) && !empty($cvv)) 
		{
			if ($cvv_len==3 || $cvv_len ==4) 
			{
				$total_amount=0;
			// if amount is less then user auto wallet;
			if ($fetch_details[8]<=$fetch_wallet[2]) 
			{
				$total_amount=$fetch_wallet[2]-$fetch_details[8];
				mysql_query("UPDATE user_auto_wallet SET amount='$total_amount' WHERE email='$email'");
				mysql_query("INSERT INTO payment_details(`email`,`card_name`,`number`,`cvv`,`amount`,`date`,`time`)VALUE('$email','$card_name','$card_number','$cvv','$fetch_details[8]','$date','$time')");
				print "<script>window.parent.location.href='allinhome.php?page=checkout4'</script>";
			}
			else
			{
				$message="You don't have enougn money in your wallet";
			}
			}
			else
			{
				$message="Invalid CVV!";
			}
			
		}
		else
		{
			$message="Please input correctly";
		}
	}
}


?>
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
.amount[readonly]
{
	cursor: not-allowed;
	background-color: #eee;
	opacity: 1;
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
border-radius: 5px;
	padding: 0px 12px;
	margin-top: 5px;
	margin-bottom: 8px;
}
.payment_card select
{
	float: left;
	width: 100%;
	border: 1px solid #ccc;
	height: 41px;
	padding: 0px 12px;
border-radius: 5px;
	margin-top: 5px;
	margin-bottom: 8px;
}

button
{
float: left;
clear: left;
width: 50%;
border: 1px solid #ddd;
margin: 2% 25%;
height: 10%;
padding: 2% 4%;
color: #fff;
font-size: 140%;
background-color: #47c0ef;
border-radius: 5px;
cursor: pointer;
}
.triangle-down 
{ 
	width: 0; 
	height: 0; 
	border-left: 40px solid transparent; 
	border-right: 40px solid transparent; 
	border-top: 30px solid red; 
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
    border-width: 35px 156px 0px;
    border-color: #FFFFFF transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 9px;
    left: 29.66666%;
}
div.hr:before {
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 35px 156px 0px;
    border-color: #7F7F7F transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 12px;
    left: 29.66666%;
}

</style>
<div>
	<div class="payment_card">
	<div class="hr"></div>
	<form method="post">
		<h4 style="color: red;"><?php print $message; ?></h4>
			<div>
				<label>Card Name</label>
				<select style="width: 100%" name="card_name">
					<option value="">Card name</option>
					<option>Master Card</option>
					<option>Visa Card</option>
				</select>	
			</div>
			<div>
				<label>Card Number</label>
				<input type="text" name="card_number" placeholder="Enter Card Number" />
			</div>
			<div>
				<label>Amount</label>
				<input type="text" class="amount" name="amount" readonly value="&#2547;<?php print $fetch_details[8];?>" />
			</div>
			<div>
				<label>CVV</label>
				<input type="text" name="cvv" placeholder="Enter CVV" />
			</div>
			<div>
				<button type="submit" name="pay">Pay Now</button>
			</div>
		</form>
	</div>
</div>
</body>
</html>