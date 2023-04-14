<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$contry = $_GET['contry'];

 $mineeph = strip_tags(@$_POST['mineeph']);
 $mineeph = $db->real_escape_string($mineeph); 
 $mineeph = str_replace("'", "&apos;", $mineeph);
 $mineeph = str_replace(",", "", $mineeph);
 
 $maxeeph = strip_tags(@$_POST['maxeeph']);
 $maxeeph = $db->real_escape_string($maxeeph); 
 $maxeeph = str_replace("'", "&apos;", $maxeeph);
 $maxeeph = str_replace(",", "", $maxeeph);
 
 $mineegh = strip_tags(@$_POST['mineegh']);
 $mineegh = $db->real_escape_string($mineegh); 
 $mineegh = str_replace("'", "&apos;", $mineegh);
 $mineegh = str_replace(",", "", $mineegh);
 
 $maxeegh = strip_tags(@$_POST['maxeegh']);
 $maxeegh = $db->real_escape_string($maxeegh); 
 $maxeegh = str_replace("'", "&apos;", $maxeegh);
 $maxeegh = str_replace(",", "", $maxeegh);
 
 $inteerate = strip_tags(@$_POST['inteerate']);
 $inteerate = $db->real_escape_string($inteerate); 
 $inteerate = str_replace("'", "&apos;", $inteerate);
 
 $copreet = strip_tags(@$_POST['copreet']);
 $copreet = $db->real_escape_string($copreet); 
 $copreet = str_replace("'", "&apos;", $copreet);
 
 $tagratee = strip_tags(@$_POST['tagratee']);
 $tagratee = $db->real_escape_string($tagratee); 
 $tagratee = str_replace("'", "&apos;", $tagratee);
 
 $cswixxi = strip_tags(@$_POST['cswixxi']);
 $cswixxi = $db->real_escape_string($cswixxi); 
 $cswixxi = str_replace("'", "&apos;", $cswixxi);
   
if ($user != "") {
    //Submit the form to the database
    $info_submit_query = $db->prepare("UPDATE general_details SET copy_right=?, my_target=?, get_coins=?, interest_rate=?, min_ph=?,min_gh=?,max_ph=?, max_gh=? WHERE country_spar=?");
    $info_submit_query->bind_param("sssssssss", $copreet, $tagratee, $cswixxi, $inteerate, $mineeph, $mineegh, $maxeeph, $maxeegh, $contry);
    $info_submit_query->execute();
    echo "Information updated!";
   }
  else
  {
   echo "you are not logged in...";
  }


?>