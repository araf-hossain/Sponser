<?php 
session_start();
include("../database/connection.php");
include ("counter.php");
$email=$_SESSION['lg_email'];
$slct_user=mysql_query("SELECT * FROM user_signup WHERE email='$email'");
$fetch_user=mysql_fetch_array($slct_user);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sponser Add</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- <link href="css/css/font-awesome.css" rel="stylesheet"> -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/owl.carousel.css" rel="stylesheet">
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

<style type="text/css">

html 
{
    font-family: sans-serif;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}
body 
{
    font-size: 14px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    background-color: #f6f6f6;
    min-height: 100vh;
    padding: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    line-height: 1.4em;
    position: relative;
    margin: 0;
}
a
{
    text-decoration: none;
}

.header:before,.header:after,
.header_nav:before,.header_nav:after
{
    content: '';
    display: table;
}
.header:after, .header_nav:after
{
    clear:both;
}

.header 
{
    display: block;
    background-color: #fff;
    position: relative;
    -webkit-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
    -moz-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
    box-shadow: 0px 0px 10px rgba(0,0,0,.8);
    z-index: 100;
}

.page_container
{
    width: 960px;
    margin: 0 auto;
}
.page_container ul
{
    margin-bottom: 0;
    margin-top: 0;
}
.header_logo
{
    float: left;
    overflow: hidden;
    text-indent: -10000px;
    background-image: url(images/icons/spnsr.png);
    background-position: 0 0;
    margin-top: 12px;
    width: 161px;
    height: 34px;
}
.header_nav
{
    float: right;
    margin:0;
    padding: 0;
}
ul
{
    padding: 0;
}
li
{
    list-style: none;
}
.header_nav__item
{
    float: left;
    position: relative;
}
.header_nav__item:first-child
{
    border-right: 1px solid #ddd;
}
.header_nav__link
{
    display: block;
    height: 60px;
    padding: 20px 20px 0;
    color: #333;
}
a
{
    text-decoration: none;
}
* 
{
    box-sizing: border-box;
}

section
{
    display: block;
}
.hero_unit {
    padding: 60px 0 100px;
    margin: 0 60px -55px;
    color: #332600;
    line-height: 1.4;
    text-align: center;
    margin-top: -15px;
}
.hero_unit__heading, .hero_unit__subheading 
{
    margin: 0 auto;
    width: 450px;
}
h1 
{
    font-size: 1.8em;
}
.hero_unit__subheading
{
    font-size: 1.1em;
    padding: 0 20px;
}

.top 
{
    background-color: #ffc933;
    padding: 15px 0;
    overflow: hidden;
}
.top .search .category_filters, .top .search form {
    position: relative;
    width: 630px;
}
.top .search 
{
    width: 650px;
    background: #fff;
    margin: 0 auto;
    border-radius: 100px;
    box-shadow: 2px 2px 0 rgba(0,0,0,.1);
    padding: 0 20px;
}
.top .search input 
{
    border: 0;
    padding: 0;
    height: 36px;
    width: 82%;
    outline: none;
}
.top .search_button
{
    position: absolute;
    top: 2px;
    right: 2px;
    outline:none;
}
.top .search_button button 
{
    height: 32px;
    width: 110px;
    color: #dc143c;
    background-color: transparent;
    border: 0;
    border-radius: 100px;
    white-space: nowrap;
    overflow: hidden;
    -webkit-appearance: button;
    cursor: pointer;
    text-transform: none;
    font: inherit;
    margin: 0;
    -webkit-tap-highlight-color: transparent;
    outline: none;
    border-left: 1px solid #ddd;

}
.top .search__actions button .text, .top .search__actions button i 
{
    vertical-align: top;
    margin: 0 2px 0 1px;
}
.top .search_button button .text {
    font-weight: 700;
    text-transform: uppercase;
    display: inline-block;
}
.main_page_container
{
    width:650px;
    margin: 0 auto;
    display: block;
}
.all_in
{
    margin-top: 15px !important;
}
.category_filters
{
    width: 650px;
    text-align: center;
}
.category_filter_label
{
    margin-top: 10px;
    color: #666;
}

