<?php 
date_default_timezone_set('Asia/Dhaka');
session_start();
include("../database/connection.php");

$session_id=session_id();
$item_name=$_GET['item_name'];
$cate_name=$_GET['cate_name'];
$sub_cate=$_GET['sub_cate'];
$pdt_id=$_GET['pdt_id'];
$date=date('d-m-Y');
$time=date('h:m:s A');

$email=$_SESSION['lg_email'];

$slct_pdt=mysql_query("SELECT * FROM ad_form WHERE pdt_id='$pdt_id'");
$fetch_ad=mysql_fetch_array($slct_pdt);
if (isset($_POST['add_cart'])) 
{
    if($_SESSION['login_info']==true)
    {
        if (!empty($pdt_id) && !empty($fetch_ad[6]/*pdt_name*/) && !empty($fetch_ad[7]/*pdt_price*/)) 
        {
            mysql_query("INSERT INTO shopping_cart(`session_id`,`email`,`pdt_id`,`pdt_name`,`itm_name`,`cate_name`,`sub_cate`,`pdt_price`,`total`,`date`,`time`)VALUE('$session_id','$email','$pdt_id','$fetch_ad[6]','$fetch_ad[2]','$fetch_ad[3]','$fetch_ad[4]','$fetch_ad[7]','$fetch_ad[7]','$date','$time')");

            mysql_query("INSERT INTO pending_pdt(`session_id`,`email`,`pdt_id`,`pdt_name`,`itm_name`,`cate_name`,`sub_cate`,`pdt_price`,`total`,`date`,`time`)VALUE('$session_id','$email','$pdt_id','$fetch_ad[6]','$fetch_ad[2]','$fetch_ad[3]','$fetch_ad[4]','$fetch_ad[7]','$fetch_ad[7]','$date','$time')");

            mysql_query("INSERT INTO checking(`session_id`,`email`,`pdt_id`,`pdt_name`,`itm_name`,`cate_name`,`sub_cate`,`pdt_price`,`date`,`time`)VALUE('$session_id','$email','$pdt_id','$fetch_ad[6]','$fetch_ad[2]','$fetch_ad[3]','$fetch_ad[4]','$fetch_ad[7]','$date','$time')");

            if (mysql_affected_rows()>0) 
            {
                print "<script>alert('Successful')</script>";            
            }
        }
        else
        {
            print "<script>alert('Some field is empty')</script>";
        }
    }
    else
    {
        print "<script>alert('Please Login First')</script>";
    }
}


if(isset($_POST['wishlist']))
{
    if ($_SESSION['login_info']==true) 
    {
        mysql_query("INSERT INTO wishlist(`email`,`pdt_id`,`date`,`time`)VALUE('$email','$pdt_id','$date','$time')");
        if(mysql_affected_rows()>0)
        {
            print "<script>alert('Success')</script>";
        }
    }
    else
    {
        print "<script>alert('Please login first')</script>";
    }
}

if(isset($_POST['proceed']))
{
    if ($_SESSION['login_info']==true) 
    {
        $slct_cart=mysql_query("SELECT * FROM shopping_cart WHERE session_id='$session_id' AND email='$email' AND pdt_id='$pdt_id'");

        while($fetch_cart=mysql_fetch_array($slct_cart))
        {
        if ($pdt_id!=$fetch_cart[2])
        {
            print "<script>location=('allinhome.php?page=pending')</script>";
        }
        else
        {
            print "<script>location=('allinhome.php?page=shopping_cart')</script>";
        }
        }
    }
    else
    {
        print "<script>alert('Please login first')</script>";
    }
}

 /*$slct_db=mysql_query("SELECT * FROM ad_form WHERE pdt_id='$pdt_id'");
 while($fetch_producet=mysql_fetch_array($select_pdt))
 {
  
 */
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
        Product details
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">


<style type="text/css">

.img_responsive
{
    display: block;
    width: 100%;
    max-width: 100%;
    height: 160px;
}
.main_image
{
    display: block;
    width: 100%;
    max-width: 100%;
    height: 563px;
}
.child_img
{
    display: block;
    width: 100%;
    height:117px;
    cursor: pointer;
}
.child_img:hover
{
    border: 2px solid #a94040;
}
.item
{
    width: 238px;
    height: 325px;
    float: left;
    padding: 20px;
}
.item_name
{
    padding: 10px 10px 0;
    margin-top: 150px;
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
}
.item_name .price
{
    font-size: 18px;
    text-align:center;
    font-weight:300;
}

