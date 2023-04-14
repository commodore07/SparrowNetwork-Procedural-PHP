<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
    <link href="css/lacustom.css" rel="stylesheet">
<?php include("ago.php"); ?> 
    
<?php 
if($user == ""){
echo "<meta http-equiv=\"refresh\" content=\"0; url=index\">";
	exit();
} else {
    //// DO NOTHING
}
?>  
     
  <body>
      
<?php 
$tandee = (!empty($_GET['track_id']) ? $_GET['track_id'] : null);
$tandee = $db->real_escape_string($tandee); 
$tandee = str_replace("'","&apos;", $tandee);

$uzeev = (!empty($_GET['uve']) ? $_GET['uve'] : null);
$uzeev = $db->real_escape_string($uzeev); 
$uzeev = str_replace("'","&apos;", $uzeev);

$get_zeev = $db->query("SELECT * FROM users WHERE username='$uzeev'");
$rolzeev = $get_zeev->fetch_assoc();
$username = $rolzeev['me_cashier'];
?>   
      
<?php
$get_cuv = $db->query("SELECT * FROM users WHERE username='$uzeev'");
$rocuv = $get_cuv->fetch_assoc();
$chekuv = $rocuv['me_cashier'];
$uxex = $rocuv['username'];
if($chekuv == "$user" || $uxex == "$user"){
    
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=$user.trade\">";
	exit();
}
?>             

    <!-- Header
    ================================================= -->
    <?php include("header_trade.php"); ?> 		
    <!--Header End-->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div>
          
<?php 
$get_phot = $db->query("SELECT * FROM users WHERE username='$username'");
$rollin = $get_phot->fetch_assoc();
$fnee = $rollin['fullname'];
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
                  <li><a href="./<?php echo $username; ?>">Timeline</a></li>
                  <li><a href="about_user?u=<?php echo $username; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a><span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a><span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $username; ?>.trade">Tradefair</a></li>
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".serva">Services</a></li>
                  
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
                  <li><a href="./<?php echo $username; ?>">Timeline</a></li>
                  <li><a href="about_user?u=<?php echo $username; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a> <span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a> <span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $username; ?>.trade" class="active">Tradefair</a></li>
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".serva">Services</a></li>
                  
                </ul>
              
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <?php include("sider2.php"); ?>             
              
              <div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            

            <!-- Media
            ================================================= -->
            <div class="media">
            	<div class="row">
                    
            <div class="visible-lg" style="margin-top: 10px;" id="chat-block">
                <div class="title"><?php echo $tandee; ?></div>
            </div>
                    
                         
    <?php include("statistics_cashie.php"); ?>  
                     
                                
<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM my_customers WHERE le_cashier='$uzeev' AND search_date='$tandee' AND le_status='goods' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM my_customers WHERE le_cashier='$uzeev' AND search_date='$tandee' AND le_status='goods' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("track_loop.php");
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
                             $('.messages').text("No more transaction to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajaxtrackcashie.php?U=<?php echo $uzeev; ?>&TD=<?php echo $tandee; ?>",{load:loadclick},function(data){
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
                <center><i style="font-size: 150px; color: #999;" class="fa fa-money"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No transaction record found for <?php echo $tandee; ?></div></center>
<?php 
}
?>            
                
           
                
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
   <?php include("view_tran.php"); ?>  
  <script src="js/masonry.pkgd.min.js"></script>
  </body>


</html>