.category_filters ul li
{
    float: left;
    transition: all 0s;
    cursor: pointer;
}
.shadow
{
    -webkit-box-shadow: 0 8px 6px -6px black;
    -moz-box-shadow: 0 8px 6px -6px black;
    box-shadow: 0 8px 6px -6px black;
}
/*.select_cat select
{
    background-image:url(images/icons/down_arrow.png);
    background-repeat: no-repeat;
    background-position: 238px;
    background-size: 20px;
    width: 279px;
    padding: 4px 25px;
    /* margin-top: 0px; 
    border-radius: 30px;
    border: none;
    line-height: 2;
    outline: none;
    -webkit-appearance: none;
    /* box-shadow: inset 0 0 0px 0 rgba(0,0,0,0.6); 
    background-color: white;
    cursor:pointer;
}
.select_cat select:focus
{
    outline: none;
    border-radius: 4px;
    --webkit-appearance: none;
}*/
.ad_lists
{
    margin-top: 15px!important;
}
ul
{
    padding:0;
    margin:0;
}
li
{
    list-style: none;
}
.ad_lists .ad 
{
    position: relative;
    border-bottom: 1px solid #ededed;
    background-color: #fff;
    padding: 10px 10px 5px;
    box-shadow: 2px 2px 0 rgba(0,0,0,.05);
    overflow: hidden;
}
.ad_lists .ad a
{
    display:block;
    text-decoration: none;
    color: #007FBB;
    --webkit-tap-highlight-color: transparent;
    background-color: transparent;
}

.ad_lists img 
{
    width: 140px;
    height: 110px;
    display: inline-block;
    background-color: #000;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain
}
.ad_lists .ad_content 
{
    padding: 5px 0 0 15px;
    width: 380px;
    display: inline-block;
    vertical-align: top
}
.ad_lists .ad__content__headline 
{
    font-size: 1em;
    line-height: 1em;
    margin: 0 0 5px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    color: #333;
}

.ad_lists .ad__content__description 
{
    font-size: .9em;
    line-height: 1.5;
    margin: 0 0 5px;
    overflow: hidden;
    color: #333;
}
.ad_lists .ad__content__location 
{
    font-size: .9em;
}

.ad_lists .ad__price 
{
    width: 138px;
    text-align: center;
    position: absolute;
    bottom: 0;
    margin: auto;
    height: 20px;
    top: 0;
    right: 0;
    white-space: nowrap;
}
.sp_footer 
{
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    margin-top: 50px!important;
    background-color: #e0e0e0;
    padding: 15px 0 35px;
    box-shadow: 2px 2px 0 rgba(0,0,0,0.5);
}
.sp_footer .center
{
    width: 1211px;
    margin:0 auto;
}
.sp_footer .text_align
{
    vertical-align: top;
    width: 300px;
    line-height: 2;
    display: inline-block;
}
.sp_footer li
{
    display: list-item;
    padding: 0;
    margin: 0;
}
.sp_footer a
{
    color:#2b2b2b;
    font-size: 15px;
    font-weight:400;
    outline: none;
}
.title
{
    font-size: 16px;
    border: none;
    padding: 12px 0;
    margin: 0;
    color:#2b2b2b;
    text-transform: uppercase;
}
.social
{
    width: 215px;
    margin-left:7px;
}
.social_center
{
    width: 201px;
    margin: 0 auto;
}
.social_center i
{
    font-size: 28px;
    color: #a94040;
    margin-left: 5px;
}
.address
{
    margin-top: 15px!important;
    font-size: 16px;
    color: #2b2b2b;
}
.newsletter
{
    width: 100%;
}
.newsletter input 
{
    float: left;
    width: 131%;
    margin: 0;
    padding: 9px 10px;
    border: none;
    outline: none;
}
.newsletter button
{
    -webkit-appearance: button;
    -moz-appearance: button;
    border: none;
    font-size: 30px;
    padding: 8px 12px;
    background: transparent;
    color: #a94040;
    float: right;
    outline: none;
    cursor:pointer;
}

