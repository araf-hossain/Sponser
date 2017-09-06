<?php 

session_start();
include("../database/connection.php");

$session_id=session_id();
$email=$_SESSION['lg_email'];


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

<style type="text/css">

.table a
{
    text-decoration: none;
    color: #000;
}
.table a:hover
{
    color: #a94040;
}
    
</style>

</head>

<body>

    <div id="all">

        <div id="content">
            <div class="container" style="margin-top: 30px;">

                <div class="col-md-12" id="checkout">

                    <div class="box">
                        <form method="post">
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="allinhome.php?page=checkout1"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="allinhome.php?page=checkout2"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="allinhome.php?page=checkout3"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $slct_shop_cart=mysql_query("SELECT * FROM shopping_cart WHERE session_id='$session_id' AND email='$email' ");
                                        while ($fetch_cart=mysql_fetch_array($slct_shop_cart)) 
                                        {
                                         ?>
                                            <tr>
                                                <?php 
                                            for ($i=0; $i < 3; $i++) 
                                            {
                                                if($i==0)
                                                {                                  
                                            ?>
                                            <td>
                                                <a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_cart[2];?>">
                                                    <img src="../images/products/<?php print $fetch_cart[2]."($i)"; ?>.jpg" >
                                                </a>
                                            </td>
                                            <?php
                                                }   
                                            } 
                                            ?>

                                                <td>
                                                <a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_cart[2];?>"><?php print $fetch_cart[3]; ?></a>
                                                </td>
                                                <td><?php print $fetch_cart[9]; ?></td>
                                                <td>&#2547;<?php print $fetch_cart[7]; ?></td>
                                                <td>&#2547;<?php print $fetch_cart[8]; ?></td>
                                                <td>&#2547;<?php print $fetch_cart[10]; ?></td>
                                            </tr>
                                        <?php 
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <?php
                                        $slct_shop_cart=mysql_query("SELECT * FROM shopping_cart WHERE session_id='$session_id' AND email='$email' ");
                                        $total=0;
                                    while ($fetch_shop_cart=mysql_fetch_array($slct_shop_cart)) 
                                    {
                                        $slct_column=$fetch_shop_cart[10];
                                        $count=count($slct_column);
                                        for ($i=0; $i < $count; $i++) 
                                        { 
                                            $total+=$slct_column;
                                        }
                                    }
                                    ?>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th>&#2547;<?php print $total; ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="allinhome.php?page=invoice" class="btn btn-primary">Order Receipt <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-12 -->

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