#content #gallery {
  margin-bottom: 30px;
}
#content #gallery .goToDescription {
  margin-top: 20px;
  font-size: 12px;
  text-align: center;
}
#content #gallery .goToDescription a {
  color: #999999;
  text-decoration: underline;
}
#content #gallery .price {
  font-size: 24px;
  font-weight: 300;
  text-align: center;
  margin-top: 40px;
}
#content #gallery .buttons {
  margin-bottom: 0;
  text-align: center;
}
#content #gallery .buttons .btn {
  margin-bottom: 10px;
}
</style>
<script type="text/javascript">
    $(document).ready(function(){
    $("#gallery img").hover(function(){
        $("#main-img").attr('src',$(this).attr('src').replace('thumb/',''));
    });
    var imgswap=[];
    $("#gallery div img").each(function(){
        imgurl=this.src.replace('thumb/','');
        imgswap.push(imgurl);
    });
    $(imgswap).preload();
});

$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src=this;
    });
}
</script>
</head>

<body>

    <div id="all">

        <div id="content">
            <div class="container" style="margin-top: 30px;">
<?php 
$slct_pdt=mysql_query("SELECT * FROM ad_form WHERE pdt_id='$pdt_id'");

while($fetch_pdt=mysql_fetch_array($slct_pdt))
{
    mysql_query("UPDATE ad_form SET views=views+1 WHERE pdt_id='$pdt_id'");
    $views=mysql_query("SELECT * FROM ad_form WHERE pdt_id='$pdt_id'");
    while($fetch_views=mysql_fetch_array($views))
    {
        $increment_views=$fetch_views['views'];
    }
 ?>

                <div class="col-md-9" style="width: 85%;left: 8%;right: 0%;">

                    <div class="row" id="gallery">
                        <div class="col-sm-7">
                        <?php 
                        for ($i=0; $i < 3; $i++) 
                        { 
                         if($i==0)
                            {
                        ?>
                            <div >
                                <img src="../images/products/<?php print $fetch_pdt[5]."($i)";?>.jpg" alt="" class="main_image" id="main-img">
                            </div>
                        <?php 
                            }
                        }
                        ?>
                            <!-- <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon 

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon 
                            -->
                        </div>
                        <div class="col-sm-5">
                        <form method="post">
                            <div class="box" style="height: auto;padding: 20px 0;">
                                <h1 class="text-center"><?php print $fetch_pdt[6]; ?></h1>
                                <?php 

                                $slct_id=mysql_query("SELECT * FROM checking WHERE pdt_id='$pdt_id' AND session_id='$session_id'");
                                $fetch_id=mysql_fetch_array($slct_id);
                                    if ($pdt_id!=$fetch_id['pdt_id'] || $_SESSION['login_info']!=true)
                                    {

                                ?>
                                <p class="goToDescription"><a href="#details" class="scroll-to" >Scroll to product details, material & care and sizing</a>
                                </p>
                                <?php 
                                    }
                                    else
                                    {
                                 ?>
                                 <h3 class="text-center" style="color: green">Product added</h3>
                                <?php 
                                    }
                                    // }

                                ?>
                                <p class="price" style="width: 50%;float: left;">Price <?php print $fetch_pdt[7]; ?>&#2547;</p>
                                <p class="price text-right" style="width: 50%;float: left;"><?php print $increment_views; ?> Views</p>


                                <p class="text-center buttons">
                                    <button type="submit" name="add_cart" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                    <?php 
                                       
                                    if ($pdt_id!=$fetch_id[2] || $_SESSION['login_info']!=true) 
                                    {
                                    ?>
                                    <button type="submit" name="wishlist" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</button>
                                    <?php 
                                    }
                                    else
                                    {
                                    ?>
                                    <button type="submit" name="proceed" class="btn btn-primary">Proceed to cart <i class="fa fa-chevron-right"></i></button>
                                    <?php 
                                    }
                                    ?>
                                </p>


                            </div>
                            
                            <div class="row">
                            <?php 
                        for ($j=0; $j < 3; $j++) 
                        { 
                        ?>
                                <div class="col-xs-4" style="padding: 0 4px;">
        <img src="../images/products/<?php print $fetch_pdt[5]."($j)"; ?>.jpg" alt="" class="child_img">
                                    </a>
                                </div>
                        <?php 
                        } 
                        ?>
                            </div>
                        </form>
                        </div>
                    </div>
                    <?php
                        // }
                    ?>
                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p><?php print $fetch_pdt[10]; ?></p>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li><?php print $fetch_pdt[8]; ?></li>
                            </ul>

                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                            </p>
                    </div>
                </div>
<?php 
}
?>
            </div>
            <!-- /.container -->


 <!-- _____________******************* RELATED PRODUCTS *******************_______________
 -->
<div id="hot">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Related Products</h2>
            </div>
        </div>
    </div>


    <div class="container">
<?php 


$slct_rltd_pdt=mysql_query("SELECT * FROM ad_form WHERE itm_name='$fetch_ad[2]' AND cate_name='$fetch_ad[3]' AND sub_cate='$fetch_ad[4]'");