.icons
{
    position: absolute;
    font-size: 100px;
    width: 100%;
    text-align: center;
    top: -12px;
    left: 0;
    height: 100%;
    float: left;
    color: #eeeeee;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
    z-index: 1;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
/*nav ul li 
{
  display: inline-block;
}
nav ul li ul 
{
  visibility: hidden;
  position: absolute;
  top: 105%;
  left: 0;
}
nav ul li:hover ul 
{
  visibility: visible;
  transition-delay: 0s;
}
nav ul 
{
  list-style: none;
  padding: 0;
  margin: 0 auto;
  text-align: center;
}
nav li 
{
  width: 100px;
  background: #eee;
  margin: 2px;
  position: relative;
  padding: 10px;
}
nav a 
{
  display: block;
  color:black;
  text-decoration: none;
  
}
*/
.box-title
{
    text-align: center;
    position:relative;
    margin:5px 0 20px;
    z-index: 2;
    color: #a94040;
}
.floating-form {
    top:10px;
    z-index: 1000;
    max-width: 400px;
    padding: 30px 30px 10px 30px;
    font: 13px "Roboto", Helvetica, Arial, sans-serif;
    background: #ffffff;
    /*border: 2px solid #a94040;*/
    right: 0px;
    position: fixed;
/*    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -moz-box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -webkit-box-shadow:  -2px -0px 8px rgba(43, 33, 33, 0.06);*/
    }
.contact-opener {
    position: absolute;
    left: -71px;
    transform: rotate(-90deg);
    top: 100px;
    background-color: #ffffff;
    padding: 9px;
    color: #a94040;
    font-weight: bold;
    cursor: pointer;
    font-weight: 1000;
/*    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;*/
/*    box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -moz-box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -webkit-box-shadow:  -2px -0px 8px rgba(43, 33, 33, 0.06);*/

}
.floating-form-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 10px;
    font-size: 15px;
    padding-bottom: 3px;
    font-family: initial;
}
.floating-form label{
    display: block;
    margin: 0px 0px 15px 0px;
}
.floating-form label > span{
    width: 70px;
    font-weight: bold;
    float: left;
    padding-top: 8px;
    padding-right: 5px;
    font-family: inherit;
}
.floating-form span.required{
    color:red;
}
.floating-form .tel-number-field{
    width: 40px;
    text-align: center;
}
.floating-form  .long{
    width: 120px;
}
.floating-form input.input-field{
    width: 68%;
   
}

.floating-form input.input-field,
.floating-form .tel-number-field,
.floating-form .textarea-field,
 .floating-form .select-field{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out; 
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border: 1px solid #C2C2C2;
    box-shadow: 1px 1px 4px #EBEBEB;
    -moz-box-shadow: 1px 1px 4px #EBEBEB;
    -webkit-box-shadow: 1px 1px 4px #EBEBEB;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    padding: 7px;
    outline: none;
}
.floating-form .input-field:focus,
.floating-form .tel-number-field:focus,
.floating-form .textarea-field:focus,  
.floating-form .select-field:focus{
    border: 1px solid #0C0;
}
.floating-form .textarea-field{
    height:100px;
    width: 68%;
}
.floating-form input[type="button"], .contact-opener {
/*    -moz-box-shadow: inset 0px 1px 0px 0px #a94040;
    -webkit-box-shadow: inset 0px 1px 0px 0px #a94040;*/
    box-shadow: inset 0px 1px 0px 0px #ffffff;
    background-color: #ffffff;
    /*border: 1px solid #a94040;*/
    display: inline-block;
    cursor: pointer;
    color: #a94040;
    padding: 8px 18px;
    text-decoration: none;
    font: 15px Arial, Helvetica, sans-serif;
}

