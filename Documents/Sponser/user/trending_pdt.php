<?php

include("../database/connection.php");
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
        Products
    </title>

    <meta name="keywords" content="">

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

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">
                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Trending Product</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
<?php 

$slct_pdt=mysql_query("SELECT * FROM ad_form ORDER BY RAND() LIMIT 5");

while($fetch_pdt=mysql_fetch_array($slct_pdt))
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

<a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_pdt[2];?>&cate_name=<?php print $fetch_pdt[3]; ?>&sub_cate=<?php print $fetch_pdt[4]; ?>&pdt_id=<?php print $fetch_pdt[5];?>">

        <img src="../images/products/<?php print $fetch_pdt[5]."($i)"; ?>.jpg" class="img_responsive">
                                            </a>
                                        </div>
                                    <?php
                                        }
                                        elseif ($i==1)
                                        {
                                    ?>
                                        <div class="back">

<a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_pdt[2];?>&cate_name=<?php print $fetch_pdt[3]; ?>&sub_cate=<?php print $fetch_pdt[4]; ?>&pdt_id=<?php print $fetch_pdt[5];?>">

        <img src="../images/products/<?php print $fetch_pdt[5]."($i)"; ?>.jpg" alt="" class="img_responsive">
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
                                    <h3>
<a href="allinhome.php?page=pdt_details&item_name=<?php print $fetch_pdt[2];?>&cate_name=<?php print $fetch_pdt[3]; ?>&sub_cate=<?php print $fetch_pdt[4] ?>&pdt_id=<?php print $fetch_pdt[5];?>"><?php print $fetch_pdt[6]; ?></a>
                                    </h3>
                                    <p class="price">&#2547;<?php print $fetch_pdt[7]; ?></p>
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
 ?>
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->


    

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