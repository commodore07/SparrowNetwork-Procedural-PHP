<!DOCTYPE html>
<html lang="en">
	
<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>


<?php 
if (isset($_GET['u'])) {
	$username = $db->real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = $db->query("SELECT username FROM users WHERE username='$username'");
	if ($check->num_rows===1) {
	$get = $check->fetch_assoc();
	$username = $get['username'];
	}
	else
	{
            echo "<meta http-equiv=\"refresh\" content=\"0; url=home\">";
	exit();
	}
	}
$username = str_replace("'","&apos;", $username);        
}
?>
        
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sparrow network is a social financial network, where people empower people. Join us today!!!" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
                
<!-- Facebook Open Graph tags -->
    <meta property="og:image" content="http://sparrownetwork.net/images/favicon.png" />
    <meta property="og:site_name" content="Sparrow Network" />
    <meta property="og:type" content="image" />
    <meta property="og:url" content="www.sparrownetwork.net" />
    <meta property="og:title" content="Welcome to Sparrow Network" />
    <meta property="og:description" content="Sparrow network is a social financial network, where people empower people. Join us today!!!" />
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="">
    <meta name="twitter:url" content="www.sparrownetwork.net" />
    <meta name="twitter:title" content="Welcome to Sparrow Network" />
    <meta name="twitter:description" content="Sparrow network is a social financial network, where people empower people. Join us today!!!" />
    <meta name="twitter:image:src" content="http://sparrownetwork.net/images/favicon.png" />                
                
<?php 
$get_xoa = $db->query("SELECT * FROM users WHERE username='$user'");
$roloa = $get_xoa->fetch_assoc();
$fnoa = $roloa['fullname'];

if($user == ""){
    $titixiz = "Sparrow Network";
}
else {
    $titixiz = "$fnoa";
}
?>                
		<title><?php echo $titixiz; ?></title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link href="css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="css/popit.css" />
    <link href="css/chat.css" rel="stylesheet">
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <script src="js/jquery.js"></script>
</head>
	<body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->
    
<?php
$refrex = (!empty($_GET['ref']) ? $_GET['ref'] : null);
$refrex = $db->real_escape_string($refrex); 
$refrex = str_replace("'","&apos;", $refrex);

?>    
<?php include("login_script.php"); ?>     
    
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	<div class="col-sm-5">
            <div class="intro-texts">
                <img width="250" src="empowa.png" />
            	<h1 class="text-white">Get On Board !!!</h1>
            	<p>Sparrow Network is a community of people, who come together with the aim of helping one another financially, exchanging goods and services, as well as connecting with one another on a trade network. <br /> <br />Join our global community now. Get started...</p>
                <a href="about"><button class="btn btn-primary">Learn More</button></a>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                  <li><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane active" id="register">
                  <h3>Register Now !!!</h3>
                  <p class="text-muted">Be cool and join today. Meet millions</p>
                  
                  <!--Register Form-->
                  <form onsubmit="return false" method="post" name="registration_form" id='registration_form' class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Username</label>
                        <input id="un" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 95 || event.charCode >= 115" onkeyup="restrict('un')" class="form-control input-group-lg" type="text" maxlength="15" title="Enter username" placeholder="Username"/>
                      </div>
