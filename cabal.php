<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
    <?php include("onload_code.php"); ?>
    
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

              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                    
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

///// GET CURRENCY                                                 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];

$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code'];                                                       
///// END GET CURRENCY 
?>                    
                    
                    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>
                        Cabal <?php echo "$renzie$caboamtx"; ?>
                    </h4>
                    
                    <?php include ("referral_code.php"); ?>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                    
                  
      
<!-- Friend List
            ================================================= -->
            <div class="friend-list">
            	<div class="row">
                    
<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM ponzee WHERE referee = '$user' AND cabal_lapse > '$timcov' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM ponzee WHERE referee = '$user' AND cabal_lapse > '$timcov' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include ("while_cabal.php");
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
                             $('.messages').text("No more result to display...");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajaxcabal.php",{load:loadclick},function(data){
                           $('.images').append(data);
                           $('.procin').hide();
                           $('#readmore').show();
                         });
                     }
                     
                    });
                });
                
                </script>
                            		
            	</div>
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
} else{
?> 
                <center><i style="font-size: 150px; color: #999;" class="fa fa-group"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No Cabal yet...</div></center>
<?php 
}
?>                     
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

    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
    <?php include("ponzeepic_change.php"); ?>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/edit-profile-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:11:48 GMT -->
</html>
