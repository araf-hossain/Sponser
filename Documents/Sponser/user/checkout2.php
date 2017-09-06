<?php 
date_default_timezone_set('Asia/Dhaka');
session_start();
include("../database/connection.php");

$percen=$_GET['percen'];
$total=$_GET['total'];
$all_total=$total+$percen+200;

// login email
$lg_email=$_SESSION['lg_email'];

$session_id=session_id();
$name=$_POST['name'];
$email=$_POST['email'];
$street=$_POST['street'];
$phn_num=$_POST['phn_num'];
$dist=$_POST['dist'];
$zip=$_POST['zip'];
$company=$_POST['company'];
$date=date('d-m-Y');
$time=date('h:m:s A');

if (isset($_POST['next'])) 
{
    if ($_SESSION['login_info']==true) 
    {
        if (!empty($name) && !empty($email) && !empty($street) && !empty($phn_num) && !empty($dist)) 
        {
            mysql_query("INSERT INTO delivery_details(`session_id`,`name`,`email`,`street`,`phn_num`,`state`,`zip`,`company`,`all_total`,`date`,`time`)VALUES('$session_id','$name','$email','$street','$phn_num','$dist','$zip','$company','$all_total','$date','$time')");
            print "<script>location=('allinhome.php?page=checkout3&percen=$percen&totalamount=$total_amount&alltotal=$all_total')</script>";
        }
        else
            print "Please input something";
    }
}

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



</head>

<body>

    <div id="all">

        <div id="content">
            <div class="container" style="margin-top: 30px;">

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post">
                            <h1>Checkout - Delivery method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="allinhome.php?page=checkout1"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                            <?php
                            $slct_user=mysql_query("SELECT * FROM user_signup WHERE email='$lg_email'");
                            $fetch_user=mysql_fetch_array($slct_user);
                            ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name <span style="color: red">*</span></label>
                                            <input readonly type="text" name="name" value="<?php print $fetch_user[0]; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email <span style="color: red">*</span></label>
                                            <input readonly type="text" name="email" value="<?php print $fetch_user[1]; ?>" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="street">Street <span style="color: red">*</span></label>
                                            <input type="text" name="street" value="<?php print $fetch_user[7]; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number <span style="color: red">*</span></label>
                                            <input type="text" name="phn_num" value="<?php print $fetch_user[3]; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="state">District <span style="color: red">*</span></label>
                                            <select class="form-control" name="dist">
                                                <option value="">Select District</option>
                                            <?php 
                                            $slct_dist=mysql_query("SELECT * FROM dist_name"); 
                                            while ($fetch_dist=mysql_fetch_array($slct_dist)) 
                                            {
                                                if ($fetch_user[5]==$fetch_dist[0]) 
                                                {
                                            ?>
                                                <option selected value="<?php print $fetch_user[5]; ?>"><?php print $fetch_user[5]; ?></option>
                                            <?php      
                                                }
                                                else
                                                {
                                            ?>
                                                <option><?php print $fetch_dist[0]; ?></option>
                                            <?php
                                                }
                                            }
                                            ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="zip">ZIP</label>
                                            <input type="text" name="zip" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="city">Company</label>
                                            <input type="text" name="company" class="form-control">
                                        </div>
                                    </div>

                                    

                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="allinhome.php?page=checkout1" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to shopping cart</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" name="next" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
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
                                        <th>&#2547;<?php print $total; ?></th>
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