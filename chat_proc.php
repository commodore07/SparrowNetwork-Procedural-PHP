<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$time_sent = time();
?>

<?php include("ago.php"); ?>	

<?php 
$getid = strip_tags($_POST['getid']);
$getid = $db->real_escape_string($getid);
$getid = str_replace("'","&apos;", $getid);
////////
$getU = strip_tags($_POST['getU']);
$getU = $db->real_escape_string($getU);
$getU = str_replace("'","&apos;", $getU);
////////
$post = strip_tags($_POST['chateec']);
$post = $db->real_escape_string($post);
$post = str_replace("\'", "&apos;", $post);
////////
$tima = strip_tags($_POST['tima']);
$tima = str_replace("'","&apos;", $tima);
////////

if($user != "" && $post != ""){
////////////////
$post = str_replace("\n", "<br>", $post);
$date_added = date("Y-m-d");
$timm = time();
$added_by = "$user";
$user_posted_to = "$getU";
$receiver = "$getU";
if ($post != "") {
///// first condition
$rechat = $db->query("SELECT * FROM my_chat WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$conchat = $rechat->num_rows;
if ($conchat == 0){
$sqlchat = "INSERT INTO my_chat VALUES('', '$user','$receiver','$timm','','','','','')";  
$quechat = $db->query($sqlchat) or die ($db->error()); 
}
else {
    $up_query = $db->query("UPDATE my_chat SET emp1='2', emp2='2' WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user'");
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

if($tima == ""){
    $exxa = "";
} else {
    $exxa = "AND time > $tima";
}

$get_comments = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver = '$receiver' $exxa OR sender = '$receiver' AND receiver= '$user' $exxa ORDER BY id ASC");
$count = $get_comments->num_rows;

while ($comment = $get_comments->fetch_assoc()) {

$messaq = $comment['message'];
$senq = $comment['sender'];
$receiq = $comment['receiver'];
$time = $comment['time'];
$agoz_time = time_ago($time);
$lastaxiz = $comment['status'];
$body = "$messaq";
                                                $geto = $db->query("SELECT * FROM users WHERE username='$senq'");
                                                $get_infoz = $geto->fetch_assoc();
                                                $profilepic_infoz = $get_infoz['profilecrop_pic'];
                                                if ($profilepic_infoz == "") {
                                                 $profilepizz = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepizz = "$profilepic_infoz";
                                                }
												
//////////////////
                                                $getreq = $db->query("SELECT * FROM users WHERE username='$receiq'");
                                                $get_infreq = $getreq->fetch_assoc();
                                                $profilepic_infreq = $get_infreq['profilecrop_pic'];
                                                if ($profilepic_infreq == "") {
                                                 $profilepireq = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepireq = "$profilepic_infreq";
                                                }
												
												

?>
<?php include("tag.php"); ?>	
<?php include("chatty.php"); ?>	                 

<?php
}	    
///// end    
}
//////////////////////// END USER LOGIN           
}
?>