<?php include("php/connectit.php"); ?>
<?php 
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
?>


<?php 
$getU = $_GET['U'];
$getU = $db->real_escape_string($getU); 


 $follo = strip_tags($_POST['follo']);
 $follo = $db->real_escape_string($follo); 
 
 ///// Count the likes
 $u_counte = $db->query("SELECT * FROM likes WHERE like_id='$follo'");
$likevaz = $u_counte->num_rows;
////
$likevaz = $likevaz - 1;
//// if else statement
if($likevaz == 0){
    $likevaz = "";
}
else {
    $likevaz = "$likevaz";
}
//// end statement

if ($user != "") {
$u_check = $db->query("SELECT * FROM likes WHERE like_id='$follo' AND liker='$user'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check > 0) {
$sqldelz = $db->prepare("DELETE FROM likes WHERE like_id=? AND liker=?");
$sqldelz->bind_param("ss", $follo, $user);
$sqldelz->execute(); 
echo "$likevaz";
    
  }
}
  else
  {
   /// do nothing...
  }


?>



