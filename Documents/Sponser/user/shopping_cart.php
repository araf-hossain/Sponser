<?php

session_start();
include("../database/connection.php");

$total=0;
$percen=0;
$total_amount=0;

$session_id=session_id();
$pdt_id=$_GET['pdt_id'];
$email=$_SESSION['lg_email'];

// $slct_shop_cart=mysql_query("SELECT * FROM shopping_cart WHERE email='$email'");

$del=$_POST['del'];
if (isset($del)) 
{
    if ($_SESSION['login_info']==true) 
    {
        mysql_query("DELETE FROM shopping_cart WHERE pdt_id='$del'");
    }
}



$slct_shop_cart=mysql_query("SELECT * FROM shopping_cart WHERE session_id='$session_id'");
$fetch_id=mysql_fetch_array($slct_shop_cart);
$total_pdt=mysql_num_rows($slct_shop_cart);
                                    

                                    
                                            // while ($fetch_row=mysql_fetch_array($slct_shop_cart)) 
                                            // {
//                                             for($i=0;$i<$count_row;$i++) 
//                                             {
// mysql_query("UPDATE shopping_cart SET quantity='".$quantity[$i]."' WHERE pdt_id='".$fetch_id[2]."'");
//                                             }
                                            // }


?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>
        Shopping Cart
    </title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

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


<style type="text/css">
.img_responsive
{
    display: block;
    width: 100%;
    max-width: 100%;
    height: 160px;
}
.item
{
    width: 238px;
    height: 325px;
    float: left;
    /* margin-left: 30px; */
    padding: 20px;
}
.item_name
{
    padding: 10px 10px 0;
    margin-top: 160px;
}
.item_name h3
{
    font-size: 18px;
    font-weight: 700;
    height: 39.6px;
    text-align: center;
    overflow: hidden;   
}
.item_name h3 a
{
    color: #555555;
    text-decoration: none;
}
.item_name .price
{
    font-size: 18px;
    text-align:center;
    font-weight:300;
}
</style>

</head>

<body>


    <div id="all" style="margin-top: 30px;">
        <div id="content">
            <div class="container">
                <div class="col-md-9" id="basket">
                    <div class="box">
                        <form method="post">
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php print $total_pdt; ?> item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_POST['update'])) 
                                        {
         // $slct_quantity=mysql_query("SELECT * FROM shopping_cart WHERE session_id='$session_id'");
        // $fetch_qu=mysql_fetch_array($slct_quantity);
                                            $quantity=$_POST['quantity'];
                                            // $count_row=count($quantity);
                                            // print $count_row;
                                            $update=0;
                                    // while ($fetch_quantity=mysql_fetch_array($slct_quantity)) 
                                            // {
                                                // for ($i=0; $i < $count_row; $i++) { 
                                                //     # code...
                                            foreach ($quantity as $id => $num) {
                                                # code...
                                            
mysql_query("UPDATE shopping_cart SET quantity='$num' WHERE pdt_id='$id'");
                                                if(mysql_affected_rows()>0)
                                                    print "success ";
                                                else
                                                    print " (something wrong) ";
                                                // }
                                            }
                                        }

                                    $slct_shop_cart=mysql_query("SELECT * FROM shopping_cart WHERE session_id='$session_id'"); 
                                    while($fetch_shop_Cart=mysql_fetch_array($slct_shop_cart))
                                    {
                                        
                                                                                
                        // ______*********** TOTAL PRICE **********______
                                        $slct_cart=mysql_query("SELECT * FROM shopping_cart WHERE pdt_id='$fetch_shop_Cart[2]'");
                                        while($fetch_price=mysql_fetch_array($slct_cart))
                                        {
                                        $price=($fetch_price[7]-$fetch_price[8])*$fetch_price[9];

                                        mysql_query("UPDATE shopping_cart SET total='$price' WHERE pdt_id='$fetch_shop_Cart[2]' ");
                                        // END price
                                        }
                                    ?>
                                        <tr>
                                            <?php 
                                            for ($i=0; $i < 3; $i++) 
                                            {
                                                if($i==0)
                                                {                                  
                                            ?>
                                            <td>
                                                <a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_shop_Cart[2];?>">
                                                    <img src="../images/products/<?php print $fetch_shop_Cart[2]."($i)"; ?>.jpg" >
                                                </a>
                                            </td>
                                            <?php
                                                }   
                                            } 
                                            ?>
                                            <td><a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_shop_Cart[2];?>"><?php print $fetch_shop_Cart[3]; ?></a>
                                            </td>
                                            <td>
                                                <input type="number" name="quantity[<?php print $fetch_shop_Cart[2]; ?>]" min="1" max="4000" style="padding: 3px;" placeholder="<?php print $fetch_shop_Cart[9]; ?>" class="form-control">
                                            </td>
                                            <td>&#2547;<?php print $fetch_shop_Cart[7]; ?></td>
                                            <td>&#2547;<?php print $fetch_shop_Cart[8]; ?></td>
                                            <td>&#2547;<?php print $fetch_shop_Cart[10]; ?></td>
                                            <td>
                                                <button class="btn btn-primary" name="del" value="<?php print $fetch_shop_Cart[2]; ?>" style="border: 0;"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>
                                    
                                    </tbody>
                                    <tfoot>
                                    <?php 

                                    $slct_shop_cart=mysql_query("SELECT * FROM shopping_cart WHERE session_id='$session_id'"); 
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
                                            <th colspan="5">Total</th>
                                            <th colspan="2">&#2547;<?php print $total; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="home.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" name="update" class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>
                                    <button type="submit" name="checkout" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                    <div class="container row same-height-row">
                    <h2>YOU MAY LIKE THESE</h2>
<?php

$slct_db=mysql_query("SELECT * FROM shopping_cart GROUP BY cate_name HAVING COUNT(*)>1");
$fetch_cate=mysql_fetch_array($slct_db);
$slct_ad=mysql_query("SELECT * FROM ad_form WHERE cate_name='$fetch_cate[5]'");
while($fetch_db=mysql_fetch_array($slct_ad))
{
?>
                        <div class="item">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <?php 
                                        for ($i=0; $i <3; $i++) 
                                        {
                                            if($i==0)
                                            {
                                         ?>
                                        <div class="front">
                                            <a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_db[5];?>">
                                                <img src="../images/products/<?php print $fetch_db[5]."($i)" ?>.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                        <?php 
                                        }
                                        elseif($i==1)
                                        {

                                             ?>
                                        <div class="back">
                                            <a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_db[5];?>">
                                                <img src="../images/products/<?php print $fetch_db[5]."($i)" ?>.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                        <?php 
                                        }
                                        }
                                         ?>
                                    </div>
                                </div>
                                <div class="item_name">
                                    <a href="allinhome.php?page=pdt_details&pdt_id=<?php print $fetch_db[5];?>"><h3><?php print $fetch_db[6]; ?></h3></a>
                                    <p class="price">&#2547;<?php print $fetch_db[7]; ?></p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
<?php 
}
 ?>
                </div>

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
                                        <td>Tax</td>
                                        <th>&#2547;<?php print $percen; ?></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>&#2547;<?php print $total_amount; ?></th>
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

<?php 


if (isset($_POST['checkout'])) 
{
    if ($_SESSION['login_info']==true) 
    {
        print "<script>location=('allinhome.php?page=checkout1&percen=$percen&total=$total')</script>";
    }
}
?>



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