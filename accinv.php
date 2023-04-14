<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$unexee = $_GET['UN'];
$unexee = $db->real_escape_string($unexee); 
$unexee = str_replace("'","&apos;", $unexee);

$username = "$unexee";
?>

<?php include("admin_folli.php"); ?>

<?php 
$get_phot = $db->query("SELECT * FROM users WHERE username='$unexee'");
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
                    <img width="200" height="200" src="<?php echo $propixy ?>" alt="" class="img-circle profile-photo" />
                  <h4><?php echo $fnee ?></h4>
                  
                </div>
              </div>
              <div class="col-md-9">
                 
                <ul class="list-inline profile-menu">
                  <li><a href="./<?php echo $unexee; ?>" class="active">Timeline</a></li>
                  <li><a href="about_user?u=<?php echo $unexee; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $unexee; ?>">Followers</a><span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $unexee; ?>">Following</a><span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $unexee; ?>.trade">Tradefair</a></li>
                   
                  
                </ul>
                <ul class="follow-me list-inline">
                  
                  
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="<?php echo $propixy ?>" alt="" class="img-responsive profile-photo" />
              <h4><?php echo $fnee ?></h4>
              <p class="text-muted">*<a href="./<?php echo $unexee; ?>.trade"><?php echo $unexee; ?></a></p> 
            </div>
            <div class="mobile-menu">
                <ul class="list-inline">
                  <li><a href="./<?php echo $unexee; ?>" class="active">Timeline</a></li>
                  <li><a href="about_user?u=<?php echo $unexee; ?>">About</a></li>
                  <li><a href="followers?u=<?php echo $unexee; ?>">Followers</a> <span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $unexee; ?>">Following</a> <span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $unexee; ?>.trade">Tradefair</a></li>
                  
                  
                </ul>
             
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>          

<style>
    #cizaz {
        margin-top: 80px;
    }
    @media only screen and (max-width : 992px) {
    #cizaz {
        margin-top: 180px;
    }    
    }
</style>

<div id="cizaz" class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-settings"></i>Accept Request</h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                  <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                            <div><strong>Follow @<a href="./<?php echo $username; ?>"><?php echo $username; ?></a></strong></div>
                          <p>Enable this if you want to be notified on <?php echo $username; ?>'s chirps</p>
                        </div>
                      </div>
                        <div class="col-sm-3">
                        <div class="toggle-switch">
                            <?php 
if($user != "" && $user != "$username"){
$checkee = $db->query("SELECT * FROM follows WHERE follower='$user' && followe='$username'");
// Count the amount of rows where username = $un
$checkvaz = $checkee->num_rows;
?>    
    <center>
    <div id="feltez">
<?php 
if ($checkvaz == 0) {
?>        
    <button onclick="toggle()" style="display: block;" id="followit" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="toggle()" style="display: none;" id="unfollowit" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
else {
?>    
    <button onclick="toggle()" style="display: none;" id="followit" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="toggle()" style="display: block;" id="unfollowit" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
?>    
    </div>
    </center>
<?php 

}

?>
                            
<script language="javascript">
         function toggle() {
           var ele = document.getElementById("followit");
           var ble = document.getElementById("unfollowit");
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
    $('#followit').click(function() {
        
    var follo = "<?php echo $username; ?>";
    $.post('followme.php',{follo: follo},function(data) {
        $("#feltejz").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unfollowit').click(function() {
    
    var follo = "<?php echo $username; ?>";
    $.post('unfollowme.php',{follo: follo},function(data) {
        $("#feltejz").html(data);
    });
});
});
</script>                            
                            
                        </div>
                      </div>
                    </div>
                      
<script>
$(document).ready(function() {
    $('#follow_activ').click(function() {
    var foll_val = $("input[name='checkit']:checked").val();
    $.post('vated.php?UK=<?php echo $unexee; ?>',{foll_val: foll_val},function(data) {
        $("#rexas").html(data);
    });
});
});
</script>
                      
                  </div>
                  
                  
                </div>
              </div>