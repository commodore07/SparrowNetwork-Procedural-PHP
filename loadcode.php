<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php
$daildy_date = date("d/m/Y");

$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
$rextarget = $rolzaa['target_now'];
$curdepozi = $rolzaa['current_deposit'];
$unmatchghx = $rolzaa['unmatched_gh'];
$todatee = $rolzaa['today_datee'];
$unmatchphx = $rolzaa['unmatched_ph'];
?>                    
                    
<?php 
$get_pez = $db->query("SELECT * FROM general_details WHERE country_spar='$sparconnn'");
$rocez = $get_pez->fetch_assoc();
$crezzq = $rocez['interest_rate'];
$jarate = $crezzq / 100;
$mineegh = $rocez['min_gh'];

$matageet = $rocez['my_target'];
$geecoinx = $rocez['get_coins'];
?> 

<?php 
if($rextarget != $matageet && $curdepozi != ""){
    $newtagezi = $curdepozi * $matageet;
    
    $uptagexiz = $db->query("UPDATE ponzee SET my_target='$newtagezi', target_now='$matageet' WHERE username='$user'");   
}
?>

<?php 
$short_date = date("d/m/Y");
$timm = time();

$getlasx = $db->query("SELECT * FROM ponzee WHERE username='$user'") or die($db->error());
$rollin = $getlasx->fetch_assoc();
$accstaz = $rollin['active_statux'];
$cabal_lapse = $rollin['cabal_lapse'];
$counvibo = $rollin['coun_stat'];
$phrev = $rollin['ph_revenue'];
$ph_timerem = $rollin['ph_timerem'];
$gh_timx = $rollin['gh_timx'];
$ponzlastupp = $rollin['last_update'];
$ewallevee = $rollin['e_wallet'];
$macycle = $accstaz + 1;
$infolasx = $getlasx->num_rows;
if($infolasx > 0){
if($accstaz < 7){    
$newcycle = $accstaz + 1;  
}
else if($macycle > 7){
$newcycle = 1;
}
if($ewallevee > $mineegh){
if($todatee != $daildy_date){    
$sqlCommav = "UPDATE ponzee SET active_statux='$newcycle', today_datee='$short_date' WHERE username='$user'";  
$queryav = $db->query($sqlCommav) or die ($db->error()); 
}
}
} else {
    ////// DO NOTHING
}
//////////ADD INTEREST
$get_terest = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$roltrest = $get_terest->fetch_assoc();
$gmatchstat = $roltrest['gethelp_match'];
$vwallet = $roltrest['v_wallet'];
$cdax = $roltrest['current_day'];
$ewallex = $roltrest['e_wallet'];
$currdeps = $roltrest['current_deposit'];
if($currdeps == ""){
    $currdeps = 0;
} else {
    $currdeps = "$currdeps";
}
$unpaidph = $roltrest['unpaid_ph'];
if($unpaidph == ""){
    $unpaidph = 0;
} else {
    $unpaidph = "$unpaidph";
}
$metargie = $roltrest['my_target'];
$mobonux = $roltrest['my_bonus'];
if($mobonux == ""){
    $mobonux = 0;
} else {
    $mobonux = "$mobonux";
}
$counstat = $roltrest['coun_stat'];
if($ewallex == ""){
    $ewallex = 0;
} else {
    $ewallex = "$ewallex";
}
$meearnik = $roltrest['my_earnings'];
if($meearnik == ""){
    $meearnik = 0;
} else {
    $meearnik = "$meearnik";
}
$nucico = $roltrest['emp_cycle'];
$cdepeex = $roltrest['current_deposit'];

if($cdax < 20){
    $emptrest = $currdeps / 20;
} if ($cdax > 19){
    $carrx = $phrev - $currdeps;
    $emptrest = $carrx / 6;
}
$increxizik = $ewallex + $emptrest;
$increxiz = $ewallex + $emptrest;

