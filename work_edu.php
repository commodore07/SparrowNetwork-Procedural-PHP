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
                <li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="work_edu">Education and Work</a></li>
              	
                <li><i class="icon ion-ios-settings"></i><a href="account">Account Settings</a></li>
              	<li><i class="icon ion-ios-locked-outline"></i><a href="edit_pass">Change Password</a></li>
              </ul>
            </div>
            <div class="col-md-7">

              <!-- Edit Work and Education
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-book-outline"></i>My education</h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                    
<?php 
$get_user_info = $db->query("SELECT * FROM users WHERE username='$user'");
$get_info = $get_user_info->fetch_assoc();
$my_uni = $get_info['my_uni'];
$uni_du = $get_info['uni_start'];
$my_coy = $get_info['my_coy'];
$desig = $get_info['desig'];
$coy_du = $get_info['coy_start'];
$coy_fin = $get_info['coy_finish'];
$uni_fin = $get_info['uni_finish'];
$vac2 = $get_info['vac2'];
?>                          
                    
                    <form onsubmit="return false" name="education" id="education" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="school">My university</label>
                        <input id="school" class="form-control input-group-lg" type="text" name="school" title="Enter School" placeholder="My School" value="<?php echo $my_uni; ?>" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="date-from">From</label>
                        <input id="date-from" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="4" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="Enter year (e.g. 2018)" value="<?php echo $uni_du; ?>" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="date-to" class="">To</label>
                        <input id="date-to" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="4" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="Enter year (e.g. 2018)" value="<?php echo $uni_fin; ?>" />
                      </div>
                    </div>
                    
                    <div class="block-title">
                    <h4 class="grey"><i class="icon ion-ios-briefcase-outline"></i>Work Experiences</h4>
                    <div class="line"></div>
                  
                    </div>  
                      
                      <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="company">Company</label>
                        <input id="company" class="form-control input-group-lg" type="text" name="company" title="Enter Company" placeholder="Company name" value="<?php echo $my_coy; ?>" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="designation">Designation</label>
                        <input id="designation" class="form-control input-group-lg" type="text" name="designation" title="Enter designation" placeholder="designation name" value="<?php echo $desig; ?>" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="from-date">From</label>
                        <input id="from-date" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="4" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="Enter year (e.g. 2018)" value="<?php echo $coy_du; ?>" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="to-date" class="">To</label>
                        <input id="to-date" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="4" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="Enter year (e.g. 2018)" value="<?php echo $coy_fin; ?>" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label>Tradefair currency</label>
<select id="coren" class="form-control">
<option><?php echo $vac2; ?></option>
<?php
$currenz = $db->query("SELECT * FROM currency ORDER BY RAND()") or die($db->error());
while ($row = $currenz->fetch_assoc()) {
$emp1 = $row['currency'];
echo "<option>$emp1</option>";                                                
}     
?>                          
</select>
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
    var url = "workedu_update.php";
    var fn = document.getElementById("school").value;
	var bn = document.getElementById("date-from").value;
	var dn = document.getElementById("date-to").value;
        var phon = document.getElementById("company").value;
        var mailee = document.getElementById("designation").value;
        var abt_me = document.getElementById("from-date").value;
        var coren = document.getElementById("coren").value;
	var en = document.getElementById("to-date").value;
        var log_too = document.getElementById("statoo");
    var vars = "skul="+fn+"&datfrm="+bn+"&datto="+dn+"&comp="+phon+"&desig="+mailee+"&frmdat="+abt_me+"&todat="+en+"&coren="+coren;
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

    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
    <?php include("pic_change.php"); ?>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/edit-profile-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:11:48 GMT -->
</html>
