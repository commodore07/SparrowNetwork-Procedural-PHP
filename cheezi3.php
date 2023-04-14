<?php include("php/connectit.php"); ?>
<?php include("ago.php"); ?> 
<?php include("user_script.php"); ?>
<?php 
if($user == ""){
    $user = "anonymous";
}
else {
    $user = "$user";
}
?>
<?php
$reva = strip_tags($_POST['reva']);
$reva = $db->real_escape_string($reva); 
$reva = str_replace("'","&apos;", $reva);

$timox = strip_tags($_POST['timox']);
$timox = str_replace("'","&apos;", $timox);
?>
<?php
$get_coxol = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver = '$reva' OR sender = '$reva' AND receiver= '$user' ORDER BY id ASC");
$countox = $get_coxol->num_rows;

if($countox > 50){
include("view_chatz.php");
}
?>
<?php
if ($reva !=""){   
$gettoo = "(SELECT * FROM msg_reply WHERE sender = '$user' AND receiver = '$reva' OR sender = '$reva' AND receiver= '$user' ORDER BY id DESC LIMIT 50) ORDER BY id ASC";
$get_comments = $db->query($gettoo);
$count = $get_comments->num_rows;
include("while_chatcheezi.php");                                 
}
?>



