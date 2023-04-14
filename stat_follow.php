<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val); 

if ($user != "") {
    //Submit the form to the database
    $info_submit_query = $db->query("UPDATE users SET follow_stat='$foll_val' WHERE username='$user'"); 
  }
  else
  {
   /// do nothing...
  }


?>