<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $foll_val = strip_tags(@$_POST['upa_val']);
 $foll_val = $db->real_escape_string($foll_val);

if ($user != "") {
$unk = "Nigeria";    
$getinx = $db->prepare("SELECT * FROM general_details WHERE country_spar=?") or die($db->error());
$getinx->bind_param("s", $unk);
$getinx->execute();
$getinfteef = $getinx->get_result();
$rollin = $getinfteef->fetch_assoc();
$lastlog = $rollin['last_userlog'];
$timoq = time();
$logdiff = $timoq - $lastlog;
///// Last Update Time
if($foll_val != "on"){
    $spar_last_update = $db->query("UPDATE general_details SET last_update='$logdiff' WHERE country_spar='Nigeria'"); 
}
    
    //Submit the form to the database
    $info_submit_query = $db->query("UPDATE general_details SET update_status='$foll_val' WHERE country_spar='Nigeria'"); 
  }
  else
  {
   /// do nothing...
  }


?>