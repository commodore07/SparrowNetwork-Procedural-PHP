<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php 
$getlasx = $db->query("SELECT * FROM posts WHERE empty1='crimson' ORDER BY id DESC LIMIT 1") or die($db->error());
$infolasx = $getlasx->num_rows;
$rollin = $getlasx->fetch_assoc();
$latim = $rollin['date_added'];
$info_subasx = $db->query("UPDATE users SET crimson_last='$latim', adsenze='$latim' WHERE username='$user'"); 
?>
