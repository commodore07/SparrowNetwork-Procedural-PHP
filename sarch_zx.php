<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
 
<?php 
$post = strip_tags($_POST['sarchwozx']);
$post = $db->real_escape_string($post); 
$post = str_replace("'","&apos;", $post);
$tino = time();
if ($user != "" && $post != "") {
/////////// Search Query Begins
$getrellit = $db->prepare("SELECT * FROM users WHERE username = ? OR fullname = ? OR phone = ? ORDER BY id DESC" ) or die($db->error());    
$getrellit->bind_param("sss", $post, $post, $post);
$getrellit->execute();
$getrellit = $getrellit->get_result();

$relcount = $getrellit->num_rows;

$getinftee = $db->prepare("SELECT * FROM users WHERE username = ? OR fullname = ? OR phone = ? ORDER BY RAND() LIMIT 5" ) or die($db->error());
$getinftee->bind_param("sss", $post, $post, $post);
$getinftee->execute();
$getinftee = $getinftee->get_result();

while ($roz = $getinftee->fetch_assoc()) {
                                                
                                                $id = $roz['id'];
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
                                                $laphon = $roz['phone'];
                                                if($laphon == ""){
                                                    $laphon = "Missing phone number";
                                                } else {
                                                    $laphon = "$laphon";
                                                }
$usename = "$unom";                                                   
?>              
              <div >
                <img src="<?php echo $prof_pic; ?>" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                      <h5><a href="./<?php echo $unom; ?>" class="profile-link"><?php echo $fnom; ?></a> <span class="following">@<a href="./<?php echo $unom; ?>"><?php echo $unom; ?></a></span></h5>
                    <p class="text-muted"><?php echo $laphon; ?></p>
                  </div>
                  <div class="reaction">
                     <div>
<?php
$followe = "$post";
if($user != ""){
$cheztax = $db->query("SELECT * FROM invite WHERE follower='$user' && followe='$followe'");
// Count the amount of rows where username = $un
$chaxcount = $cheztax->num_rows;
?>    
    
<div id="felkax">
<?php 
if ($chaxcount == 0) {
?>        
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Invite</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Revoke</button>
<?php 
}
else {
?>    
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Invite</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Revoke</button>
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
    $.post('invite.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unfollowxizaz<?php echo $id; ?>').click(function() {
    
    var follo = "<?php echo $usename; ?>";
    $.post('uninvite.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>                          
                          
                      	
                      </div>
                  </div>
                    <br>
                </div>
              </div>
         
<?php 
}
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
<div style="text-align: center;"><?php echo $relcount; ?> results found...</div>
<?php
////////// End Search Query    
}
}
?>
