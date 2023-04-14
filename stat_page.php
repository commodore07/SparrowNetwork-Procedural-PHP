<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $page_val = strip_tags(@$_POST['page_val']);
 $page_val = $db->real_escape_string($page_val); 

if ($user != "") {
    //Submit the form to the database
    $info_submit_query = $db->query("UPDATE users SET page_stat='$page_val' WHERE username='$user'"); 
  }
  else
  {
   /// do nothing...
  }


?>