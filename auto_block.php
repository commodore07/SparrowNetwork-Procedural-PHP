<?php 
$popid = "$confxid";
$get_popid = $db->query("SELECT * FROM match_ph WHERE id='$popid'");
$rollin = $get_popid->fetch_assoc();
$repid = $rollin['receiver'];
$provipid = $rollin['provider'];
$amtpid = $rollin['amt_matched'];

////////// ARITHMETIC FLOW
$get_forrec = $db->query("SELECT * FROM ponzee WHERE username='$repid'");
$rorecc = $get_forrec->fetch_assoc();
$miewallet = $rorecc['e_wallet'];
$mewithdraw = $rorecc['unmatched_gh'];
if($mewithdraw == ""){
    $mewithdraw = 0;
} else {
    $mewithdraw = "$mewithdraw";
}
$totalunmatchgh = $mewithdraw + $amtpid;

$get_forpaya = $db->query("SELECT * FROM ponzee WHERE username='$provipid'");
$ropaya = $get_forpaya->fetch_assoc();
$unpaid_ph = $ropaya['unpaid_ph'];
if($unpaid_ph == ""){
    $unpaid_ph = 0;
} else {
    $unpaid_ph = "$unpaid_ph";
}
$unmatchph = $ropaya['unmatched_ph'];
if($unmatchph == ""){
    $unmatchph = 0;
} else {
    $unmatchph = "$unmatchph";
}
$prowallet = $ropaya['e_wallet'];
$refme = $ropaya['referee'];

$payrem = $unpaid_ph + $amtpid;
$totalunmatchph = $unmatchph + $amtpid;
///// Reverse receiver's GH request
$revrecgh = $db->query("UPDATE ponzee SET unmatched_gh='$totalunmatchgh' WHERE username='$repid'");
//// Reverse Payer's PH request
$timnoi = time();
$blocktime = $timnoi + 2592000;
$poqpay = $db->query("UPDATE ponzee SET unmatched_ph='$totalunmatchph', block_time='$blocktime' WHERE username='$provipid'");
$blockpayer = $db->query("UPDATE users SET blockstaxee='on' WHERE username='$provipid'"); 

//// Remove photo
$get_qax = $db->query("SELECT * FROM pay_proof WHERE payme_id='$popid'");
$infcoo = $get_qax->num_rows;
if($infcoo > 0){
while ($rollaq = $get_qax->fetch_assoc()) {
$delmage = $rollaq['proof_ofpay']; 
unlink($delmage);
}
$info_submit_delmage = $db->query("DELETE FROM pay_proof WHERE payme_id='$popid'");
}

//// DELETE MATCH REQUEST
$delmatch = $db->query("DELETE FROM match_ph WHERE id='$popid'"); 

////// End Query
?>