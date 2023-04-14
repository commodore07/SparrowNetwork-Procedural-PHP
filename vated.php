<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
$ukee = $_GET['UK'];
$ukee = $db->real_escape_string($ukee); 
$ukee = str_replace("'", "&apos;", $ukee);

 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val); 
 $foll_val = str_replace("'", "&apos;", $foll_val);

if ($user != "") {
$u_check = $db->query("SELECT * FROM follows WHERE follower='$user' && followe='$ukee'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check == 0) {
$db->query("INSERT INTO follows VALUES('','$ukee','$user','no','')");
  }
  $db->query("DELETE FROM notify WHERE username='$user' AND emp1='$ukee' and event='invite'"); 
$db->query("DELETE FROM notifications WHERE username='$user' AND notifier='$ukee' and event='invite'"); 
  echo "Accepted";
}
  else
  {
   /// do nothing...
  }


?>