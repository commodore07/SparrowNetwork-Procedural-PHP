<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$infover = $get_empzza->num_rows;
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
$prevpokk = $rolzaa['previous_deposit'];
$counstatiqax = $rolzaa['coun_stat'];
?>                    
                    
<?php 
$get_pez = $db->query("SELECT * FROM general_details WHERE country_spar='$sparconnn'");
$countcoun = $get_pez->num_rows;

$rocez = $get_pez->fetch_assoc();
$crezzq = $rocez['interest_rate'];
$jarate = $crezzq / 100;

$minimi = $rocez['min_ph'];
$miniph = $rocez['min_ph'];
$miniph = number_format($miniph);

$matageet = $rocez['my_target'];
$geecoinx = $rocez['get_coins'];

$mavviph = $rocez['max_ph'];
$maxxiph = $rocez['max_ph'];
$maxxiph = number_format($maxxiph);

///// GET CURRENCY CODE
$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code']; 
?>        

<?php
///////////// IS USER LOGGED IN?
if($user != ""){
if($countcoun != 0){    
if(!empty($_POST['emppok']) && $infover > 0){    
    
$emppok = strip_tags($_POST['emppok']);
$emppok = $db->real_escape_string($emppok); 
$emppok = str_replace("'", "&apos;", $emppok);
/////Condition for next level
if($prevpokk > $emppok){
    $vion = $db->prepare("UPDATE ponzee SET limit_statuz='on', statlimit_val=?, ph_switch='on' WHERE username=?");
    $vion->bind_param("ss", $emppok, $user);
    $vion->execute();  

    echo "Sorry you current PH can't be lower than your previous PH <img width='20' src='css/emoji/heart_eyes.png'>";
} else if($counstatiqax == "" && $emppok > $mavviph){
    echo "Sorry the maximum PH for your country is $renzie$maxxiph <img width='20' src='css/emoji/heart_eyes.png'>";
} else if($counstatiqax == "" && $emppok < $minimi){
    echo "Sorry the minimum PH for your country is $renzie$miniph <img width='20' src='css/emoji/heart_eyes.png'>";
} else {


$pecet = $jarate * $emppok;

$totrevv = $pecet + $emppok;

$mytargettx = $matageet * $emppok;

$dailyak = $totrevv / 26;
$dailyadd = round($dailyak, 2);

$intdailyak = $totrevv / 26;
$intdailyadd = round($intdailyak, 2);

$latimx = time();
$timelap = $latimx + 1800;

$picxdat = $db->prepare("UPDATE ponzee SET current_deposit=?, unpaid_ph=?, my_target='$mytargettx', ph_revenue='$totrevv', my_bonus='$pecet', ph_timerem='$timelap', unmatched_ph=?, current_day='0', rem_day='26', ph_switch='off', remie_day='6', limit_statuz='', statlimit_val='', wait_stat='on', target_now='$matageet' WHERE username=?");
$picxdat->bind_param("ssss", $emppok, $emppok, $emppok, $user);
$picxdat->execute(); 

$nullkic = "";

if($counstatiqax != ""){
$counwallet = $db->prepare("UPDATE ponzee SET unmatched_ph=?, unmatched_gh=?, e_wallet=? WHERE username=?");
$counwallet->bind_param("ssss", $emppok, $emppok, $emppok, $user);
$counwallet->execute();  
}

// Display things to the page so you can see what is happening for testing purposes
echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();
} 
} else {
    echo "Enter PH amount <img width='20' src='css/emoji/heart_eyes.png'>";
}
} else {
    echo "Country not yet registered!";
}
//////////////////////////////////
}
?>