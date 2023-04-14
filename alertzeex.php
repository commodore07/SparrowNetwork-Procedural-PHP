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

 $comizz = $_POST['comizz'];
 $comizz = $db->real_escape_string($comizz); 
$comizz = str_replace("'","&apos;", $comizz);

 if ($user != "" && $comizz !=""){
$db->query("UPDATE notifications SET status='yes' WHERE username='$user' AND event='$eveet' AND status='no' AND notifier ='$comizz'");      
$get_lert = $db->query("SELECT * FROM notifications WHERE username='$user' AND event='$eveet' AND status='no' AND notifier ='$comizz'");
$likvetz = $get_lert->num_rows;
echo "";
}
?>



