<?php 
session_start();

$percen=$_GET['percen'];
$total_amount=$_GET['totalamount'];
$all_total=$_GET['alltotal'];


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
        Checkout Process
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

<style type="text/css" media="screen">
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
            <div class="container" style="margin-top: 30px;">

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post">
                            <h1>Checkout - Payment method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="allinhome.php?page=checkout1"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="allinhome.php?page=checkout2"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="checkout4.html"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="wallet_wrap">
        <div class="check3icons" style=" width: 100%; margin-top: 2%;">
        <div class="row text-center">
 <!-- this is for bkash -->
        <a href="bkash_dbbl.php" target="main_iframe">
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
        <a href="master_visa.php" target="main_iframe">
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
        <a href="paypal.php" target="main_iframe">
        <div class="text-center">
        <div class="col-md-3 text-center" style="width: 23%;">
            <img src="images/paypal_logo.png" width="80" height="50">
        </div>
        </div>
        </a>

        </div>
            
            
            
           
        </div>

        <form class="card" method="post" enctype="multidata/form">
            <iframe id="walletframe" onload="iframeLoaded()" src="bkash_dbbl.php" frameborder="0"  width="100%" name="main_iframe" scrolling="no"></iframe>
        </form>
    </div>

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="allinhome.php?page=checkout2" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shipping method</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th><?php print $total_amount; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>&#2547;200</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>&#2547;<?php print $percen; ?></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>&#2547;<?php print $all_total; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

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