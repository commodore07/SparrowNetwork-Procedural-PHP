<?php 
//// Get Followers
$gatfoll = $db->query("SELECT * FROM follows WHERE followe='$username'");
$follcoonz = $gatfoll->num_rows;
$fola = "$follcoonz";
//// Get Following
$gatfovaz = $db->query("SELECT * FROM follows WHERE follower='$username'");
$follzonx = $gatfovaz->num_rows;
$folli = "$follzonx";
?>