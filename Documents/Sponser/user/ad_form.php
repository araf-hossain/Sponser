<?php 
session_start();
date_default_timezone_set('Asia/Dhaka');
include("../database/connection.php");

$email=$_SESSION['lg_email'];

$slct_user=mysql_query("SELECT * FROM user_signup WHERE email='$email'");
$fetch_user=mysql_fetch_array($slct_user);

// making Product ID below

function make_id($table,$column,$prefix,$length)
{
  $query=mysql_query("SELECT MAX($column) FROM $table");
  $fetch_query=mysql_fetch_array($query);
  
  $full_id=$fetch_query[0];
  $pref_length=strlen($prefix);
  $only_id=substr($full_id,$pref_length);
  
  $id=(int)($only_id);
  $id++;
  
  $dust_num=($length-$pref_length-strlen($id));
  $zero=str_repeat("0",$dust_num);

  $made_id=$prefix.$zero.$id;
  return $made_id;
}

$pdt_id=make_id('ad_form','pdt_id','AD--','10');

$name=$_POST['name'];
$email=$_POST['email'];
$itm_name=$_POST['itm_name'];
$cate_name=$_POST['cate_name'];
$sub_cate=$_POST['sub_cate'];
$pdt_name=$_POST['pdt_name'];
$pdt_price=$_POST['pdt_price'];
$pdt_size=$_POST['pdt_size'];
$pdt_stock=$_POST['pdt_stock'];
$pdt_details=$_POST['pdt_details'];
$phn_num=$_POST['phn_num'];
$dist=$_POST['dist'];
$date=date('d-m-Y');
$time=date('h:m:s A');

if (isset($_POST['submit_ad'])) 
{

  if($_SESSION['login_info']==true)
  {
    if(!empty($name) && !empty($email) && !empty($itm_name) && !empty($cate_name) && !empty($sub_cate) && !empty($pdt_name) && !empty($pdt_price) && !empty($pdt_size) && !empty($pdt_details) && !empty($pdt_stock) && !empty($phn_num) && !empty($dist))
    {
      $tmp_name=$_FILES['images']['tmp_name'];
      for($i=0;$i<count($tmp_name);$i++)
      {
        $img_name=$pdt_id."($i)";
        $path="../images/products/$img_name.jpg";
        move_uploaded_file($tmp_name[$i],$path);
      }

      mysql_query("INSERT INTO ad_form(`name`,`email`,`itm_name`,`cate_name`,`sub_cate`,`pdt_id`,`pdt_name`,`pdt_price`,`pdt_size`,`pdt_stock`,`pdt_details`,`phn_num`,`dist`,`date`,`time`)VALUE('$name','$email','$itm_name','$cate_name','$sub_cate','$pdt_id','$pdt_name','$pdt_price','$pdt_size','$pdt_stock','$pdt_details','$phn_num','$dist','$date','$time')");
      if(mysql_affected_rows()>0)
      {
        print "<script>alert('Successful $pdt_id')</script>";
      }
    }
    else
    {
      print "<script>alert('Please Input Correctly')</script>";
    }
  }
  else
  {
    print"<script>alert('Please Login First')</script>";
  }
}
 ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sponser AD Form</title>
  
<style>

@media(min-width: 800px)
{
  .form
  {
    width: 70%;
    margin:0 auto;
  }
}

