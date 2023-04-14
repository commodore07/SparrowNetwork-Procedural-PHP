<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


 <?php include("ago.php"); ?>


<?php
$receiver = $_GET['U'];
$receiver = $db->real_escape_string($receiver); 
$receiver = str_replace("'","&apos;", $receiver);
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
////////////////
$post = strip_tags($_POST['msgdec']);
$post = $db->real_escape_string($post); 
$post = str_replace("\'","&apos;", $post);
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
$query = $db->prepare($sqlCommand) or die ($db->error()); 
$query->bind_param("s", $post);
$query->execute();

} else {
$sqlCommand = "INSERT INTO msg_reply VALUES('', '$user','$receiver',?,'$timm','stop','','no','no')";  
$query = $db->prepare($sqlCommand) or die ($db->error()); 
$query->bind_param("s", $post);
$query->execute();
}
echo "Message was successfully sent...";
///// end    
}
//////////////////////// END USER LOGIN           
}
?>

