<!DOCTYPE html>
<html lang="en">
	
<?php include("headervoid.php"); ?>
	<body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->
    
<?php include("login_script.php"); ?> 
    
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
                        <label class="sr-only">Email</label>
                        <input name="recuse" class="form-control input-group-lg" type="text" title="Enter Username" placeholder="Your Username"/>
                      </div>
                    </div>
                     
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Phone</label>
                        <input name="recmail" class="form-control input-group-lg" type="text" title="Enter email" placeholder="Your Email"/>
                      </div>
                    </div>
                   
                      
                      <button id="signupbtn" onclick="signup()" class="btn btn-primary">Recover</button>  
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
         url: "rec_pass.php",
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
