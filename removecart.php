<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $follo = strip_tags(@$_POST['follo']);
 $follo = $db->real_escape_string($follo);
 $follo = str_replace("'", "&apos;", $follo);

if ($user != "") {
$u_check = $db->query("SELECT * FROM cart WHERE buyer='$user' && item_id='$follo'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check > 0) {
$db->query("DELETE FROM cart WHERE buyer='$user' && item_id='$follo'");
    echo "Done...";
  }
}
  else
  {
   /// do nothing...
  }


?>