.floating-form input[type="submit"]
{
    box-shadow: inset 0px 1px 0px 0px #ffffff;
    background-color: #ffffff;
    border: 1px solid #a94040;
    display: inline-block;
    cursor: pointer;
    color: #a94040;
    padding: 8px 18px;
    text-decoration: none;
    font: 15px Arial, Helvetica, sans-serif;
}
.floating-form input[type="button"]:hover,
.floating-form input[type="submit"]:hover{
    background: linear-gradient(to bottom, #ffffff 5%, #ffffff 100%);
    background-color: #ffffff;
}
.floating-form .success{
    background: #D8FFC0;
    padding: 5px 10px 5px 10px;
    margin: 0px 0px 5px 0px;
    border: none;
    font-weight: bold;
    color: #2E6800;
    border-left: 3px solid #2E6800;
}
.floating-form .error {
    background: #FFE8E8;
    padding: 5px 10px 5px 10px;
    margin: 0px 0px 5px 0px;
    border: none;
    font-weight: bold;
    color: #FF0000;
    border-left: 3px solid #FF0000;
}
.img_dropdown 
{
    position: relative;
    display: inline-block;
}
.img_dropdown_content 
{
    display: none;
    /*top: 67px;*/
    position: absolute;
    background-color: #ffffff;
    min-width: 160px;
    border-radius: 5px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.img_dropdown:hover .img_dropdown_content 
{
    display: block;
}
.img_dropdown_content a
{
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    cursor:pointer;
}
.img_dropdown_content a:hover
{
    background-color: #eeeeee;
}
.desc 
{
    padding: 15px;
    text-align: center;
}
/*
.img_dropdown .img_dropdown_content:before {
    content: "";
    border-bottom: 6px solid #ffffff;
    border-right: 6px solid transparent;
    border-left: 6px solid transparent;
    position: absolute;
    top: -10px;
    right: 114px;
    z-index: 10;
}
.img_dropdown .img_dropdown_content:after {
    content: "";
    border-bottom: 8px solid #cccccc;
    border-right: 8px solid transparent;
    border-left: 8px solid transparent;
    position: absolute;
    top: -12px;
    right: 1112px;
    z-index: 9;
}*/
</style>
<script type="text/javascript">
$(document).ready(function(){ 

    var _scroll = true, _timer = false, _floatbox = $("#contact_form"), _floatbox_opener = $(".contact-opener") ;
    _floatbox.css("right", "-315px"); //initial contact form position
    
    //Contact form Opener button
    _floatbox_opener.click(function(){
        if (_floatbox.hasClass('visiable')){
            _floatbox.animate({"right":"-315px"}, {duration: 300}).removeClass('visiable');
        }else{
           _floatbox.animate({"right":"0px"},  {duration: 300}).addClass('visiable');
        }
    });
    
    //Effect on Scroll
    $(window).scroll(function(){
        if(_scroll){
            _floatbox.animate({"top": "30px"},{duration: 300});
            _scroll = false;
        }
        if(_timer !== false){ clearTimeout(_timer); }           
            _timer = setTimeout(function(){_scroll = true; 
            _floatbox.animate({"top": "5px"},{easing: "linear"}, {duration: 500});}, 400); 
    });
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });
    
});
</script>
</head>
<body>

<!-- contact form start -->
<div class="floating-form" id="contact_form">
<div class="contact-opener"><strong>FEEDBACK</strong></div>
    <div class="floating-form-heading">Please Contact Us</div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <label><span>Name <span class="required">*</span></span>
            <input type="text" name="name" id="name" required="true" class="input-field">
        </label>
        <label><span>Email <span class="required">*</span></span>
            <input type="email" name="email" required="true" class="input-field">
        </label>
            <label for="field5"><span>Message <span class="required">*</span></span>
            <textarea name="message" id="message" class="textarea-field" required="true"></textarea>
        </label>
        <label>
            <span>&nbsp;</span><input type="submit" id="submit_btn" value="Submit">
        </label>
    </div>
</div>
<!-- contact form end -->
<header class="header">
	<div class="page_container">
		<a href="/" class="header_logo">Sponser.Com</a>
        <?php 

            if($_SESSION['login_info']!=true)
            {

        ?>
		<ul class="header_nav">
			<li class="header_nav__item">
				<a class="header_nav__link" style="text-decoration: none" href="allinhome.php?page=login">
				<i class="fa fa-user"></i> LOGIN</a>
			</li>
			<li class="header_nav__item">
				<a class="header_nav__link" style="text-decoration: none" href="allinhome.php?page=signup">
					<i class="fa fa-key"></i> CREATE AN ACCOUNT
				</a>
			</li>
		</ul>
        <?php 
            }
            else
            {


        ?>
            <ul class="header_nav">
            <li class="header_nav__item">
                <a class="header_nav__link" style="text-decoration: none">
                    <?php print $fetch_user[0]; ?>
                </a>
            </li>
            <li class="header_nav__item">
                <div class="img_dropdown">

                    <img src="images/user/<?php print $email;?>.jpg" width="50" height="50" style="border-radius: 100%;vertical-align: middle;margin-top: 5px;margin-left: 10px;margin-right: 0;cursor: pointer;">
                    <div class="img_dropdown_content">
                        <a href="allinhome.php?page=profile">Profile</a>
                        <a href="allinhome.php?page=wallet">Add Balance</a>
                        <a href="#">Privacy</a>
                        <a href="#">Settings</a>
                        <a href="allinhome.php?page=login">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <?php
            }
         ?>

	</div>
