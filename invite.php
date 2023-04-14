<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $follo = strip_tags(@$_POST['follo']);
 $follo = $db->real_escape_string($follo); 
 $follo = str_replace("'", "&apos;", $follo);

if ($user != "") {
$u_check = $db->query("SELECT * FROM invite WHERE follower='$user' && followe='$follo'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check == 0) {
$time_sent = time();    
$db->query("INSERT INTO invite VALUES('','$follo','$user','no','')");
$db->query("INSERT INTO notify VALUES('','$follo','invite','','$time_sent','$user','','')");
$db->query("INSERT INTO notifications VALUES('','$follo','$user','invite','$time_sent','','','no','','')");
    echo "<button id='unfollowit' class='btn-primary'><i class='fa fa-user'></i> Unfollow</button>";
  }
}
  else
  {
   /// do nothing...
  }


?>



