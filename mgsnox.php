<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php include("ago.php"); ?> 
<?php
$id = $_GET['didi'];
$id = $db->real_escape_string($id); 
$id = str_replace("'","&apos;", $id);

$sender = $_GET['S'];
$sender = $db->real_escape_string($sender); 
$sender = str_replace("'","&apos;", $sender);

$receiver = $_GET['R'];
$receiver = $db->real_escape_string($receiver); 
$receiver = str_replace("'","&apos;", $receiver);

$reevax = $_GET['Ree'];
$reevax = $db->real_escape_string($reevax); 
$reevax = str_replace("'","&apos;", $reevax);

$ideex = $_GET['ideex'];
$ideex = $db->real_escape_string($ideex); 
$ideex = str_replace("'","&apos;", $ideex);
/////////////////
?>

<?php 
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
?>

<?php 
$get_mechat = $db->query("SELECT * FROM my_chat WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$camchat = $get_mechat->num_rows;
$rochat = $get_mechat->fetch_assoc();
$tichat = $rochat['time_sent'];
$lachastat = $rochat['chat_status']; 
$tinsa = time();
$watime = $tinsa - $tichat;
if($lachastat != $user && $watime < 2){
?>
<div class="seen" style="color: green; font-size: 12px;">
    <?php echo $receiver; ?> is typing...
</div>
<?php 
} else {
?>

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

<?php 
}
?>    
                                        
<?php 
$get_idit = $db->query("SELECT * FROM my_chat WHERE sender = '$user' AND receiver= '$receiver' AND chat_status != '$user' AND emp1= '2' OR sender = '$receiver' AND receiver= '$user' AND chat_status != '$user' AND emp1= '2' ORDER BY id DESC LIMIT 1");
$camidit = $get_idit->num_rows;
if($camidit > 0){
?>    
<script>
                        //// Profile pic small
                        var reva = "<?php echo $receiver; ?>";
                        $.post('tupdate.php',{reva: reva},function(data) {
	                  $("#chatvix<?php echo $ideex; ?>").html(data);
                        });
                        ///// end 
</script>
<?php
}
?> 

<?php 
$get_veet = $db->query("SELECT * FROM my_chat WHERE sender = '$user' AND receiver= '$receiver' AND chat_status = '$user' AND emp2= '2' OR sender = '$receiver' AND receiver= '$user' AND chat_status = '$user' AND emp2= '2' ORDER BY id DESC LIMIT 1");
$camveet = $get_veet->num_rows;
if($camveet > 0){
?>    
<script>
                        //// Profile pic small
                        var reva = "<?php echo $receiver; ?>";
                        $.post('tupdate.php',{reva: reva},function(data) {
	                  $("#chatvix<?php echo $ideex; ?>").html(data);
                        });
                        ///// end 
</script>
<?php
$up_query = $db->query("UPDATE my_chat SET emp2='' WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user'");
}
?>        