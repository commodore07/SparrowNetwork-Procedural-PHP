<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?> 
<?php include("ago.php"); ?>

<?php 
$comid = (!empty($_GET['I']) ? $_GET['I'] : null);
$comid = $db->real_escape_string($comid); 
$comid = str_replace("'","&apos;", $comid);

$comtime = (!empty($_GET['T']) ? $_GET['T'] : null);
$comtime = str_replace("'","&apos;", $comtime);
?>  

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$gettoo = "(SELECT * FROM post_comments WHERE post_id='$comid' AND time < $comtime ORDER BY id DESC LIMIT ".$load.",100) ORDER BY id ASC";
$get_comments = $db->query($gettoo);
include("while_cheezi.php");
?>



 