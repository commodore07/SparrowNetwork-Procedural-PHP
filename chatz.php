<?php include "php/connectit.php"; ?>
<?php include("user_script.php"); ?>

<?php include("ago.php"); ?>

<?php 

$receiver = $_GET['recaz'];
$receiver = $db->real_escape_string($receiver); 
$receiver = str_replace("'","&apos;", $receiver);

$id = $_GET['I'];
$id = $db->real_escape_string($id); 
$id = str_replace("'","&apos;", $id);

$rezaax = $_GET['uzar'];
$rezaax = $db->real_escape_string($rezaax); 
$rezaax = str_replace("'","&apos;", $rezaax);

$sedaz = $_GET['sedaz'];
$sedaz = $db->real_escape_string($sedaz); 
$sedaz = str_replace("'","&apos;", $sedaz);
//Get Relevant Comments
if($user != ""){
/////////////////////////
//////// Get Body
$get_bodx = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$cabodx = $get_bodx->num_rows;
$rollin = $get_bodx->fetch_assoc();
$bodx = $rollin['message'];     
$sendix = $rollin['sender']; 
$timolee = $rollin['time']; 
$reedix = $rollin['receiver'];
if($reedix == "$user"){    
$seen_query = $db->query("UPDATE msg_reply SET emp1='seen' WHERE emp1='' AND receiver='$user' AND sender='$sendix'"); 
}
/////// Update chat username
$req_query = $db->query("UPDATE users SET chat_username='$receiver', msg_resptime='$timolee' WHERE username='$user'"); 
////// End update
echo "";
}
?>                  
                  
