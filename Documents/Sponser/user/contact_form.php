<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Floating Ajax Contact Form</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

/* floating box style */
.floating-form {
    max-width: 300px;
    padding: 30px 30px 10px 30px;
    font: 13px Arial, Helvetica, sans-serif;
    background: #F9F9F9;
    border: 1px solid #ddd;
    right: 10px;
    position: fixed;
    box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -moz-box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -webkit-box-shadow:  -2px -0px 8px rgba(43, 33, 33, 0.06);
	}
.contact-opener {
    position: absolute;
    left: -88px;
    transform: rotate(-90deg);
    top: 100px;
    background-color: #216288;
    padding: 9px;
    color: #fff;
	text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.43);
    cursor: pointer;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -moz-box-shadow: -2px -0px 8px rgba(43, 33, 33, 0.06);
    -webkit-box-shadow:  -2px -0px 8px rgba(43, 33, 33, 0.06);

}
.floating-form-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 10px;
    font-size: 15px;
    padding-bottom: 3px;
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
.floating-form input[type="button"],
.floating-form input[type="submit"], .contact-opener {
    -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
    -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
    box-shadow: inset 0px 1px 0px 0px #3985B1;
    background-color: #216288;
    border: 1px solid #17445E;
    display: inline-block;
    cursor: pointer;
    color: #FFFFFF;
    padding: 8px 18px;
    text-decoration: none;
    font: 12px Arial, Helvetica, sans-serif;
}
.floating-form input[type="button"]:hover,
.floating-form input[type="submit"]:hover, .contact-opener {
    background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
    background-color: #28739E;
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
	
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 

	var _scroll = true, _timer = false, _floatbox = $("#contact_form"), _floatbox_opener = $(".contact-opener") ;
	_floatbox.css("right", "-322px"); //initial contact form position
	
	//Contact form Opener button
	_floatbox_opener.click(function(){
		if (_floatbox.hasClass('visiable')){
            _floatbox.animate({"right":"-322px"}, {duration: 300}).removeClass('visiable');
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
			_floatbox.animate({"top": "10px"},{easing: "linear"}, {duration: 500});}, 400); 
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
<div class="contact-opener">Open Contact Form</div>
    <div class="floating-form-heading">Please Contact Us</div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <label><span>Name <span class="required">*</span></span>
        	<input type="text" name="name" id="name" required="true" class="input-field">
        </label>
        <label><span>Email <span class="required">*</span></span>
        	<input type="email" name="email" required="true" class="input-field">
        </label>
        <label><span>Phone <span class="required">*</span></span>
        	<input type="text" name="phone1" maxlength="4" placeholder="+91" required="true" class="tel-number-field">
        	—<input type="text" name="phone2" maxlength="15" required="true" class="tel-number-field long">
        </label>
        <label for="subject"><span>Regarding</span>
            <select name="subject" class="select-field">
            <option value="General Question">General Question</option>
            <option value="Advertise">Advertisement</option>
            <option value="Partnership">Partnership Oppertunity</option>
            </select>
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


</body>
</html>
