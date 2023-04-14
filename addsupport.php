<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
if(!empty($_POST['searchsupp'])){      
$rusername = strip_tags($_POST['searchsupp']);
$rusername = $db->real_escape_string($rusername); 
$rusername = str_replace("'", "&apos;", $rusername); 
$rusername = strtolower("$rusername");
  
/////////////
$getmedver = $db->prepare("SELECT * FROM ponzee WHERE username=?") or die($db->error());
$getmedver->bind_param("s", $rusername);
$getmedver->execute();
$getmedver = $getmedver->get_result();
$rolsupp = $getmedver->fetch_assoc();
$counxry = $rolsupp['spar_coun'];
//// GET BULLION
$getbullion = $db->prepare("SELECT * FROM ponzee WHERE spar_coun=? AND coun_stat='bullion' ORDER BY id DESC LIMIT 1") or die($db->error());
$getbullion->bind_param("s", $counxry);
$getbullion->execute();
$getbullion = $getbullion->get_result();
$rolbullion = $getbullion->fetch_assoc();
$userbullion = $rolbullion['username'];
/////////UPDATE SUPPORT
    $updateref = $db->prepare("UPDATE ponzee SET spar_support='on' WHERE username=?");
    $updateref->bind_param("s", $rusername);
    $updateref->execute();  
//// FOLLOW BULLION
$folbulon = $db->prepare("INSERT INTO follows VALUES('',?,?,'no','')");
$folbulon->bind_param("ss", $userbullion, $rusername);
$folbulon->execute();
echo "Successful...";

} else {
    echo "Fill in empty field!";
}
}
?>