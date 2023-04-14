<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val);
 $foll_val = str_replace("'", "&apos;", $foll_val);
 
 if($foll_val == "on"){
     $foll_val = "adsense";
 } else {
     $foll_val = "";
 }
 
 $idxi = $_GET['idx'];
 $idxi = $db->real_escape_string($idxi); 
 $idxi = str_replace("'","&apos;", $idxi);

if ($user != "") {


$info_submit_teeaz = $db->query("UPDATE posts SET emp1='$foll_val' WHERE id='$idxi'");

    echo "Done...";
  }
  else
  {
   /// do nothing...
  }


?>