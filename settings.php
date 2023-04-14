<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
<link href="css/custom.css" rel="stylesheet">    
<?php include("ago.php"); ?>     
  <body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
       <?php include("cover.php"); ?> 
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">
<?php 
// Check if cashier has reached the limit
   $lim_check = $db->query("SELECT me_cashier FROM users WHERE me_cashier='$user'");
   // Count the amount of rows where username = $un
   $checklim = $lim_check->num_rows;
   
//// Check if a cashier
   $lim_xeea = $db->query("SELECT * FROM users WHERE username='$user'");
   $rollin = $lim_xeea->fetch_assoc();
   $fexeea = $rollin['me_cashier']; 
?>              
              <!--Edit Profile Menu-->
              <ul class="edit-menu">
                  <li class="active"><i class="icon ion-ios-information-outline"></i><a href="settings">Basic Information</a></li>
                <li><i class="icon ion-ios-briefcase-outline"></i><a href="work_edu">Education and Work</a></li>
              	
                <li><i class="icon ion-ios-settings"></i><a href="account">Account Settings</a></li>
              	<li><i class="icon ion-ios-locked-outline"></i><a href="edit_pass">Change Password</a></li>
<?php 
if($fexeea == ""){
if($checklim < 6){
?>                
                <li><i class="fa fa-money text-green"></i><a class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".addcashie">Add cashiers</a></li>
<?php 
}
}
?>   
                <li><i class="fa fa-qrcode text-green"></i><a class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".addcashiekkk">Zenith scan to pay</a></li>
              </ul>
<?php 
   if($checklim > 0){
///////   
?>              
              <div class="visible-lg" style="margin-top: 10px;" id="chat-block">
              <div class="title">Cashiers</div>
              <ul class="online-users list-inline">
                  
<?php 
$getinftie = $db->query("SELECT * FROM users WHERE me_cashier='$user' ORDER BY RAND() LIMIT 6" ) or die($db->error());
while ($roz = $getinftie->fetch_assoc()) {
                                                $unkie = $roz['username'];
                                                $fnkie = $roz['fullname'];
                                                $pcropkie = $roz['profilecrop_pic'];
                                                if($pcropkie == ""){
                                                    $cropic = "img/default_pic";
                                                }
                                                else {
                                                    $cropic = "$pcropkie";
                                                }
                                                    
?>              
              <li><a href="./<?php echo $unkie; ?>" title="<?php echo $fnkie; ?>"><img src="<?php echo $cropic; ?>" alt="<?php echo $unkie; ?>" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
         
<?php 
}
?>                
                
              </ul>
              <hr>
              <div><p style="color: #999;">Sparrow Network © 2018</p> <a style="color: #999;" href="./about">About</a> &nbsp;<a style="color: #999;" href="terms">Terms</a></div>
              
            </div><!--chat block ends-->
<?php 
   }
?>              
            </div>
            <div class="col-md-7">

              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit basic information</h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                    
<?php 
$get_user_info = $db->query("SELECT * FROM users WHERE username='$user'");
$get_info = $get_user_info->fetch_assoc();
$fullname = $get_info['fullname'];
$mail = $get_info['email'];
$about_me = $get_info['about_me'];
$relli = $get_info['religion'];
$occu = $get_info['occupation'];
$country = $get_info['country'];
$phonae = $get_info['phone'];
                                                
?>                    
                    
                    <form onsubmit="return false" name="basic-info" id="basic-info" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>Full name</label>
                        <input id="fname" class="form-control input-group-lg" maxlength="30" type="text" title="Enter fullname" placeholder="Full name" value="<?php echo $fullname; ?>" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Phone number</label>
                        <input id="phonee" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Enter phone number" placeholder="Phone number" value="<?php echo $phonae; ?>" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label>My email</label>
                        <input id="mailee" class="form-control input-group-lg" type="text" title="Enter Email" placeholder="My Email" value="<?php echo $mail; ?>" />
                      </div>
                    </div>
                      
                   <div class="row">
                      <div class="form-group col-xs-12">
                        <label>My country</label>
                        <select id="contee" class="form-control">
                          <option><?php echo $country; ?></option>
                          <?php include("country.php"); ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label> Religion</label>
                        <select id="rel" class="form-control">
                          <option><?php echo $relli; ?></option>  
                          <option>Christianity</option>
			  <option>Islam</option>
			  <option>Judaism</option>
			  <option>Budaism</option>
			  <option>Hinduism</option>
                        </select>
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Occupation</label>
                        <select id="occ" class="form-control">
                          <option><?php echo $occu; ?></option>    
                          <option>Student</option>
			  <option>Worker</option>
			  <option>Entrepreneur</option>
			  <option>Teacher</option>
			  
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label>About me</label>
                        <textarea id="abt_me" class="form-control" placeholder="Some texts about me" rows="4" cols="400"><?php echo $about_me; ?></textarea>
                      </div>
                    </div>
                      <button onclick="ajazz_post()" class="btn btn-primary">Save Changes</button>
                      <center><div style="height: 14px;" id="statoo"></div></center>
                  </form>
                    
<script>
function ajazz_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "change_update.php";
    var fn = document.getElementById("fname").value;
	var bn = document.getElementById("rel").value;
	var dn = document.getElementById("occ").value;
        var phon = document.getElementById("phonee").value;
        var mailee = document.getElementById("mailee").value;
        var abt_me = document.getElementById("abt_me").value;
	var en = document.getElementById("contee").value;
        var log_too = document.getElementById("statoo");
    var vars = "firstname="+fn+"&occ="+bn+"&dat="+dn+"&mmn="+en+"&phon="+phon+"&mailee="+mailee+"&abt_me="+abt_me;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("statoo").innerHTML = return_data;
                 // jquery fade-out fade-in begins
                $("#statoo").delay(3000).fadeOut("slow", function() {
                    log_too.innerHTML = "";	        
                });
                $("#statoo").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends       
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("statoo").innerHTML = "<img src='./lodaa.gif'>";	
}
</script>                       
                    
                </div>
              </div>
            </div>
           <?php include("tradelist.php"); ?>
          </div>
        </div>
      </div>
    </div>

    <!--Popup-->
                    <div class="modal fade addcashie" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Add cashier</div>
                            </div>
                            <div class="post-container">
                                
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
                        <input id="em" class="form-control input-group-lg" type="text" title="Enter Email" placeholder="Cashier's Email"/>
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
                        <input id="phinakee" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Cashier's phone number" placeholder="Cashier's Phone Number"/>
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
                    </div>  
                      
                      <button id="signupbtn" onclick="signup()" class="btn btn-primary">Register Now</button>  
                  </form><!--Register Now Form Ends-->
                  
                  <center><div style="height: 14px;" id="signup_status"></div></center>
                        
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  
                    
<script>
function signup(){
        var hr = new XMLHttpRequest();
	var url = "./signcashier.php";
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
    var vars = "uname="+u+"&fname="+f+"&email="+e+"&pass1="+p1+"&pass2="+p2+"&coun="+c+"&sex="+g+"&phon="+phin;
		hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
                    document.getElementById("signup_status").innerHTML = return_data;
                                        $('#un').val('');
                                        $('#fn').val('');
                                        $('#em').val('');
                                        $('#pass1').val('');
                                        $('#pass2').val('');
                                        $('#phinakee').val('');
					               
	    }
    };
    hr.send(vars); 
    document.getElementById("signup_status").innerHTML = "<center><img src='./loader2.gif'></center>";            
        }
}
</script>  
<?php include("scantopay.php"); ?>

    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
    <?php include("pic_change.php"); ?>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/edit-profile-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:11:48 GMT -->
</html>
