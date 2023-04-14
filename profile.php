<!DOCTYPE html>
<html lang="en">
	
<?php include("headervoid.php"); ?>
    <link href="css/lacustom.css" rel="stylesheet">
<?php include("ago.php"); ?> 
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('lastprof.php?U=<?php echo $username; ?>',{post: post});
});
</script>     

<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('pro_view.php?U=<?php echo $username; ?>',{post: post});
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
                  <li>
                      <a href="./<?php echo $username; ?>" class="active">Timeline</a>
<?php 
if($pstat == "on"){
?>                  
<img src="sparrow_verify.jpg" style="width: 30px; height: 30px; float: right;" alt="" class="img-responsive profile-photo" />                  
<?php 
}
?>  
                  </li>
                  <li><a href="about_user?u=<?php echo $username; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a><span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a><span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $username; ?>.trade">Tradefair</a></li>
                  <?php
                  if($user == "admin"){
                  ?>
                  <li><a href="./indavert">Advert</a></li>
                  <?php
                  }
                  ?>
<?php 
if($pstat == "on" && $username == "$user"){
?>   
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".addusz">Invite</a></li>
<?php 
}
?>                  
                  <?php include("lamessage.php"); ?> 
                  <?php
                  if($user == "support"){
                  ?>
                  <li><a href="./<?php echo $username; ?>.empower">Empower</a></li>
                  
                  <?php 
                  }
                  ?>
                  
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
                  <li>
                      <a href="./<?php echo $username; ?>" class="active">Timeline</a>
<?php 
if($pstat == "on"){
?>                  
<img src="sparrow_verify.jpg" style="width: 30px; height: 30px; float: right;" alt="" class="img-responsive profile-photo" />                  
<?php 
}
?>                        
                  </li>
                  <li><a href="about_user?u=<?php echo $username; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a> <span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a> <span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $username; ?>.trade">Tradefair</a></li>
                  <?php
                  if($user == "admin"){
                  ?>
                  <li><a href="./indavert">Advert</a></li>
                  <?php
                  }
                  ?>
<?php 
if($pstat == "on" && $username == "$user"){
?>   
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".addusz">Invite</a></li>
<?php 
}
?>                    
                  <?php include("lamessage2.php"); ?> 
                  <?php
                  if($user == "support"){
                  ?>
                  <li><a href="./<?php echo $username; ?>.empower">Empower</a></li>
                  
                  <?php 
                  }
                  ?>
                 <?php include("followsmall_btn.php"); ?> 
                </ul>
              
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
               
               
<?php 
$veewax = $db->query("SELECT * FROM invite WHERE followe = '$user' AND follower= '$username'");
$waxee = $veewax->num_rows;
if($pstat == "on" && $waxee > 0){
?>  
               
<?php include("statistics_pro.php"); ?>                
             <!-- Post Create Box
              ================================================= -->
              <div class="create-post">
            	<div class="row">
                   <form id="uploadForm" method="post">
            	<div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <img src="<?php echo $profilepic; ?>" alt="" class="profile-photo-md" />
                    <textarea name="postax" id="post" cols="30" rows="1" class="form-control" placeholder="Express yourself..."></textarea>
                  </div>
                </div>
            		<div class="col-md-5 col-sm-5">            
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                       
                       <li>
                           <label style="cursor: pointer;" class="btn-file">
                                <i class="fa fa-camera" title="Upload photo"></i>  <input name="file1" type="file" style="display: none;">
                           </label>
                       </li>
                       <li>
                           <label style="cursor: pointer;" class="btn-file">
                                <i class="fa fa-camera-retro" title="Upload multiple photos"></i>  <input type="file" name="files[]" multiple style="display: none;">
                           </label>
                       </li>
                       <li><a style="cursor: pointer;" data-toggle="modal" data-target=".tubeurl"><i title="Embed youtube videos" class="ion-ios-videocam"></i></a></li>
                       <li id="loader"><img src="./loader2.gif"></li> 
                    </ul>
                      <button id="post_update" class="btn btn-primary pull-right">Chirp</button>
                      <div id="gallerie"></div>
                  </div>
                                          
                </div>
                </form> 
                    
<script>
     
     $("#post_update").prop("disabled", "disabled");

$("#post").on("keyup", function () {
  if ($(this).val() != "") {
    $("#post_update").prop("disabled", false);
  } else {
    $("#post_update").prop("disabled", "disabled");
  }
});

$('#loader').hide();
 
 </script>
 
<script>
$(document).ready(function(){
   $('#uploadForm').on('submit', function(e){
      e.preventDefault();
      $('#loader').show();
      $.ajax({
         url: "send_post_group.php?UZ=<?php echo $username; ?>",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#freshchirp").html(data);
             $('#loader').hide();
             $("#post_update").prop("disabled", "disabled");
             
             $("#uploadForm :input").each( function() {
	   $(this).val('');
	});
             
         }
      });
   });
});
</script>    
            		
            	</div>
            </div><!-- Post Create Box End-->  
<?php
}
?>            
            
            <div id="freshchirp"></div>    

<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("while_loop.php");
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
                         $.post("ajax_profile.php?U=<?php echo $username; ?>",{load:loadclick},function(data){
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
<?php 
if($pstat == "on" && $waxee > 0){
    $biaq = "Start chirping now...";
} else {
    $biaq = "No chirps yet...";
}
?>                
                <center><div style="font-size: 14px; color: #999;"><?php echo $biaq; ?></div></center>
<?php 
}
?>     
            
          
          </div>
         <?php include("tradelist.php"); ?>
          </div>
        </div>
      </div>
    </div>
    
    <!--Popup-->
                    <div class="modal fade addusz" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Allow users update your profile</div>
                            </div>
                            <div class="post-container">
                                <form id="lazach" method="post">   
                                  <div class="post-comment">
                                      <input id="searchzx" class="form-control input-group-lg" type="text" title="Enter username, fullname or email..." placeholder="Enter username, fullname or phone number..." />
                                  </div>
                                </form>
                                <div id="sarch_rezx"></div>
<script>
$(document).ready(function() {
    $('#searchzx').keyup(function() {
    var sarchwozx = document.getElementById("searchzx").value;
    $.post('sarch_zx.php',{sarchwozx: sarchwozx},function(data) {
        $("#sarch_rezx").html(data);
    });
});
});
</script>                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 

    <!-- Footer
    ================================================= -->
  <?php include("footer.php"); ?>

  </body>


</html>
