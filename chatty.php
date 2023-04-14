<?php 
$lapixa = $comment['cond'];
?>
<div class="chat-room">
                    <div class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
                        <div class="chat_box touchscroll chat_box_colors_a">
<?php
if($senq != "$user" && $lastaxiz == "stop"){
?>                            
                            <div class="chat_message_wrapper">
                                <?php 
                                if($lapixa != "no"){
                                ?>
                                <img style="margin: 10px;" src="<?php echo $lapixa; ?>" alt="" class="img-rounded" />
                                <?php 
                                }
                                ?>
                                <div class="chat_user_avatar">
                                    <img src="<?php echo $profilepizz; ?>" alt="" class="profile-photo-sm" />
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        @<a href="./<?php echo $senq; ?>"><?php echo $senq; ?></a>&nbsp;
                                        <span style="font-size: 11px; color: #999;"><i class="fa fa-clock-o"></i><?php echo $agoz_time; ?></span>
                                        <p style="word-break: normal;"> <?php echo $body; ?></p>
                                    </li>
                                    
                                </ul>
                            </div>
<?php 
}
else if($senq != "$user" && $lastaxiz == "goon") {
?>                            
                            <div class="chat_message_wrapper">
                                <?php 
                                if($lapixa != "no"){
                                ?>
                                <img style="margin: 10px;" src="<?php echo $lapixa; ?>" alt="" class="img-rounded" />
                                <?php 
                                }
                                ?>
                                <ul class="chat_message">
                                    <li>
                                        @<a href="./<?php echo $senq; ?>"><?php echo $senq; ?></a>&nbsp;
                                        <span style="font-size: 11px; color: #999;"><i class="fa fa-clock-o"></i><?php echo $agoz_time; ?></span>
                                        <p style="word-break: normal;"> <?php echo $body; ?></p>
                                    </li>
                                </ul>
                            </div>
<?php 
}
else if($senq == "$user" && $lastaxiz == "stop") {
?>                            
                            <div class="chat_message_wrapper chat_message_right">
                                <?php 
                                if($lapixa != "no"){
                                ?>
                                <img style="margin: 10px;" src="<?php echo $lapixa; ?>" alt="" class="img-rounded" />
                                <?php 
                                }
                                ?>
                                <div class="chat_user_avatar">
                                    <img src="<?php echo $profilepizz; ?>" alt="" class="profile-photo-sm" />
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        @<a href="./<?php echo $senq; ?>"><?php echo $senq; ?></a>&nbsp;
                                        <span style="font-size: 11px; color: #999;"><i class="fa fa-clock-o"></i><?php echo $agoz_time; ?></span>
                                        <p style="word-break: normal;"> <?php echo $body; ?></p>
                                    </li>
                                </ul>
                            </div>
<?php 
}
else if($senq == "$user" && $lastaxiz == "goon") {
?>                            
                            <div class="chat_message_wrapper chat_message_right">
                                <?php 
                                if($lapixa != "no"){
                                ?>
                                <img style="margin: 10px;" src="<?php echo $lapixa; ?>" alt="" class="img-rounded" />
                                <?php 
                                }
                                ?>
                                <ul class="chat_message">
                                    <li>
                                        @<a href="./<?php echo $senq; ?>"><?php echo $senq; ?></a>&nbsp;
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