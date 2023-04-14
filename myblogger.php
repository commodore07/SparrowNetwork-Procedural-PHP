<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$ukee = $_GET['UK'];
$ukee = $db->real_escape_string($ukee); 
$ukee = str_replace("'","&apos;", $ukee);

 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val); 
 $foll_val = str_replace("'", "&apos;", $foll_val);

if ($user != "") {
    //Submit the form to the database
    $info_submit_query = $db->query("UPDATE users SET blogxee='$foll_val' WHERE username='$ukee'"); 
  }
  else
  {
   /// do nothing...
  }


?>