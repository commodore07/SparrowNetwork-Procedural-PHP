<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
 
<?php 
$post = strip_tags($_POST['post']);
$post = $db->real_escape_string($post); 
$post = str_replace("'","&apos;", $post);

$chateez = strip_tags($_POST['chateez']);
$chateez = $db->real_escape_string($chateez); 
$chateez = str_replace("'","&apos;", $chateez);

$tino = time();
if ($user != "" && $post != "") {
/////////// Get Chatee    
$get_mechat = $db->query("SELECT * FROM my_chat WHERE sender = '$user' AND receiver= '$chateez' OR sender = '$chateez' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$camchat = $get_mechat->num_rows;
$rochat = $get_mechat->fetch_assoc();
$chatus = $rochat['chat_status']; 
if($chatus != "$user"){
$chee_sub = $db->query("UPDATE my_chat SET chat_status = '$user' WHERE sender='$user' AND receiver='$chateez' OR sender='$chateez' AND receiver='$user'"); 
}
///////////// MARK AS SEEN
//////// Get Body
$get_bodx = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$chateez' OR sender = '$chateez' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$cabodx = $get_bodx->num_rows;
$rollin = $get_bodx->fetch_assoc();
$bodx = $rollin['message'];     
$sendix = $rollin['sender']; 
$emp1 = $rollin['emp1'];  
$reedix = $rollin['receiver'];
if($reedix == "$user" && $emp1 == ""){    
$seen_query = $db->query("UPDATE msg_reply SET emp1='seen' WHERE emp1='' AND receiver='$user' AND sender='$sendix'"); 
}
////////////  END MARK
/////////// End get chatee    
$info_sub = $db->query("UPDATE my_chat SET time_sent = '$tino' WHERE sender='$user' AND receiver='$chateez' OR sender='$chateez' AND receiver='$user'");     
}
else
{
//////////////////////
}
?>
