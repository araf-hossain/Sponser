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
    border-width: 35px 83px 0px;
    border-color: #FFFFFF transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 0px;
    left: 78%;
}
.col-md-12 .hr:before {
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 35px 83px 0px;
    border-color: #949494 transparent;
    display: block;
    width: 0px;
    z-index: 1;
    top: 3px;
    left: 78%;
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
							<input type="text" class="form-control" name="phone_number">
						</div>
						<div class="text-center">
							<button type="submit" class="btn button btn-primary">Add Balance</button>
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