<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

 <?php include("ago.php"); ?>


<?php
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
////////////////
$lacaseid = strip_tags($_POST['lacaseid']);
$lacaseid = $db->real_escape_string($lacaseid); 
$lacaseid = str_replace("'", "&apos;", $lacaseid);    
    
$receiver = strip_tags($_POST['dauser']);
$receiver = $db->real_escape_string($receiver); 
$receiver = str_replace("'", "&apos;", $receiver);    
    
$post = strip_tags($_POST['postxaz']);
$post = $db->real_escape_string($post); 
$post = str_replace("\'", "&apos;", $post);
$post = str_replace("\n", "<br>", $post);
$date_added = date("Y-m-d");
$timm = time();
$added_by = "$user";
$user_posted_to = "$user";
if ($post != "") {
///// first condition
$rechat = $db->query("SELECT * FROM my_chat WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$conchat = $rechat->num_rows;
if ($conchat == 0){
$sqlchat = "INSERT INTO my_chat VALUES('', '$user','$receiver','$timm','','','','','')";  
$quechat = $db->query($sqlchat) or die ($db->error()); 
}
////////
$revii = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$conda = $revii->num_rows;
$rollin = $revii->fetch_assoc();
$lachatee = $rollin['sender'];
if ($lachatee == $user){
$sqlCommand = "INSERT INTO msg_reply VALUES('', '$user','$receiver',?,'$timm','goon','','no','no')";  
$sqlCommand = $db->prepare($sqlCommand) or die ($db->error()); 
$sqlCommand->bind_param("s", $post);
$sqlCommand->execute();  

} else {
$sqlCommand = "INSERT INTO msg_reply VALUES('', '$user','$receiver',?,'$timm','stop','','no','no')";  
$sqlCommand = $db->prepare($sqlCommand) or die ($db->error());  
$sqlCommand->bind_param("s", $post);
$sqlCommand->execute();  
}
///// INITIATE CASE
if($receiver == "support"){
    $currname = "case";
    $updt = $db->prepare("UPDATE match_ph SET paid_status=? WHERE id='$lacaseid'");
    $updt->bind_param("s", $currname);
    $updt->execute(); 
}

echo "Message sent...";
///// end    
}
//////////////////////// END USER LOGIN           
}
?>