</header><!-- /header -->
<div class="container">
<div class="navbar yamm" id="navbar">
        <div>
          
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="home.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Clothing</h5>
                                            <ul>
                                                <li><a href="category.html">T-shirts</a>
                                                </li>
                                                <li><a href="category.html">Shirts</a>
                                                </li>
                                                <li><a href="category.html">Pants</a>
                                                </li>
                                                <li><a href="category.html">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Shoes</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Accessories</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Featured</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                            </ul>
                                            <h5>Looks and trends</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Home & Living <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Bed Linen & Furnishing</h5>
                                            <ul>
                                                <li><a href="category.html">Bedsheets</a>
                                                </li>
                                                <li><a href="category.html">Bedding Sets</a>
                                                </li>
                                                <li><a href="category.html">Blankets Quits</a>
                                                </li>
                                                <li><a href="category.html">Pillow & Pillow Covers</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Bath</h5>
                                            <ul>
                                                <li><a href="category.html">Bath Towels</a>
                                                </li>
                                                <li><a href="category.html">Hand & Face Towels</a>
                                                </li>
                                                <li><a href="category.html">Beach Towels</a>
                                                </li>
                                                <li><a href="category.html">Towels Set</a>
                                                </li>
                                                <li><a href="category.html">Bath Rugs</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Home Decor</h5>
                                            <ul>
                                                <li><a href="category.html">Vases</a>
                                                </li>
                                                <li><a href="category.html">Showpieces</a>
                                                </li>
                                                <li><a href="category.html">Wall Decor</a>
                                                </li>
                                                <li><a href="category.html">Candels</a>
                                                </li>
                                                <li><a href="category.html">Candels Holders</a>
                                                </li>
                                                <li><a href="category.html">Wall Decals</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Kitchen & Table</h5>
                                            <ul>
                                                <li><a href="category.html">Table Covers</a>
                                                </li>
                                                <li><a href="category.html">Table Runners, Mats & Napkins</a>
                                                </li>
                                                <li><a href="category.html">Kitchen</a>
                                                </li>
                                            </ul>
                                            <h5>Lamps and Light Fixtures</h5>
                                            <ul>
                                                <li><a href="category.html">Ceiling Fans</a>
                                                </li>
                                                <li><a href="category.html">Outdoor Lighting</a>
                                                </li>
                                                <li><a href="category.html">Wall lights</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Kids <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Boys Clothing</h5>
                                            <ul>
                                                <li><a href="category.html">Jeans</a>
                                                </li>
                                                <li><a href="category.html">Shirts</a>
                                                </li>
                                                <li><a href="category.html">Clothing Sets</a>
                                                </li>
                                                <li><a href="category.html">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Boys Shoes</h5>
                                            <ul>
                                                <li><a href="category.html">Casual Shoes</a>
                                                </li>
                                                <li><a href="category.html">Sports Shoes</a>
                                                </li>
                                                <li><a href="category.html">Sandals & Flip Flops</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Girls Clothing</h5>
                                            <ul>
                                                <li><a href="category.html">Dresses</a>
                                                </li>
                                                <li><a href="category.html">Clothing Sets</a>
                                                </li>
                                                <li><a href="category.html">Indian Wear</a>
                                                </li>
                                                <li><a href="category.html">Track Pants</a>
                                                </li>
                                                <li><a href="category.html">Rompers & Sleepwear</a>
                                                </li>
                                                <li><a href="category.html">Jeans</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Girls Footwear</h5>
                                            <ul>
                                                <li><a href="category.html">Flats & Casual Shoes</a>
                                                </li>
                                                <li><a href="category.html">Heels</a>
                                                </li>
                                                <li><a href="category.html">Sports Shoes</a>
                                                </li>
                                            </ul>
                                            <h5>Looks and trends</h5>
                                            <ul>
                                                <li><a href="category.html">Bags & Backpacks</a>
                                                </li>
                                                <li><a href="category.html">Jewellery & Hair Accessories</a>
                                                </li>
                                                <li><a href="category.html">Watches</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Books & Audible <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Fiction & Literature</h5>
                                            <ul>
                                                <li><a href="category.html">Action & Adventure</a>
                                                </li>
                                                <li><a href="category.html">Drama</a>
                                                </li>
                                                <li><a href="category.html">Erotica</a>
                                                </li>
                                                <li><a href="category.html">Horror</a>
                                                </li>
                                                <li><a href="category.html">Historical Fiction</a>
                                                </li>
                                                <li><a href="category.html">Poetry</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Arts & Entertainment</h5>
                                            <ul>
                                                <li><a href="category.html">Architecture</a>
                                                </li>
                                                <li><a href="category.html">Art</a>
                                                </li>
                                                <li><a href="category.html">Games</a>
                                                </li>
                                                <li><a href="category.html">Design</a>
                                                </li>
                                                <li><a href="category.html">Photography</a>
                                                </li>
                                                <li><a href="category.html">Music</a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Computer & Technology</h5>
                                            <ul>
                                                <li><a href="category.html">Business Technology</a>
                                                </li>
                                                <li><a href="category.html">Computer Science</a>
                                                </li>
                                                <li><a href="category.html">Graphics & Design</a>
                                                </li>
                                                <li><a href="category.html">History & Culture</a>
                                                </li>
                                                <li><a href="category.html">Networking & Cloud Computing</a>
                                                </li>
                                                <li><a href="category.html">Operating Systems</a>
                                                </li>
                                                <li><a href="category.html">Programming</a>
                                                </li>
                                                <li><a href="category.html">Security & Encryption</a>
                                                </li>
                                            </ul>
                                            <h5>Science</h5>
                                            <ul>
                                                <li><a href="category.html">Astronomy</a>
                                                </li>
                                                <li><a href="category.html">Chemistry</a>
                                                </li>
                                                <li><a href="category.html">Technology & Engineering</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Mystery, Thriller & Suspense</h5>
                                            <ul>
                                                <li><a href="category.html">Mystery</a>
                                                </li>
                                                <li><a href="category.html">Thrillers & Suspense</a>
                                                </li>
                                                <li><a href="category.html">Writing</a>
                                                </li>
                                            </ul>
                                            <h5>Medical Books & Textbooks</h5>
                                            <ul>
                                                <li><a href="category.html">Administration & Medicine Economics</a>
                                                </li>
                                                <li><a href="category.html">Allied Health Professions</a>
                                                </li>
                                                <li><a href="category.html">Dentistry</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Movies & Games <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Genre</h5>
                                            <ul>
                                                <li><a href="category.html">Action & Adventure</a>
                                                </li>
                                                <li><a href="category.html">Comedy</a>
                                                </li>
                                                <li><a href="category.html">Drama</a>
                                                </li>
                                                <li><a href="category.html">Horror</a>
                                                </li>
                                                <li><a href="category.html">Foreign</a>
                                                </li>
                                                <li><a href="category.html">Kids & Family</a>
                                                </li>
                                                <li><a href="category.html">Romance</a>
                                                </li>
                                                <li><a href="category.html">Sports</a>
                                                </li>
                                                <li><a href="category.html">Special Interests</a>
                                                </li>
                                            </ul>
                                        </div>
                                         
                                        <div class="col-sm-3">
                                            <h5>Actor</h5>
                                            <ul>
                                                <li><a href="category.html">John Lithgow</a>
                                                </li>
                                                <li><a href="category.html">Ben Affleck</a>
                                                </li>
                                                <li><a href="category.html">Tom Cruise</a>
                                                </li>
                                                <li><a href="category.html">Jeffrey Tambor</a>
                                                </li>
                                                <li><a href="category.html">Anna Kendrick</a>
                                                </li>
                                                <li><a href="category.html">Cobie Smulders</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <h5>Director</h5>
                                            <ul>
                                                <li><a href="category.html">Gavin O'Connor</a>
                                                </li>
                                                <li><a href="category.html">Edward Zwick</a>
                                                </li>
                                                <li><a href="category.html">Sam Taylor-Johnson</a>
                                                </li>
                                                <li><a href="category.html">Denis Villeneuve</a>
                                                </li>
                                                <li><a href="category.html">Tate Taylor</a>
                                                </li>
                                                <li><a href="category.html">Mel Gibson</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/games.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/movies.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
               
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Electronics & Computers <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Camera, Photo & Video</h5>
                                            <ul>
                                                <li><a href="category.html">Accessories</a>
                                                </li>
                                                <li><a href="category.html">Lenses</a>
                                                </li>
                                                <li><a href="category.html">Video</a>
                                                </li>
                                                <li><a href="category.html">Underwater Photography</a>
                                                </li>
                                                <li><a href="category.html">Projectors</a>
                                                </li>
                                                <li><a href="category.html">Printers & Scanners</a>
                                                </li>
                                                <li><a href="category.html">Tripods & Monopods</a>
                                                </li>
                                                <li><a href="category.html">Video Surveillance</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Computers & Accessories</h5>
                                            <ul>
                                                <li><a href="category.html">Laptops</a>
                                                </li>
                                                <li><a href="category.html">Desktops</a>
                                                </li>
                                                <li><a href="category.html">Monitors</a>
                                                </li>
                                                <li><a href="category.html">Tablets</a>
                                                </li>
                                                <li><a href="category.html">Hard Drives & Storage</a>
                                                </li>
                                                <li><a href="category.html">Accessories</a>
                                                </li>
                                                <li><a href="category.html">Components</a>
                                                </li>
                                                <li><a href="category.html">Networking</a>
                                                </li>
                                                <li><a href="category.html">Gaming Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Software</h5>
                                            <ul>
                                                <li><a href="category.html">Antivirus & Security</a>
                                                </li>
                                                <li><a href="category.html">Design & Illustration</a>
                                                </li>
                                                <li><a href="category.html">Lifestyle & Hobbies</a>
                                                </li>
                                                <li><a href="category.html">Programming & Web Development</a>
                                                </li>
                                                <li><a href="category.html">Tax Preparation</a>
                                                </li>
                                                <li><a href="category.html">Utilities</a>
                                                </li>
                                                <li><a href="category.html">Photography</a>
                                                </li>
                                                <li><a href="category.html">Operating Systems</a>
                                                </li>
                                                <li><a href="category.html">Networking & Servers</a>
                                                </li>
                                                <li><a href="category.html">Games</a>
                                                </li>
                                                <li><a href="category.html">Accounting & Finance</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/nikon.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/mac.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    


                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Ladies <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Clothing</h5>
                                            <ul>
                                                <li><a href="category.html">T-shirts</a>
                                                </li>
                                                <li><a href="category.html">Shirts</a>
                                                </li>
                                                <li><a href="category.html">Pants</a>
                                                </li>
                                                <li><a href="category.html">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Shoes</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Accessories</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                            <h5>Looks and trends</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner1.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner2.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    <li>
                    <?php 
                        if($_SESSION['login_info']!=true)
                        {
                     ?>
                        <a href="allinhome.php?page=signup">Free AD</a>
                    <?php 
                        }
                        else
                        {
                    ?>
                        <a href="allinhome.php?page=free_ad">Free AD</a>
                    <?php 
                        }
                    ?>
                    </li>
            </div>
            <!--/.nav-collapse -->

            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

