<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $trad_val = strip_tags(@$_POST['trad_val']);
 $trad_val = $db->real_escape_string($trad_val); 

if ($user != "") {
    //Submit the form to the database
    $info_submit_query = $db->query("UPDATE users SET trade_stat='$trad_val' WHERE username='$user'"); 
  }
  else
  {
   /// do nothing...
  }


?>