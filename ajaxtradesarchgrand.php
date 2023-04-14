<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>
<?php 
$temooo = (!empty($_GET['term']) ? $_GET['term'] : null);
$temooo = $db->real_escape_string($temooo); 
$temooo = str_replace("'","&apos;", $temooo);
?>  
<?php 
$username = $_GET['U'];
$username = $db->real_escape_string($username); 
$username = str_replace("'","&apos;", $username);

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->prepare("SELECT * FROM tradefair WHERE name LIKE CONCAT('%',?,'%') ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
$getposts->bind_param("s", $temooo);
$getposts->execute();
$getposts = $getposts->get_result();

include("trade_loop.php");
?>



 