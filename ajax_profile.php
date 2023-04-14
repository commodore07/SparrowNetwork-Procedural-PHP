<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$getinfii = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfii->fetch_assoc();
$lastpost = $roz['profile_last'];
?>

<?php 
$username = $_GET['U'];
$username = $db->real_escape_string($username); 
$username = str_replace("'","&apos;", $username);
?>

<?php 
$wello = "AND date_added <= '$lastpost'";
if($user == ""){
    $wello = "";
} else {
    $wello = "$wello";
}

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->query("SELECT * FROM posts WHERE user_posted_to='$username' $wello ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("while_loop.php");
?>



 