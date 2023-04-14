<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$getU = $_GET['U'];
$getU = $db->real_escape_string($getU);
$getU = str_replace("'", "&apos;", $getU);
$nullz = "";
$noxx = "no";
$likexx = "like";

$time_sent = time();
?>

<?php 
 $follo = strip_tags($_POST['follo']);
 $follo = $db->real_escape_string($follo);
 $follo = str_replace("'", "&apos;", $follo);
 $getid = "$follo";
 ///// Count the likes
 $u_counte = $db->query("SELECT * FROM likes WHERE like_id='$follo'");
$likevaz = $u_counte->num_rows;
////
$likevaz = $likevaz + 1;
//// if else statement
if($likevaz == 0){
    $likevaz = "";
}
else {
    $likevaz = "$likevaz";
}
//// end statement

if ($user != "") {
$u_check = $db->query("SELECT * FROM likes WHERE like_id='$follo' AND liker='$user'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check == 0) {
$likezix = $db->prepare("INSERT INTO likes VALUES (?, ?, ?, ?)");
$likezix->bind_param("ssss", $nullz, $follo, $getU, $user);
$likezix->execute();
///// Notification 
$nofixie = $db->query("SELECT * FROM notifications WHERE event_id='$getid' AND event='like' AND notifier='$user'") or die($db->error());
$counfixie = $nofixie->num_rows;
if($counfixie == 0){
$notifix = $db->prepare("INSERT INTO notifications VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$notifix->bind_param("ssssssssss", $nullz, $getU, $user, $likexx, $time_sent, $nullz, $getid, $noxx, $nullz, $nullz);
$notifix->execute();
}
///// end Notification

//// Check note_statuz
$notuz = $db->query("SELECT * FROM note_statuz WHERE event_id='$getid' AND event='like' AND username='$user'") or die($db->error());
$count_notuz = $notuz->num_rows;
if($count_notuz == 0){ 
$notstaz = $db->prepare("INSERT INTO note_statuz VALUES (?, ?, ?, ?, ?)");
$notstaz->bind_param("sssss", $nullz, $getid, $user, $time_sent, $likexx);
$notstaz->execute();    
}
/// End check note_statuz

//// Delete Existing notifier
$nodetie = $db->query("SELECT * FROM notify WHERE event_id='$getid' AND event='like'") or die($db->error());
$count_detie = $nodetie->num_rows;
if($count_detie > 0 && $getU != "$user"){
$notedelz = $db->prepare("DELETE FROM notify WHERE event_id=? AND event=?");
$notedelz->bind_param("ss", $getid, $likexx);
$notedelz->execute();      
}
///// End Delete query

///// Notifier 
$notiv = $db->query("SELECT * FROM posts WHERE id='$getid'") or die($db->error());
$count_notiv = $notiv->num_rows;
$rollin = $notiv->fetch_assoc();
$empxo = $rollin['added_by'];

if ($empxo != "$user") {
$insetvosk = $db->prepare("INSERT INTO notify VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$insetvosk->bind_param("ssssssss", $nullz, $getU, $likexx, $getid, $time_sent, $user, $nullz, $nullz);
$insetvosk->execute();      
}
///// end Notifier

    echo "$likevaz";
  }
}
  else
  {
   /// do nothing...
  }


?>



