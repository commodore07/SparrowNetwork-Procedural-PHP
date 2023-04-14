<?php 
while ($comment = $get_comments->fetch_assoc()) {

$comment_body = $comment['post_body'];
$posted_to = $comment['posted_to'];
$posted_by = $comment['posted_by'];
$time = $comment['time'];
$agoz_time = time_ago($time);

$body = "$comment_body";

$geto = $db->query("SELECT * FROM users WHERE username='$posted_by'");
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
?>