<script>
function restrict(elem){
	var tf = document.getElementById(elem);
	var rx = new RegExp;
	if(elem == "un"){
		rx = /[^a-z0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
</script>                          
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Full Name</label>
                        <input id="fn" class="form-control input-group-lg" type="text" maxlength="30" title="Enter full name" placeholder="Full name"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Email</label>
                        <input id="em" class="form-control input-group-lg" type="text" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Password 1</label>
                        <input id="pass1" class="form-control input-group-lg" type="password" title="Enter password" placeholder="Enter password"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Password 2</label>
                        <input id="pass2" class="form-control input-group-lg" type="password" title="Repeat Password" placeholder="Repeat Password"/>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Phone</label>
                        <input id="phinakee" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Enter phone number" placeholder="Your Phone Number"/>
                      </div>
                    </div>
                   
                    <div class="form-group gender">
                      <label class="radio-inline">
                          <input type="radio" name="gender" value="Male" checked>Male
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="gender" value="Female">Female
                      </label>
                    </div>
                      
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Country</label>
                        <select class="form-control" id="coun">
                          <option value="country" disabled selected>Country</option>
                          <?php include("country.php"); ?>
                        </select>
                      </div>
                        <span>
                          By clicking on the Register Now button, you automatically agree to subscribe to all the rules and ideology of the
                          Sparrow Network, which is subject to change.
                      </span>
                    </div>  
                      
                      <button id="signupbtn" onclick="signup()" class="btn btn-primary">Register Now</button>  
                  </form><!--Register Now Form Ends-->
                  <p><a href="#login" data-toggle="tab">Already have an account?</a></p>
                  
                  <center><div style="height: 14px;" id="signup_status"></div></center>
                  
                </div><!--Registration Form Contents Ends-->
                
<script>
function signup(){
        var hr = new XMLHttpRequest();
	var url = "./signrefrex.php?ref=<?php echo $refrex; ?>";
	var u = document.getElementById("un").value;
        var f = document.getElementById("fn").value;
	var e = document.getElementById("em").value;
	var p1 = document.getElementById("pass1").value;
	var p2 = document.getElementById("pass2").value;
	var c = document.getElementById("coun").value;
	var phin = document.getElementById("phinakee").value;
	var g = $("input[name='gender']:checked").val();
	var status = document.getElementById("signup_status");
	if(u == "" || e == "" || p1 == "" || p2 == "" || f == "" || phin == ""){
		status.innerHTML = "Fill out all of the form data";
                // jquery fade-out fade-in begins
                $("#signup_status").delay(3000).fadeOut("slow", function() {
                    status.innerHTML = "";	        
                });
                $("#signup_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
                // jquery fade-out fade-in begins
                $("#signup_status").delay(3000).fadeOut("slow", function() {
                    status.innerHTML = "";	        
                });
                $("#signup_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends
	}
        else {
            document.getElementById("signupbtn").style.display = "none";
		status.innerHTML = "<img src='loader2.gif'>";
    var vars = "uname="+u+"&fname="+f+"&email="+e+"&pass1="+p1+"&pass2="+p2+"&coun="+c+"&sex="+g+"&phon="+phin;
		hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
	                        if(return_data != "Success"){
					document.getElementById("signup_status").innerHTML = return_data;
					document.getElementById("signupbtn").style.display = "block";
                // jquery fade-out fade-in begins
                $("#signup_status").delay(3000).fadeOut("slow", function() {
                    status.innerHTML = "";	        
                });
                $("#signup_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends
				} else {
                                        
	                                $('#un').val('');
                                        $('#fn').val('');
                                        $('#em').val('');
                                        $('#pass1').val('');
                                        $('#pass2').val('');
                                        $('#phinakee').val('');
	                               
					document.getElementById("signupbtn").style.display = "block";
					document.getElementById("signup_status").innerHTML = "Welcome to Sparrow Network "+u+". <a style='color: #00BFFF;' href='#login' data-toggle='tab'>Click here to continue</a>";
				}
	                           
	    }
    }
    hr.send(vars); 
                
        }
}
</script>                  
                
                <!--Login-->
                <div class="tab-pane" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Log into your account</p>
                  
                  <!--Login Form-->
                  <form method="post">
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input class="form-control input-group-lg" type="text" name="uuu" title="Enter Username or Email" placeholder="Username or Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input class="form-control input-group-lg" type="password" name="access" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
                      <button class="btn btn-primary">Login Now</button>
                  </form><!--Login Form Ends--> 
                  <p><a href="recover_pass">Forgot Password?</a></p>
                  
                  <center><div style="font-size: 14px; color: #999;"><?php echo $ans; ?></div></center>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include("social_icons.php"); ?>
      </div>
    </div>

    <!--preloader-->
    <?php include("footer2.php"); ?>
    
	</body>

<!-- Mirrored from thunder-team.com/friend-finder/index-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:10:21 GMT -->
</html>
