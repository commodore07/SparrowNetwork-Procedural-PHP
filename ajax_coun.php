<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getinfteef = $db->query("SELECT * FROM ponzee WHERE spar_coun != '' AND coun_stat != '' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("coun_loop.php");
?>



 