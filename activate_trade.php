<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val);
 $foll_val = str_replace("'", "&apos;", $foll_val);
 
 $idxi = $_GET['idx'];
 $idxi = $db->real_escape_string($idxi); 
 $idxi = str_replace("'","&apos;", $idxi);

if ($user != "") {
$get_phot = $db->query("SELECT * FROM posts WHERE id='$idxi'");
$rollin = $get_phot->fetch_assoc();
$pro_pic = $rollin['profile'];   
$vee1 = $rollin['vee1'];  
$vee2 = $rollin['vee2']; 
    //Submit the form to the database

if($vee1 != ""){
$get_tee = $db->query("SELECT * FROM tradefair WHERE brand='$vee1'");
$rolliw = $get_tee->fetch_assoc();
$tidd = $rolliw['id']; 
$lapic = $rolliw['pic']; 
$acpic = $rolliw['actual_pic']; 

$info_submit_teeaz = $db->query("UPDATE tradefair SET la_activ='$foll_val' WHERE id='$tidd'");
} 
    echo "Done...";
  }
  else
  {
   /// do nothing...
  }


?>