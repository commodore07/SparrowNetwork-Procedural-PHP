<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->query("SELECT * FROM trans_history WHERE username='$user' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("tranhist_loop.php");
?>



 