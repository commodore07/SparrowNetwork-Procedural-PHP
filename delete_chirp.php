<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
<?php 
$username = "$user";
?>    
<?php include("ago.php"); ?> 
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('lastprof.php?U=<?php echo $username; ?>',{post: post});
});
</script>     
  <body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div>
          
<?php 
$get_phot = $db->query("SELECT * FROM users WHERE username='$username'");
$rollin = $get_phot->fetch_assoc();
$fnee = $rollin['fullname'];
$pstat = $rollin['page_stat'];
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
                  <?php include("lamessage2.php"); ?> 
                  
                </ul>
              <?php include("followsmall_btn.php"); ?>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <?php include("sider2.php"); ?>
           <div class="col-md-7">
               
<?php
$getinfoz = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfoz->fetch_assoc();
    
                                                $fulname = $roz['fullname'];
                                                $phone = $roz['phone'];
                                                if($phone == ""){
                                                    $phone = "Secret";
                                                }
                                                else {
                                                    $phone = "$phone";
                                                }
                                                $profilepic = $roz['profilecrop_pic'];
                                                if ($profilepic == "") {
                                                 $profilepic = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepic = "$profilepic";
                                                }
?>                
               
             <!-- Post Create Box
              ================================================= -->
             
            <div id="freshchirp"></div>    

<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM posts WHERE added_by='$username' AND empty1 != 'tradefairpic' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM posts WHERE added_by='$username' AND empty1 != 'tradefairpic' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("while_delete.php");
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
                             $('.messages').text("No more chirp to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajax_delchirp.php?U=<?php echo $username; ?>",{load:loadclick},function(data){
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
} else{
?> 
                <center><i style="font-size: 150px; color: #999;" class="fa fa-globe"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No chirp yet...</div></center>
<?php 
}
?>       
            
          
          </div>
         <?php include("tradelist.php"); ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer
    ================================================= -->
  <?php include("footer.php"); ?>

  </body>


</html>
