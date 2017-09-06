<?php 
include("../database/connection.php");
session_start();

$session_id=session_id();
$percen=$_GET['percen'];
$total_amount=$_GET['totalamount'];

$email=$_SESSION['lg_email'];

/*
if (isset($_POST['delivery'])) 
{
    if ($_SESSION['login_info']==true) 
    {
        $slct_pending=mysql_query("SELECT * FROM pending_pdt WHERE session_id='$session_id' AND email='$email'");
        while ($fetch_pdt=mysql_fetch_array($slct_pending)) 
        {
            mysql_query("INSERT INTO shopping_cart()VALUE()");
        }
    }
}*/
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
        Pending Orders
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



</head>

<body>


    <div id="all">

        <div id="content">
            <div class="container" style="margin-top: 30px;">

                <div class="col-md-12" id="customer-orders">
                    <div class="box">
                        <h1>My pending orders</h1>

                        <p class="lead">Your pending orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <form method="post">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Action</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $slct_cart=mysql_query("SELECT * FROM pending_pdt WHERE session_id='$session_id' AND email='$email'");
                                while ($fetch_cart=mysql_fetch_array($slct_cart)) 
                                {
                                    
                                 ?>
                                    <tr>
                                        <th>
                                        <?php 
                                        for ($i=0; $i < 3; $i++) 
                                        { 
                                            if ($i==0) 
                                            {
                                        ?>
                                        <img src="../images/products/<?php print $fetch_cart[2]."($i)"; ?>.jpg" width="50px">
                                        <?php
                                            }
                                        } 
                                        ?>
                                        &nbsp;<?php print $fetch_cart[3]; ?></th>
                                        <td><a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_cart[2]; ?>" class="btn btn-default btn-sm">View</a>
                                        </td>
                                        <td><?php print $fetch_cart[10]; ?></td>
                                        <td><span class="label label-info">Being prepared</span>
                                        </td>
                                        <td>&#2547;<?php print $fetch_cart[7]; ?></td>
                                    </tr>
                                <?php 
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <?php 
                                    $total=0;
                                    $slct_shop_cart=mysql_query("SELECT * FROM pending_pdt WHERE session_id='$session_id' AND email='$email'"); 
                                    while ($fetch_shop_cart=mysql_fetch_array($slct_shop_cart)) 
                                    {
                                        $slct_column=$fetch_shop_cart[7];
                                        $count=count($slct_column);
                                        for ($i=0; $i < $count; $i++) 
                                        { 
                                            $total+=$slct_column;
                                        }
                                    }
                                    ?>
                                        <tr>
                                            <th colspan="4" style="font-size: 22px;">Total</th>
                                            <th colspan="1" style="font-size: 22px;">&#2547;<?php print $total; ?></th>
                                        </tr>
                                    </tfoot>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <button type="submit" name="shop_cart" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue Shopping</button>
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="delivery" class="btn btn-primary">Delivery Process <i class="fa fa-chevron-right"></i></button>
                            </div>
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
