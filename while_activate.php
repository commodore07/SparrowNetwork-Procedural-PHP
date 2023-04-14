<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$body = $row['body'];
                                                $artteez = substr($body, 0, 250);
                                                if (strlen($body) > 249) {
                                                    $body = "$artteez...";
                                                }
                                                else {
                                                    $body = "$body";
                                                }
                                                $boddie = $row['body'];
                                                $boddie = str_replace("#", "", $boddie);
                                                $leetube = $row['youtube_url'];
                                                $adcod = $row['emp1'];
                                                $vexiox = $row['vee1'];  
						$date_added = $row['date_added'];
                                                $artu = substr($boddie, 0, 110);
                                                $artu = "$artu...";
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];
						if($date_added != ""){
                                                $ago_time = time_ago($date_added);
                                                } else {
                                                    $ago_time = "";
                                                }
						$pazz = $row['profile'];
						$sharee = $row['sharee'];
						$kuzz = $row['emp2'];
                                                $kuzzie = $row['emp1'];
                                                $empty1 = $row['empty1'];
                                                $empty2 = $row['empty2'];
                                                $hashlee = $row['hashtag'];
                                                ////////////// Reduce share text
                                                $shareelee = substr($hashlee, 0, 230);
                                                if (strlen($hashlee) > 229) {
                                                    $hashlee = "$shareelee...<a style='cursor: pointer;' onClick='comments$id()' data-toggle='modal' data-target='.comments'>Read more</a>";
                                                }
                                                else {
                                                    $hashlee = "$hashlee";
                                                }
                                                ///////////// End reduce share text
                                                $hashaz = $row['hash_id'];
                                                if($hashaz != ""){
                                                $pub_time = time_ago($hashaz);
                                                } else {
                                                    $pub_time = "";
                                                }
                                                
if(file_exists($pazz) && $pazz != ""){
    $pazz = "$pazz";
}
else if(!file_exists($pazz) && $pazz != "") {
    $pazz = "deleted.jpg";
}
else {
    $pazz = "";
}
                                                
$getinf = $db->query("SELECT * FROM users WHERE username='$added_by' ORDER BY id DESC LIMIT 1" ) or die($db->error());
while ($roz = $getinf->fetch_assoc()) {
    
                                                $fname = $roz['fullname'];
    
}                                                
                                                                               
                                                if ($pazz == "") {
                                                 $pazzy = "";
                                                }
                                                else
                                                {
                                                    
                                                 $pazzy = "<center><img style='max-width: 100%;' src='$pazz' alt='post-image' class='img-rounded' /></center>";   
                                                    
                                                }
						
						$get_user_info = $db->query("SELECT * FROM users WHERE username='$added_by'");
                                                $get_info = $get_user_info->fetch_assoc();
                                                $profilepic_info = $get_info['profilecrop_pic'];
                                                if ($profilepic_info == "") {
                                                 $profilepic_info = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepic_info = "$profilepic_info";
                                                }
                                                
      ?>

<?php include("tag.php"); ?>						
 
<?php 
if($empty1 == "profilepic"){
    $lazstax = "Updated profile photo";
}
else if ($empty1 == "backgroundpic"){
    $lazstax = "Updated background photo";
}
else if($empty1 == "share"){
    $lazstax = "Shared @<a href='$sharee'>$sharee</a>'s chirp";
}
else if($empty1 == "tradefairpic"){
    $lazstax = "Added product on tradefair";
}
else if($empty2 != ""){
    $lazstax = "$empty2";
}
else {
    $lazstax = "Published a chirp";
}
?> 
 
<!-- Post Content
            ================================================= -->
            <div class="post-content">  
<?php 
if($adcod == "adsense"){
?> 
  <?php include("adcode.php"); ?>           
<?php 
}
?>                
              <div class="post-container">
                <img src="<?php echo $profilepic_info; ?>" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                      <h5><a href="./<?php echo $added_by; ?>" class="profile-link"><?php echo $fname; ?></a> <span class="following">@<a class="text-green" href="./<?php echo $added_by; ?>"><?php echo $added_by; ?></a></span></h5>
                    <p class="text-muted"><?php echo $lazstax; ?></p>
                  </div>
                  <div class="reaction">
                    
                    <div class="text-green"><i class="fa fa-clock-o"></i> <?php echo $ago_time; ?> ago</div>
                  </div>
                </div>
                  <div class="line-divider"></div>
                  
<?php 
if($leetube == "" || $empty2 != ""){
?>                  
                  <?php echo $pazzy; ?>
<?php 
}
?>                  

<p style="color: #000; margin: 10px;"> <?php echo $body; ?> </p>
<div class="line-divider"></div>
<?php 
$get_sharee = $db->query("SELECT * FROM users WHERE username='$sharee'");
$rolee = $get_sharee->fetch_assoc();
$fleexa = $rolee['fullname'];
$propixa = $rolee['profilecrop_pic'];
if($propixa == ""){
    $propixa = "./img/default_pic2.jpg";
}
else {
    $propixa = "$propixa";
}
?>                  
<?php 
if($empty1 == "share"){
?>                  
                  
                <div class="post-detail">
                    <img style="margin-right: 10px;" src="<?php echo $propixa; ?>" alt="user" class="profile-photo-sm pull-left" />
                  <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link"><?php echo $fleexa; ?></a> <span class="following">@<a class="text-green" href="./<?php echo $sharee; ?>"><?php echo $sharee; ?></a></span></h5>
                    <p class="text-muted">Published <?php echo $pub_time; ?> ago</p>
                  </div>
                  
                  <div class="post-comment">
                    
                    <p><?php echo $hashlee; ?></p>
                  </div>
                </div>
<?php 
}
?> 
                  
 <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Activate chirp</strong></div>
                          <p>Enable this if you want to activate this tradefair chirp</p>
                        </div>
                      </div>
                        <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label class="switch">
<?php 
$get_teexx = $db->query("SELECT * FROM tradefair WHERE brand='$vexiox'");
$rolliwxx = $get_teexx->fetch_assoc();
$idxx = $rolliwxx['id']; 

$get_dixx = $db->query("SELECT * FROM tradefair WHERE id='$idxx'");
$get_infoxx = $get_dixx->fetch_assoc();
$follow_statoxx = $get_infoxx['la_activ'];
if($follow_statoxx == "on"){
?>                              
<input id="follow_activ<?php echo $id; ?>" name="pagitix<?php echo $id; ?>" type="checkbox" checked>
<?php 
} else {
?>
<input id="follow_activ<?php echo $id; ?>" name="pagitix<?php echo $id; ?>" type="checkbox">
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
    $('#follow_activ<?php echo $id; ?>').click(function() {
    var foll_val = $("input[name='pagitix<?php echo $id; ?>']:checked").val();
    $.post('activate_trade.php?idx=<?php echo $id; ?>',{foll_val: foll_val});
});
});
</script>
                      
                  </div> 
                  
              </div>
            </div>
                                                
<?php
}
?>