.form h1
{
  text-align: center;
  text-transform: uppercase;
  font-size: 2.8rem;
  margin: 10px 0 -1px;
  color: #983A3A;
  padding-bottom: 18px;
  border-bottom: 1px solid #E4E4E4;
}
.ad_form
{
  display: block;
  margin: 30px 30px 2px;
  overflow: hidden;
  background: #FFF;
  border: 1px solid #E4E4E4;
  border-radius: 5px;
  font-size: 0;
  box-shadow:0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

@media(min-width:800px){
  .ad_form > div {
    display: inline-block;
  }
  .ad_form > div.col-submit {
    display: block;
  }
}

.ad_form > div > label
{
  display: block;
  padding: 20px 20px 10px;
  vertical-align: top;
  font-family: Source Sans Pro, Arial, sans-serif;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
  color: #464646;
  cursor: pointer;
}

.ad_form > div.col-2, .ad_form > div.col-3, .ad_form > div.col-4, .ad_form > div.col-5 { 
  border-bottom: 1px solid #E4E4E4;
}

@media(min-width: 800px)
{
  .ad_form > div.col-2, .ad_form > div.col-3, .ad_form > div.col-4, .ad_form > div.col-5
  { 
    box-shadow: 1px 1px #E4E4E4; border: none; 
  }  
}

@media(min-width:800px){
  .ad_form > div.col-2 { width: 33.3333333333%}
  .ad_form > div.col-3 { width: 33.3333333333% }
  .ad_form > div.col-4 { width: 25% }
  .ad_form > div.col-5 { width: 100% }
}

.ad_form > div > label > input
{
  display: inline-block;
  position: relative;
  width: 100%;
  height: 38px;
  line-height: 27px;
  margin: 5px -5px 0;
  padding: 7px 5px 3px;
  border: none;
  outline: none;
  border-radius: 3px;
  background: transparent;
  font-size: 14px;
  font-weight: 600;
  transition: opacity .3s, box-shadow .3s;
}
.ad_form > div > label > textarea
{
  display: inline-block;
  position: relative;
  width: 100%;
  height:130px;
  line-height: 27px;
  margin: 5px -5px 0;
  padding: 10px 8px 6px;
  border: 1px solid #ddd;
  outline: none;
  border-radius: 3px;
  background: transparent;
  font-size: 14px;
  font-weight: 500;
  transition: opacity .3s, box-shadow .3s;
}
.ad_form > div.col-submit {
  text-align: center;
  padding: 20px;
}

.ad_form > div.col-submit button {
  border: 0;
  outline: none;
  background: #ffffff ;
  font-size: 2rem;
  color: #717171;
  padding: .6em;
  display: block;
  width: 100%;
  cursor: pointer;
  text-transform: uppercase;
  letter-spacing: .1em;
  font-weight: 600;
}
.ad_form > div.col-submit button:hover, .ad_form > div.col-submit button:focus {
  background: #a94040;
  color:#ffffff;
  cursor:pointer;
}
@media(min-width: 500px){
  .ad_form > div.col-submit button {
    width: 30%;
    font-size: 20px;
    margin: 0 auto;
  }
}

.ad_form > div > label > select
{
  display: block;
  width: 100%;
  margin: 10px 0 1px;
  padding: 7px;
  background: transparent;
  border: none;
  outline: none;
  font-size: 16px;
  font-weight: 600;
  opacity: .80;
}

.ad_form > div > label > input:focus, .ad_form > div > label > select:focus,.ad_form > div > label > textarea:focus
{
  opacity: 1;
  box-shadow: 0 3px 4px rgba(0, 0, 0, .15);
}
    </style>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script> -->

</head>

<body>


<form class="form" method="post">
<div class="ad_form">  
<h1>Describe What You Want to Sell</h1>
  <div class="col-2">
    <label>
      Name
      <input type="text" name="name" placeholder="<?php print $fetch_user[0];?>" value="<?php print $fetch_user[0];?>" tabindex="1" />
    </label>
  </div>
  <div class="col-2">
    <label>
      Email
      <input type="email" name="email" placeholder="<?php print $fetch_user[1];?>" value="<?php print $fetch_user[1];?>" tabindex="2" />
    </label>
  </div>
  <div class="col-2" >
    <label>
      Item Name
      <?php 
        $slct_itm=mysql_query("SELECT * FROM item_info");
       ?>
      <select name="itm_name" tabindex="3">
        <option value="">Select Item</option>
        <?php 
        while ($fetch_itm=mysql_fetch_array($slct_itm)) 
        {
          ?>
        <option><?php print $fetch_itm[1]; ?></option>
          <?php
         } ?>
      </select>
    </label>
  </div>
  <div class="col-3">
    <label>
      Category Name
      <?php 
        $slct_cate=mysql_query("SELECT * FROM cate_info");
       ?>
      <select name="cate_name" tabindex="3">
        <option value="">Select Category</option>
        <?php 
        while ($fetch_cate=mysql_fetch_array($slct_cate)) 
        {
          ?>
        <option><?php print $fetch_cate[2]; ?></option>
          <?php
         } ?>
      </select>
    </label>
  </div>
  <div class="col-2">
    <label>
      Sub Category Name
      <?php 
        $slct_sub_cate=mysql_query("SELECT * FROM sub_cate");
       ?>
      <select name="sub_cate" tabindex="3">
        <option value="">Select Sub Category</option>
        <?php 
        while ($fetch_sub_cate=mysql_fetch_array($slct_sub_cate)) 
        {
          ?>
        <option><?php print $fetch_sub_cate[3]; ?></option>
          <?php
         } ?>
      </select>
    </label>
  </div>
  <div class="col-3">
    <label>
      Product Title
      <input type="text" name="pdt_name" placeholder="Enter Product Title" tabindex="6" />
    </label>
  </div>

  <div class="col-3" >
    <label>
      Upload Product Photo
      <input type="file" name="images[]" tabindex="7">
      <input type="file" name="images[]" tabindex="8">
      <input type="file" name="images[]" tabindex="9">
    </label>
  </div>
  <div class="col-3">
    <label>
      Product Price
      <input type="text" name="pdt_price" placeholder="What is the provider's phone number?" tabindex="10" />
    </label>
  </div>
  <div class="col-3">
    <label>
      Product Size's
      <input type="text" name="pdt_size" placeholder="Enter Product Size using comma" tabindex="11" />
    </label>
  </div>
  <div class="col-5">
    <label>
      Product Summary
      <textarea type="text" name="pdt_details" tabindex="12"></textarea>
    </label>
  </div>
  <div class="col-2">
    <label>
      Product Stock
      <input type="text" name="pdt_stock" placeholder="Enter Product Size using comma" tabindex="13" />
    </label>
  </div>
  <div class="col-2">
    <label>
      Phone Number
      <input type="text" name="phn_num" placeholder="Enter Product Size using comma" tabindex="14" />
    </label>
  </div>
  <div class="col-2">
    <label>
      Select District
      <?php 
        $slct_dist=mysql_query("SELECT * FROM dist_name");
       ?>
      <select name="dist" tabindex="15">
        <option>Select District</option>
      <?php 
        while ($fetch_dist=mysql_fetch_array($slct_dist)) 
        {
      ?>
        <option><?php print $fetch_dist[0]; ?></option>
      <?php 
        }
      ?>
      </select>
    </label>
  </div>
  <div class="col-submit">
    <button name="submit_ad" type="submit" tabindex="16">Submit</button>
  </div>
</div>

</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>
