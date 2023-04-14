<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
<?php 
if($user == "admin" || $user == "support"){

} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
	exit();
}
?>    
    
    <?php include("onload_code.php"); ?>
    <script src="js/empower.js"></script>
    <link rel="stylesheet" type="text/css" href="css/burton.css">
<?php include("countdown_func.php"); ?>    
    
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
            <?php include ("sider3.php"); ?>
            <div class="col-md-7">
                
<?php 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
?>  
                
<?php
$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$baxxq = $rorence['code'];
?>                    
                    
<?php 
$get_pez = $db->query("SELECT * FROM general_details WHERE country_spar='$sparconnn'");
$rocez = $get_pez->fetch_assoc();
$crezzq = $rocez['interest_rate'];
$jarate = $crezzq / 100;
$mineegh = $rocez['min_gh'];

$matageet = $rocez['my_target'];
$geecoinx = $rocez['get_coins'];
?>                     
                
<?php 
$get_prex = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolprex = $get_prex->fetch_assoc();
$pswitch = $rolprex['ph_switch'];
$ghswix = $rolprex['gh_switch'];
$emawizzo = $rolprex['e_wallet'];
$spar_support = $rolprex['spar_support'];
$admatch = $rolprex['providehelp_match'];
$gethelpmatch = $rolprex['gethelp_match'];
$mybonzz = $rolprex['my_bonus'];
if($mybonzz == ""){
    $mybonzz = 0;
} else {
    $mybonzz = "$mybonzz";
}
$mybonzz = number_format($mybonzz);
$emp_cycle = $rolprex['emp_cycle'];
$baknama = $rolprex['bank_name'];
$unmatchphix = $rolprex['unmatched_ph'];
if($unmatchphix == ""){
    $unmatchphix = 0;
} else {
    $unmatchphix = "$unmatchphix";
}
$accnama = $rolprex['account_number'];
$unmatchphix = number_format($unmatchphix);
$metaggs = $rolprex['my_target'];
if($metaggs == ""){
    $metaggs = 0;
} else {
    $metaggs = "$metaggs";
}
$metaggs = number_format($metaggs);
$waitstatus = $rolprex['wait_stat'];
$ptimerem = $rolprex['ph_timerem'];
$ago_timerem = count_down($ptimerem);
$unmatchghix = $rolprex['unmatched_gh'];
if($unmatchghix == ""){
    $unmatchghix = 0;
} else {
    $unmatchghix = "$unmatchghix";
}
$unmatchghix = number_format($unmatchghix);
$rejiereson = $rolprex['reject_reason'];
$ghz_staz = $rolprex['ghz_staz'];
$limits_stat = $rolprex['limit_statuz'];
$cdeposite = $rolprex['current_deposit'];
if($cdeposite == ""){
    $cdeposite = 0;
} else {
$cdeposite = number_format($cdeposite);
}
$activeestat = $rolprex['active_statux'];
$rem_day = $rolprex['rem_day'];
$currexday = $rolprex['current_day'];
//// REMAINING DAY
$remiedax = 26 - $currexday;

$slimval = $rolprex['statlimit_val'];
if($slimval == ""){
    $slimval = 0;
}
$slimval = number_format($slimval);
?> 
              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                  <div class="block-title">
                    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>
                        Sparrow Support                      
                    </h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
     
<div>

        <!-- FAQ Menu
        ================================================= -->
        
      
        <div class="row">
        	<div class="col-sm-12">
          
            <!-- FAQ Content
            ================================================= -->
            <div class="tab-content faq-content">
            
              <!-- FAQ Category Content : General -->
              <div class="tab-pane active" id="faq_cat_1">
                
                  
<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM ponzee WHERE spar_support='on' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM ponzee WHERE spar_support='on' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("support_loop.php");
?>
</div> 
            
                <script>
                
                $(document).ready(function(){
                    $('.procin').hide();
                    var loadclick = 0;
                    var nbrclick = "<?php echo $info; ?>";
                    $("#readmore").on("click", function () {
                         $('.procin').show();
                         $('#readmore').hide();
                         loadclick++;
                         if (loadclick * 10 > nbrclick){
                             $('.messages').text("No more support staff");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajaxsuppstaff.php",{load:loadclick},function(data){
                           $('.images').append(data);
                           $('.procin').hide();
                           $('#readmore').show();
                         });
                     }
                     
                    });
                });
                
                </script>  
                
<?php 
if($info != 0){
if($info > 10){    
?>                
<center>
<div>
    <button id="readmore" class="btn btn-primary">See more</button>
</div>
                                                
<div class="procin">
    <img src="loader2.gif">
</div>
<div class="messages" style=";font-size: 16px; color: #999;">
                                                    
</div>
</center>
<?php 
}
} 
?> 
                
                  
                
              </div><!-- #faq_cat_1 -->
              
            </div>
          </div>
        	
        </div>
      </div>
                    
                 
                  
                </div>
              </div>
            </div>
           <?php include("tradelist.php"); ?>
          </div>
        </div>
      </div>
    </div>

                    

<?php include("mycashflowpop.php"); ?>
<?php include("chatter.php"); ?>
   
    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
    
    <?php include("ponzeepic_change.php"); ?>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/edit-profile-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:11:48 GMT -->
</html>
