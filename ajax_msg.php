<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$get_vazz = $db->query("SELECT * FROM my_chat WHERE sender = '$user' OR receiver= '$user' ORDER BY time_sent DESC LIMIT ".$load.",10") or die($db->error());
include("msg_loop.php");
?>



 