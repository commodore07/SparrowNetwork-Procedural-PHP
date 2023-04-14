<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php include("ago.php"); ?> 
<?php
//// Get Chatee
$get_chatea = $db->query("SELECT * FROM users WHERE username = '$user'");
$rotea = $get_chatea->fetch_assoc();
$receiver = $rotea['chat_username'];
$timaooo = $rotea['msg_resptime'];
//// End Get Chatee 
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
                        $.post('lacheezva.php?T=<?php echo $timaooo; ?>',{reva: reva},function(data) {
	                  $("#chatgic").html(data);
                          $('#chartex').scrollTop($('#chartex')[0].scrollHeight);
                        });
                        ///// end 
</script>
<?php
$up_query = $db->query("UPDATE my_chat SET emp1='' WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user'");
}
?>