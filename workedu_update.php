<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
   $skul = strip_tags(@$_POST['skul']);
   $skul = $db->real_escape_string($skul); 
   $datfrm = strip_tags(@$_POST['datfrm']);
   $datfrm = $db->real_escape_string($datfrm); 
   $datto = strip_tags(@$_POST['datto']);
   $datto = $db->real_escape_string($datto); 
   $comp = strip_tags(@$_POST['comp']);
   $comp = $db->real_escape_string($comp); 
   $desig = strip_tags(@$_POST['desig']);
   $desig = $db->real_escape_string($desig); 
   $frmdat = strip_tags(@$_POST['frmdat']);
   $frmdat = $db->real_escape_string($frmdat); 
   $todat = strip_tags(@$_POST['todat']);
   $todat = $db->real_escape_string($todat); 
   $coren = strip_tags(@$_POST['coren']);
   $coren = $db->real_escape_string($coren); 
   
   $skul_inter = "$datfrm - $datto";
   $coy_inter = "$frmdat - $todat";

if ($user != "") {
//// GET CURRENCY CODE    
$idee = $db->prepare("SELECT * FROM currency WHERE currency=?") or die($db->error());
$idee->bind_param("s", $coren);
$idee->execute();
$idee = $idee->get_result();

while ($row = $idee->fetch_assoc()) {
$vac2 = $row['code'];
}  

//// END CURRENCY CODE    
    //Submit the form to the database
    $info_submit_query = $db->prepare("UPDATE users SET my_uni=?, vac2=?, vac3=?, uni_start=?, uni_finish=?, my_coy=?,desig=?,coy_start=?, coy_finish=? WHERE username='$user'");
    $info_submit_query->bind_param("sssssssss", $skul, $coren, $vac2, $datfrm, $datto, $comp, $desig, $frmdat, $todat);
    $info_submit_query->execute();
    echo "Information updated!";
  }
  else
  {
   echo "you are not logged in...";
  }


?>