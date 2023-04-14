<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $inf_val = strip_tags(@$_POST['inf_val']);
 $inf_val = $db->real_escape_string($inf_val); 

if ($user != "") {
    //Submit the form to the database
    $info_submit_query = $db->query("UPDATE users SET inf_stat='$inf_val' WHERE username='$user'"); 
  }
  else
  {
   /// do nothing...
  }


?>