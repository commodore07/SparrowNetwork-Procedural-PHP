<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php 
$username = $_GET['U'];
$username = $db->real_escape_string($username); 
$username = str_replace("'","&apos;", $username);
?>

<?php 
$getlasx = $db->query("SELECT * FROM posts WHERE added_by='$username' ORDER BY id DESC LIMIT 1") or die($db->error());
$infolasx = $getlasx->num_rows;
$rollin = $getlasx->fetch_assoc();
$latim = $rollin['date_added'];
$info_subasx = $db->query("UPDATE users SET profile_last='$latim', adsenze='$latim' WHERE username='$user'"); 
?>
