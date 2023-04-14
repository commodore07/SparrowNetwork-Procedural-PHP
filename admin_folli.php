<?php 
//// Get Followers
$gatfoll = $db->query("SELECT * FROM follows WHERE followe='$unexee'");
$follcoonz = $gatfoll->num_rows;
$fola = "$follcoonz";
//// Get Following
$gatfovaz = $db->query("SELECT * FROM follows WHERE follower='$unexee'");
$follzonx = $gatfovaz->num_rows;
$folli = "$follzonx";
?>