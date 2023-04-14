<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php 
$time_sent = time();
?>

<?php include("ago.php"); ?>	

<?php 
$getid = strip_tags($_POST['getid']);
$getid = $db->real_escape_string($getid); 
////////
$getU = strip_tags($_POST['getU']);
$getU = $db->real_escape_string($getU); 
////////
$post = strip_tags($_POST['arteec']);
$post = $db->real_escape_string($post); 
$post = str_replace("\'", "&apos;", $post);
////////
$timazzoq = strip_tags($_POST['timazzoq']);
$timazzoq = str_replace("'","&apos;", $timazzoq);
////////

if ($getid != "" && $post != "") {
    
//// Comment Condition
if($user == ""){
    $user = "anonymous";
}
else {
    $user = "$user";
}
////     
    
$date_added = date("Y-m-d");
$timm = time();
$added_by = "$user";
$user_posted_to = "$user";
$nullz = "";

$sqlCommand = $db->prepare("INSERT INTO post_comments VALUES (?, ?, ?, ?, ?, ?)");
$sqlCommand->bind_param("ssssss", $nullz, $post, $user, $added_by, $timm, $getid);
$sqlCommand->execute();

///// Notification 
$commeod = "comment";
$noix = "no";
$sqlnotifi = $db->prepare("INSERT INTO notifications VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sqlnotifi->bind_param("ssssssssss", $nullz, $getU, $user, $commeod, $time_sent, $nullz, $getid, $noix, $nullz, $nullz);
$sqlnotifi->execute();
///// end Notification

//// Check note_statuz
$notuz= $db->prepare("SELECT * FROM note_statuz WHERE event_id=? AND event=? AND username=?" ) or die($db->error());
$notuz->bind_param("sss", $getid, $commeod, $user);
$notuz->execute();
$notuz = $notuz->get_result();
$count_notuz = $notuz->num_rows;
if($count_notuz == 0){
$sqlnotstax = $db->prepare("INSERT INTO note_statuz VALUES (?, ?, ?, ?, ?)");
$sqlnotstax->bind_param("sssss", $nullz, $getid, $user, $time_sent, $commeod);
$sqlnotstax->execute();    
}
/// End check note_statuz

//// Delete Existing notifier
$nodetie= $db->prepare("SELECT * FROM notify WHERE event_id=? AND event=?" ) or die($db->error());
$nodetie->bind_param("ss", $getid, $commeod);
$nodetie->execute();
$nodetie = $nodetie->get_result();
$count_detie = $nodetie->num_rows;
if($count_detie > 0 && $getU != "$user"){
$sqldelz = $db->prepare("DELETE FROM notify WHERE event_id=? AND event=?");
$sqldelz->bind_param("ss", $getid, $commeod);
$sqldelz->execute();     
}
///// End Delete query

///// Notifier 
$notiv= $db->prepare("SELECT * FROM posts WHERE id=?" ) or die($db->error());
$notiv->bind_param("s", $getid);
$notiv->execute();
$notiv = $notiv->get_result();
$count_notiv = $notiv->num_rows;
$rollin = $notiv->fetch_assoc();
$empxo = $rollin['added_by'];

if ($empxo != "$user") {  
$insetvos = $db->prepare("INSERT INTO notify VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$insetvos->bind_param("ssssssss", $nullz, $getU, $commeod, $getid, $time_sent, $user, $nullz, $nullz);
$insetvos->execute();      
}
///// end Notifier
if($timazzoq > 0){
$gettoo= $db->prepare("SELECT * FROM post_comments WHERE post_id=? AND time > ? ORDER BY id ASC" ) or die($db->error());
$gettoo->bind_param("ss", $getid, $timazzoq);
$gettoo->execute();
} else {
$gettoo= $db->prepare("SELECT * FROM post_comments WHERE post_id=? ORDER BY id ASC" ) or die($db->error());
$gettoo->bind_param("s", $getid);
$gettoo->execute();
}
$get_comments = $gettoo->get_result();
$count = $get_comments->num_rows;

while ($comment = $get_comments->fetch_assoc()) {

$comment_body = $comment['post_body'];
$posted_to = $comment['posted_to'];
$posted_by = $comment['posted_by'];
$time = $comment['time'];
$agoz_time = time_ago($time);
$body = "$comment_body";

$geto= $db->prepare("SELECT * FROM users WHERE username=?" ) or die($db->error());
$geto->bind_param("s", $posted_by);
$geto->execute();
$geto = $geto->get_result();
                                                $get_infoz = $geto->fetch_assoc();
                                                $profilepic_infoz = $get_infoz['profilecrop_pic'];
                                                if ($profilepic_infoz == "") {
                                                 $profilepizz = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepizz = "$profilepic_infoz";
                                                }
												
												
												
												

?>
	

<?php include("tag.php"); ?>												

                                <div class="chat-room">
                    <div class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
                        <div class="chat_box touchscroll chat_box_colors_a">
<?php
if($posted_by != "$user"){
?>                            
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <img src="<?php echo $profilepizz; ?>" alt="" class="profile-photo-sm" />
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        @<a href="./<?php echo $posted_by; ?>"><?php echo $posted_by; ?></a>&nbsp;
                                        <span style="font-size: 11px; color: #999;"><i class="fa fa-clock-o"></i><?php echo $agoz_time; ?></span>
                                        <p style="word-break: normal;"> <?php echo $body; ?></p>
                                    </li>
                                    
                                </ul>
                            </div>
<?php 
}
else {
?>                            
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <img src="<?php echo $profilepizz; ?>" alt="" class="profile-photo-sm" />
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        @<a href="./<?php echo $posted_by; ?>"><?php echo $posted_by; ?></a>&nbsp;
                                        <span style="font-size: 11px; color: #999;"><i class="fa fa-clock-o"></i><?php echo $agoz_time; ?></span>
                                        <p style="word-break: normal;"> <?php echo $body; ?></p>
                                    </li>
                                </ul>
                            </div>
<?php 
}
?>                          
                      	</div>
                      </div>         
                </div>
<?php											
}	
}
?>