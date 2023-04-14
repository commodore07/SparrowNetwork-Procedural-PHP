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
              	
                <li class="active"><i class="icon ion-ios-settings"></i><a href="account">Account Settings</a></li>
              	<li><i class="icon ion-ios-locked-outline"></i><a href="edit_pass">Change Password</a></li>
              </ul>
            </div>
            <div class="col-md-7">

              <!-- Profile Settings
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-settings"></i>Account Settings</h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                  <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable follow me</strong></div>
                          <p>Enable this if you want people to follow you</p>
                        </div>
                      </div>
                        <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label class="switch">
                              
<?php 
$get_user_info = $db->query("SELECT * FROM users WHERE username='$user'");
$get_info = $get_user_info->fetch_assoc();
$follow_stat = $get_info['follow_stat'];
if($follow_stat == "on"){
?>                              
<input id="follow_activ" name="checkit" type="checkbox" checked>
<?php 
} else {
?>
<input id="follow_activ" name="checkit" type="checkbox">
<?php 
}
?>
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                      
<script type="text/javascript">
    $(document).ready(function(){
       $('input[name="unneccessary"]').click(function(){
           if($(this).prop("checked") == true){
               alert("checked");
           }
           else if ($(this).prop("checked") == false){
               alert("unchecked");
           }
       }); 
    });
</script> 

<script>
$(document).ready(function() {
    $('#follow_activ').click(function() {
    var foll_val = $("input[name='checkit']:checked").val();
    $.post('stat_follow.php',{foll_val: foll_val},function(data) {
    });
});
});
</script>
                      
                  </div>
                  <div class="line"></div>
                  <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable tradefair</strong></div>
                          <p>Enable this if you want to activate your tradefair account</p>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label class="switch">
                            
<?php 
$get_user_trade = $db->query("SELECT * FROM users WHERE username='$user'");
$get_trade = $get_user_trade->fetch_assoc();
$trade_stat = $get_trade['trade_stat'];
if($trade_stat == "on"){
?>                              
<input id="trade_activ" name="tradit" type="checkbox" checked>
<?php 
} else {
?>
<input id="trade_activ" name="tradit" type="checkbox">
<?php 
}
?>                              
                              
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                      
<script>
$(document).ready(function() {
    $('#trade_activ').click(function() {
    var trad_val = $("input[name='tradit']:checked").val();
    $.post('stat_trade.php',{trad_val: trad_val},function(data) {
    });
});
});
</script>                      
                      
                  </div>
                  <div class="line"></div>
                  <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable group page</strong></div>
                          <p>Enable this if you want to activate group page</p>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label class="switch">
                            
<?php 
$get_user_page = $db->query("SELECT * FROM users WHERE username='$user'");
$get_page = $get_user_page->fetch_assoc();
$page_stat = $get_page['page_stat'];
if($page_stat == "on"){
?>                              
<input id="page_activ" name="pagit" type="checkbox" checked>
<?php 
} else {
?>
<input id="page_activ" name="pagit" type="checkbox">
<?php 
}
?>                               
                              
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                      
<script>
$(document).ready(function() {
    $('#page_activ').click(function() {
    var page_val = $("input[name='pagit']:checked").val();
    $.post('stat_page.php',{page_val: page_val},function(data) {
    });
});
});
</script>                        
                      
                  </div>
                  
                  
                  <div class="line"></div>
                  <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable inventory</strong></div>
                          <p>Enable this if you want to activate sparrow inventory</p>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label class="switch">
                            
<?php 
$get_user_inf = $db->query("SELECT * FROM users WHERE username='$user'");
$get_inf = $get_user_inf->fetch_assoc();
$inf_stat = $get_inf['inf_stat'];
if($inf_stat == "on"){
?>                              
<input id="inf_activ" name="infit" type="checkbox" checked>
<?php 
} else {
?>
<input id="inf_activ" name="infit" type="checkbox">
<?php 
}
?>                                   
                              
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                      
<script>
$(document).ready(function() {
    $('#inf_activ').click(function() {
    var inf_val = $("input[name='infit']:checked").val();
    $.post('stat_inf.php',{inf_val: inf_val},function(data) {
    });
});
});
</script>                      
                      
                  </div>
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
