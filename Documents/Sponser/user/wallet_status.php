<?php

include("../database/connection.php");
session_start();
$email=$_SESSION['email'];

 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Wallet Status</title>
	</head>
<body>

<style type="text/css" media="screen">
.wallet_wrap
{
	float: left;
    padding: 1%;
    width: 52%;
    height: 650px;
    margin-left: 22%;
}

.icons
{
	float: left;
	width: auto;
}
.icons img
{
	float: left;
	margin-left: 8%;
}

.card
{
	float: left;
	width: 100%;
	max-width: 91%;
	height: auto;
	margin:0% 7%;
}
iframe 
{
    position: absolute;
    border: none;
    float: left;
    max-width: 48.5%;
    height: 60%;
    width: 100%;
    margin: -1.5% -2%;
}
</style>

	<div class="wallet_wrap">
		<div class="icons" style=" width: 100%; margin-top: 2%; margin-bottom: 2%">
			<a href="master_visa.php" target="main_iframe"><img src="images/mastercard_logo.png" width="55" height="45"></a>
			<a href="master_visa.php" target="main_iframe"><img src="images/visa_logo.png" width="55" height="45"></a>
			<a href="bkash_dbbl.php" target="main_iframe"><img src="images/bkash_logo.png" width="90" height="40"></a>
			<a href="bkash_dbbl.php" target="main_iframe"><img src="images/dbbl_logo2.png" width="80" height="40"></a>
			<a href="paypal.php" target="main_iframe"><img src="images/paypal_logo.png" width="80" height="50"></a>
		</div>

		<form class="card" method="post" enctype="multidata/form">
			<iframe src="master_visa.php" name="main_iframe" scrolling="no"></iframe>
		</form>
	</div>
</body>

</html>