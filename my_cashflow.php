<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
    
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
                        Level <span class="text-green"><?php echo $emp_cycle; ?></span>
                        Status <span class="text-green"><?php echo $activeestat; ?></span>
                        Days <span class="text-red"><?php echo $currexday; ?></span>
                        Rem <span class="text-red"><?php echo $remiedax; ?></span>
                        Target <span class="text-red"><?php echo "$baxxq$metaggs"; ?></span>
                    </h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                    <ul style="font-size: 20px" class="list-inline interests">
                        <?php 
                        if($pswitch == "on"){
                        ?>
                        <a id="caziox" style="cursor: pointer; margin-bottom: 20px;" data-toggle="modal" data-target=".providehelp"><i class="fa fa-money"></i> Provide Help</a>
                  	<?php 
                        } else {
                        ?>
                        <li><i class="fa fa-money"></i> Provide Help</li>
                        <?php 
                        }
                        ?>
                  	
                        <?php 
                        if($spar_support != "on"){
                        if($activeestat == 7){
                        ?>
                        <a id="caziox" style="cursor: pointer; margin-bottom: 20px;" data-toggle="modal" data-target=".gethelp"><i class="fa fa-money"></i> Get Help</a>
                  	<?php 
                        } else {
                        ?>
                        <li><i class="fa fa-money"></i> Get Help</li>
                        <?php 
                        }
                        }
                        ?>
                        
                        <?php 
                        if($spar_support == "on"){
                        if($currexday == 25){
                        ?>
                        <a id="caziox" style="cursor: pointer; margin-bottom: 20px;" data-toggle="modal" data-target=".gethelp"><i class="fa fa-money"></i> Get Help</a>
                  	<?php 
                        } else {
                        ?>
                        <li><i class="fa fa-money"></i> Get Help</li>
                        <?php 
                        }
                        }
                        ?>
                        
                  	
                  	
                  </ul>
                    <div style="float: left;" class="line"></div>
                    
<?php include("statistics_empower.php"); ?>  
<?php
$timcov = time();
$totalxz2 = 0;      
$getinftee = $db->query("SELECT * FROM ponzee WHERE referee = '$user' AND cabal_lapse > '$timcov'" ) or die($db->error());
$countaee = $getinftee->num_rows;
if($countaee > 0){
while ($roz = $getinftee->fetch_assoc()) {
$exp_amtert2 = $roz['cabal_amt'];
////get total cabal
$pzeeex2 = array ($exp_amtert2);
$valuux2 = array_sum ($pzeeex2);
$totalxz2 +=$valuux2;
$gr_total2 = "$totalxz2"; 
}
$caboamtx = number_format($gr_total2);
} else{
    $caboamtx = 0;
}
?>                    
                    
                    <span style="margin-right: 10px; font-weight: 700;">Bank: <?php echo $baknama; ?></span>
                    <span style="font-weight: 700;">Account No: <?php echo $accnama; ?></span>
                    <span style="font-weight: 700;">Cabal: <?php echo "$baxxq$caboamtx"; ?></span><br>
                    <span style="margin-right: 10px; font-weight: 700;">Unmatched PH: <?php echo "$baxxq$unmatchphix"; ?></span>
                    <span style="margin-right: 10px; font-weight: 700;">Unmatched GH: <?php echo "$baxxq$unmatchghix"; ?></span>
                    <span style="font-weight: 700;">Bonus: <?php echo "$baxxq$mybonzz"; ?></span>
                                     
<?php 
if ($pswitch == "on"){
?>  
                  
                <div style="text-align: center;">         
                    <div class=" col-md-12">
                
                    <!-- Image -->
                    <center><img src="happiness.svg" alt="..." style="max-width: 272px;"></center>
<?php 
if($rejiereson == ""){
?>
                    <!-- Title -->
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      Get <?php echo $crezzq; ?>% in 26 active days
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                      Sparrow Network is a community where people empower people. Empower someone today, and get <?php echo $crezzq; ?>% interest in 26 active days. Join us now...
                        </p></center>
<?php 
} else {
?>
                    <!-- Title -->
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      PH Rejected by admin
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                      Reason: <?php echo $rejiereson; ?>
                        </p></center>
<?php
}
?>                    
                    
                  
                  </div>
                  </div>
                  
<?php 
}
?>  
                  
