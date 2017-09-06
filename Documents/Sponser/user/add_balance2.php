<?php 
session_start();
date_default_timezone_set('Asia/Dhaka');

include("../database/connection.php");
$email=$_SESSION['lg_email'];

$card_name=$_POST['card_name'];
$phn_num=$_POST['phone_number'];
$amount=$_POST['amount'];
$cvv=$_POST['cvv'];
$date=date('d-m-Y');
$time=date('h:i:s A');

$slct_wallet=mysql_query("SELECT * FROM user_auto_wallet WHERE email='$email'");
$fetch_wallet=mysql_fetch_array($slct_wallet);

if (isset($_POST['add'])) 
{
	if ($_SESSION['login_info']==true) 
	{
		if (!empty($card_name) && !empty($phn_num) && !empty($amount) && !empty($cvv)) 
		{
			$cvv_len=strlen($cvv);
			if ($cvv_len==3 || $cvv_len==4) 
			{
				$update=$fetch_wallet[2]+$amount;
				mysql_query("UPDATE user_auto_wallet SET amount='$update',card_name='$card_name',number='$phn_num' WHERE email='$fetch_wallet[0]'");
				mysql_query("INSERT INTO wallet_history(`email`,`name`,`amount`,`card_name`,`number`,`cvv`,`date`,`time`)VALUES('$fetch_wallet[0]','$fetch_wallet[1]','$amount','$card_name','$phn_num','$cvv','$date','$time')");
				print "<script>window.parent.location.reload()</script>";
			}
			else
			{
				$message="CVV Invalid!";
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
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>


    <!-- styles -->
    <link href="css/css/font-awesome.css" rel="stylesheet">
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/animate.min.css" rel="stylesheet">
    <link href="css/css/owl.carousel.css" rel="stylesheet">
    <link href="css/css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="css/js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">
</head>
<body>
<style type="text/css">
body
{
	background-color: #fff;
}
.amount[readonly]
{
	cursor: not-allowed;
	background-color: #eee;
	opacity: 1;
}
.button
{
border: 1px solid #ddd;
color: #fff;
font-size: 140%;
font-weight: 500;
background-color: #47c0ef;
border-radius: 5px;
cursor: pointer;
}
.col-md-12 .hr 
{
	border:0;
	border-bottom:3px solid #949494;
	margin: 0 0 50px -13px;
	padding: 0;
}

.col-md-12 .hr:after {
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 35px 151px 0px;
    border-color: #FFFFFF transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 0px;
    left: 39.8%;
}
.col-md-12 .hr:before {
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 35px 151px 0px;
    border-color: #949494 transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 3px;
    left: 39.8%;
}

</style>

	<div id="all">
		<div id="content">
				<div class="col-md-12">
					<hr class="hr">
				</div>
					<div class="container">
					<div class="col-sm-6" style="margin:0 25%">
					<form method="post">
					<span style="color:red"><?php print $message; ?></span>
						<div class="form-group">
							<label>Card Name</label>
							<select name="card_name" class="form-control">
								<option value="">Select name</option>
								<option>Master Card</option>
								<option>Visa</option>
							</select>
						</div>
						<div class="form-group">
							<label>Card Number</label>
							<input type="text" class="form-control" name="phone_number">
						</div>
						<div class="form-group">
							<label>Amount</label>
							<input type="text" class="form-control" name="amount">
						</div>
						<div class="form-group">
							<label>CVV</label>
							<input type="text" class="form-control" name="cvv">
						</div>
						<div class="text-center">
							<button type="submit" name="add" class="btn button btn-primary">Add Balance</button>
						</div>
					</form>
						
					</div>
				</div>
			</div>
			<!-- /.container -->
			
		</div>
		<!-- /#content -->
		
	</div>
	<!-- /#all -->
	    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="css/js/jquery-1.11.0.min.js"></script>
    <script src="css/js/bootstrap.min.js"></script>
    <script src="css/js/jquery.cookie.js"></script>
    <script src="css/js/waypoints.min.js"></script>
    <script src="css/js/modernizr.js"></script>
    <script src="css/js/bootstrap-hover-dropdown.js"></script>
    <script src="css/js/owl.carousel.min.js"></script>
    <script src="css/js/front.js"></script>
</body>
</html>