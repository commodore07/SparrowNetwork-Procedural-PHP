<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
  
/////////////
$getmedver = $db->query("SELECT * FROM ponzee WHERE username='$user'") or die($db->error());
$infover = $getmedver->num_rows;

if(!empty($_POST['revevminam']) && $infover > 0){    

$phusername = strip_tags($_POST['pavoq']);
$phusername = $db->real_escape_string($phusername); 
$phusername = str_replace("'", "&apos;", $phusername);

$ghusername = strip_tags($_POST['revevminam']);
$ghusername = $db->real_escape_string($ghusername); 
$ghusername = str_replace("'", "&apos;", $ghusername);

/////sparrow error alert!!!
////GET BULLION
$get_bullion = $db->query("SELECT * FROM ponzee WHERE username='$phusername'");
$rolbullion = $get_bullion->fetch_assoc();
$bullstat = $rolbullion['coun_stat'];

////GET RESERVE
$get_revo = $db->query("SELECT * FROM ponzee WHERE username='$ghusername'");
$rolrevo = $get_revo->fetch_assoc();
$revostat = $rolrevo['coun_stat'];
//// end sparrow error alert

if($bullstat != "" && $revostat != ""){
    echo "Opps... Sparrow error alert!";
} else {
$get_hegrix = $db->query("SELECT * FROM ponzee WHERE username='$phusername'");
$rolgrix = $get_hegrix->fetch_assoc();
$unmatchph = $rolgrix['unmatched_ph'];

$unmatchgh = strip_tags($_POST['amvoq']);
$unmatchgh = $db->real_escape_string($unmatchgh); 
$unmatchgh = str_replace("'", "&apos;", $unmatchgh);

if($unmatchgh == "0" || $unmatchph == "0" || $unmatchgh == "" || $unmatchph == ""){
    echo "Invalid PH or GH";
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
/////sms
$get_phone = $db->query("SELECT * FROM users WHERE username='$phusername'");
$rolphone = $get_phone->fetch_assoc();
$fonee = $rolphone['phone'];
///// SMS SCRIPT
$pono = "$fonee";  
$titmet = "Chirp";
$memet = "Hello $phusername... You have been matched to pay. http://sparrownetwork.net";
include("sms_script.php");    
//////

// Display things to the page so you can see what is happening for testing purposes
if($user == "admin"){
echo "<meta http-equiv=\"refresh\" content=\"0; url=match_ph\">";
} else if($user == "$ghusername") {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=phpool\">";
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=ghpool\">";
}
}
}
}else {
    ///////////////Do Nothing
}

//////////////////////////////////
}
?>