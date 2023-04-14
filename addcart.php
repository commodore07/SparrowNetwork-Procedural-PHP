<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $follo = strip_tags(@$_POST['follo']);
 $follo = $db->real_escape_string($follo); 
 $follo = str_replace("'", "&apos;", $follo);
 $timm = time();
 
 $sella = $_GET['U'];
 $sella = $db->real_escape_string($sella); 
$sella = str_replace("'","&apos;", $sella);

if ($user != "") {
$u_check = $db->query("SELECT * FROM cart WHERE buyer='$user' && item_id='$follo'");
// Count the amount of rows where username = $un
$check = $u_check->num_rows;
if ($check == 0) {
$db->query("INSERT INTO cart VALUES('','$user','$follo','$timm','$sella','no','','')");

///// first condition
$post = "Added product to cart";
$receiver = "$sella";
$rechat = $db->query("SELECT * FROM my_chat WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$conchat = $rechat->num_rows;
if ($conchat == 0){
$sqlchat = "INSERT INTO my_chat VALUES('', '$user','$receiver','$timm','','$follo','','','')";  
$quechat = $db->query($sqlchat) or die ($db->error()); 
}
else {
    $up_query = $db->query("UPDATE my_chat SET emp1='2', emp2='2', chat_status = '$user' WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user'");
}
////////    
////// GET TRADEFAIR PHOTO
$repoto = $db->query("SELECT * FROM tradefair WHERE id = '$follo'");
$conpoto = $repoto->num_rows;
$roloto = $repoto->fetch_assoc();
$lachoto = $roloto['pic'];
////// END GET TRADEFAIR PHOTO
$revii = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$conda = $revii->num_rows;
$rollin = $revii->fetch_assoc();
$lachatee = $rollin['sender'];
if ($lachatee == $user){
$sqlCommand = "INSERT INTO msg_reply VALUES('', '$user','$receiver','$post','$timm','goon','','no','$lachoto')";  
$query = $db->query($sqlCommand) or die ($db->error()); 
} else {
$sqlCommand = "INSERT INTO msg_reply VALUES('', '$user','$receiver','$post','$timm','stop','','no','$lachoto')";  
$query = $db->query($sqlCommand) or die ($db->error());     
}
///// end    
    echo "Done...";
  }
}
  else
  {
   /// do nothing...
  }


?>



