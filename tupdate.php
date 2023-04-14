<?php include "php/connectit.php"; ?>
<?php include("user_script.php"); ?>

<?php include("ago.php"); ?>

<?php 
$receiver = strip_tags($_POST['reva']);
$receiver = $db->real_escape_string($receiver); 
$receiver = str_replace("'","&apos;", $receiver);
//Get Relevant Comments
if($user != ""){
/////////////////////////
//////// Get Body
$get_bodx = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$cabodx = $get_bodx->num_rows;
$rollin = $get_bodx->fetch_assoc();
$bodx = $rollin['message'];     
$sendix = $rollin['sender']; 
$reedix = $rollin['receiver'];
///////////////////
echo "$bodx";
}
?>                  
                  
