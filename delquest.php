<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
/////////////
$getmedver = $db->query("SELECT * FROM ponzee WHERE username='$user'") or die($db->error());
$infover = $getmedver->num_rows;

if($infover > 0){    

$picxdat = $db->query("UPDATE ponzee SET current_deposit='', ph_revenue='', my_target='', my_bonus='', ph_timerem='', unmatched_ph='', unpaid_ph='', emp_interest='', current_day='0', rem_day='0', ph_switch='on', remie_day='0', limit_statuz='', statlimit_val='', wait_stat='off', reject_reason='' WHERE username='$user'");
// Display things to the page so you can see what is happening for testing purposes
} else {
    ///////////////Do Nothing
}
echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();

//////////////////////////////////
}
?>