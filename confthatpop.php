<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

 <?php include("ago.php"); ?>

<?php
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
////////////////

////// Insert Query Option 1
$popid = strip_tags($_POST['popconfid']);
$popid = $db->real_escape_string($popid); 
$popid = str_replace("'", "&apos;", $popid);
//////
$get_popid = $db->query("SELECT * FROM match_ph WHERE id='$popid'");
$rollin = $get_popid->fetch_assoc();
$repid = $rollin['receiver'];
$provipid = $rollin['provider'];
$amtpid = $rollin['amt_matched'];

////////// ARITHMETIC FLOW
$get_forrec = $db->query("SELECT * FROM ponzee WHERE username='$repid'");
$rorecc = $get_forrec->fetch_assoc();
$miewallet = $rorecc['e_wallet'];
$mewithdraw = $rorecc['my_withdraw'];
if($mewithdraw == ""){
    $mewithdraw = 0;
} else {
    $mewithdraw = "$mewithdraw";
}
$totalwithdz = $mewithdraw + $amtpid;

$get_forpaya = $db->query("SELECT * FROM ponzee WHERE username='$provipid'");
$ropaya = $get_forpaya->fetch_assoc();
$unpaid_ph = $ropaya['unpaid_ph'];
$prowallet = $ropaya['e_wallet'];
$cabamt = $ropaya['cabal_amt'];
if($cabamt == ""){
    $cabamt = 0;
} else {
    $cabamt = "$cabamt";
}
$totacabamt = $cabamt + $amtpid;

$refme = $ropaya['referee'];

$payrem = $unpaid_ph - $amtpid;
$walletrem = $miewallet - $amtpid;

$timp = time();

$cablapse = $timp + 3110400;

//// for provider
$get_provobb = $db->query("SELECT * FROM match_ph WHERE provider = '$provipid' AND paid_status != 'paid'");
$get_povobiok = $get_provobb->fetch_assoc();
$probizz = $get_provobb->num_rows;
if($probizz == 1){
$empowerme = $db->query("UPDATE ponzee SET providehelp_match='off' WHERE username='$provipid'");
}
$poqpay = $db->query("UPDATE match_ph SET paid_status='paid' WHERE id='$popid'");

$updatecabz = $db->query("UPDATE ponzee SET cabal_amt='$totacabamt' WHERE username='$provipid'");

if($payrem == 0){
$empowerme = $db->query("UPDATE ponzee SET gethelp_match='on', cabal_lapse='$cablapse', cablast_ph='$timp' WHERE username='$provipid'");
}
$proovepay = $db->query("UPDATE ponzee SET unpaid_ph='$payrem' WHERE username='$provipid'");
$drawallet = $db->query("UPDATE ponzee SET e_wallet='$walletrem', my_withdraw='$totalwithdz' WHERE username='$repid'");
///// TRANSACTION HISTORY
$short_date = date("d/m/Y");
$long_date = date("l,F,j,g:iA");
$provi_desc = "CSH PD/REF=@$repid";
$receive_desc = "CSH IFO SELF/REF=@$provipid";
$tranzat_amt = "$amtpid";
$timcress = time();
if($prowallet == ""){
    $pbal_tran = 0;
} else{
    $pbal_tran = "$prowallet";
}
$recexwallet = "$walletrem";

///////////GIVE REFERRAL BONUS
$get_refbox = $db->query("SELECT * FROM ponzee WHERE username='$refme'");
$robox = $get_refbox->fetch_assoc();
$eboxiz = $robox['e_wallet'];

$get_pez = $db->query("SELECT * FROM general_details WHERE country_spar='Nigeria'");
$rocez = $get_pez->fetch_assoc();
$bonuxinx = $rocez['bonus_inx'];

$bonuex = $amtpid * $bonuxinx;
$newewalet = $eboxiz + $bonuex;
$caboodesc = "BONUS/CABAL/@$provipid";
$bozwallet = $db->query("UPDATE ponzee SET e_wallet='$newewalet' WHERE username='$refme'");
$givebonoz = $db->query("INSERT INTO trans_history VALUES ('','$refme','$long_date','$caboodesc','$bonuex','$newewalet','$timcress','$short_date','$eboxiz','')");
////////// END GIVE REFERAL BONUS

///////////INSERT QUERY
$placepro = $db->query("INSERT INTO trans_history VALUES ('','$provipid','$long_date','$provi_desc','$tranzat_amt','$pbal_tran','$timcress','$short_date','$prowallet','')");
$reciopro = $db->query("INSERT INTO trans_history VALUES ('','$repid','$long_date','$receive_desc','$tranzat_amt','$recexwallet','$timcress','$short_date','$miewallet','')");
echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();
////// End Query
}
?>

