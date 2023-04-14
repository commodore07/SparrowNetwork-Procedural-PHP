<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$reva = (!empty($_GET['R']) ? $_GET['R'] : null);
$reva = $db->real_escape_string($reva); 
$reva = str_replace("'","&apos;", $reva);

$comtime = (!empty($_GET['T']) ? $_GET['T'] : null);
$comtime = str_replace("'","&apos;", $comtime);
?>  

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 50;
$load = $db->real_escape_string($load); 

$gettoo = "(SELECT * FROM msg_reply WHERE sender = '$user' AND receiver = '$reva' AND time < $comtime OR sender = '$reva' AND receiver= '$user' AND time < $comtime ORDER BY id DESC LIMIT ".$load.",100) ORDER BY id ASC";
$get_comments = $db->query($gettoo);
include("while_chatcheezi.php"); 
?>



 