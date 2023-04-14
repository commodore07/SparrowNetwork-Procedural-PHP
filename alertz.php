<?php include("php/connectit.php"); ?>
<?php include("ago.php"); ?> 
<?php include("user_script.php"); ?>
<?php 
if($user == ""){
    $user = "anonymous";
}
else {
    $user = "$user";
}
?>
<?php
$eveet = $_GET['E'];
$eveet = $db->real_escape_string($eveet); 
$eveet = str_replace("'","&apos;", $eveet);

 $comizz = strip_tags($_POST['comizz']);
 $comizz = $db->real_escape_string($comizz); 
 $comizz = str_replace("'","&apos;", $comizz);
 if ($comizz !=""){
$db->query("UPDATE notifications SET status='yes' WHERE event_id='$comizz' AND event='$eveet'");      
$get_lert = $db->query("SELECT * FROM notifications WHERE event_id='$comizz' AND event='$eveet' AND status='no'");
$likvetz = $get_lert->num_rows;
echo "";
}
?>



