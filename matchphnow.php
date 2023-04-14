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
       
          
<?php 
          
///// GET CURRENCY                                                 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$username'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];

$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code'];                                                       
///// END GET CURRENCY             
          
$get_phot = $db->query("SELECT * FROM users WHERE username='$username'");
$rollin = $get_phot->fetch_assoc();
$fnee = $rollin['fullname'];
$pstat = $rollin['page_stat'];
$conzree = $rollin['country'];

                                                $propix = $rollin['profile_pic'];
                                                $propix2 = $rollin['profilecrop_pic'];
                                                /// Profile pic Begins
                                                if ($propix == "") {
                                                    $propixy="img/default_pic.jpg";
                                                }
                                                else{
                                                    $propixy="$propix";
                                                }
                                                /// Profile pic Ends
                                                
                                                
                                                /// Profile pic crop Begins
                                                if ($propix2 == "") {
                                                    $propixy2="img/default_pic2.jpg";
                                                }
                                                else{
                                                    $propixy2="$propix2";
                                                }
                                                /// Profile pic crop Ends
                                                
                                                $back_pic = $rollin['background_pic'];
                                                /// Profile pic Begins
                                                if ($back_pic == "") {
                                                    $back_pic="img/background_pic.jpg";
                                                }
                                                else{
                                                    $back_pic="$back_pic";
                                                }
                                                /// Profile pic Ends
?>          
          
        <div style="background: url('<?php echo $back_pic; ?>') no-repeat;" class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                  <img src="<?php echo $propixy ?>" alt="" class="img-responsive profile-photo" />
                  
                  <h3><?php echo $fnee ?></h3>
                  <p class="text-muted">*<a href="./<?php echo $username; ?>.trade"><?php echo $username; ?></a></p>
                
                </div>
              </div>
              <div class="col-md-9">
                <?php include("fola_folli.php"); ?>   
                <ul class="list-inline profile-menu">
                  <li><a href="./<?php echo $username; ?>" class="active">Timeline</a></li>
                  <li><a href="about_user?u=<?php echo $username; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a><span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a><span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $username; ?>.trade">Tradefair</a></li>
<?php 
if($pstat == "on" && $username == "$user"){
?>   
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".addusz">Invite</a></li>
<?php 
}
?>                  
                  <?php include("lamessage.php"); ?> 
                  
                </ul>
                <ul class="follow-me list-inline">
                  
                  <li><?php include("follow_btn.php"); ?></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="<?php echo $propixy ?>" alt="" class="img-responsive profile-photo" />
              <h4><?php echo $fnee ?></h4>
              <p class="text-muted">*<a href="./<?php echo $username; ?>.trade"><?php echo $username; ?></a></p>
              
              
              
            </div>
            <div class="mobile-menu">
                <ul class="list-inline">
                  <li><a href="./<?php echo $username; ?>" class="active">Timeline</a></li>
                  <li><a href="about_user?u=<?php echo $username; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a> <span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a> <span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $username; ?>.trade">Tradefair</a></li>
<?php 
if($pstat == "on" && $username == "$user"){
?>   
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".addusz">Invite</a></li>
<?php 
}
?>                    
                  <?php include("lamessage2.php"); ?> 
                 <?php include("followsmall_btn.php"); ?> 
                </ul>
              
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
          
          
        <div id="page-contents">
          <div class="row">
            <?php include ("sider3.php"); ?>
            <div class="col-md-7">
<?php 
$get_hegrix = $db->query("SELECT * FROM ponzee WHERE username='$username'");
$rolgrix = $get_hegrix->fetch_assoc();
$zazezu = $rolgrix['unmatched_ph'];
$umaix = $rolgrix['unmatched_ph'];
if($umaix == ""){
$umaix = "0";
} else {
$umaix = "$umaix";
}
$umaix = number_format($umaix);
?>
              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>
                        Match PH Request *<?php echo "$renzie$umaix" ?>*
                    </h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                    
                  
      
<!-- Friend List
            ================================================= -->
            <div class="friend-list">
            	<div class="row">
                    
<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM ponzee WHERE spar_coun='$sparconnn' AND unmatched_gh != '0' AND block_time = '' AND unmatched_gh != '' AND coun_stat !='bullion' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM ponzee WHERE spar_coun='$sparconnn' AND unmatched_gh != '0' AND block_time = '' AND unmatched_gh != '' AND coun_stat !='bullion' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include('while_matchnow.php');
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
                             $('.messages').text("No more result to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajaxmatchnow.php?C=<?php echo $sparconnn; ?>",{load:loadclick},function(data){
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
                <center><div style="font-size: 14px; color: #999;">No GH Request yet...</div></center>
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
