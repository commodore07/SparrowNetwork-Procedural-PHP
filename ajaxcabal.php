<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$timcov = time();

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->query("SELECT * FROM ponzee WHERE referee = '$user' AND cabal_lapse > '$timcov' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include ("while_cabal.php");
?>



 