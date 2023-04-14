<?php 
while ($comment = $get_vazz->fetch_assoc()) {
    $id = $comment['id'];
    $receiver = $comment['receiver'];
    $reever = $comment['receiver'];
    $sender = $comment['sender'];
if($sender == "$user"){
    $receiver = "$receiver";
}
else {
    $receiver = "$sender";
}
$get_photz = $db->query("SELECT * FROM users WHERE username='$receiver'");
$rollin = $get_photz->fetch_assoc();
$fneez = $rollin['fullname'];
$propix = $rollin['profile_pic'];
                                                $propix2 = $rollin['profilecrop_pic'];
                                                /// Profile pic Begins
                                                if ($propix2 == "") {
                                                    $propixy="img/default_pic2.jpg";
                                                }
                                                else{
                                                    $propixy="$propix2";
                                                }
                                                /// Profile pic Ends
                                                
//////// Get Body
$get_bodx = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$cabodx = $get_bodx->num_rows;
$rollin = $get_bodx->fetch_assoc();
$bodx = $rollin['message']; 
$emp1 = $rollin['emp1']; 
$bazever = $rollin['receiver']; 
$latime = $rollin['time']; 
$senzzar = $rollin['sender']; 
$idv = $rollin['id']; 
$gotime = time_ago($latime);
//// if else statement
if($senzzar == "$user"){
    $receivask = "$bazever";
}
else {
    $receivask = "$senzzar";
}
//// ends
?> 
        
                      
                    <li>
                      <a href="#contact-1" data-toggle="tab">
                        <div class="contact">
                        	<img src="<?php echo $propixy; ?>" alt="" class="profile-photo-sm pull-left"/>
                        	<div class="msg-preview">
                        		<h6><?php echo $fneez; ?></h6>
                                        <p id="chatvix<?php echo $id; ?>" class="text-muted"><?php echo $bodx; ?></p>
                                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo "$gotime"; ?> ago</small>
                            <div id="lealert<?php echo $id; ?>">            
                            <?php 
                            if($emp1 == "seen" && $bazever != "$user"){
                            ?>
                                        <div class="seen">
                                            <i style="color: blue;" class="icon ion-checkmark-round"></i>
                                        </div>
                            <?php 
                            } else if($emp1 != "seen" && $bazever != "$user"){
                            ?>
                                        <div class="seen">
                                            <i class="icon ion-checkmark-round"></i>
                                        </div>
                            <?php 
                            } else if($bazever == "$user" && $emp1 != "seen"){
                            ///// Count unread chats
                            $get_chazz = $db->query("SELECT * FROM msg_reply WHERE sender = '$senzzar' AND receiver = '$user' AND emp1 != 'seen'");
                            $cachazz = $get_chazz->num_rows;    
                            ///////// End count    
                            ?>
                                        <div class="chat-alert"><?php echo $cachazz; ?></div>
                            <?php 
                            } 
                            ?>
                            </div>
                        	</div>
                        </div>
                      </a>
                        <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable delete</strong></div>
                          <p>Enable this if you want to delete all conversations with <?php echo $receiver; ?></p>
                        </div>
                      </div>
                        <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label id="delstat<?php echo $id; ?>" class="switch">
                           

<input id="follow_activ<?php echo $id; ?>" type="checkbox">

                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                      
<script>
$(document).ready(function() {
    $('#follow_activ<?php echo $id; ?>').click(function() {
    var foll_val = "<?php echo $receiver; ?>";
    $.post('deletemsg.php',{foll_val: foll_val},function(data) {
        $("#delstat<?php echo $id; ?>").html(data);
    });
});
});
</script>
                      
                  </div> 
                    </li>
                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#lealert<?php echo $id; ?>').load('mgsnox.php?didi=<?php echo $idv; ?>&S=<?php echo $senzzar; ?>&R=<?php echo $receivask; ?>&Ree=<?php echo $reever; ?>&ideex=<?php echo $id; ?>')
                                      }, 2000);  
                                    })
                                    </script>
<?php 
}
?>