<?php 
$get_xoia = $db->query("SELECT * FROM users WHERE username='$user'");
$rolloia = $get_xoia->fetch_assoc();
$lanamoia = $rolloia['fullname'];
?>      
                                
<?php 
if ($waitstatus == "on"){
?>                   
                  <div style="text-align: center;">         
                    <div class=" col-md-12">
         
                    <!-- Image -->
                    <center><img src="happiness.svg" alt="..." style="max-width: 272px;"></center>

                    <!-- Title -->
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                            Hello <?php echo $lanamoia; ?>
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                            Your <?php echo $baxxq; ?><?php echo $cdeposite; ?> PH request has been received.<br> You have <span id="loadphcons"><?php echo $ago_timerem; ?></span> to match yourself, else Sparrow Network will automatically match you. 
                        </p>
                        
                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#loadphcons').load('loadphconx.php');
                                      }, 1000);  
                                    });
                                    </script>                             
                        
<?php 
if($ago_timerem != "0 hrs : 0 mins : 0 secs"){
?>                        
                    <form method="post" action="delquest.php" class="navbar-form">
                    <button class="btn btn-primary " type="submit">Cancel request</button>
                    </form>
<?php 
}
?>                        
                    </center>

                    
                  
                  </div>
                  </div>
                  
<?php 
}
?>                  

<?php
//// for provider
$get_provobb = $db->query("SELECT * FROM match_ph WHERE provider = '$user' AND paid_status != 'paid'");
$probizz = $get_provobb->num_rows;
if ($probizz > 0){
?>                   
                  <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      Provide help now
                        </h4></center>
                              <div class="friend-list">
            	<div class="row">
                    
<div>                             
<?php 
$getposts = $db->query("SELECT * FROM match_ph WHERE provider='$user' AND paid_status != 'paid' ORDER BY id DESC" ) or die($db->error());
include("help_loop.php");
?>
</div>                            		
            	</div>
          
            </div>
                  
<?php 
}
?> 
                    
<?php 
if ($ghz_staz == "on"){
?>                   
                  <div style="text-align: center;">         
                    <div class=" col-md-12">
         
                    <!-- Image -->
                    <center><img src="happiness.svg" alt="..." style="max-width: 272px;"></center>

                    <!-- Title -->
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                            Hello <?php echo $lanamoia; ?>
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                            Your <?php echo $baxxq; ?><?php echo $unmatchghix; ?> GH request has been received.<br> You have <span id="loadghzcons"><?php echo $ago_timerem; ?></span> to match yourself, else Sparrow Network will automatically match you. 
                        </p>
                        
                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#loadghzcons').load('loadghzconx.php');
                                      }, 1000);  
                                    });
                                    </script>                             
                        
                     
                    </center>

                    
                  
                  </div>
                  </div>
                  
<?php 
}
?>                                
                  
<?php 
//// for receiver
$get_reavobb = $db->query("SELECT * FROM match_ph WHERE receiver = '$user' AND paid_status != 'paid'");
$reabizz = $get_reavobb->num_rows;
if ($reabizz > 0){
?>                   
                  <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      Get help now
                        </h4></center>
                              <div class="friend-list">
            	<div class="row">
                    
<div>                             
<?php 
$getposts = $db->query("SELECT * FROM match_ph WHERE receiver='$user' AND paid_status != 'paid' ORDER BY id DESC" ) or die($db->error());
include("gethelp_loop.php");
?>
</div>                            		
            	</div>
          
            </div>
                  
<?php 
}
?>                          

<?php
$get_phot = $db->query("SELECT * FROM trans_history WHERE username='$user'");
$rollin = $get_phot->fetch_assoc();
$canzit = $get_phot->num_rows;

if($canzit > 0){
?>                    

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
                <div class="faq-headline">
                	<h3 class="item-title grey">Transaction History</h3>
                	
                </div>
                  
<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM trans_history WHERE username='$user' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM trans_history WHERE username='$user' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("tranhist_loop.php");
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
                             $('.messages').text("No more transaction");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajaxtrazit.php",{load:loadclick},function(data){
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
                    
<?php 
}
?>                    
                  
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
