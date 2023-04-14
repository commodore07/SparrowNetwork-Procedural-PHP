<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
 
<?php 
$post = strip_tags($_POST['sarchword']);
$post = $db->real_escape_string($post); 
$tino = time();
if ($post != "") {
/////////// Search Query Begins
$getrellit = $db->prepare("SELECT * FROM users WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') ORDER BY id DESC" ) or die($db->error());    
$getrellit->bind_param("ss", $post, $post);
$getrellit->execute();
$getrellit = $getrellit->get_result();

$relcount = $getrellit->num_rows;

$getinftee = $db->prepare("SELECT * FROM users WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') ORDER BY RAND() LIMIT 5" ) or die($db->error());
$getinftee->bind_param("ss", $post, $post);
$getinftee->execute();
$getinftee = $getinftee->get_result();

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
<?php 
if($relcount == 0){
?>
<div style="text-align: center; margin-top: 10px;">No match found</div>
<?php 
} else if($relcount == 1) {
?>
<div style="text-align: center;"><?php echo $relcount; ?> result found...</div>
<?php
////////// End Search Query    
} else if($relcount < 6) {
?>
<div style="text-align: center;"><?php echo $relcount; ?> results found...</div>
<?php
////////// End Search Query    
} else {
?>
<div style="text-align: center;"><a href="search_results?term=<?php echo $post; ?>">See all <?php echo $relcount; ?> results...</a></div>
<?php
////////// End Search Query    
}
}
?>
