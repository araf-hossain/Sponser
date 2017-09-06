<?php 
date_default_timezone_set('Asia/Dhaka');
session_start();

$session_id=session_id();
$email=$_SESSION['lg_email'];
$date=date('d/m/Y');

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
        Invoice Order
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
.table th
{
    font-size: 20px;
}
</style>
</head>

<body>

    <div id="all">

        <div id="content">
            <div class="container" style="margin-top: 30px;">

                <div class="col-md-10" id="customer-order" style="left:8.4%">
                    <div class="box">
                    <div class="col-md-3">
                    <div class="box-header">
                        <h1>INVOICE ORDER</h1>
                        <hr style=" width:110%;padding: 0;margin: 0;border-top: 1px solid #848484;">
                        <hr style="width:110%;padding: 0;margin: 3px 0 0;border-top: 1px solid #848484">
                    </div>
                    </div>
                    <div class="col-md-9">
                        <p class="lead">Order was placed on <strong><?php print $date; ?></strong> and is currently <strong>Being prepared</strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                    </div>
                    <div class="row addresses">
                    <div class="col-md-12">
                        
                                <div class="col-md-6">
                            <div class="box text-left" style="padding-bottom: 0px; height: 280px ">

                                <div class="box-header" style="padding: 0 10px 0;">
                                    
                                <h2>Invoice address</h2>
                                </div>
                                <p><b>Sponser</b>
                                <br>DEPZ, Savar
                                <br>+880190145868
                                <br>royalshopping@outlook.com
                                <br>www.royalshopping.com.bd 
                                <br>Dhaka-1349
                                </p>
                                </div>
                            </div>
                                <div class="col-md-6">
                            <div class="box text-left" style="padding-bottom: 0px; height: 280px ">
<?php 
$slct_details=mysql_query("SELECT * FROM delivery_details WHERE session_id='$session_id' AND email='$email'");
$fetch_details=mysql_fetch_array($slct_details);

 ?>
                                <div class="box-header" style="padding:  0 10px 0;">
                                    
                                <h2>Shipping address</h2>
                                </div>
                                <p><b><?php print $fetch_details[1]; ?></b>
                                    <br><?php print $fetch_details[3]; ?>
                                    <br><?php print $fetch_details[2]; ?>
                                    <br><?php print $fetch_details[4]; ?>
                                    <br><?php print $fetch_details[5];?>
                                    <?php if (NULL!=$fetch_details[6]) 
                                    {
                                    ?>
                                    -<?php print $fetch_details[6]; ?>
                                    <?php
                                    }
                                    if (NULL!=$fetch_details[7]) 
                                    {
                                    ?>
                                    <br><?php print $fetch_details[7]; ?>
                                    <?php
                                    }
                                    ?>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        $percen=0;
                                    while ($fetch_shop_cart=mysql_fetch_array($slct_shop_cart)) 
                                    {
                                        $slct_column=$fetch_shop_cart[10];
                                        $count=count($slct_column);
                                        for ($i=0; $i < $count; $i++) 
                                        { 
                                            $total+=$slct_column;
                                            $percen=($total*5)/100;
                                        }
                                        $total_amount=$total+$percen;
                                    }
                                    ?>
                                    <tr>
                                        <th colspan="5" class="text-right">Order subtotal</th>
                                        <th>&#2547;<?php print $total; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Shipping and handling</th>
                                        <th>&#2547;<?php print $percen; ?></th>
                                    </tr>
                                    <?php 
                                    if ($fetch_details[0]==$session_id) 
                                    {
                                        $total_amount+=200;
                                    ?>
                                    <tr>
                                        <th colspan="5" class="text-right">Tax</th>
                                        <th>&#2547;200</th>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    
                                    <tr>
                                        <th colspan="5" class="text-right"><strong>Total</strong></th>
                                        <th>&#2547;<?php print $total_amount; ?></th>
                                    </tr>
                                </tfoot>

                            </table>

                        </div>
                        <!-- /.table-responsive -->
                        <div class="box-footer">
                            <div class="pull-right">
                                    <a href="home.php" class="btn btn-primary">Continue Shopping <i class="fa fa-chevron-right"></i></a>
                                </div>
                        </div>
                        
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
