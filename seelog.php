<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $follo = strip_tags(@$_POST['follo']);
 $follo = $db->real_escape_string($follo); 

if ($user != "") {
$date_added = date("Y-m-d");    
$getrellit = $db->query("SELECT * FROM users WHERE login_date = '$date_added'" ) or die($db->error());    
$relcount = $getrellit->num_rows;    
    
$getinftee = $db->query("SELECT * FROM users WHERE login_date = '$date_added' ORDER BY RAND()" ) or die($db->error());
while ($roz = $getinftee->fetch_assoc()) {
    
                                                $unom = $roz['username'];
                                                $fnom = $roz['fullname'];
                                                $gend = $roz['gender'];
                                                $prof_pic = $roz['profilecrop_pic'];
                                                if($prof_pic == ""){
                                                    $prof_pic = "./img/default_pic2.jpg";
                                                }
                                                else {
                                                    $prof_pic = "$prof_pic";
                                                }
                                                $coun = $roz['country'];
                                                $rel = $roz['religion'];
                                                   
?>              
              <div >
                <img src="<?php echo $prof_pic; ?>" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                      <h5><a href="./<?php echo $unom; ?>" class="profile-link"><?php echo $fnom; ?></a> <span class="following">@<a href="./<?php echo $unom; ?>"><?php echo $unom; ?></a></span></h5>
                    <p class="text-muted"><?php echo $coun; ?></p>
                  </div>
                  <div class="reaction">
                    <a class="btn text-green"><?php echo $gend; ?></a>
                    <a class="btn text-red"><?php echo $rel; ?></a>
                  </div>
                  <div class="line-divider"></div>
                </div>
              </div>
         
<?php 
}
?>
<div style="text-align: center;"><?php echo $relcount; ?> logged in</div>
<?php
}
?>



