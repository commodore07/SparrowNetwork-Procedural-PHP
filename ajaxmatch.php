<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->query("SELECT * FROM ponzee WHERE unmatched_ph !='' && block_time = '' && unmatched_ph != '0' && coun_stat !='reserve' ORDER BY id ASC LIMIT ".$load.",10") or die($db->error());
include("while_match.php");
?>



 