if($unpaidph < 1 && $currdeps > 0){
///// TRANSACTION HISTORY
$short_date = date("d/m/Y");
$long_date = date("l,F,j,g:iA");
$provi_desc = "FUND TFR/SPARROW IFO SELF";
$tranzat_amt = "$emptrest";
$tranzat_amt = round($tranzat_amt, 2);
$timcress = time();
$pbal_tran = "$ewallex"; 
        $increarnx = $meearnik + $emptrest;
        $currdai = $cdax + 1;
    if($cdax < 26){
    if($cdax < 20){
        if($todatee != $daildy_date){
        $updatadaz = $db->query("UPDATE ponzee SET current_day='$currdai', e_wallet='$increxiz', my_earnings='$increarnx' WHERE username='$user'");
        if($tranzat_amt != 0){
        $placeveeko = $db->query("INSERT INTO trans_history VALUES ('','$user','$long_date','$provi_desc','$tranzat_amt','$increxiz','$timcress','$short_date','$pbal_tran','')");   
        }
        }
    } else if($cdax > 19){
        /////////// Bonus script
$bonudex = $mobonux - $emptrest;        
        
$timcpin = time();
$totalpin = 0;      
$getinpin = $db->query("SELECT * FROM ponzee WHERE referee = '$user' AND cabal_lapse > '$timcpin'" ) or die($db->error());
$counpin = $getinpin->num_rows;
if($counpin > 0){
while ($ropin = $getinpin->fetch_assoc()) {
$exp_ampin = $ropin['cabal_amt'];
////get total cabal
$pzipin = array ($exp_ampin);
$valupin = array_sum ($pzipin);
$totalpin +=$valupin;
$gr_topin = "$totalpin"; 
}
$bonuxkey = "$gr_topin";
}
if($bonuxkey == "$metargie" || $bonuxkey > "$metargie"){
if($todatee != $daildy_date){    
    ////// add bonus interest
$updatadaqa = $db->query("UPDATE ponzee SET my_bonus='$bonudex', current_day='$currdai', e_wallet='$increxiz', my_earnings='$increarnx' WHERE username='$user'");   
if($tranzat_amt != 0){
$placeproqa = $db->query("INSERT INTO trans_history VALUES ('','$user','$long_date','$provi_desc','$tranzat_amt','$increxiz','$timcress','$short_date','$pbal_tran','')");  
}
}
}
    }

///////////INSERT QUERY
    }
    if($cdax == 26){
        $newcy = $nucico + 1;
        $clearponzee = $db->query("UPDATE ponzee SET emp_cycle='$newcy', current_deposit='', previous_deposit='$cdepeex', ph_revenue='', my_target='', my_bonus='', emp_interest='', current_day='0', rem_day='0', ph_switch='on', gethelp_match='', unmatched_ph='', gh_switch='', reject_reason='', providehelp_match='', prove_pay='', remie_day='', limit_statuz='', statlimit_val='', wait_stat='', ph_timerem='', matchph_stat='', unpaid_ph='' WHERE username='$user'");
    }
}
$tibox = time();
if($user != "support" || $user != "admin"){
$db->query("UPDATE general_details SET last_userlog='$tibox' WHERE country_spar='Nigeria'");  
}
///// Update timer lapse
$get_ngn = $db->query("SELECT * FROM general_details WHERE country_spar='Nigeria'");
$rongn = $get_ngn->fetch_assoc();
$lastngn = $rongn['last_update'];

if($ponzlastupp != $lastngn){
    $cablapse = $lastngn + $cabal_lapse;
    $ghtimz = $lastngn + $gh_timx;
    $phtrem = $lastngn + $ph_timerem;
    //// UPDATE LAPSE
    $updatlapsx = $db->query("UPDATE ponzee SET cabal_lapse='$cablapse', gh_timx='$ghtimz', ph_timerem='$phtrem' WHERE username='$user'");
    $newlastupdate = $db->query("UPDATE ponzee SET last_update='$lastngn' WHERE username='$user'");
}
?>


<?php 
//////AUTO-MATCH SCRIPT
////auto match GH request
$timframe = time();
if($ph_timerem < $timframe){
if($unmatchphx != "" && $unmatchphx != 0 && $counvibo == ""){    
include("gh_automatch.php");
}
}

if($gh_timx < $timframe){
if($unmatchghx != "" && $unmatchghx != 0 && $counvibo == ""){     
include("ph_automatch.php");
}
}

//// auto-match confirm
$get_confex = $db->query("SELECT * FROM match_ph WHERE provider = '$user' AND time_elapse < '$timframe' AND paid_status != 'paid' AND paid_status != 'case' OR receiver = '$user' AND time_elapse < '$timframe' AND paid_status != 'paid' AND paid_status != 'case' ORDER BY id ASC LIMIT 1");
$counconfex = $get_confex->num_rows;
$rozfex = $get_confex->fetch_assoc();
$confxid = $rozfex['id'];
///// Payment proof
$get_payproove = $db->query("SELECT * FROM pay_proof WHERE payme_id = '$confxid'");
$counproove = $get_payproove->num_rows;

if($counconfex > 0 && $counproove > 0){
    include("auto_confirm.php");
} 

if($counconfex > 0 && $counproove < 1){
    include("auto_block.php");
}
?>

<?php
////// UPDATE TODAY'S DATE
if($todatee != $daildy_date){
$update_date = $db->query("UPDATE ponzee SET today_datee='$daildy_date' WHERE username='$user'"); 
}
?>