</div>

<section class="top">
	<div class="page_container">
		<div class="hero_unit">
			<h1 class="hero_unit__heading">Buying and Selling Made Simple</h1>
			<p class="hero_unit__subheading">This site is the fastest, easiest, most convenient way to buy & sell anything in like International Market</p>
		</div>
	</div>
	<div class="search">
		<form method="post">
        <?php 
if (isset($_POST['find'])) 
{
    $search=$_POST['search'];
    print "<script>location=('dup_search2.php?search=$search')</script>";
}
?>
			<input type="search" name="search" placeholder="What are you looking for?">
			<div class="search_button">
				<button type="submit" name="find">
					<i class="fa fa-search"></i>
					<span class="text">Search</span>
				</button>
			</div>
		</form>
	</div>
</section>
                      
<div id="all">

        <div id="content">


        <!-- ADVANTAGES -->
<div id="advantages">
<div class="container" style="width: 1350px">
    <div class="same-height-row">
        
    <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icons"><i class="fa fa-heart"></i>
                                </div>
                                <h3 class="box-title"><a href="#">WE<b>LOVE</b><br>OUR CUSTOMERS</a></h3>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icons"><i class="fa fa-tags"></i>
                                </div>

                                <h3 class="box-title"><a href="#"><b>BEST</b><br>PRICES</a></h3>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icons"><i class="fa fa-shopping-cart"></i>
                                </div>

                                <h3 class="box-title"><a href="#"><b>HOTTEST</b><br>BESTSELLERS </a></h3>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icons"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3 class="box-title"><a href="#"><b>100%</b><br>SATISFACTION</a></h3>
                            </div>
                        </div>
    </div>

