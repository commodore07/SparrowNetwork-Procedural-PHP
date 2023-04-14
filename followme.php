<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $follo = strip_tags(@$_POST['follo']);
 $follo = $db->real_escape_string($follo); 
 $follo = str_replace("'", "&apos;", $follo);
 $time_sent = time();
 
$get_phox = $db->query("SELECT * FROM ponzee WHERE username='$follo'");
$rolx = $get_phox->fetch_assoc();
$counstaxo = $rolx['coun_stat'];

if ($user != "" && $counstaxo == "") {
$u_check = $db->query("SELECT * FROM follows WHERE follower='$user' && followe='$follo'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check == 0) {
$db->query("INSERT INTO follows VALUES('','$follo','$user','no','')");
$db->query("INSERT INTO notify VALUES('','$follo','folloya','','$time_sent','$user','','')");
$db->query("INSERT INTO notifications VALUES('','$follo','$user','folloya','$time_sent','','','no','','')");
    echo "<button id='unfollowit' class='btn-primary'><i class='fa fa-user'></i> Unfollow</button>";
  }
}
  else
  {
   /// do nothing...
  }


?>



