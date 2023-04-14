<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
/////////////
$getmedver = $db->query("SELECT * FROM ponzee WHERE username='$user'") or die($db->error());
$infover = $getmedver->num_rows;

if(!empty($_POST['terminam']) && !empty($_POST['termires']) && $infover > 0){    
    
$terminam = strip_tags($_POST['terminam']);
$terminam = $db->real_escape_string($terminam); 
$terminam = str_replace("'", "&apos;", $terminam);

$termires = strip_tags($_POST['termires']);
$termires = $db->real_escape_string($termires); 
$termires = str_replace("'", "&apos;", $termires);

$picxdat = $db->prepare("UPDATE ponzee SET current_deposit='', my_target='', ph_revenue='', my_bonus='', ph_timerem='', unmatched_ph='', unpaid_ph='', emp_interest='', current_day='0', rem_day='0', ph_switch='on', remie_day='0', limit_statuz='', statlimit_val='', wait_stat='off', reject_reason=? WHERE username='$terminam'");
$picxdat->bind_param("s", $termires);
$picxdat->execute();

// Display things to the page so you can see what is happening for testing purposes
} else {
    ///////////////Do Nothing
}
echo "<meta http-equiv=\"refresh\" content=\"0; url=match_ph\">";
exit();

//////////////////////////////////
}
?>