<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$getinfii = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfii->fetch_assoc();
$lastpost = $roz['crimson_last'];
?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->query("SELECT * FROM posts WHERE empty1='crimson' && date_added<='$lastpost' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("while_loop.php");
?>



 