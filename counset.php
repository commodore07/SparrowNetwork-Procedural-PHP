<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$unexee = $_GET['UN'];
$unexee = $db->real_escape_string($unexee); 
$unexee = str_replace("'","&apos;", $unexee);

$post = strip_tags($_POST['follo']);
$post = $db->real_escape_string($post); 
$post = str_replace("'", "&apos;", $post);
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

<!-- Basic Information
              ================================================= -->
              <div id="cizaz" class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit basic information</h4>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                    
<?php 
$mingh = 0;
$maxgh = 0;
$get_user_info = $db->query("SELECT * FROM general_details WHERE country_spar='$post'");
$get_info = $get_user_info->fetch_assoc();
$minph = $get_info['min_ph'];
if($minph == ""){
    $minph = "0";
} else {
    $minph = "$minph";
}
$minph = number_format($minph);
$maxph = $get_info['max_ph'];
if($maxph == ""){
    $maxph = "0";
} else {
    $maxph = "$maxph";
}
$maxph = number_format($maxph);
$mingh = $get_info['min_gh'];
if($mingh == ""){
    $mingh = "0";
} else {
    $mingh = "$mingh";
}
$mingh = number_format($mingh);
$maxgh = $get_info['max_gh'];
if($maxgh == ""){
    $maxgh = "0";
} else {
    $maxgh = "$maxgh";
}
$maxgh = number_format($maxgh);
$intspav = $get_info['interest_rate'];  
$copyspav = $get_info['copy_right'];  

$matigett = $get_info['my_target'];  
$getticoin = $get_info['get_coins'];  
?>                    
                    
                    <form onsubmit="return false" name="basic-info" id="basic-info" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>Minimum PH</label>
                        <input id="mineeph" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Minimum PH" placeholder="Minimum PH" value="<?php echo $minph; ?>" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Maximum PH</label>
                        <input id="maxeeph" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Maximim PH" placeholder="Maximim PH" value="<?php echo $maxph; ?>" />
                      </div>
                    </div>
                        
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>Minimum GH</label>
                        <input id="mineegh" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Minimum GH" placeholder="Minimum GH" value="<?php echo $mingh; ?>" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Maximum GH</label>
                        <input id="maxeegh" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Maximum GH" placeholder="Maximum GH" value="<?php echo $maxgh; ?>" />
                      </div>
                    </div>    
                        
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>Target Rate</label>
                        <input id="tagratee" maxlength="12" class="form-control input-group-lg" type="text" title="Target Rate" placeholder="Target Rate" value="<?php echo $matigett; ?>" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Coin switch</label>
                        <input id="cswixxi" maxlength="12" class="form-control input-group-lg" type="text" title="Coin Switch" placeholder="Coin Switch" value="<?php echo $getticoin; ?>" />
                      </div>
                    </div>       
                        
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label>Interest rate</label>
                        <input id="inteerate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Interest rate" placeholder="Interest rate" value="<?php echo $intspav; ?>" />
                      </div>
                    </div>
                       
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label>Copyright</label>
                        <input id="copreet" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Copyright" placeholder="Copyright" value="<?php echo $copyspav; ?>" />
                      </div>
                    </div>    
                   
                      <button onclick="ajazz_post()" class="btn btn-primary">Save Changes</button>
                      <center><div style="height: 14px;" id="statoo"></div></center>
                  </form>
                    
<script>
function ajazz_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "coun_update.php?contry=<?php echo $post; ?>";
    var mineeph = document.getElementById("mineeph").value;
	var maxeeph = document.getElementById("maxeeph").value;
	var mineegh = document.getElementById("mineegh").value;
        var maxeegh = document.getElementById("maxeegh").value;
        var inteerate = document.getElementById("inteerate").value;
        var copreet = document.getElementById("copreet").value;
        var tagratee = document.getElementById("tagratee").value;
        var cswixxi = document.getElementById("cswixxi").value;
        var log_too = document.getElementById("statoo");
    var vars = "mineeph="+mineeph+"&maxeeph="+maxeeph+"&mineegh="+mineegh+"&maxeegh="+maxeegh+"&inteerate="+inteerate+"&copreet="+copreet+"&tagratee="+tagratee+"&cswixxi="+cswixxi;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("statoo").innerHTML = return_data;
                 // jquery fade-out fade-in begins
                $("#statoo").delay(3000).fadeOut("slow", function() {
                    log_too.innerHTML = "";	        
                });
                $("#statoo").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends       
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("statoo").innerHTML = "<img src='./lodaa.gif'>";	
}
</script>   
                    
                </div>
              </div>