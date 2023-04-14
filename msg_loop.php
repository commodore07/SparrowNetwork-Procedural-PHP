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
$timolee = $rollin['time']; 
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

<script>   
$(document).ready(function() {
    $('#chatit<?php echo $id; ?>').click(function() {   
    document.getElementById("chazynew").innerHTML = "<center><img src='./loader2.gif'></center>";   
    document.getElementById("chatgic").innerHTML = "<center><img src='./loader2.gif'></center>";     
    var log_magicnew = document.getElementById("chatgic");
               // jquery fade-out fade-in begins
                $("#chatgic").delay(1000).fadeOut("slow", function() {
                    log_magicnew.innerHTML = "";	        
                });
                $("#chatgic").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends         
    var fn = "<?php echo $timolee; ?>";
    document.getElementById("id_chat").innerHTML="<?php echo $id; ?>"; 
    document.getElementById("added_chat").innerHTML="<?php echo $receiver; ?>";
    document.getElementById("tima_chat").innerHTML="<?php echo $timolee; ?>";     
    $.post('chatz.php?uzar=<?php echo $bazever; ?>&I=<?php echo $idv; ?>&recaz=<?php echo $receiver; ?>&sedaz=<?php echo $senzzar; ?>',{post: fn},function(data) {
        //// Profile pic small
         var reva = "<?php echo $receiver; ?>";
        $.post('cheezi3.php',{reva: reva, timox: fn},function(data) {   
	$("#chazynew").html(data);
        $('#chartex').scrollTop($('#chartex')[0].scrollHeight);
        });
        ///// end 
        //// Get comment time
        var chiv = "<?php echo $receiver; ?>";
        $.post('chattime.php',{chiv: chiv},function(data) {   
	$("#tima_chat").html(data);
        });
        ///// end 
        $("#spartox").html(data);                
    });
});
});
</script>     
                      
                    <li id="chatit<?php echo $id; ?>" data-toggle="modal" data-target=".chatmod">
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