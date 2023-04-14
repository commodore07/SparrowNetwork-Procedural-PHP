<?php 
$getphh = $db->query("SELECT * FROM ponzee WHERE username != '$user' AND unmatched_ph !='' AND unmatched_ph != '0' AND ph_timerem < '$timframe' AND coun_stat = '' AND block_time = '' AND spar_coun='$sparconnn' ORDER BY id ASC LIMIT 1" ) or die($db->error());
$counmazii = $getphh->num_rows;
if($counmazii > 0){

$rolphh = $getphh->fetch_assoc();
$lauserz = $rolphh['username'];
$phnotmatch = $rolphh['unmatched_ph'];

$get_hegrix = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolgrix = $get_hegrix->fetch_assoc();
$unmatchgh = $rolgrix['unmatched_gh'];

$phusername = "$lauserz"; 
$unmatchph = "$phnotmatch";
$ghusername = "$user";

if($user == ""){
    //// DO NOTHING
} else{
/////////// ANALYSIS FOR UNMATCHED PH, GH    
if($unmatchph > $unmatchgh){
    $diffenz = $unmatchph - $unmatchgh;
    $phsubtraz = "$diffenz";
} else {
    $diffenz = $unmatchgh - $unmatchph;
    $phsubtraz = 0;
}
////////// END ANALYSIS FOR UNMATCHED PH, GH

/////////// ANALYSIS FOR UNMATCHED GH, PH
if($unmatchgh > $unmatchph){
    $setghh = $unmatchgh - $unmatchph;
    $settraz = "$setghh";
} else {
    $setghh = $unmatchph - $unmatchgh;
    $settraz = 0;
}
////////// END ANALYSIS FOR UNMATCHED PH, GH
    
$providedat = $db->query("UPDATE ponzee SET providehelp_match='on', wait_stat='off', unmatched_ph='$phsubtraz' WHERE username='$phusername'");

if($phsubtraz == 0){
    $diffisclear = $db->query("UPDATE ponzee SET matchph_stat='on' WHERE username='$phusername'");
}

$offoppwstatus = $db->query("UPDATE ponzee SET ghz_staz='off', unmatched_gh='$settraz' WHERE username='$ghusername'");

$timx = time();
$dadayz = date('l'); 

//// WEEK DAY ANALYSIS
if ($dadayz == "Friday" || $dadayz == "Saturday"){
    $elapse_time = $timx + 345600;
} else if ($dadayz == "Sunday"){
    $elapse_time = $timx + 259200;
} else {
    $elapse_time = $timx + 172800;
}
//// END WEEK DAY ANALYSIS

if($unmatchgh > $unmatchph){
    $matvaxx = "$unmatchph";
} else {
    $matvaxx = "$unmatchgh";
}

$hash_cmd = "INSERT INTO match_ph VALUES('', '$phusername','$ghusername','$timx','$matvaxx','','$elapse_time','','','','','','','','')";  
$hash_query = $db->query($hash_cmd) or die ($db->error());
}
}
?>