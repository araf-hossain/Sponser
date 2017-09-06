<?php 
include("../database/connection.php");

$percen=$_GET['percen'];
$total=$_GET['total'];


if (isset($_POST['home'])) 
{
    if ($_SESSION['login_info']==true) 
    {
        print "<script>location=('allinhome.php?page=checkout2&percen=$percen&total=$total')</script>";
    }
}

if (isset($_POST['pick'])) 
{
    if ($_SESSION['login_info']==true) 
    {
        print "<script>location=('allinhome.php?page=checkout4&percen=$percen&total=$total')</script>";
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
            <div class="container" style="margin-top: 20px;">

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" >
                            <h1>Checkout - Delivery method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Home Delivery</h4>

                                            <p>Item will be deliverd to your home address in 2 weeks</p>
                                            <h3>Charge: &#2547;200</h3>
                                            <div class="box-footer text-center" style="margin-top: 63px">
                                                <button type="submit" name="home" class="btn btn-primary">Home Delivery</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Pick Up Your Items <sub> (Charge Free)</sub></h4>

                                            <p>You'll need to pick up the item from following address in a week <br>
                                            <br>
                                            <b>Pick Up Point: </b> Octopus Shop <br>
                                            <b>Address: </b> Nabinagar, Ashulia, Savar, Dhaka-1344</p>

                                            <div class="box-footer text-center">
                                                <button type="submit" name="pick" class="btn btn-primary">Pick Up</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shopping Cart</a>
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
<?php 


 ?>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>&#2547;<?php print $total; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>&#2547;<?php print $percen; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>&#2547;0.00</th>
                                    </tr>
                                    <?php 
                                    $all_total=$total+$percen; 
                                    ?>
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