</div>
    <!-- END CONTAINER -->
</div>
    <!-- END ADVANTAGES -->
<?php include("hotthisweek.php"); ?>
<?php include("trending_pdt.php"); ?>

</div>
    </div>
    <!-- /#all -->

<div class="sp_footer">
	<div class="center">
		<div class="text_align" style="width: 209px;">
		<div class="title">
			<strong>My Account</strong>
		</div>
			<ul>
				<li><a href="#">My Advertises</a></li>
				<li><a href="#">Account Settings</a></li>
				<li><a href="#">Compare Products List</a></li>
				<li><a href="#">Email Preferences</a></li>
			</ul>
		</div>

		<div class="text_align" style="width: 260px;">
		<div class="title">
			<strong>Make Money with Us</strong>
		</div>
			<ul>
				<li><a href="#">Sell on Sponser</a></li>
				<li><a href="#">Sell Your Services on Sponser</a></li>
				<li><a href="#">Sell on Sponser Business</a></li>
				<li><a href="#">Advertise Your Products</a></li>
				<li><a href="#">Sponser Payments</a></li>
				<li><a href="#">Affiliate Program</a></li>
				<li><a href="#">Sell Globally</a></li>
				<li><a href="#">Reach Business Customer</a></li>
			</ul>
		</div>

		<div class="text_align"  style="width: 228px;">
		<div class="title">
			<strong>Customer Service</strong>
		</div>
			<ul>
				<li><a href="#">Shipping Information</a></li>
				<li><a href="#">Returns</a></li>
				<li><a href="#">Security Policy</a></li>
				<li><a href="#">Terms of Use</a></li>
				<li><a href="#">Monthly Offers</a></li>
			</ul>
		</div>

		<div class="text_align" style="width: 180px;">
		<div class="title">
			<strong>Information</strong>
		</div>
			<ul>
				<li><a href="#">About Sponser</a></li>
				<li><a href="#">Careers</a></li>
				<li><a href="#">Company Info</a></li>
				<li><a href="#">Newsroom</a></li>
				<li><a href="#">Developers</a></li>
				<li><a href="#">Site Map</a></li>
			</ul>
		</div>
		<div class="text_align">
		<div class="title">
			<strong>Contact Us</strong>
		</div>
		<div class="shadow social">
			<div class="social_center">
				<a href="#"><i class="fa fa-facebook" style="margin-left: 0;"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-tumblr"></i></a>
				<a href="#"><i class="fa fa-rss"></i></a>
			</div>
		</div>
		<div class="address">
			<ul>
				<li><i class="fa fa-map-marker" style="color: #a94040;font-size: 22px;margin:0 20px 0 3px;"></i>Savar,Dhaka-1349</li>
				<li><i class="fa fa-envelope" style="color: #a94040;font-size: 18px;margin: 0 13px 0 0px;"></i> welcome@sponser.com</li>
				<li><i class="fa fa-mobile" style="color: #a94040;font-size: 30px;margin: 0 17px 0 3px;"></i> 01798665933</li>
			</ul>
		</div>
		<div class="newsletter">
			<div class="title">
				<strong>Newsletter</strong>
			</div>
			<form method="post" enctype="multipart/form-data">
				<div style="float: left;">
					<input type="email" name="email" placeholder="Enter your email">
				</div>
				<div class="shadow" style="float: right;">
					<button type="submit" class="fa fa-send-o"></button>
				</div>
			</form>
		</div>
		</div>
	</div>
</div>
     <script src="css/js/jquery-1.11.0.min.js"></script>
    <script src="css/js/jquery.cookie.js"></script>
    <script src="css/js/waypoints.min.js"></script>
     <script src="css/js/bootstrap-hover-dropdown.js"></script>
    <script src="css/js/owl.carousel.min.js"></script>
    <script src="css/js/front.js"></script>


</body>
</html>