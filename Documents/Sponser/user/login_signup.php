<?php 
session_start();
date_default_timezone_set('Asia/Dhaka');
include("../database/connection.php");
session_unset($_SESSION['login_info']);
?>
<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style type="text/css">
*, *:before, *:after {
  box-sizing: border-box;
}

.ls_a {
  text-decoration: none;
  color: #1ab188;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.ls_a:hover {
  color: #179b77;
}

.ls_form {
  background: #ffffff;
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #631C1C;
  color: #ffffff;
}
.tab-group .active a {
  background: #983A3A;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

.ls_h1 {
  text-align: center;
  color: #983A3A;
  font-weight: 300;
  margin: 0 0 40px;
}

.ls_label {
  position: absolute;
  -webkit-transform: translateY(10px);
          transform: translateY(10px);
  left: 13px;
  color: rgba(135, 68, 68, 0.5);
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
.ls_label .req {
  margin: 3px;
  color: #C26868;
}

.ls_label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 16px;
  color:#a94040;
}
.ls_label.active .req {
  opacity: 0;
}

.ls_label.highlight {
  color: rgba(135, 68, 68, 0.5);
}

.tab-content input,.tab-content textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #000000;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
}
.tab-content input:focus,.tab-content textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

.tab-content textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #ffffff;
  color: #a94040;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
  cursor: pointer;
}
.button:hover, .button:focus {
  background: #a94040;
  color:#ffffff;
  cursor:pointer;
}

.button-block {
  display: block;
  width: 70%;
  margin:0 auto;
  cursor:pointer;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}

</style>

</head>

<body>

<?php 

$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$conf_pass=$_POST['conf_pass'];
$date=date('d-m-Y');
$time=date('h:i:s A');

if(isset($_POST['signup']))
{
		/*$file = "images/user/default.jpg";
		$newfile = "images/user/$email.jpg";

		if (!copy($file, $newfile)) 
		{
    		echo "failed to copy";
		}*/
$name=$first." ".$last;
$slct_wallet=mysql_query("SELECT * FROM user_auto_wallet");
$fetch_wallet=mysql_fetch_array($slct_wallet);

	if($pass == $conf_pass)
	{
		
		mysql_query("INSERT INTO user_signup(`name`,`email`,`pass`,`date`,`time`)VALUE('$name','$email','$conf_pass','$date','$time')");
		
		$_SESSION['login_info']=true;
		$_SESSION['lg_email']=$email;
		print "<script>location='home.php'</script>";

		if($email != $fetch_wallet[0])
		{
			mysql_query("INSERT INTO user_auto_wallet(`email`,`name`,`amount`,`date`,`time`)VALUE('$email','$name','0','$date','$time') ");
		}
		else
		{
			print "This email is already in our Database";
		}

	}
	else
		print "Password not matched";
}

$lg_email=$_POST['lg_email'];
$lg_pass=$_POST['lg_pass'];
if(isset($_POST['login']))
{
	$slct_user=mysql_query("SELECT * FROM user_signup");
	while($fetch_user=mysql_fetch_array($slct_user))
	{
	if(($lg_email == $fetch_user[1]) && ($lg_pass == $fetch_user[2]))
	{
		$_SESSION['login_info']=true;
		$_SESSION['lg_email']=$email;
		print "<script>location='home.php'</script>";
	}
	else
	{
		print "Please input correct email and password.";
	}
	}
}


?>
  <div class="ls_form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1 class="ls_h1">Sign Up for Free</h1>
          
          <form method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label class="ls_label">
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="first" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label  class="ls_label">
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="last" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label class="ls_label">
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label class="ls_label">
              Set Password<span class="req">*</span>
            </label>
            <input type="password" name="pass" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label class="ls_label">
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" name="conf_pass" required autocomplete="off"/>
          </div>
          
          <button type="submit" name="signup" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1 class="ls_h1">Welcome Back!</h1>
          
          <form method="post">
          
            <div class="field-wrap">
            <label class="ls_label">
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="lg_email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label class="ls_label">
              Password<span class="req">*</span>
            </label>
            <input type="password" name="lg_pass" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" name="login" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

<script type="text/javascript">
	$('.ls_form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('.ls_label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
</script>

</body>
</html>
