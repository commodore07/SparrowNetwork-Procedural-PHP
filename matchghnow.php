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

              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>
                        Match GH Request *100,000*
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
$getmag = $db->query("SELECT * FROM follows WHERE followe='$username' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM follows WHERE followe='$username' ORDER BY id DESC LIMIT 10" ) or die($db->error());
?>
<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$followe = $row['follower'];
$get_user = $db->query("SELECT * FROM users WHERE username='$followe'");
$get_ufo = $get_user->fetch_assoc();
$funame = $get_ufo['fullname'];
$usename = $get_ufo['username'];  
$pro_crop = $get_ufo['profilecrop_pic'];  
                                                /// Profile pic Begins
                                                if ($pro_crop == "") {
                                                    $proc="img/default_pic2.jpg";
                                                }
                                                else{
                                                    $proc="$pro_crop";
                                                }
                                                /// Profile pic Ends
$back_crop = $get_ufo['backgroundcrop_pic']; 
                                                /// Profile pic Begins
                                                if ($back_crop == "") {
                                                    $broc="img/backgroundcrop_pic.jpg";
                                                }
                                                else{
                                                    $broc="$back_crop";
                                                }
                                                /// Profile pic Ends
?>
	  
<!-- Post Content
================================================= -->
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                  	<img src="<?php echo $broc; ?>" alt="profile-cover" class="img-responsive cover" />
                  	<div class="card-info">
                      <img src="<?php echo $proc; ?>" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
<?php 
if($user != ""){
$cheztax = $db->query("SELECT * FROM follows WHERE follower='$user' && followe='$followe'");
// Count the amount of rows where username = $un
$chaxcount = $cheztax->num_rows;
?>    
    
<div id="felkax" class="pull-right">
<?php 
if ($chaxcount == 0) {
?>        
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
else {
?>    
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
?>    
</div>
   
<?php 

}

?> 
                          
<script language="javascript">
         function togglezax<?php echo $id; ?>() {
           var ele = document.getElementById("followxizaz<?php echo $id; ?>");
           var ble = document.getElementById("unfollowxizaz<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ble.style.display = 'block';
              ele.style.display = 'none';
           }
           else
           {
             ble.style.display = 'none';
             ele.style.display = 'block';
           }
         }
</script> 

<script>
$(document).ready(function() {
    $('#followxizaz<?php echo $id; ?>').click(function() {
        
    var follo = "<?php echo $usename; ?>";
    $.post('followme.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unfollowxizaz<?php echo $id; ?>').click(function() {
    
    var follo = "<?php echo $usename; ?>";
    $.post('unfollowme.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>                          
                          
                      	<h5><a href="./<?php echo $usename; ?>" class="profile-link"><?php echo $funame; ?></a></h5>
                        <p>@<a href="<?php echo $usename; ?>"><?php echo $usename; ?></a></p>
                        Account name: Commodore Davison <br>
                        Account number: 2020539283 <br>
                        Bank: Zenith Bank PLC <br>
                        Phone number: 07063046338<br>
                        Amount: 100,000<br>
                        <form method="post" action="delquest.php" class="navbar-form">
                        <button class="btn btn-primary " type="submit">Match to pay</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                                    
                                    
<?php
}
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
                         $.post("ajaxfollow.php?U=<?php echo $username; ?>",{load:loadclick},function(data){
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
                <center><div style="font-size: 14px; color: #999;">No follower yet...</div></center>
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
