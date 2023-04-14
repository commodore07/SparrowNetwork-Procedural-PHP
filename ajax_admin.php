<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getinfteef = $db->query("SELECT * FROM users ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("admin_loop.php");
?>



 