<!DOCTYPE html>
<html lang="en">
	
<?php include("headervoid.php"); ?>
	<body>
<?php 
$code = (!empty($_GET['code']) ? $_GET['code'] : null);
?>  
    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->
    
<?php
$ans = "";
//Login Script
if (isset($_POST["uuu"]) && isset($_POST["access"])) {
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    $timm = time();
    $date_added = date("Y-m-d");
        
       $user_login = str_replace("'", "&apos;", $_POST["uuu"]);
       $password_login = str_replace("'", "&apos;", $_POST["access"]);
       $password_login_md5 = md5($password_login);
       
///////////////////////
//////////////// GET EMAIL TRANSFORM EMAIL
$get_mill = $db->query("SELECT * FROM users WHERE email = '$user_login' AND password = '$password_login_md5'");
$count_mill = $get_mill->num_rows;
while ($mill = $get_mill->fetch_assoc()) {
$effat = $mill['username'];  
}
/////////////// LOGIN STATEMENT
if ($count_mill > 0){
    $user_login = "$effat";
}
else {
    $user_login = "$user_login";
}
/////////////////////          
    $user_login = strtolower("$user_login");
    $sql = $db->query("SELECT id FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1"); // query the person
	//Check for their existance
	$userCount = $sql->num_rows; //Count the number of rows returned
	if ($userCount == 1) {
		while($row = $sql->fetch_array()){ 
             $id = $row["id"];
	}
		 $_SESSION["user_login"] = $user_login;
                     ///////////////// CHECK IF USER HAS BEEN BLOCKED BEGINS
                     
                     $sqlive = $db->query("SELECT emp2 FROM users WHERE username='$user_login' AND password='$password_login_md5'"); // query the person
	//Check for their existance
	$blockCount = $sqlive->num_rows; //Count the number of rows returned
        
        if ($blockCount == 1) {
		while($row = $sqlive->fetch_array()){ 
             $vac3 = $row["emp2"];
             
	}  
                     ///////////////// CHECK IF USER HAS BEEN BLOCKED ENDS
        if ($vac3 != "blocked") {        
		 // UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			 $db->query("UPDATE users SET ip='$ip', online='$date_added', log_time='$timm' WHERE username='$user_login'");
			$ans = "Welcome to Sparrow";
                    //////////////////////// ADMIN OR NOT
                    if($user_login != 'admin'){
                      echo "<meta http-equiv=\"refresh\" content=\"0; url=home\">";  
                    }
                    else {
                    ///////////////////////    
                       echo "<meta http-equiv=\"refresh\" content=\"0; url=admin\">";
                    }
                        
		    exit();
        }
 else {
     
     $ans = "Sorry $user_login you've been blocked by Sparrow";
 }
        } 
		 }
		 else {
                     $getposts = $db->query("SELECT * FROM users WHERE username='$user_login' OR email='$user_login' LIMIT 1") or die($db->error());
                     $countin = $getposts->num_rows; //Count the number of rows returned
                     while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$passq = $row['password'];
                     }
                     if ($countin == 0) {
		$ans = "$user_login is not registered on sparrow";
	}
        else {
            $ans = "your password is not correct";
        }          
	}
}
?>    
    
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	<div class="col-sm-5">
            <div class="intro-texts">
            	<h1 class="text-white">Get On Board !!!</h1>
            	<p>Sparrow Network is a community of people, who come together with the aim to exchange goods and services, as well as connect with one another in a trade network. <br /> <br />Join our global community now. Get started...</p>
                <a href="about"><button class="btn btn-primary">Learn More</button></a>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#register" data-toggle="tab">Password</a></li>
                  <li><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane active" id="register">
                  <h3>Recover Password</h3>
                  <p class="text-muted">Recover your password</p>
                  
                  <!--Register Form-->
                  <form method="post" name="registration_form" id='registration_form' class="form-inline">
                    
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Password</label>
                        <input name="recuse" class="form-control input-group-lg" type="password" title="Enter password" placeholder="Enter password"/>
                      </div>
                    </div>
                     
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Repeat password</label>
                        <input name="recmail" class="form-control input-group-lg" type="password" title="Repeat password" placeholder="Repeat password"/>
                      </div>
                    </div>
                   
                      
                      <button class="btn btn-primary">Change password</button>  
                  </form><!--Register Now Form Ends-->
                  
                  
                <span id="loadr"><img src="./loader2.gif"></span> 
                <span id="freshchirp"></span>
                
<script>
$('#loadr').hide();    
$(document).ready(function(){
   $('#registration_form').on('submit', function(e){
      e.preventDefault();
      $('#loadr').show();
      $.ajax({
         url: "produce_pass.php?code=<?php echo $code; ?>",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#freshchirp").html(data);
             // jquery fade-out fade-in begins
             var log_too = document.getElementById("freshchirp");
                $("#freshchirp").delay(3000).fadeOut("slow", function() {
                    log_too.innerHTML = "";	        
                });
                $("#freshchirp").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends    
             $('#loadr').hide();
             $("#registration_form :input").each( function() {
	   $(this).val('');
	});
         }
      });
   });
});
</script>                   
                  
                </div><!--Registration Form Contents Ends-->
                
              
                
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
