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
              
              <!--Edit Profile Menu-->
              <ul class="edit-menu">
                  <li><i class="icon ion-ios-information-outline"></i><a href="settings">Basic Information</a></li>
                <li><i class="icon ion-ios-briefcase-outline"></i><a href="work_edu">Education and Work</a></li>
              	
                <li><i class="icon ion-ios-settings"></i><a href="account">Account Settings</a></li>
              	<li class="active"><i class="icon ion-ios-locked-outline"></i><a href="edit_pass">Change Password</a></li>
              </ul>
            </div>
           <div class="col-md-7">

              <!-- Change Password
              ================================================= -->
              <div class="edit-profile-container">
                
                <div class="edit-block">
                    <form onsubmit="return false" name="update-pass" id="changepass" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label>Old password</label>
                        <input id="old_pass" class="form-control input-group-lg" type="password" title="Enter password" placeholder="Old password"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>New password</label>
                        <input id="new_pass" class="form-control input-group-lg" type="password" title="Enter password" placeholder="New password"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Confirm password</label>
                        <input id="rep_pass" class="form-control input-group-lg" type="password" title="Enter password" placeholder="Confirm password"/>
                      </div>
                    </div>
                    
                        <button onclick="ajax_post()" class="btn btn-primary">Update Password</button>
                    <center><div style="height: 14px;" id="stapass"></div></center>
                  </form>
               
<script>
function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "change_pass.php";
    var old_pass = document.getElementById("old_pass").value;
    var new_pass = document.getElementById("new_pass").value;
	var rep_pass = document.getElementById("rep_pass").value;
        var log_pass = document.getElementById("stapass");
        if(old_pass == "" || new_pass == "" || rep_pass == ""){
            log_pass.innerHTML = "Fill out all of the form data";
                // jquery fade-out fade-in begins
                $("#stapass").delay(3000).fadeOut("slow", function() {
                    log_pass.innerHTML = "";	        
                });
                $("#stapass").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends
        } else {
    var vars = "old_pass="+old_pass+"&new_pass="+new_pass+"&rep_pass="+rep_pass;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("stapass").innerHTML = return_data;
                        // jquery fade-out fade-in begins
                $("#stapass").delay(3000).fadeOut("slow", function() {
                    log_pass.innerHTML = "";	        
                });
                $("#stapass").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends       
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("stapass").innerHTML = "<center><img src='./loader2.gif'></center>";
	$("#changepass :input").each( function() {
	   $(this).val('');
	});
    }
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


    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
    <?php include("pic_change.php"); ?>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/edit-profile-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:11:48 GMT -->
</html>
