<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->query("SELECT * FROM ponzee WHERE spar_support='on' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("support_loop.php");
?>



 