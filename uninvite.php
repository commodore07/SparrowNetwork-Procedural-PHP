<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $follo = strip_tags(@$_POST['follo']);
 $follo = $db->real_escape_string($follo);

if ($user != "") {
$u_check = $db->query("SELECT * FROM invite WHERE follower='$user' && followe='$follo'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check > 0) {
$db->query("DELETE FROM invite WHERE follower='$user' && followe='$follo'");
$db->query("DELETE FROM notify WHERE event='invite' && username='$follo' && emp1='$user'");
$db->query("DELETE FROM notifications WHERE event='invite' && username='$follo' && notifier='$user'");
    echo "<button id='followit' class='btn-primary'><i class='fa fa-user-plus'></i> Follow</button>";
  }
}
  else
  {
   /// do nothing...
  }


?>



