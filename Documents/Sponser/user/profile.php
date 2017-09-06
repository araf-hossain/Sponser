<?php
date_default_timezone_set('Asia/Dhaka');
session_start();
include("../database/connection.php");

$email=$_SESSION['lg_email'];

$old=$_POST['old'];
$new=$_POST['new'];
$conf=$_POST['conf'];

$first=$_POST['first'];
$last=$_POST['last'];
$name=$_POST['first']." ".$_POST['last'];

$company=$_POST['company'];
$street=$_POST['street'];
$state=$_POST['state'];
$country=$_POST['country'];
$phn_num=$_POST['phn_num'];
$chng_email=$_POST['email'];
$updated=date('d-m-Y');

$slct_user=mysql_query("SELECT * FROM user_signup WHERE email='$email' ");
$fetch_user=mysql_fetch_array($slct_user);

if(isset($_POST['p_change']))
{
    if ($old==$fetch_user[2])
    {
        if ($new==$conf) 
        {
            mysql_query("UPDATE user_signup SET pass='$conf' WHERE email='$email'");

            if(mysql_affected_rows()>0)
            {
                print "<script>alert('Success')</script>";
            }
        }
        else
        {
            print "<script>alert('Please retry new password.')</script>";
        }
    }
    else
    {
        print "<script>alert('Old Password is Incorrect')</script>";

    }
}

if(isset($_POST['p_detail']))
{
    mysql_query("UPDATE user_signup SET name='$name',email='$chng_email',phn_number='$phn_num',company='$company',state='$state',country='$country',street='$street',updated='$updated' WHERE email='$email' ");
    if (mysql_affected_rows()>0) 
    {
        print "<script>alert('Success')</script>";
    }
}

if (isset($_POST['upld'])) 
{   

/*$filename = '/path/to/foo.txt';

if (file_exists($filename)) {
    echo "The file $filename exists";
} else {
    echo "The file $filename does not exist";
}*/
    move_uploaded_file($_FILES['fileInput']['tmp_name'],"images/user/$email.jpg");
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
        Design of Profile Picture
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

.col-md-6 table
{
    width: 100%;
    font-size: 25px;
}
.col-md-6 table th
{
    font-size: 18px;
    padding: 16px 0 10px;
    text-align: center;
}
.col-md-5 table tr
{
    width: 100%;
}
.col-md-5 table tr td , .col-md-4 table tr td
{
    width: 50%;
}
.col-md-4 table tr td
{
    text-align: center;
}
.col-md-4 .col-md-6:hover
{
    border-radius:4px;
    transition: .5s;
    box-shadow: 0 2px 6px 2px rgba(19, 35, 47, 0.3);
    cursor: pointer;
}
</style>

</head>

<body>

    <div id="all">
        <div id="content">
                <div class="box">
                    <div class="container" >
                        <div class="col-md-3">
                        <form method="post" enctype="multipart/form-data">
                            
                            <img src="images/user/<?php print $email; ?>.jpg" style="width: 220px;height: 220px;border:1px solid #a94040;border-radius: 100%;">
                            <div style="height:20px;margin: 10px 21px 0;">
                                <input type="file" id="fileInput" name="fileInput" />
                            </div>
                            <button type="submit" style="width:60%;margin: 10px 30px 0;padding: 5px;outline: none;" name="upld">Upload Profile Picture</button>

                            <script>
                                function chooseFile() {
                                $("#fileInput").click();
                                }
                                $("input[name='file_1']").change(function() { this.form.submit(); });
                            </script>
                        </form>
                        </div>
                        <div class="col-md-8">
                            <h2><?php print $fetch_user[0]; ?></h2>
                        </div>
                        <div class="same-height-row">
                            <div class="col-md-5">
                                <table>
                                    <tbody class="lead">
                                    <?php 
                                    if($fetch_user[1]!=NULL) 
                                    {
                                     ?>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php print $fetch_user[1]; ?> </td>
                                        </tr>
                                    <?php 
                                    }
                                    if($fetch_user[3]!=NULL)
                                    {
                                    ?>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php print $fetch_user[3]; ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    if($fetch_user[4]!=NULL) 
                                    {
                                    ?>
                                        <tr>
                                            <td>Company Name</td>
                                            <td><?php print $fetch_user[4]; ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    if($fetch_user[7]!=NULL) 
                                    {
                                    ?>
                                        <tr>
                                            <td>Street Address</td>
                                            <td><?php print $fetch_user[7]; ?></td>
                                        </tr>
                                    <?php 
                                    } 
                                    if(NULL!=$fetch_user[5]) 
                                    {
                                    ?>
                                        <tr>
                                            <td>Country</td>
                                            <td><?php print $fetch_user[5]." ".$fetch_user[6] ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    ?>
                                        <tr><h6>Last Updated <?php print $fetch_user[8]; ?></h6></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <div class="box" style="padding: 10px;">
                                    <div class="col-md-6" style="padding: 0;height: 100px;">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>WALLET BALANCE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php 
                $slct_wallet=mysql_query("SELECT * FROM user_auto_wallet WHERE email='$email'");
                                                $fetch_wallet=mysql_fetch_array($slct_wallet);
                                                 ?>
                                                    <td><?php print $fetch_wallet[2]; ?> TK</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6" style="padding: 0;height: 100px">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>PRODUCT AD</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                            <?php 
                    $slct_adform=mysql_query("SELECT email FROM ad_form WHERE email='$email'");
                                                 ?>
                                                    <td><?php print mysql_num_rows($slct_adform); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container" >
                <div class="col-md-12" >
                    <div class="box" style="box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3)">
                        <h1>My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>
                        

                        <h3>Change password</h3>

                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input type="password" name="old" class="form-control" id="password_old">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" name="new" class="form-control" id="password_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" name="conf" class="form-control" id="password_2">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" name="p_change" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Personal details</h3>
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" name="first" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" name="last" class="form-control" id="lastname">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" name="company" class="form-control" id="company">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" name="state" id="state">
                                            <option value="">Select State</option>
                                    <?php 
                                    $slct_dist=mysql_query("SELECT * FROM dist_name"); 
                                        while($fetch_dist=mysql_fetch_array($slct_dist))
                                        {
                                    ?>
                                            <option><?php print $fetch_dist[0]; ?></option>
                                    <?php 
                                    }
                                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control" name="country" id="country">
                                            <option>Bangladesh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Street</label>
                                        <input type="text" name="street" class="form-control" id="street">
                                    </div>
                                </div>
                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phn_num" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="p_detail" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
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
