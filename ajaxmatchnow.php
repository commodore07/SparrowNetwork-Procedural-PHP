<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$sparconnn = $_GET['C'];
$sparconnn = $db->real_escape_string($sparconnn); 
$sparconnn = str_replace("'","&apos;", $sparconnn);

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->query("SELECT * FROM ponzee WHERE spar_coun='$sparconnn' AND unmatched_gh != '0' AND block_time = '' AND unmatched_gh != '' AND coun_stat !='bullion' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("while_matchnow.php");
?>



 