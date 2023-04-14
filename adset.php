<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php 
$unexee = $_GET['UN'];
$unexee = $db->real_escape_string($unexee); 
$unexee = str_replace("'","&apos;", $unexee);
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
                  <li><a href="./megadvert?u=<?php echo $unexee; ?>">Advert</a></li>
                   
                  
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
                  <li><a href="./megadvert?u=<?php echo $unexee; ?>">Advert</a></li>
                  
                  
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
                  <h4 class="grey"><i class="icon ion-ios-settings"></i>Account Settings</h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                  <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable blogger</strong></div>
                          <p>Enable this if you want this person to be a blogger</p>
                        </div>
                      </div>
                        <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label class="switch">
                              
<?php 
$get_user_info = $db->query("SELECT * FROM users WHERE username='$unexee'");
$get_info = $get_user_info->fetch_assoc();
$follow_stat = $get_info['blogxee'];
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
                      
<script>
$(document).ready(function() {
    $('#follow_activ').click(function() {
    var foll_val = $("input[name='checkit']:checked").val();
    $.post('myblogger.php?UK=<?php echo $unexee; ?>',{foll_val: foll_val});
});
});
</script>
                      
                  </div>
                  <div class="line"></div>
                  <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Block user</strong></div>
                          <p>Enable this if you want to block this user</p>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label class="switch">
                            
<?php 
$get_user_trade = $db->query("SELECT * FROM users WHERE username='$unexee'");
$get_trade = $get_user_trade->fetch_assoc();
$trade_stat = $get_trade['blockstaxee'];
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
    $.post('blockxee.php?UK=<?php echo $unexee; ?>',{trad_val: trad_val});
});
});
</script>                      
                      
                  </div>
                  
                </div>
              </div>