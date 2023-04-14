<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
$ex_tim = date("h:i:sa");
 $sachdate = date('d/m/Y');

$follo = strip_tags(@$_POST['follo']);
$follo = $db->real_escape_string($follo); 
 $follo = str_replace("\'", "&apos;", $follo);
 
$tradname = strip_tags(@$_POST['tradname']);
$tradname = $db->real_escape_string($tradname); 
 $tradname = str_replace("\'", "&apos;", $tradname);
 
$kior = strip_tags(@$_POST['kior']);
$kior = $db->real_escape_string($kior); 
 $kior = str_replace("\'", "&apos;", $kior);

$ladez = strip_tags(@$_POST['ladez']);
$ladez = $db->real_escape_string($ladez); 
 $ladez = str_replace("\'", "&apos;", $ladez); 
 
 $quantex = strip_tags(@$_POST['quantex']);
 $quantex = $db->real_escape_string($quantex); 
 $quantex = str_replace("\'", "&apos;", $quantex);
 
$veez1 = strip_tags(@$_POST['veez1']);
$veez1 = $db->real_escape_string($veez1);
$veez1 = str_replace("\'", "&apos;", $veez1);

//////// Get parameters
$get_paraz = $db->prepare("SELECT * FROM tradefair WHERE brand=?");
$get_paraz->bind_param("s", $veez1);
$get_paraz->execute();
$get_paraz = $get_paraz->get_result();

$ropaz = $get_paraz->fetch_assoc();
$idevx = $ropaz['id'];
$uenev = $ropaz['username'];
////
 
if ($user != "") {
$sarcx = $db->prepare("UPDATE posts SET body=? WHERE id=?");
$sarcx->bind_param("ss", $ladez, $follo);
$sarcx->execute();

$xenox = $db->prepare("INSERT INTO product_statuz VALUES ('',?,?,'',?,?,?,?,'xaupdate','','')");
$xenox->bind_param("ssssss", $uenev, $idevx, $user, $ex_tim, $sachdate, $quantex);
$xenox->execute();

$uppok = $db->prepare("UPDATE tradefair SET name=?, price=?, item_qty=? WHERE username=? AND brand=?");
$uppok->bind_param("sssss", $tradname, $kior, $quantex, $user, $veez1);
$uppok->execute();

echo "Update was successful";
}
?>



