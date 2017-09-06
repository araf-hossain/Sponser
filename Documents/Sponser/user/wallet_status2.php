<?php
date_default_timezone_set('Asia/Dhaka');
session_start();
include("../database/connection.php");

$email=$_SESSION['lg_email'];
$slct_user=mysql_query("SELECT * FROM user_signup WHERE email='$email' ");
$fetch_user=mysql_fetch_array($slct_user);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Design of Wallet Balance
    </title>

    <meta name="keywords" content="">

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

<style type="text/css">

.col-md-6 table
{
    width: 100%;
    font-size: 25px;
}
.col-md-6 table th
{
    font-size: 18px;
    padding: 16px 0 10px;
    text-align: center;
}
.col-md-5 table tr
{
    width: 100%;
}
.col-md-5 table tr td , .col-md-4 table tr td
{
    width: 50%;
}
.col-md-4 table tr td
{
    text-align: center;
}
.col-md-4 .col-md-6:hover
{
    border-radius:4px;
    transition: .5s;
    box-shadow: 0 2px 6px 2px rgba(19, 35, 47, 0.3);
    cursor: pointer;
}
.wallet_wrap
{
    width: 100%;
}

.check3icons
{
    float: left;
    width: auto;
}
.check3icons .img
{
    display:inline-block;
    float: left;
    width: 20%;
}
.text-center img
{
    width:123px;
    height: 75px;
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
    position: relative;
    overflow:hidden;
    border: none;
    width: 100%;
}
</style>
<script type="text/javascript">

// This is for auto adjust Height;
  function iframeLoaded() {
      var iFrameID = document.getElementById('walletframe');
      if(iFrameID) {
            // here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
      }   
  }
</script>
</head>

<body>

    <div id="all">
        <div id="content">
        <div class="box">
                    <div class="container" >
                        <div class="col-md-3">
                            
                            <img src="images/user/<?php print $email; ?>.jpg" style="height: 230px;" class="img-rounded img-responsive">
                        </div>
                        <div class="col-md-5">
                            <h2><?php print $fetch_user[0]; ?></h2>
                        </div>
                        <div class="same-height-row">
                            <div class="col-md-5">
                                <table>
                                    <tbody class="lead">
                                    <?php 
                                    if($fetch_user[1]!=NULL) 
                                    {
                                     ?>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php print $fetch_user[1]; ?> </td>
                                        </tr>
                                    <?php 
                                    }
                                    if($fetch_user[3]!=NULL)
                                    {
                                    ?>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php print $fetch_user[3]; ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    if($fetch_user[4]!=NULL) 
                                    {
                                    ?>
                                        <tr>
                                            <td>Company Name</td>
                                            <td><?php print $fetch_user[4]; ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    if($fetch_user[7]!=NULL) 
                                    {
                                    ?>
                                        <tr>
                                            <td>Street Address</td>
                                            <td><?php print $fetch_user[7]; ?></td>
                                        </tr>
                                    <?php 
                                    } 
                                    if(NULL!=$fetch_user[5]) 
                                    {
                                    ?>
                                        <tr>
                                            <td>Country</td>
                                            <td><?php print $fetch_user[5]." ".$fetch_user[6] ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    ?>
                                        <tr><h6>Last Updated <?php print $fetch_user[8]; ?></h6></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <div class="box" style="padding: 10px;">
                                    <a href="allinhome.php?page=wallet" style="color: #000">
                                    <div class="col-md-6" style="padding: 0;height: 100px;">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>WALLET BALANCE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php 
                $slct_wallet=mysql_query("SELECT * FROM user_auto_wallet WHERE email='$email'");
                                                $fetch_wallet=mysql_fetch_array($slct_wallet);
                                                 ?>
                                                    <td><?php print $fetch_wallet[2]; ?> TK</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </a>

                                    <a href="allinhome.php?page=free_ad" style="color: #000">
                                    <div class="col-md-6" style="padding: 0;height: 100px">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>PRODUCT AD</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                            <?php 
                    $slct_adform=mysql_query("SELECT email FROM ad_form WHERE email='$email'");
                                                 ?>
                                                    <td><?php print mysql_num_rows($slct_adform); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </a>
                                    <div class="clearfix">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="container" style="margin-top: 30px;">

                        <div class="col-md-9" style="margin: 0 12%">
                    <div class="box" style="box-shadow: 1px 10px 30px rgba(0, 0, 0, 0.1)">
                        <form method="post">
                            <div class="row text-center">
 <!-- this is for bkash -->
        <a href="add_balance1.php" target="main_iframe">
        <div class="text-center">
        <div class="col-md-2 text-center">
            <img src="images/bkash_logo.png" width="90" height="40">
        </div>
        <div class="col-md-3 text-center" style="width: 20%;">
            <img src="images/dbbl_logo2.png" width="80" height="40">
        </div>
        </div>
        </a>

<!-- this is for master and visa card -->
        <a href="add_balance2.php" target="main_iframe">
        <div class="text-center">
        <div class="col-md-3 text-center" style="width: 22%;">
            <img src="images/mastercard_logo.png" width="55" height="45">
        </div>
        <div class="col-md-2 text-center">
            <img src="images/visa_logo.png" width="55" height="45">
        </div>
        </div>
        </a>

<!-- and this is for paypal -->
        <a href="add_balance3.php" target="main_iframe">
        <div class="text-center">
        <div class="col-md-3 text-center" style="width: 23%;">
            <img src="images/paypal_logo.png" width="80" height="50">
        </div>
        </div>
        </a>

        </div>

                            <div class="content">
                                <div class="wallet_wrap">

        <form class="card" method="post" enctype="multidata/form">
            <iframe id="walletframe" onload="iframeLoaded()" src="add_balance1.php" frameborder="0"  width="100%" name="main_iframe" scrolling="no"></iframe>
        </form>
    </div>

                            </div>
                            <!-- /.content -->
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                    </div>
                    <!-- /#container -->
                
                <!-- /#box -->
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
