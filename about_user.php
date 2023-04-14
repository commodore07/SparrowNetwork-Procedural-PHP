<!DOCTYPE html>
<html lang="en">
	
<?php include("headervoid.php"); ?>
<?php include("ago.php"); ?> 
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
/// If Else Statement Begins
if($fnee == ""){
    $fnee = "Undefined";
}
else {
    $fnee = "$fnee";
}
/// If Else Statement Ends
$genx = $rollin['gender'];
/// If Else Statement Begins
if($genx == ""){
    $genx = "Undefined";
}
else {
    $genx = "$genx";
}
/// If Else Statement Ends
$relx = $rollin['religion'];
/// If Else Statement Begins
if($relx == ""){
    $relx = "Undefined";
}
else {
    $relx = "$relx";
}
/// If Else Statement Ends
$occx = $rollin['occupation'];
/// If Else Statement Begins
if($occx == ""){
    $occx = "Undefined";
}
else {
    $occx = "$occx";
}
/// If Else Statement Ends
$counx = $rollin['country'];
/// If Else Statement Begins
if($counx == ""){
    $counx = "Undefined";
}
else {
    $counx = "$counx";
}
/// If Else Statement Ends
$phonx = $rollin['phone'];
/// If Else Statement Begins
if($phonx == ""){
    $phonx = "Undefined";
}
else {
    $phonx = "$phonx";
}
/// If Else Statement Ends
$abtx = $rollin['about_me'];
/// If Else Statement Begins
if($abtx == ""){
    $abtx = "Undefined";
}
else {
    $abtx = "$abtx";
}
/// If Else Statement Ends
$myunix = $rollin['my_uni'];
/// If Else Statement Begins
if($myunix == ""){
    $myunix = "Undefined";
}
else {
    $myunix = "$myunix";
}
/// If Else Statement Ends
$uni_starx = $rollin['uni_start'];
/// If Else Statement Begins
if($uni_starx == ""){
    $uni_starx = "Undefined";
}
else {
    $uni_starx = "$uni_starx";
}
/// If Else Statement Ends
$uni_finx = $rollin['uni_finish'];
/// If Else Statement Begins
if($uni_finx == ""){
    $uni_finx = "Undefined";
}
else {
    $uni_finx = "$uni_finx";
}
/// If Else Statement Ends
$my_cox = $rollin['my_coy'];
/// If Else Statement Begins
if($my_cox == ""){
    $my_cox = "Undefined";
}
else {
    $my_cox = "$my_cox";
}
/// If Else Statement Ends
$desix = $rollin['desig'];
/// If Else Statement Begins
if($desix == ""){
    $desix = "Undefined";
}
else {
    $desix = "$desix";
}
/// If Else Statement Ends
$coy_starx = $rollin['coy_start'];
/// If Else Statement Begins
if($coy_starx == ""){
    $coy_starx = "Undefined";
}
else {
    $coy_starx = "$coy_starx";
}
/// If Else Statement Ends
$coy_finx = $rollin['coy_finish'];
/// If Else Statement Begins
if($coy_finx == ""){
    $coy_finx = "Undefined";
}
else {
    $coy_finx = "$coy_finx";
}
/// If Else Statement Ends
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
                  <li><a href="about_user?u=<?php echo $username; ?>" class="active">About</a></li>
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
                  <li><a href="./<?php echo $username; ?>">Timeline</a></li>
                  <li><a href="about_user?u=<?php echo $username; ?>" class="active">About</a></li>
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a> <span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a> <span class="text-green"><?php echo $folli; ?></span></li>
                  <li><a href="./<?php echo $username; ?>.trade">Tradefair</a></li>
                  <?php include("lamessage2.php"); ?> 
                  <?php include("followsmall_btn.php"); ?>
                </ul>
              
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <?php include("sider2.php"); ?>
          <div class="col-md-7">

              <!-- About
              ================================================= -->
              <div class="about-profile">
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
                  <!-- About user
            ================================================= -->
            <div>
            	<div class="row">
            		<div class="col-md-7 col-sm-7">
                  <div class="organization">
                    <div class="work-info">
                      <h5>Full Name</h5>
                      <p><?php echo $fnee; ?></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                      <h5>Gender</h5>
                      <p><?php echo $genx; ?></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                      <h5>Country</h5>
                      <p><?php echo $counx; ?></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                      <h5>Religion</h5>
                      <p><?php echo $relx; ?></p>
                    </div>
                  </div>
                </div>
            		<div class="col-md-5 col-sm-5">
                  <div class="organization">
                    <div class="work-info">
                      <h5>Occupation</h5>
                      <p><?php echo $occx; ?></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                      <h5>Phone</h5>
                      <p><?php echo $phonx; ?></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                      <h5>About</h5>
                      <p><?php echo $abtx; ?></p>
                    </div>
                  </div>
                </div>
            	</div>
            </div><!-- About user End -->
                  
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                  <!-- Work Experience
            ================================================= -->
            <div>
            	<div class="row">
            		<div class="col-md-7 col-sm-7">
                  <div class="organization">
                    <div class="work-info">
                      <h5>My Company</h5>
                      <p><?php echo $my_cox; ?></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                      <h5>Designation</h5>
                      <p><?php echo $desix; ?></p>
                    </div>
                  </div>
                </div>
            		<div class="col-md-5 col-sm-5">
                  <div class="organization">
                    <div class="work-info">
                      <h5>Period</h5>
                      <p><?php echo $coy_starx; ?> - <?php echo $coy_finx; ?></p>
                    </div>
                  </div>
                </div>
            	</div>
            </div><!-- Work experience End -->
                </div>
                  
                     <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-book-outline icon-in-title"></i>My University</h4>
                  <!-- My university
            ================================================= -->
            <div>
            	<div class="row">
            		<div class="col-md-7 col-sm-7">
                  <div class="organization">
                    <div class="work-info">
                      <h5>My University</h5>
                      <p><?php echo $myunix; ?></p>
                    </div>
                  </div>
                  
                </div>
            		<div class="col-md-5 col-sm-5">
                  <div class="organization">
                    <div class="work-info">
                      <h5>Period</h5>
                      <p><?php echo $uni_starx; ?> - <?php echo $uni_finx; ?></p>
                    </div>
                  </div>
                </div>
            	</div>
            </div><!-- My university End -->
                </div>
                  
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

  </body>


</html>
