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

$receiver = "$reva";

$tima = $_GET['T'];
$tima = str_replace("'","&apos;", $tima);
?>

<?php
if($tima == ""){
    $exxa = "";
} else {
    $exxa = "AND time > $tima";
}

if ($reva !=""){   
$get_comments = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver = '$receiver' $exxa OR sender = '$receiver' AND receiver= '$user' $exxa ORDER BY id ASC");
$count = $get_comments->num_rows;
include("while_chatcheezi.php");                                 
}
?>



