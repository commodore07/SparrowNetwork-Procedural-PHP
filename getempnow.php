<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$infover = $get_empzza->num_rows;
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
$prevpokk = $rolzaa['previous_deposit'];
$spar_support = $rolzaa['spar_support'];
$counstatiqax = $rolzaa['coun_stat'];
$currdepz = $rolzaa['current_deposit'];
if($currdepz == ""){
    $currdepz = 0;
} else {
    $currdepz = "$currdepz";
}
$emptrest = $rolzaa['emp_interest'];
if($emptrest == ""){
    $emptrest = 0;
} else {
    $emptrest = "$emptrest";
}
$prevenue = $rolzaa['ph_revenue'];
if($prevenue == ""){
    $prevenue = 0;
} else {
    $prevenue = "$prevenue";
}
$suppdivid = $prevenue - $currdepz;
$suppdividi = number_format($suppdivid);

$lawallex = $rolzaa['e_wallet'];
$umatchghx = $rolzaa['unmatched_gh'];
if($umatchghx == ""){
    $umatchghx = 0;
} else {
    $umatchghx = "$umatchghx";
    $unzzghh = number_format($umatchghx);
}
?>                    
                    
<?php 
$get_pez = $db->query("SELECT * FROM general_details WHERE country_spar='$sparconnn'");
$rocez = $get_pez->fetch_assoc();
$crezzq = $rocez['interest_rate'];
$jarate = $crezzq / 100;

$matageet = $rocez['my_target'];
$geecoinx = $rocez['get_coins'];

$mavvigh = $rocez['max_gh'];
$maxxigh = $rocez['max_gh'];
$maxxigh = number_format($maxxigh);

///// GET CURRENCY CODE
$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code']; 
?>        

<?php
///////////// IS USER LOGGED IN?
if($user != ""){
if(!empty($_POST['getpok']) && $infover > 0){     
$emppok = strip_tags($_POST['getpok']);
$emppok = $db->real_escape_string($emppok); 
$emppok = str_replace("'", "&apos;", $emppok);
////////// CONDITIONS
$ghsaxxz = $umatchghx + $emppok;   
$latimx = time();
$timelap = $latimx + 1800;
$unmaxxx = $umatchghx + $emppok;
if($spar_support != "on"){
if($ghsaxxz > $lawallex){
    echo "You already have a pending GH of $renzie$unzzghh <img width='20' src='css/emoji/heart_eyes.png'>";
} else
if($emppok > $lawallex){
    echo "Opps... Insufficient funds <img width='20' src='css/emoji/heart_eyes.png'>";
} else
if($counstatiqax == "" && $emppok > $mavvigh){
    echo "Sorry the maximum GH for your country is $renzie$maxxigh <img width='20' src='css/emoji/heart_eyes.png'>";
} else {
$picxree = $db->prepare("UPDATE ponzee SET gh_timx='$timelap', unmatched_gh=?, ghz_staz='on' WHERE username='$user'");
$picxree->bind_param("s", $unmaxxx);
$picxree->execute(); 
echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit(); 
}
}
/////////CONDITION FOR SUPPORT SALARY
if($spar_support == "on"){
    $unmayyy = $emptrest + $emppok;
    $suppdivid = $suppdivid + 1;
    if($unmayyy < $suppdivid){
$picxdat = $db->prepare("UPDATE ponzee SET gh_timx='$timelap', emp_interest=?, unmatched_gh=?, ghz_staz='on' WHERE username='$user'");
$picxdat->bind_param("ss", $unmaxxx, $unmaxxx);
$picxdat->execute(); 
echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit(); 
    } else {
        echo "Oops! your salary is $renzie$suppdividi <img width='20' src='css/emoji/heart_eyes.png'>";
    }
}
/////// END SUPPORT
} else {
    echo "Enter GH amount <img width='20' src='css/emoji/heart_eyes.png'>";
}
//////////////////////////////////
}
?>