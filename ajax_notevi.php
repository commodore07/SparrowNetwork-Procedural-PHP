<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getinftee = $db->query("SELECT * FROM notify WHERE username='$user' AND emp1!='$user' AND event_id != '' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("delli_loop.php");
?>



 