while($fetch_rltd=mysql_fetch_array($slct_rltd_pdt))
{
if($pdt_id!=$fetch_rltd[5])
{

 ?>
                    <div style="float: left;">
                        <div class="item">
                            <div class="product">
                                <?php 

                                    for ($i=0; $i < 3; $i++) 
                                    {

                                 ?>
                                <div class="flip-container">
                                    <div class="flipper">
                                    <?php 
                                        if($i==0)
                                        {
                                     ?>
                                        <div class="front">
                                            <a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_rltd[2];?>&cate_name=<?php print $fetch_rltd[3]; ?>&sub_cate=<?php print $fetch_rltd[4]; ?>&pdt_id=<?php print $fetch_rltd[5];?>">
    <img src="../images/products/<?php print $fetch_rltd[5]."($i)"; ?>.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                    <?php
                                        }
                                        elseif ($i==1)
                                        {
                                    ?>
                                        <div class="back">
                                            <a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_rltd[2];?>&cate_name=<?php print $fetch_rltd[3]; ?>&sub_cate=<?php print $fetch_rltd[4]; ?>&pdt_id=<?php print $fetch_rltd[5];?>">
    <img src="../images/products/<?php print $fetch_rltd[5]."($i)"; ?>.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                    <?php 
                                        }
                                    ?>
                                    </div>
                                </div>
                                <?php 
                                    } 
                                ?>
                                <div class="item_name">
                                    <h3><a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_rltd[2];?>&cate_name=<?php print $fetch_rltd[3]; ?>&sub_cate=<?php print $fetch_rltd[4] ?>&pdt_id=<?php print $fetch_rltd[5];?>"><?php print $fetch_rltd[6]; ?></a></h3>
                                    <p class="price">&#2547;<?php print $fetch_rltd[7]; ?></p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <!-- <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/mac1.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/mac1.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_name">
                                    <h3><a href="detail.html">White Blouse Armani</a></h3>
                                    <p class="price"><del>$280</del> $143.00</p>
                                </div>
                                <!-- /.text 

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon 

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon 

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon 
                            </div>
                            <!-- /.product 
                        </div> -->


                    </div>
                    <!-- /.new div -->
 <?php 
}

}
 ?>
                </div>
<div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Other Related Products</h2>
            </div>
        </div>
 </div>

<div class="container">
<?php 
// _____________******************* OTHER RELATED PRODUCTS *******************_______________

$slct_other_pdt=mysql_query("SELECT * FROM ad_form WHERE itm_name='$fetch_ad[2]' AND cate_name='$fetch_ad[3]'");

while($fetch_other_rltd=mysql_fetch_array($slct_other_pdt))
{

if($pdt_id!=$fetch_other_rltd[5])
{
 ?>
                    <div style="float: left;">
                        <div class="item">
                            <div class="product">
                                <?php 

                                    for ($i=0; $i < 3; $i++) 
                                    {

                                 ?>
                                <div class="flip-container">
                                    <div class="flipper">
                                    <?php 
                                        if($i==0)
                                        {
                                     ?>
                                        <div class="front">
                                            <a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_other_rltd[2];?>&cate_name=<?php print $fetch_other_rltd[3]; ?>&sub_cate=<?php print $fetch_other_rltd[4]; ?>&pdt_id=<?php print $fetch_other_rltd[5];?>">
    <img src="../images/products/<?php print $fetch_other_rltd[5]."($i)"; ?>.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                    <?php
                                        }
                                        elseif ($i==1)
                                        {
                                    ?>
                                        <div class="back">
                                            <a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_other_rltd[2];?>&cate_name=<?php print $fetch_other_rltd[3]; ?>&sub_cate=<?php print $fetch_other_rltd[4]; ?>&pdt_id=<?php print $fetch_other_rltd[5];?>">
    <img src="../images/products/<?php print $fetch_other_rltd[5]."($i)"; ?>.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                    <?php 
                                        }
                                    ?>
                                    </div>
                                </div>
                                <?php 
                                    } 
                                ?>
                                <div class="item_name">
                                    <h3><a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_other_rltd[2];?>&cate_name=<?php print $fetch_other_rltd[3]; ?>&sub_cate=<?php print $fetch_other_rltd[4]; ?>&pdt_id=<?php print $fetch_other_rltd[5];?>"><?php print $fetch_other_rltd[6]; ?></a></h3>
                                    <p class="price">&#2547;<?php print $fetch_other_rltd[7]; ?></p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <!-- <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/mac1.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/mac1.jpg" alt="" class="img_responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_name">
                                    <h3><a href="detail.html">White Blouse Armani</a></h3>
                                    <p class="price"><del>$280</del> $143.00</p>
                                </div>
                                <!-- /.text 

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon 

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon 

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon 
                            </div>
                            <!-- /.product 
                        </div> -->


                    </div>
                    <!-- /.new div -->
<?php 
}
}
 ?>
                </div>

</div>
<!-- hot -->

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